<?php

namespace App\Http\Controllers\Admin\Certification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

use DB;
use File;
use Validator;
use App\Models\Enroll;
use App\Models\Certification;
use App\Models\Profile;
use Illuminate\Support\Str;


class CertificationController extends Controller
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
        $certifications = Certification::where('fecha', '!=', '08-07-2021')->orderBy('updated_at', 'desc')->paginate(20);

      return view('certification.index', ['certifications' => $certifications]);

    }

    public function edit(Request $request, $curp)
    {

        $certification = Certification::where('estandar', 'EC1331')->where('curp', $curp)->first();

        return view('certification.edit', ['certification' => $certification]);

    }

    public function update(Request $request, $id)
    {
        $certification = Certification::find($id);
        $certification->estandar = $request->estandar;
        $certification->curp = $request->curp;
        $certification->estatus = $request->estatus;
        $certification->calificacion = $request->calificacion;
        $certification->fecha  = $request->fecha;
        $certification->save();

        $profile = Profile::where('user_curp', $certification->curp)->first();

        $to_name = $profile->user_nombre;
        $to_email = $profile->user_email;
        $url = url('documentos/constancia').'/'.$certification->curp.'/'.$certification->id;

        $data = array( 'name' => $profile->user_nombre, 'status' => $certification->estatus, 'url' => $url);

        if($certification->estatus == 'Competente'){
            Mail::send('emails.constancia', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Resultado de la evaluación');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });
        }

        if($certification->estatus == 'No competente'){
            Mail::send('emails.nocompetente', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Resultado de la evaluación');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });
        }
        
        return redirect('certificaciones')->with('message', 'Registro Actualizado');
    }



    public function findCertification(Request $request, $id)
    {
        $enroll = Enroll::find($id);

        return view('enroll.certification.edit', ['enroll' => $enroll]);
    }


    public function editCertification(Request $request, $id)
    {
        $enroll = Enroll::find($id);

        return view('enroll.certification.index', ['enroll' => $enroll]);

        //return redirect('agenda')->with('message', 'Registro Actualizado');

    }

    public function indexEnroll()
    {
        $enrolls = Enroll::orderBy('id', 'desc')->paginate(25);

        return view('enroll.certification.index', ['enrolls' => $enrolls]);

    }

    public function enrollFind(Request $request, $id)
    {
        $enroll = Enroll::findOrFail($id);

        return view('enroll.certification.edit', ['enroll' => $enroll]);
    }

    public function enrollUpdate(Request $request, $id)
    {
        $enroll = Enroll::findOrFail($id);

        $enroll->enrol_course_id = "EC1331";
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

        return view('enroll.certification.edit', ['enroll' => $enroll]);
    }

    public function certifylist(Request $request)
    {
        $certifications = Certification::where('estatus', 'Competente')
            ->where('documento', 'Pendiente')
            ->paginate(25);
        return view('certification.certifylist', ['certifications' => $certifications]);

    }

    

    public function uploadCertify(Request $request, $id)
    {
        $certification = Certification::findOrFail($id);
        return view('certification.upload', ['certification' => $certification]);

    }

    public function storeCertify(Request $request, $id)
    {

        $certification = Certification::findOrFail($id);

        if($request->hasFile("documento")){
                $file=$request->file("documento");
                $nombre = "certify_".$certification->curp.time().".".$file->guessExtension();
                $ruta = public_path("file/certify/".$nombre);
                copy($file, $ruta);
                $certification->documento = $nombre;
            }


        $certification->save();

        $profile = Profile::where('user_curp', $certification->curp)->first();

        $to_name = $profile->user_nombre;
        $to_email = $profile->user_email;
        //$url = url('public/file/certify').'/'.$certification->documento;
        $url = asset('storage/certify/'. $certification->documento);

        $data = array( 'name' => $profile->user_nombre, 'url' => $url);


        Mail::send('emails.certify', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Expedición de certificado');
            $message->from('icat@cdmx.gob.mx','Icat CDMX');
        });


        return redirect()->back()->with('message', 'Documento guardado');

    }


}
