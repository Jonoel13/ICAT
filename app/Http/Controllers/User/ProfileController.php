<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use DB;
use File;
use Validator;
use App\Models\User;
use App\Models\Enroll;
use App\Models\Profile;
use App\Models\Quote;
use App\Models\Certification;
use App\Models\Group;
use Illuminate\Support\Str;


class ProfileController extends Controller
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

    public function index(Request $request, $curp)
    {
        if(Profile::where('user_curp', $curp)->exists()){

            $profile = Profile::where('user_curp', $curp)
                ->first();

            $certifications = Certification::where('curp', $profile->user_curp)
                ->get();



            $enrolls = Enroll::where('enrol_user_curp', $curp)
                ->get();


            $today =date("Y-m-d");
            $quotes = DB::table('quotes')->where('quote_user_curp', $profile->user_curp)
                ->where('quote_date','>=', $today)
                ->join('dates', 'quotes.quote_date_id', '=', 'dates.id')
                ->select('quotes.*', 'dates.date_place', 'dates.date_standar')
                ->get();

            return view('user.profile', [
                'certifications' => $certifications,
                'profile' => $profile,
                'enrolls' => $enrolls,
                'quotes' => $quotes,
            ]);

        }else{
            return redirect('home')->with('message', 'Registro no existe');
        }
    }

    public function info()
    {
        return view('user.info');
    }


    public function edit(Request $request, $id)
    {
        
        $profile = Profile::find($id);

        return view('user.edit', [
            'profile' => $profile
        ]);
            
    }


    public function update(Request $request, $id)
    {

        $rules = array(
            'user_nombre'=> 'required',
            'user_app'=> 'required',
            'user_apm'=> 'required',
            'user_curp'=> 'required',
            'user_edad'=> 'required',
            'user_sexo'=> 'required',
            'user_calle'=> 'required',
            'user_colonia'=> 'required',
            'user_alcaldia'=> 'required',
            'user_estado'=> 'required',
            'user_cp'=> 'required',
            'user_telefono'=> 'required',
            'user_email' => 'required',
            'user_academico'=> 'required',
            'user_productivo'=> 'required',
            'user_indigena'=> 'required',
            'user_lengua'=> 'required',
        );

        $messages = array(
            'user_nombre.required' =>'Este campo es requerido',
            'user_app.required' =>'Este campo es requerido',
            'user_apm.required' =>'Este campo es requerido',
            'user_curp.required' =>'Este campo es requerido',
            'user_edad.required' =>'Este campo es requerido',
            'user_sexo.required' =>'Este campo es requerido',
            'user_calle.required' =>'Este campo es requerido',
            'user_colonia.required' =>'Este campo es requerido',
            'user_alcaldia.required' =>'Este campo es requerido',
            'user_estado.required' =>'Este campo es requerido',
            'user_cp.required' =>'Este campo es requerido',
            'user_telefono.required' =>'Este campo es requerido',
            'user_email.required' =>'Este campo es requerido',
            'user_academico.required' =>'Este campo es requerido',
            'user_productivo.required' =>'Este campo es requerido',
            'user_indigena.required' =>'Este campo es requerido',
            'user_lengua.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {


            $profile = Profile::find($id);
            $profile->user_nombre = $request->user_nombre;
            $profile->user_app = $request->user_app;
            $profile->user_apm = $request->user_apm;
            $profile->user_curp = strtoupper($request->user_curp);
            $profile->user_edad = $request->user_edad;
            $profile->user_sexo = $request->user_sexo;
            $profile->user_calle = $request->user_calle;
            $profile->user_colonia = $request->user_colonia;
            $profile->user_alcaldia = $request->user_alcaldia;
            $profile->user_estado = $request->user_estado;
            $profile->user_cp = $request->user_cp;
            $profile->user_telefono = $request->user_telefono;
            $profile->user_email = $request->user_email;
            $profile->user_academico = $request->user_academico;
            $profile->user_productivo = $request->user_productivo;
            $profile->user_indigena = $request->user_indigena;
            $profile->user_lengua = $request->user_lengua;
            $profile->user_leng_indigena = $request->user_leng_indigena;
           
            /*
            ---------------------------------------------------------------
                Subir documento de CURP
            ---------------------------------------------------------------
            */
            

            if($request->hasFile('user_doc_curp')){
                Storage::disk('public')->delete('curp/'.$profile->user_doc_curp);

                $name = "curp_".$request->user_curp.time().".".$request->file('user_doc_curp')->extension();
                $path = $request->user_doc_curp->storeAs('/public/curp', $name);

                $profile->user_doc_curp = $name;
                $profile->user_check_curp = 'En revisión';
            }

            if($request->hasFile('user_doc_id')){
                Storage::disk('public')->delete('id/'.$profile->user_doc_id);

                $name = "id_".$request->user_curp.time().".".$request->file('user_doc_id')->extension();
                $path = $request->user_doc_id->storeAs('/public/id', $name);

                $profile->user_doc_id = $name;
                $profile->user_check_id = 'En revisión';
            }


            if($request->hasFile('user_doc_foto')){
                Storage::disk('public')->delete('photo/'.$profile->user_doc_foto);

                $name = "foto_".$request->user_curp.time().".".$request->file('user_doc_foto')->extension();

                $path = $request->user_doc_foto->storeAs('/public/photo', $name);
                $path2 ="/id".'/'.$name;
                //Image::create(['path' => $path2]);

                $profile->user_doc_foto = $name;
                $profile->user_check_foto = 'En revisión';
            }


            $profile->save();

            return back()->with('message', 'Registro Actualizado');
        }

    }

    public function docs(Request $request)
    {
        $profiles = Profile::where('user_check_ok', 'No')->orderBy('updated_at', 'desc')->get();
        return view('documents.index',['profiles' => $profiles]);
    }


    public function showDocs(Request $request, $id)
    {
        $profile = Profile::find($id);
        return view('documents.show',['profile' => $profile]);
    }

    public function updateDocs(Request $request, $id)
    {

        $profile = Profile::find($id);
        if ($request->has('user_check_curp')) {
            $profile->user_check_curp = $request->user_check_curp;
        }
        if ($request->has('user_check_id')) {
            $profile->user_check_id = $request->user_check_id;
        }
        if ($request->has('user_check_foto')) {
            $profile->user_check_foto = $request->user_check_foto;
        }

        if(
            $profile->user_check_curp == 'Aceptado' &&
            $profile->user_check_id == 'Aceptado' &&
            $profile->user_check_foto == 'Aceptado' 
        ){
            $profile->user_check_ok = 'Si';

            $to_name = $profile->user_nombre;
            $to_email = $profile->user_email;

            $data = array( 'name' => $profile->user_nombre, 'user_check_curp' => $profile->user_check_curp, 'user_check_id' => $profile->user_check_id, 'user_check_foto' => $profile->user_check_foto, 'details' => $request->details);


            Mail::send('emails.diagnostico', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Evaluación diagnóstica');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });

        }else{
            $profile->user_check_ok = 'No';

            $to_name = $profile->user_nombre;
            $to_email = $profile->user_email;

            $data = array( 'name' => $profile->user_nombre, 'user_check_curp' => $profile->user_check_curp, 'user_check_id' => $profile->user_check_id, 'user_check_foto' => $profile->user_check_foto, 'details' => $request->details);


            Mail::send('emails.docs', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Validación de documentos');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });

        }

        $profile->save();
        
        return redirect('documentos')->with('message', 'Enviado');
    }

    public function diagnostico(Request $request)
    {
        $id = $request->id_service;

        $rules = array(
            'diagnostico_status'=> 'required',
        );

        $messages = array(
            'diagnostico_status.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            $certification = Certification::findOrFail($id);
            $certification->diagnostico_status = 'Realizado';

            $profile = Profile::where('user_curp', $certification->curp)->first();

            $grupo = Group::where('group_name', $certification->grupo)->first();

            $to_name = $profile->user_nombre;
            $to_email = $profile->user_email;

            $data = array( 'name' => $profile->user_nombre, 'price' => $grupo->group_price, 'standard' => $certification->estandar);

            $certification->save();

            Mail::send('emails.infopay', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Información del proceso de pago');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });

            return redirect()->back()->with('message', 'Registro enviado');
        }
    }

}
