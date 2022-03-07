<?php

namespace App\Http\Controllers\Admin\Capacitation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

use DB;
use File;
use Validator;
use App\Standard;
use App\Instructor;
use App\Group;
use Illuminate\Support\Str;


class GroupsController extends Controller
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
        $groups = Group::orderBy('updated_at', 'desc')->paginate(20);

      return view('capacitation.groups.index', ['groups' => $groups]);

    }

    public function form(Request $request)
    {
        $standards = Standard::orderBy('updated_at', 'desc')->get();

        $instructors = Instructor::orderBy('updated_at', 'desc')->get();

        return view('capacitation.groups.form', ['standards' => $standards, 'instructors' => $instructors]);
    }

    public function store(Request $request)
    {


        $rules = array(
            'id_standard' => 'required',
            'id_convenio' => 'required',
            'id_place' => 'required',
            'id_instructor' => 'required',
            'group_name' => 'required',
            'group_shortname' => 'required',
            'group_level' => 'required',
            'group_mode' => 'required',
            'group_hours' => 'required',
            'group_date_init' => 'required',
            'group_date_end' => 'required',
            'group_min_grade' => 'required',
            'group_min_asistencia' => 'required',
            'group_capacity' => 'required',
            'group_documentation' => 'required',
            'group_private' => 'required',

        );

        $messages = array(
            'id_standard.required' =>'Este campo es requerido',
            'id_convenio.required' =>'Este campo es requerido',
            'id_place.required' =>'Este campo es requerido',
            'id_instructor.required' =>'Este campo es requerido',
            'group_name.required' =>'Este campo es requerido',
            'group_shortname.required' =>'Este campo es requerido',
            'group_level.required' =>'Este campo es requerido',
            'group_mode.required' =>'Este campo es requerido',
            'group_hours.required' =>'Este campo es requerido',
            'group_date_init.required' =>'Este campo es requerido',
            'group_date_end.required' =>'Este campo es requerido',
            'group_min_grade.required' =>'Este campo es requerido',
            'group_min_asistencia.required' =>'Este campo es requerido',
            'group_capacity.required' =>'Este campo es requerido',
            'group_documentation.required' =>'Este campo es requerido',
            'group_private.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {




            $group = new Group;

            $group->id_standard = $request->id_standard;
            $group->id_convenio = $request->id_convenio;
            $group->id_place = $request->id_place;
            $group->id_instructor = $request->id_instructor;
            $group->group_name = $request->group_name;
            $group->group_shortname = $request->group_shortname;
            $group->group_mode = $request->group_mode;
            $group->group_level = $request->group_level;
            $group->group_hours = $request->group_hours;
            $group->group_date_init = $request->group_date_init;
            $group->group_date_end = $request->group_date_end;
            $group->group_min_grade = $request->group_min_grade;
            $group->group_min_asistencia = $request->group_min_asistencia;
            $group->group_capacity = $request->group_capacity;
            $group->group_documentation = $request->group_documentation;
            $group->id_alliance = 'N/A';
            $group->group_link = 'N/A';
            $group->id_list_activities = 'N/A';
            $group->group_private = $request->group_private;
            $group->group_status = 'Abierto';
            $group->save();

            return redirect('admin/groups/lista')->with('message', 'Registro exitoso');
        }


    }

    public function edit(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $standards = Standard::orderBy('updated_at', 'desc')->get();
        $instructors = Instructor::orderBy('updated_at', 'desc')->get();

        return view('capacitation.groups.edit', ['group' => $group, 'standards' => $standards, 'instructors' => $instructors]);
    }

    public function update(Request $request, $id)
    {

        $group = Group::find($id);
        $group->id_standard = $request->id_standard;
        $group->id_convenio = $request->id_convenio;
        $group->id_place = $request->id_place;
        $group->id_instructor = $request->id_instructor;
        $group->group_name = $request->group_name;
        $group->group_shortname = $request->group_shortname;
        $group->group_mode = $request->group_mode;
        $group->group_level = $request->group_level;
        $group->group_hours = $request->group_hours;
        $group->group_date_init = $request->group_date_init;
        $group->group_date_end = $request->group_date_end;
        $group->group_min_grade = $request->group_min_grade;
        $group->group_min_asistencia = $request->group_min_asistencia;
        $group->group_capacity = $request->group_capacity;
        $group->group_documentation = $request->group_documentation;
        $group->id_alliance = 'N/A';
        $group->group_link = 'N/A';
        $group->id_list_activities = 'N/A';
        $group->save();


        return redirect('admin/groups/lista')->with('message', 'Registro actualizado');

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
