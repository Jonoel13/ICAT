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
use App\Models\Profile;
use App\Models\Enroll;
use App\Models\Certification;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class EnrollController extends Controller
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

    public function formCertification()
    {
        return view('enroll.certification.form');
    }


    public function store(Request $request)
    {

        $rules = array(
            'enrol_user_nombre'=> 'required',
            'enrol_user_app'=> 'required',
            'enrol_user_apm'=> 'required',
            #'enrol_user_curp'=> 'required|unique:profiles,user_curp',
            'enrol_user_curp'=> 'required',
            'enrol_user_edad'=> 'required',
            'enrol_user_sexo'=> 'required',
            'enrol_user_calle'=> 'required',
            'enrol_user_colonia'=> 'required',
            'enrol_user_alcaldia'=> 'required',
            'enrol_user_estado'=> 'required',
            'enrol_user_cp'=> 'required',
            'enrol_user_telefono'=> 'required',
            #'enrol_user_email' => 'required|unique:users,email',
            'enrol_user_email' => 'required|unique:users,email',
            'enrol_user_academico'=> 'required',
            'enrol_user_productivo'=> 'required',
            'enrol_user_indigena'=> 'required',
            'enrol_user_lengua'=> 'required',
            'enrol_user_doc_curp'=> 'required|mimes:pdf',
            'enrol_user_doc_id'=> 'required|mimes:pdf',
            #'enrol_user_doc_foto'=> 'required|image|mimes:png,jpg,jpeg,bmp',
            'enrol_user_uso_dato'=> 'required',
        );

        $messages = array(
            'enrol_user_nombre.required' =>'Este campo es requerido',
            'enrol_user_app.required' =>'Este campo es requerido',
            'enrol_user_apm.required' =>'Este campo es requerido',
            'enrol_user_curp.required' =>'Este campo es requerido',
            'enrol_user_curp.unique' =>'Esta CURP ya se encuentra registrada',
            'enrol_user_edad.required' =>'Este campo es requerido',
            'enrol_user_sexo.required' =>'Este campo es requerido',
            'enrol_user_calle.required' =>'Este campo es requerido',
            'enrol_user_colonia.required' =>'Este campo es requerido',
            'enrol_user_alcaldia.required' =>'Este campo es requerido',
            'enrol_user_estado.required' =>'Este campo es requerido',
            'enrol_user_cp.required' =>'Este campo es requerido',
            'enrol_user_telefono.required' =>'Este campo es requerido',
            'enrol_user_email.required' =>'Este campo es requerido',
            'enrol_user_email.unique' =>'Esta dirección de correo ya se encuentra registrada',
            'enrol_user_academico.required' =>'Este campo es requerido',
            'enrol_user_productivo.required' =>'Este campo es requerido',
            'enrol_user_indigena.required' =>'Este campo es requerido',
            'enrol_user_lengua.required' =>'Este campo es requerido',
            'enrol_user_doc_curp.required' =>'Este campo es requerido',
            'enrol_user_doc_curp.mimes' =>'Debe ser un formato PDF',
            'enrol_user_doc_id.required' =>'Este campo es requerido',
            'enrol_user_doc_id.mimes' =>'Debe ser un formato PDF',
            #'enrol_user_doc_foto.required' =>'Este campo es requerido',
            #'enrol_user_doc_foto.mimes' =>'Debe ser un formato jpg, png o bmp',
            'enrol_user_uso_dato.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            $profile = new Profile;
            $profile->user_nombre = $request->enrol_user_nombre;
            $profile->user_app = $request->enrol_user_app;
            $profile->user_apm = $request->enrol_user_apm;
            $profile->user_curp = strtoupper($request->enrol_user_curp);
            $profile->user_edad = $request->enrol_user_edad;
            $profile->user_sexo = $request->enrol_user_sexo;
            $profile->user_calle = $request->enrol_user_calle;
            $profile->user_colonia = $request->enrol_user_colonia;
            $profile->user_alcaldia = $request->enrol_user_alcaldia;
            $profile->user_estado = $request->enrol_user_estado;
            $profile->user_cp = $request->enrol_user_cp;
            $profile->user_telefono = $request->enrol_user_telefono;
            $profile->user_email = $request->enrol_user_email;
            $profile->user_academico = $request->enrol_user_academico;
            $profile->user_productivo = $request->enrol_user_productivo;
            $profile->user_indigena = $request->enrol_user_indigena;
            $profile->user_lengua = $request->enrol_user_lengua;
            $profile->user_leng_indigena = $request->enrol_user_leng_indigena;
            $profile->user_doc_curp = $request->enrol_user_doc_curp;
            $profile->user_doc_id = $request->enrol_user_doc_id;
            $profile->user_doc_foto = $request->enrol_user_doc_foto;
            $profile->user_uso_dato = $request->enrol_user_uso_dato;
            $profile->user_check_curp = 'En revisión';
            $profile->user_check_id = 'En revisión';
            $profile->user_check_foto = 'Aceptado';
            $profile->user_check_ok = 'No';


            /*
            ---------------------------------------------------------------
                Subir documento de CURP
            ---------------------------------------------------------------
            */

            if($request->hasFile('enrol_user_doc_curp')){
                $name = "curp_".$request->enrol_user_curp.time().".".$request->file('enrol_user_doc_curp')->extension();
                $path = $request->enrol_user_doc_curp->storeAs('/public/curp', $name);
                $path2 ="/curp".'/'.$name;
                //Image::create(['path' => $path2]);
                $profile->user_doc_curp = $name;
                
            }else{
                $profile->user_doc_curp = 'N/A';
            }


            if($request->hasFile('enrol_user_doc_id')){
                $name = "id_".$request->enrol_user_curp.time().".".$request->file('enrol_user_doc_id')->extension();
                $path = $request->enrol_user_doc_id->storeAs('/public/id', $name);
                $path2 ="/id".'/'.$name;
                //Image::create(['path' => $path2]);
                $profile->user_doc_id = $name;
                
            }else{
                $profile->user_doc_id = 'N/A';
            }

            if($request->hasFile('enrol_user_doc_foto')){
                $name = "photo_".$request->enrol_user_curp.time().".".$request->file('enrol_user_doc_foto')->extension();
                $path = $request->enrol_user_doc_foto->storeAs('/public/photo', $name);
                $profile->user_doc_foto = $name;
                
            }else{
                $profile->user_doc_foto = 'N/A';
            }


            $enroll = new Enroll;
            $enroll->enrol_course_id = $request->enrol_course_id;
            $enroll->enrol_course_type = "Certificación";
            $enroll->enrol_user_curp = strtoupper($request->enrol_user_curp);
            $enroll->enrol_user_diagnostico = "Pendiente";
            $enroll->enrol_user_certificado = "Pendiente";

            $certification = new Certification;
            $certification->curp = strtoupper($request->enrol_user_curp);
            $certification->estandar = $request->enrol_course_id;
            $certification->sector = 'Transporte';
            $certification->estatus = "Candidato";
            $certification->calificacion = "0";
            $certification->fecha = date("d-m-Y");
            $certification->n_intento = '0';
            $certification->vigencia = 'N/A';
            $certification->documento = 'Pendiente';
            $certification->constancia = 'N/A';
            $certification->link_documentacion = 'N/A';
            $certification->pago = 'Pendiente';
            $certification->diagnostico_status = 'Pendiente';
            $certification->diagnostico = 'https://docs.google.com/forms/d/e/1FAIpQLSegHzFH_DmYFbrG8t4bebt0nrrK-24vhO7DwQRBX9AthIj0lw/viewform?usp=sf_link';


            $password = Str::random(12);

            $user = new User;
            $user->id_rol = 10;
            $user->name = strtoupper($request->enrol_user_curp);
            $user->email = $request->enrol_user_email;
            $user->password = bcrypt($password);

            $user->save();
            $certification->save();
            $enroll->save();
            $profile->save();
 
            $to_name = $request->enrol_user_nombre;
            $to_email = $request->enrol_user_email;

            $data = array( 'name' => $request->enrol_user_nombre, 'user' => $request->enrol_user_email, 'password' => $password);
            
            Mail::send('emails.password', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Datos de acceso');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });
          
            return redirect('login')->with('message', 'El usuario y contraseña para ingresar se te envió por correo electrónico');
        }

    }

    public function constancia(Request $request, $curp, $id)
    {
        
        $profile = Profile::where('user_curp', $curp)->first();

        
        $certification = Certification::find($id);

        $data = array( 'name' => $profile->user_nombre, 'app' => $profile->user_app, 'apm' => $profile->user_apm, 'curp' => $curp, 'certify' => $id, 'date' => $certification->fecha);

        if($certification->estatus == 'Competente'){
            return view('enroll.certification.constancia', ['data' => $data]);
        }else{
            return 'Usted no ha concluido su proceso de certificación con el estatus de Competente';

        }

    }

    public function searchUser()
    {
        return view('enroll.certification.search');
    }

    public function crupEnroll(Request $request)
    {

        $profile = Profile::where('user_curp', $request->enrol_user_curp)->first();

        return view('enroll.certification.enrollByCurp', ['profile' => $profile]);
    }

    public function emailEnroll(Request $request)
    {
        $profile = Profile::where('user_email', $request->enrol_user_email)->first();
        $standards = Standard::orderBy('name', 'desc')->get();

        return view('enroll.certification.enrollByCurp', ['profile' => $profile, 'standards' => $standards]);
    }

    public function enroll(Request $request)
    {

        $rules = array(
            'enrol_user_nombre'=> 'required',
            'enrol_user_app'=> 'required',
            'enrol_user_apm'=> 'required',
            #'enrol_user_curp'=> 'required|unique:profiles,user_curp',
            'enrol_user_curp'=> 'required',
            'enrol_user_edad'=> 'required',
            'enrol_user_sexo'=> 'required',
            'enrol_user_calle'=> 'required',
            'enrol_user_colonia'=> 'required',
            'enrol_user_alcaldia'=> 'required',
            'enrol_user_estado'=> 'required',
            'enrol_user_cp'=> 'required',
            'enrol_user_telefono'=> 'required',
            #'enrol_user_email' => 'required|unique:users,email',
            'enrol_user_email' => 'required',
            'enrol_user_academico'=> 'required',
            'enrol_user_productivo'=> 'required',
            'enrol_user_indigena'=> 'required',
            'enrol_user_lengua'=> 'required',
            #'enrol_user_doc_curp'=> 'required|mimes:pdf',
            #'enrol_user_doc_id'=> 'required|mimes:pdf',
            #'enrol_user_doc_foto'=> 'required|image|mimes:png,jpg,jpeg,bmp',
            'enrol_user_uso_dato'=> 'required',
        );

        $messages = array(
            'enrol_user_nombre.required' =>'Este campo es requerido',
            'enrol_user_app.required' =>'Este campo es requerido',
            'enrol_user_apm.required' =>'Este campo es requerido',
            'enrol_user_curp.required' =>'Este campo es requerido',
            'enrol_user_curp.unique' =>'Esta CURP ya se encuentra registrada',
            'enrol_user_edad.required' =>'Este campo es requerido',
            'enrol_user_sexo.required' =>'Este campo es requerido',
            'enrol_user_calle.required' =>'Este campo es requerido',
            'enrol_user_colonia.required' =>'Este campo es requerido',
            'enrol_user_alcaldia.required' =>'Este campo es requerido',
            'enrol_user_estado.required' =>'Este campo es requerido',
            'enrol_user_cp.required' =>'Este campo es requerido',
            'enrol_user_telefono.required' =>'Este campo es requerido',
            'enrol_user_email.required' =>'Este campo es requerido',
            #'enrol_user_email.unique' =>'Esta dirección de correo ya se encuentra registrada',
            'enrol_user_academico.required' =>'Este campo es requerido',
            'enrol_user_productivo.required' =>'Este campo es requerido',
            'enrol_user_indigena.required' =>'Este campo es requerido',
            'enrol_user_lengua.required' =>'Este campo es requerido',
            'enrol_user_doc_curp.required' =>'Este campo es requerido',
            'enrol_user_doc_curp.mimes' =>'Debe ser un formato PDF',
            'enrol_user_doc_id.required' =>'Este campo es requerido',
            'enrol_user_doc_id.mimes' =>'Debe ser un formato PDF',
            #'enrol_user_doc_foto.required' =>'Este campo es requerido',
            #'enrol_user_doc_foto.mimes' =>'Debe ser un formato jpg, png o bmp',
            'enrol_user_uso_dato.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            if(User::where('email', '=', $request->enrol_user_email)->exists()):
                /*
                ---------------------------------------------------------------
                    Registro existente
                ---------------------------------------------------------------
                */

                return redirect('registro/buscar/usuario')->with('message', 'Esta dirección de correo ya se encuentra registrada: '. $request->enrol_user_email);

            else:

                /*
                ---------------------------------------------------------------
                    Nuevo registro
                ---------------------------------------------------------------
                */

                $profile = new Profile;
                $profile->user_nombre = $request->enrol_user_nombre;
                $profile->user_app = $request->enrol_user_app;
                $profile->user_apm = $request->enrol_user_apm;
                $profile->user_curp = strtoupper($request->enrol_user_curp);
                $profile->user_edad = $request->enrol_user_edad;
                $profile->user_sexo = $request->enrol_user_sexo;
                $profile->user_calle = $request->enrol_user_calle;
                $profile->user_colonia = $request->enrol_user_colonia;
                $profile->user_alcaldia = $request->enrol_user_alcaldia;
                $profile->user_estado = $request->enrol_user_estado;
                $profile->user_cp = $request->enrol_user_cp;
                $profile->user_telefono = $request->enrol_user_telefono;
                $profile->user_email = $request->enrol_user_email;
                $profile->user_academico = $request->enrol_user_academico;
                $profile->user_productivo = $request->enrol_user_productivo;
                $profile->user_indigena = $request->enrol_user_indigena;
                $profile->user_lengua = $request->enrol_user_lengua;
                $profile->user_leng_indigena = $request->enrol_user_leng_indigena;
                $profile->user_doc_curp = $request->enrol_user_doc_curp;
                $profile->user_doc_id = $request->enrol_user_doc_id;
                $profile->user_doc_foto = $request->enrol_user_doc_foto;
                $profile->user_uso_dato = $request->enrol_user_uso_dato;
                $profile->user_check_curp = 'En revisión';
                $profile->user_check_id = 'En revisión';
                $profile->user_check_foto = 'Aceptado';
                $profile->user_check_ok = 'No';


                /*
                ---------------------------------------------------------------
                    Subir documento de CURP
                ---------------------------------------------------------------
                */

                if($request->hasFile('enrol_user_doc_curp')){
                    $name = "curp_".$request->enrol_user_curp.time().".".$request->file('enrol_user_doc_curp')->extension();
                    $path = $request->enrol_user_doc_curp->storeAs('/public/curp', $name);
                    $path2 ="/curp".'/'.$name;
                    //Image::create(['path' => $path2]);
                    $profile->user_doc_curp = $name;

                }else{
                    $profile->user_doc_curp = 'N/A';
                }


                if($request->hasFile('enrol_user_doc_id')){
                    $name = "id_".$request->enrol_user_curp.time().".".$request->file('enrol_user_doc_id')->extension();
                    $path = $request->enrol_user_doc_id->storeAs('/public/id', $name);
                    $path2 ="/id".'/'.$name;
                    //Image::create(['path' => $path2]);
                    $profile->user_doc_id = $name;

                }else{
                    $profile->user_doc_id = 'N/A';
                }

                if($request->hasFile('enrol_user_doc_foto')){
                    $name = "photo_".$request->enrol_user_curp.time().".".$request->file('enrol_user_doc_foto')->extension();
                    $path = $request->enrol_user_doc_foto->storeAs('/public/photo', $name);
                    $profile->user_doc_foto = $name;

                }else{
                    $profile->user_doc_foto = 'N/A';
                }


                $enroll = new Enroll;
                $enroll->enrol_course_id = $request->enrol_course_id;
                $enroll->enrol_course_type = "Certificación";
                $enroll->enrol_user_curp = strtoupper($request->enrol_user_curp);
                $enroll->enrol_user_diagnostico = "Pendiente";
                $enroll->enrol_user_certificado = "Pendiente";

                $certification = new Certification;
                $certification->curp = strtoupper($request->enrol_user_curp);
                $certification->estandar = $request->enrol_course_id;
                $certification->sector = 'Transporte';
                $certification->estatus = "Candidato";
                $certification->calificacion = "0";
                $certification->fecha = date("d-m-Y");
                $certification->n_intento = '0';
                $certification->vigencia = 'N/A';
                $certification->documento = 'Pendiente';
                $certification->constancia = 'N/A';
                $certification->link_documentacion = 'N/A';
                $certification->pago = 'Pendiente';
                $certification->diagnostico_status = 'Pendiente';
                $certification->diagnostico = 'https://docs.google.com/forms/d/e/1FAIpQLSegHzFH_DmYFbrG8t4bebt0nrrK-24vhO7DwQRBX9AthIj0lw/viewform?usp=sf_link';


                $password = Str::random(12);

                $user = new User;
                $user->id_rol = 10;
                $user->name = strtoupper($request->enrol_user_curp);
                $user->email = $request->enrol_user_email;
                $user->password = bcrypt($password);

                $user->save();
                $certification->save();
                $enroll->save();
                $profile->save();

                $to_name = $request->enrol_user_nombre;
                $to_email = $request->enrol_user_email;

                $data = array( 'name' => $request->enrol_user_nombre, 'user' => $request->enrol_user_email, 'password' => $password);

                Mail::send('emails.password', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                    ->subject('Datos de acceso');
                    $message->from('icat@cdmx.gob.mx','Icat CDMX');
                });

                return redirect('login')->with('message', 'El usuario y contraseña para ingresar se te envió por correo electrónico');

            endif;


        }

    }


}
