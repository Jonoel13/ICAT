<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

use DB;
use File;
use Validator;
use App\Models\Standard;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\InstructorStandard;
use Illuminate\Support\Str;


class InstructorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
    )
    {
         //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $instructors = Instructor::orderBy('updated_at', 'desc')->paginate(20);
        return view('admin.users.instructor.index', ['instructors' => $instructors]);
    }

    public function form(Request $request)
    {
        $standards = Standard::orderBy('updated_at', 'desc')->get();

        return view('admin.users.instructor.form', ['standards' => $standards] );
    }

    public function store(Request $request)
    {


        $rules = array(

            'instructor_name' => 'required',
            'instructor_app' => 'required',
            'instructor_apm' => 'required',
            'instructor_age' => 'required',
            'instructor_phone' => 'required',
            'instructor_email' => 'required',
            'instructor_curp' => 'required',
            'instructor_rfc' => 'required',
            'instructor_direc_factura' => 'required',

            /*
            'instructor_cv' => 'required',
            'instructor_consultoria' => 'required',
            'instructor_estudios' => 'required',
            'instructor_estudios_doc' => 'required',
            'instructor_sector' => 'required',
            'instructor_courses' => 'required',
            'instructor_certifications' => 'required',
            'instructor_summary' => 'required',
            'instructor_operation_year' => 'required',

            */
        );

        $messages = array(
            'instructor_name.required' =>'Este campo es requerido',
            'instructor_app.required' =>'Este campo es requerido',
            'instructor_apm.required' =>'Este campo es requerido',
            'instructor_age.required' =>'Este campo es requerido',
            'instructor_phone.required' =>'Este campo es requerido',
            'instructor_email.required' =>'Este campo es requerido',
            'instructor_curp.required' =>'Este campo es requerido',
            'instructor_rfc.required' =>'Este campo es requerido',
            'instructor_direc_factura.required' =>'Este campo es requerido',

            /*
            'instructor_cv.required' =>'Este campo es requerido',
            'instructor_consultoria.required' =>'Este campo es requerido',
            'instructor_estudios.required' =>'Este campo es requerido',
            'instructor_estudios_doc.required' =>'Este campo es requerido',
            'instructor_sector.required' =>'Este campo es requerido',
            'instructor_courses.required' =>'Este campo es requerido',
            'instructor_certifications.required' =>'Este campo es requerido',
            'instructor_summary.required' =>'Este campo es requerido',
            'instructor_operation_year.required' =>'Este campo es requerido',

            */
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {


            $instructor = new Instructor;
            $instructor->instructor_name = $request->instructor_name;
            $instructor->instructor_app = $request->instructor_app;
            $instructor->instructor_apm = $request->instructor_apm;
            $instructor->instructor_age = $request->instructor_age;
            $instructor->instructor_phone = $request->instructor_phone;
            $instructor->instructor_email = $request->instructor_email;
            $instructor->instructor_curp = $request->instructor_curp;
            $instructor->instructor_rfc = $request->instructor_rfc;
            $instructor->instructor_direc_factura = $request->instructor_direc_factura;
            $instructor->instructor_cv = $request->instructor_cv;
            $instructor->instructor_consultoria = $request->instructor_consultoria;
            $instructor->instructor_estudios = $request->instructor_estudios;
            $instructor->instructor_estudios_doc = $request->instructor_estudios_doc;
            $instructor->instructor_sector = $request->instructor_sector;
            $instructor->instructor_courses = $request->instructor_courses;
            $instructor->instructor_certifications = $request->instructor_certifications;
            $instructor->instructor_summary = $request->instructor_summary;
            $instructor->instructor_operation_year = $request->instructor_operation_year;


            $instructorSts = $request->instructor_courses;

            $standards = Standard::orderBy('updated_at', 'desc')->get();




/*

            for($i = 0; $i < count($instructorSts); ++$i) {

                $instructorStandard = new InstructorStandard;
                $instructorStandard->id_standard = $instructorSts[$i];
                $instructorStandard->id_instructor = $request->instructor_rfc;
                $instructorStandard->save();
            }

            print_r($instructorSts);
*/
            $instructor->save();

            return redirect('admin/instructor/lista')->with('message', 'Registro exitoso');
        }


    }

    public function edit(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);
        $standards = Standard::orderBy('updated_at', 'desc')->get();

        return view('admin.users.instructor.edit', ['instructor' => $instructor, 'standards' => $standards]);
    }

    public function update(Request $request, $id)
    {

        $instructor = Instructor::find($id);
        $instructor->instructor_name = $request->instructor_name;
        $instructor->instructor_app = $request->instructor_app;
        $instructor->instructor_apm = $request->instructor_apm;
        $instructor->instructor_age = $request->instructor_age;
        $instructor->instructor_phone = $request->instructor_phone;
        $instructor->instructor_email = $request->instructor_email;
        $instructor->instructor_curp = $request->instructor_curp;
        $instructor->instructor_rfc = $request->instructor_rfc;
        $instructor->instructor_direc_factura = $request->instructor_direc_factura;
        $instructor->instructor_cv = $request->instructor_cv;
        $instructor->instructor_consultoria = $request->instructor_consultoria;
        $instructor->instructor_estudios = $request->instructor_estudios;
        $instructor->instructor_estudios_doc = $request->instructor_estudios_doc;
        $instructor->instructor_sector = $request->instructor_sector;
        $instructor->instructor_courses = $request->instructor_courses;
        $instructor->instructor_certifications = $request->instructor_certifications;
        $instructor->instructor_summary = $request->instructor_summary;
        $instructor->instructor_operation_year = $request->instructor_operation_year;
        $instructor->save();


        return redirect('admin/instructor/lista')->with('message', 'Registro actualizado');

    }

    public function delete(Request $request, $id)
    {
        $standard = Quote::find($id);
        $standard->delete();
    }

    public function registro(Request $request)
    {
        $standards = Standard::orderBy('name', 'desc')->get();

        return view('enroll.certification.formalt', ['standards' => $standards]);
    }


}
