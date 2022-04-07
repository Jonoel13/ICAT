<?php

namespace App\Http\Controllers\Admin\Enroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;

use DB;
use File;
use Validator;
use App\Models\Enroll;
use App\Models\Certification;
use Illuminate\Support\Str;


class EnrollCertificationController extends Controller
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

    public function formCertification()
    {
        return view('enroll.certification.form');
    }


    public function enroll(Request $request)
    {

        $rules = array(
            'enrol_user_nombre'=> 'required',
            'enrol_user_app'=> 'required',
            'enrol_user_apm'=> 'required',
            'enrol_user_curp'=> 'required',
            'enrol_user_edad'=> 'required',
            'enrol_user_sexo'=> 'required',
            'enrol_user_calle'=> 'required',
            'enrol_user_colonia'=> 'required',
            'enrol_user_alcaldia'=> 'required',
            'enrol_user_estado'=> 'required',
            'enrol_user_cp'=> 'required',
            'enrol_user_telefono'=> 'required',
            'enrol_user_email'=> 'required',
            #'enrol_user_email'=> 'required|unique:users,email',
            'enrol_user_academico'=> 'required',
            'enrol_user_productivo'=> 'required',
            'enrol_user_indigena'=> 'required',
            'enrol_user_lengua'=> 'required',
            'enrol_user_doc_curp'=> 'required',
            'enrol_user_doc_id'=> 'required',
            #'enrol_user_doc_foto'=> 'required',
            'enrol_user_uso_dato'=> 'required',
        );

        $messages = array(
            'enrol_user_nombre..required' =>'Este campo es requerido',
            'enrol_user_app.required' =>'Este campo es requerido',
            'enrol_user_apm.required' =>'Este campo es requerido',
            'enrol_user_curp.required' =>'Este campo es requerido',
            'enrol_user_edad.required' =>'Este campo es requerido',
            'enrol_user_sexo.required' =>'Este campo es requerido',
            'enrol_user_calle.required' =>'Este campo es requerido',
            'enrol_user_colonia.required' =>'Este campo es requerido',
            'enrol_user_alcaldia.required' =>'Este campo es requerido',
            'enrol_user_estado.required' =>'Este campo es requerido',
            'enrol_user_cp.required' =>'Este campo es requerido',
            'enrol_user_telefono.required' =>'Este campo es requerido',
            'enrol_user_email.required' =>'Este campo es requerido',
            'enrol_user_academico.required' =>'Este campo es requerido',
            'enrol_user_productivo.required' =>'Este campo es requerido',
            'enrol_user_indigena.required' =>'Este campo es requerido',
            'enrol_user_lengua.required' =>'Este campo es requerido',
            'enrol_user_doc_curp.required' =>'Este campo es requerido',
            'enrol_user_doc_id.required' =>'Este campo es requerido',
            #'enrol_user_doc_foto.required' =>'Este campo es requerido',
            'enrol_user_uso_dato.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

                $enroll = new Enroll;
                $enroll->enrol_course_id = "PRUEBA-EC1331";
                $enroll->enrol_course_type = "Certificación";
                $enroll->enrol_user_nombre = $request->enrol_user_nombre;
                $enroll->enrol_user_app = $request->enrol_user_app;
                $enroll->enrol_user_apm = $request->enrol_user_apm;
                $enroll->enrol_user_curp = $request->enrol_user_curp;
                $enroll->enrol_user_edad = $request->enrol_user_edad;
                $enroll->enrol_user_sexo = $request->enrol_user_sexo;
                $enroll->enrol_user_calle = $request->enrol_user_calle;
                $enroll->enrol_user_colonia = $request->enrol_user_colonia;
                $enroll->enrol_user_alcaldia = $request->enrol_user_alcaldia;
                $enroll->enrol_user_estado = $request->enrol_user_estado;
                $enroll->enrol_user_cp = $request->enrol_user_cp;
                $enroll->enrol_user_telefono = $request->enrol_user_telefono;
                $enroll->enrol_user_email = $request->enrol_user_email;
                $enroll->enrol_user_academico = $request->enrol_user_academico;
                $enroll->enrol_user_productivo = $request->enrol_user_productivo;
                $enroll->enrol_user_indigena = $request->enrol_user_indigena;
                $enroll->enrol_user_lengua = $request->enrol_user_lengua;
                $enroll->enrol_user_leng_indigena = $request->enrol_user_leng_indigena;
                $enroll->enrol_user_doc_curp = $request->enrol_user_doc_curp;
                $enroll->enrol_user_doc_id = $request->enrol_user_doc_id;
                $enroll->enrol_user_doc_foto = $request->enrol_user_doc_foto;
                $enroll->enrol_user_uso_dato = $request->enrol_user_uso_dato;
                $enroll->enrol_user_diagnostico = "Pendiente";
                $enroll->enrol_user_certificado = "Pendiente";

                $certification = new Certification;
                $certification->curp = $request->enrol_user_curp;
                $certification->estandar = "PRUEBA-EC1331";
                $certification->estatus = "Competente";
                $certification->calificacion = "0";
                $certification->fecha = date("d-m-Y");
                $certification->save();

                // print_r($request->all());
                //    die();

                $enroll->save();

                return redirect('registro/guardar')->with('message', 'Registro Exitoso');


        }

    }


}
