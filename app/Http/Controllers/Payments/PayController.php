<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use DB;
use File;
use Validator;
use App\Models\Pay;
use App\Models\Certification;
use App\Models\Profile;
use Illuminate\Support\Str;


class PayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
    )
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $payments = Pay::orderByRaw("FIELD(pay_status , 'En revisión', 'Aceptado', 'Rechazado', 'closed') ASC")
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('payments.index', ['payments' => $payments]);
    }

    public function payByCurp(Request $request, $curp)
    {
        $payments = Pay::where('pay_curp', $curp)->orderByRaw("FIELD(pay_status , 'En revisión', 'Aceptado', 'Rechazado', 'closed') ASC")
            ->orderBy('updated_at', 'desc')
            ->paginate(25);

        return view('payments.index', ['payments' => $payments]);
    }

    public function show(Request $request, $id)
    {
        $pay = Pay::find($id);

        return view('payments.show', ['pay' => $pay]);
    }

    public function store(Request $request)
    {

        $rules = array(
            'pay_documento'=> 'required',
            'id_service'=> 'required',
            'pay_type_service'=> 'required',
            'pay_curp'=> 'required',
            'pay_standar'=> 'required',
        );

        $messages = array(
            'pay_documento.required' =>'Este campo es requerido',
            'id_service.required' =>'Este campo es requerido',
            'pay_type_service.required' =>'Este campo es requerido',
            'pay_curp.required' =>'Este campo es requerido',
            'pay_standar.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {



            $pay = new Pay;
            $pay->id_service = $request->id_service;
            $pay->pay_type_service = $request->pay_type_service;
            $pay->pay_curp = $request->pay_curp;
            $pay->pay_standar = $request->pay_standar;
            $pay->pay_status = 'En revisión';
            $pay->pay_monto = 'N/A';


            if($request->hasFile('pay_documento')){
                $name = "pay_".$request->pay_curp.time().".".$request->file('pay_documento')->extension();
                $path = $request->pay_documento->storeAs('/public/pay', $name);
                $path2 ="/pay".'/'.$name;
                //Image::create(['path' => $path2]);
                $pay->pay_documento = $name;
                $pay->pay_link = $name;
                
            }else{
                $pay->pay_documento = 'N/A';
                $pay->pay_link = 'N/A';
            }


            $certification = Certification::find($request->id_service);
            $certification->pago = "En revisión";
            //$certification->diagnostico_status = $request->diagnostico_status;


            $certification->save();
            $pay->save();

            return redirect()->back()->with('message', 'Registro exitoso');


        }
    }

    public function update(Request $request, $id)
    {
        
        $pay = Pay::find($id);
        $pay->pay_status = $request->pay_status;

        $certification = Certification::find($pay->id_service);
        $certification->pago = $request->pay_status;


        $profile = Profile::where('user_curp', $certification->curp)->first();

        $certification->save();
        $pay->save();

        
            $to_name = $profile->user_nombre;
            $to_email = $profile->user_email;

            $data = array( 'name' => $profile->user_nombre, 'details' => $request->pay_details, 'pay' => $certification->pago);

            Mail::send('emails.pay', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Estatus de pago');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });
        

        return redirect()->back()->with('message', 'Registro actualizado');
    }

    public function payUpdate(Request $request)
    {

        $rules = array(
            'pay_documento'=> 'required',
            'id_service'=> 'required',
        );

        $messages = array(
            'pay_documento.required' =>'Este campo es requerido',
            'id_service.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {


            $pay = Pay::where('id_service', $request->id_service)->first();
            $pay->pay_status = 'En revisión';

            if($request->hasFile('pay_documento')){

                Storage::disk('public')->delete('pay/'.$pay->pay_documento);
                $name = "pay_".$pay->pay_curp.time().".".$request->file('pay_documento')->extension();
                $path = $request->pay_documento->storeAs('/public/pay', $name);
                $path2 ="/pay".'/'.$name;
                //Image::create(['path' => $path2]);
                $pay->pay_documento = $name;
                $pay->pay_link = $name;
                
            }else{
                $pay->pay_documento = 'N/A';
                $pay->pay_link = 'N/A';
            }



            $certification = Certification::find($request->id_service);
            $certification->pago = "En revisión";

            $certification->save();
            $pay->save();

            return redirect()->back()->with('message', 'Comprobante de pago actualizado');


        }
    }

}
