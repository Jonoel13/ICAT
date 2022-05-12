<?php

namespace App\Http\Controllers\Admin\Standard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use DB;
use File;
use Validator;
use App\Models\Standard;
use App\Models\Allience;
use App\Models\Certification;
use Illuminate\Support\Str;


class StandardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
    )
    {
        # $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $standards = Standard::orderBy('updated_at', 'desc')->paginate(20);

      return view('standard.index', ['standards' => $standards]);

    }

    public function form(Request $request)
    {

        return view('standard.form');
    } 

    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required',
            'shortname' => 'required',
            'sector' => 'required',
            'description' => 'required',
            'diagnostico' => 'required',
            'image' => 'required',
            'type' => 'required',
            'cert_place' => 'required',
            'cert_material' => 'required',
            'cert_grade' => 'required',
            'documentation' => 'required',
            'link' => 'required',
        );

        $messages = array(
            'name.required' =>'Este campo es requerido',
            'shortname.required' =>'Este campo es requerido',
            'sector.required' =>'Este campo es requerido',
            'description.required' =>'Este campo es requerido',
            'diagnostico.required' =>'Este campo es requerido',
            'image.required' =>'Este campo es requerido',
            'type.required' =>'Este campo es requerido',
            'cert_place.required' =>'Este campo es requerido',
            'cert_material.required' =>'Este campo es requerido',
            'cert_grade.required' =>'Este campo es requerido',
            'documentation.required' =>'Este campo es requerido',
            'link.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            $standard = new Standard;

            $standard->name = $request->name;
            $standard->shortname = $request->shortname;
            $standard->sector = $request->sector;
            $standard->description = $request->description;
            $standard->diagnostico = $request->diagnostico;
            $standard->image = $request->image;
            $standard->type = $request->type;
            $standard->cert_place = $request->cert_place;
            $standard->cert_material = $request->cert_material;
            $standard->cert_grade = $request->cert_grade;
            $standard->documentation = $request->documentation;
            $standard->link = $request->link;


            if($request->hasFile('image')){
                $name = "standard_".$request->shortname.time().".".$request->file('image')->extension();
                $path = $request->image->storeAs('/public/standard', $name);
                $standard->image = $name;

            }else{
                $standard->image = 'N/A';
            }


            $standard->save();

            return redirect('admin/estandar/lista')->with('message', 'Registro exitoso');
        }

    }

    public function edit(Request $request, $id)
    {
        $standard = Standard::findOrFail($id);

        return view('standard.edit', ['standard' => $standard]);
    }

    public function update(Request $request, $id)
    {
        $standard = Standard::find($id) ;
        $standard->name = $request->name;
        $standard->shortname = $request->shortname;
        $standard->sector = $request->sector;
        $standard->description = $request->description;
        $standard->diagnostico = $request->diagnostico;
        $standard->type = $request->type;
        $standard->cert_place = $request->cert_place;
        $standard->cert_material = $request->cert_material;
        $standard->cert_grade = $request->cert_grade;
        $standard->documentation = $request->documentation;
        $standard->link = $request->link;


        if($request->hasFile('image')){

            Storage::disk('public')->delete('standard/'.$standard->image);
            $name = "standard_".$request->shortname.time().".".$request->file('image')->extension();
            $path = $request->image->storeAs('/public/standard', $name);

            $standard->image = $name;

        }

        $standard->save();

        return redirect('admin/estandar/lista')->with('message', 'Registro actualizado');

    }

    public function show(Request $request, $attribute, $id)
    {



        return response()->json($standard);

    }

    public function delete(Request $request, $id)
    {
        $standard = Standard::find($id);
        $standard->delete();
    }

    public function registro(Request $request)
    {
        $standards = Standard::orderBy('name', 'desc')->get();

        return view('enroll.certification.formalt', ['standards' => $standards]);
    }







}
