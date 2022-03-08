<?php

namespace App\Http\Controllers\Certification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

use DB;
use File;
use App\Models\Date;
use App\Models\Quote;
use App\Models\Profile;
use App\Models\Certification;
use Validator;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class QuoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
    )
    {
        #$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function form()
    {
        $result = Date::where('date_status', 'Disponible')->orderBy('id', 'desc')->get();
        $dates = [];

        foreach($result as $date){
            if (in_array($date->date_date, $dates)) {
            }else{
                array_push($dates, $date->date_date);
            }
        }

        return view('schedule.quote.form', ['dates' => $dates]);
    }


    public function store(Request $request)
    {

        $rules = array(
            'quote_date_id' => 'required',
            'quote_user_name' => 'required',
            'quote_user_ap_p' => 'required',
            'quote_user_ap_m' => 'required',
            'quote_user_curp' => 'required',
            'quote_user_email' => 'required',
        );

        $messages = array(
            'quote_date_id.required' =>'Este campo es requerido',
            'quote_user_name.required' =>'Este campo es requerido',
            'quote_user_ap_p.required' =>'Este campo es requerido',
            'quote_user_ap_m.required' =>'Este campo es requerido',
            'quote_user_curp.required' =>'Este campo es requerido',
            'quote_user_email.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            print_r($request->all());
            die();

                $access = Str::random(20);

                $quote = new Quote;
                $quote->quote_date_id = $request->quote_date_id;
                $quote->quote_qr_id = Str::random(25);
                $quote->quote_user_name = $request->quote_user_name;
                $quote->quote_user_pago = 'Realizado';
                $quote->quote_user_ap_p = $request->quote_user_ap_p;
                $quote->quote_user_ap_m = $request->quote_user_ap_m;
                $quote->quote_user_curp = $request->quote_user_curp;
                $quote->quote_user_email = $request->quote_user_email;
                $quote->quote_status = 'No disponible';
                $quote->quote_access = $access;

                $date = Date::find($request->quote_date_id);
            if ($date->date_status == 'Disponible') {

                $date->date_status = 'No disponible';
                $quote->quote_date = $date->date_date;
                $quote->quote_hour = $date->date_hour;

                $url = 'citas/consulta/'.$access;


                if(Certification::where('curp', $request->quote_user_curp)->exists()){

                    $certification = Certification::where('curp', $request->quote_user_curp)
                        ->where('estandar', $date->date_standar)
                        ->where('n_intento', '0')->first();
                        
                    $certification->n_intento = '1';

                    $certification->save();
                }
                
                $quote->save();
                $date->save();

                #return redirect('/');
                return redirect($url);

            }else{
                return redirect('citas')->with('message', 'Esta fecha no esta disponible');
            }
        }
    }

    public function formLog()
    {

        $profile = Profile::where('user_curp', Auth::user()->name)
                ->first();

        $today =date("Y-m-d");
        $result = Date::where('date_status', 'Disponible')
            ->where('date_date','>=', $today)
            ->orderBy('date_date', 'asc')
            ->get();
        
        $dates = [];

        $count = 0;
        foreach($result as $date){
            if (in_array($date->date_date, $dates)) {
            }else{
                $count++;
                if($count <= 5){
                    array_push($dates, $date->date_date);
                }
                
            }
        }

        return view('schedule.quote.request', ['dates' => $dates, 'profile' => $profile]);
    }

    public function formResponse(Request $request,$day)
    {

        $profile = Profile::where('user_curp', Auth::user()->name)
                ->first();

        $today =date("Y-m-d");
        $result = Date::where('date_status', 'Disponible')
            ->where('date_date','>=', $today)
            ->orderBy('date_date', 'asc')
            ->get();

        $dates = [];

        $count = 0;
        foreach($result as $date){
            if (in_array($date->date_date, $dates)) {
            }else{
                $count++;
                if($count <= 5){
                    array_push($dates, $date->date_date);
                }
                
            }
        }

        if (Date::where('date_status', 'Disponible')
            ->where('date_date', $day)->exists()) {

            $quotes = Date::where('date_status', 'Disponible')
                ->where('date_date', $day)
                ->orderBy('date_hour', 'asc')->get();

        }else{
            $quotes='Sin disponibilidad';
        }

        $day = $day;


        return view('schedule.quote.response', ['dates' => $dates, 'profile' => $profile, 'quotes' => $quotes, 'day' =>$day]);
    }

    public function storeLog(Request $request)
    {

        $rules = array(
            'quote_date_id' => 'required',
            'quote_user_name' => 'required',
            'quote_user_ap_p' => 'required',
            'quote_user_ap_m' => 'required',
            'quote_user_curp' => 'required',
            'quote_user_email' => 'required',
        );

        $messages = array(
            'quote_date_id.required' =>'Este campo es requerido',
            'quote_user_name.required' =>'Este campo es requerido',
            'quote_user_ap_p.required' =>'Este campo es requerido',
            'quote_user_ap_m.required' =>'Este campo es requerido',
            'quote_user_curp.required' =>'Este campo es requerido',
            'quote_user_email.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            print_r($validator);
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

                $access = Str::random(20);

                $quote = new Quote;
                $quote->quote_date_id = $request->quote_date_id;
                $quote->quote_qr_id = Str::random(25);
                $quote->quote_user_name = $request->quote_user_name;
                $quote->quote_user_ap_p = $request->quote_user_ap_p;
                $quote->quote_user_ap_m = $request->quote_user_ap_m;
                $quote->quote_user_curp = $request->quote_user_curp;
                $quote->quote_user_email = $request->quote_user_email;
                $quote->quote_user_pago = 'Realizado';
                $quote->quote_status = 'No disponible';
                $quote->quote_access = $access;

                $date = Date::find($request->quote_date_id);
            if ($date->date_status == 'Disponible') {

                $date->date_status = 'No disponible';
                $quote->quote_date = $date->date_date;
                $quote->quote_hour = $date->date_hour;

                $url = 'citas/consulta/'.$access;



                $certification = Certification::where('curp', $request->quote_user_curp)
                    ->where('estandar', $date->date_standar)
                    ->where('n_intento', '0')->first();
                    
                $certification->n_intento = '1';

                $certification->save();
                $quote->save();
                $date->save();


                $to_name = $request->quote_user_name;
                $to_email = $request->quote_user_email;
                $date = date('d-m-Y', strtotime($quote->quote_date));
                

                $data = array( 'name' => $request->quote_user_name, 'date' => $date, 'hour' => $quote->quote_hour);


                Mail::send('emails.quote', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                    ->subject('Cita');
                    $message->from('icat@cdmx.gob.mx','Icat CDMX');
                });

                #return redirect('/');
                return redirect($url);

            }else{
                return redirect()->back()->with('message', 'Este horario no esta disponible');
            }
        }
    }

    public function delete(Request $request, $id)
    {
        $quote = Quote::find($id);

        $date = Date::find($quote->quote_date_id);
        $date->date_status = 'Disponible';

        $url = 'usuario/perfil/'. $quote->quote_user_curp;

        $certification = Certification::where('curp', $quote->quote_user_curp)
            ->where('estandar', $date->date_standar)
            ->where('n_intento', '1')->first();
                    
        $certification->n_intento = '0';

        $certification->save();
        $date->save();
        $quote->delete();

       return redirect($url)->with('message', 'Cita cancelada');
    }


    public function dates(Request $request)
    {
        $data = $request->data;
        $dates = Date::where('date_date', $data)->where('date_status', 'Disponible')->orderBy('date_hour', 'asc')->get();

        return response()->json($dates);

    }


    public function datesById(Request $request)
    {
        $data = $request->data;
        $dates = Date::where('id', $data)->get();

        return response()->json($dates);

    }

    public function find(Request $request, $id)
    {
        $quote = Quote::findOrFail($id);

        #$alliances = Alianza::where($request->filter_type, 'like','%'.$request->filter_value.'%')->orderBy('id', 'desc')->paginate(20);

        return view('schedule.quote.pdf', ['quote' => $quote]);
    }

    public function search(Request $request, $id)
    {
        $quote = Quote::where('quote_access', $id)->firstOrFail();

        $date = Date::findOrFail($quote->quote_date_id);

        #$alliances = Alianza::where($request->filter_type, 'like','%'.$request->filter_value.'%')->orderBy('id', 'desc')->paginate(20);

        return view('schedule.quote.pdf', ['quote' => $quote, 'date' =>$date]);
    }

}
