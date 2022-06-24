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
use App\Models\Standard;
use App\Models\Group;
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
            'enrol_user_curp'=> 'required|unique:profiles,user_curp',
            'enrol_user_edad'=> 'required',
            'enrol_user_sexo'=> 'required',
            'enrol_user_calle'=> 'required',
            'enrol_user_colonia'=> 'required',
            'enrol_user_alcaldia'=> 'required',
            'enrol_user_estado'=> 'required',
            'enrol_user_cp'=> 'required',
            'enrol_user_telefono'=> 'required',
            'enrol_user_email' => 'required|unique:users,email',
            'enrol_user_academico'=> 'required',
            'enrol_user_productivo'=> 'required',
            'enrol_user_indigena'=> 'required',
            'enrol_user_lengua'=> 'required',
            'enrol_user_leng_indigena' => 'required',
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
            'enrol_user_leng_indigena.required' => 'Este campo es requerido',
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
            /*
            ---------------------------------------------------------------
                Subir documento de Identificación oficial
            ---------------------------------------------------------------
            */


            if($request->hasFile('enrol_user_doc_id')){
                $name = "id_".$request->enrol_user_curp.time().".".$request->file('enrol_user_doc_id')->extension();
                $path = $request->enrol_user_doc_id->storeAs('/public/id', $name);
                $path2 ="/id".'/'.$name;
                //Image::create(['path' => $path2]);
                $profile->user_doc_id = $name;
                
            }else{
                $profile->user_doc_id = 'N/A';
            }

            /*
            ---------------------------------------------------------------
                Subir documento de Fotografía
            ---------------------------------------------------------------
            */

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
            $certification->grupo = $request->enrol_group_id;
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

            $profile->save();
            $user->save();
            $certification->save();
            $enroll->save();

 
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

        $group = Group::where('group_name', $certification->grupo)->first();

        $data = array( 'name' => $profile->user_nombre, 'app' => $profile->user_app, 'apm' => $profile->user_apm, 'curp' => $curp, 'certify' => $id, 'date' => $certification->fecha, 'course' => $group->group_shortname);

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

        $rules = array(
            'enrol_user_curp'=> 'required',

        );

        $messages = array(
            'enrol_user_curp.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            $profile = Profile::where('user_curp', $request->enrol_user_curp)->first();
            $standards = Standard::orderBy('name', 'desc')->get();

            return view('enroll.certification.enrollByCurp', ['profile' => $profile, 'standards' => $standards]);
        }
    }



    public function emailEnroll(Request $request)
    {
        $rules = array(
            'enrol_user_email'=> 'required',

        );

        $messages = array(
            'enrol_user_email.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {
            $profile = Profile::where('user_email', $request->enrol_user_email)->first();
            $standards = Standard::orderBy('name', 'desc')->get();

            return view('enroll.certification.enrollByCurp', ['profile' => $profile, 'standards' => $standards]);

        }
    }

    public function standardEnroll(Request $request, $name)
    {

        #$profile = Profile::where('user_curp', $request->enrol_user_curp)->first();
        $standard = Standard::where('name', $name)->first();

        return view('enroll.certification.formDynamic', ['standard' => $standard]);
    }


    public function groupEnroll(Request $request, $name, $id)
    {

        $standard = Standard::where('name', $name)->first();
        $group = Group::where('group_name', $id)->first();

        if($group && $standard):

            return view('enroll.certification.formGroup', ['standard' => $standard, 'group' => $group]);
        else:
            return view('errors.errorFormUrlName');
        endif;
    }

    public function fastEnroll(Request $request)
    {


        $rules = array(
            'enrol_user_curp'=> 'required',
            'enrol_user_email' => 'required',
        );

        $messages = array(
            'enrol_user_curp.required' =>'Este campo es requerido',
            'enrol_user_email.required' =>'Este campo es requerido',

        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            $standard = Standard::where('name', $request->enrol_course_name)->first();

            $data = Certification::where('curp', strtoupper($request->enrol_user_curp))
                ->where('estandar', $request->enrol_course_name)
                ->where('estatus', 'Candidato')
                ->exists();

            if($data):

                return redirect('/login')->with('message', 'Actualmente tienes un proceso en curso en la certificación de este estándar');
            else:

            $enroll = new Enroll;
            $enroll->enrol_course_id = $standard->name;
            $enroll->enrol_course_type = "Certificación";
            $enroll->enrol_user_curp = strtoupper($request->enrol_user_curp);
            $enroll->enrol_user_diagnostico = "Pendiente";
            $enroll->enrol_user_certificado = "Pendiente";
            $enroll->enrol_group = "000001";

            $certification = new Certification;
            $certification->curp = strtoupper($request->enrol_user_curp);
            $certification->grupo = '000001';
            $certification->estandar = $standard->name;
            $certification->sector = $standard->sector;
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
            $certification->diagnostico = $standard->diagnostico;




            $certification->save();
            $enroll->save();

            $curp = strtoupper($request->enrol_user_curp);

            $profile = Profile::where('user_curp', $curp)->first();


            $to_name = $profile->user_nombre;
            $to_email = $profile->user_email;

            $data = array( 'name' => $profile->user_nombre);


            Mail::send('emails.diagnostico', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Evaluación diagnóstica');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });



                return redirect('login')->with('message', 'Registro exitoso');
            endif;

        }
    }

    public function enroll(Request $request)
    {

        $rules = array(
            'enrol_course_id'=> 'required',
            'enrol_group_id'=> 'required',
            'enrol_user_nombre'=> 'required',
            'enrol_user_app'=> 'required',
            'enrol_user_apm'=> 'required',
            'enrol_user_curp'=> 'required|unique:profiles,user_curp',
            'enrol_user_curp'=> 'required',
            'enrol_user_edad'=> 'required',
            'enrol_user_sexo'=> 'required',
            'enrol_user_calle'=> 'required',
            'enrol_user_colonia'=> 'required',
            'enrol_user_alcaldia'=> 'required',
            'enrol_user_estado'=> 'required',
            'enrol_user_cp'=> 'required',
            'enrol_user_telefono'=> 'required',
            'enrol_user_email' => 'required|unique:users,email',
            'enrol_user_email' => 'required',
            'enrol_user_academico'=> 'required',
            'enrol_user_productivo'=> 'required',
            'enrol_user_indigena'=> 'required',
            'enrol_user_lengua'=> 'required',
            'enrol_user_leng_indigena' => 'required',
            'enrol_user_doc_curp'=> 'required|mimes:pdf',
            'enrol_user_doc_id'=> 'required|mimes:pdf',
            #'enrol_user_doc_foto'=> 'required|image|mimes:png,jpg,jpeg,bmp',
            'enrol_user_uso_dato'=> 'required',
        );

        $messages = array(
            'enrol_course_id.required' =>'Este campo es requerido',
            'enrol_group_id.required' =>'Este campo es requerido',
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
            'enrol_user_telefono.required' =>'Este campo es requerido',
            'enrol_user_email.required' =>'Este campo es requerido',
            'enrol_user_email.unique' =>'Esta dirección de correo ya se encuentra registrada',
            'enrol_user_academico.required' =>'Este campo es requerido',
            'enrol_user_productivo.required' =>'Este campo es requerido',
            'enrol_user_indigena.required' =>'Este campo es requerido',
            'enrol_user_lengua.required' =>'Este campo es requerido',
            'enrol_user_leng_indigena.required' => 'Este campo es requerido',
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

            if(User::where('name', '=', $request->enrol_user_curp)->exists()):
                /*
                ---------------------------------------------------------------
                    Registro existente
                ---------------------------------------------------------------
                */

                return redirect('registro/buscar/usuario')->with('message', 'La siguiente CURP ya se encuentra registrada: ' . $request->enrol_user_curp);


            elseif(User::where('email', '=', $request->enrol_user_email)->exists()):

                return redirect('registro/buscar/usuario')->with('message', 'Esta dirección de correo ya se encuentra registrada: '. $request->enrol_user_email);

            else:

                /*
                ---------------------------------------------------------------
                    Nuevo registro
                ---------------------------------------------------------------
                */

                $profile = new Profile;
                $profile->user_nombre = $request->enrol_user_nombre;
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

                $standard = Standard::where('name', $request->enrol_course_id)->first();
                $group = Group::where('group_name', $request->enrol_group_id)->first();

                if($standard->name == 'EC1331'):
                    $request->enrol_group_id = 'EC1331-0001';
                endif;



                $enroll = new Enroll;
                $enroll->enrol_course_id = $request->enrol_course_id;
                $enroll->enrol_group = $request->enrol_group_id;
                $enroll->enrol_course_type = "Certificación";
                $enroll->enrol_user_curp = strtoupper($request->enrol_user_curp);
                $enroll->enrol_user_diagnostico = "Pendiente";
                $enroll->enrol_user_certificado = "Pendiente";



                $certification = new Certification;
                $certification->grupo = $request->enrol_group_id;
                $certification->curp = strtoupper($request->enrol_user_curp);
                $certification->estandar = $request->enrol_course_id;
                $certification->sector = $standard->sector;
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
                $certification->diagnostico = $standard->diagnostico;


                $password = Str::random(12);

                $user = new User;
                $user->id_rol = 10;
                $user->name = strtoupper($request->enrol_user_curp);
                $user->email = $request->enrol_user_email;
                $user->password = bcrypt($password);

                $certification->save();
                $enroll->save();
                $user->save();
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
