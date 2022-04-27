<?php

namespace App\Http\Controllers\Admin\Allience;

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
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class AllienceController extends Controller
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
        $alliances = Allience::orderBy('id', 'desc')->paginate(20);

        return view('admin.alliance.index', ['alliances' => $alliances]);
    }

    public function form()
    {
        return view('admin.alliance.form');
    }

    public function find(Request $request, $id)
    {
        $alliance = Allience::findOrFail($id);

        return view('admin.alliance.edit', ['alliance' => $alliance]);
    }

    public function add(Request $request)
    {


        $rules = array(
            'alianza_proyecto' => 'required',
            'alianza_tipo' => 'required',
            'alianza_dependencia' => 'required',
            'alianza_nom_convenio' => 'required',
            'alianza_fecha_inicio' => 'required|date|before:alianza_fecha_termino',
            #'alianza_fecha_termino' => 'required|date|after:alianza_fecha_inicio',
            'alianza_urlpdf' => 'required',
        );

        $messages = array(
            'alianza_proyecto.required' =>'Este campo es requerido',
            'alianza_tipo.required' =>'Este campo es requerido',
            'alianza_dependencia.required' =>'Este campo es requerido',
            'alianza_nom_convenio.required' =>'Este campo es requerido',
            'alianza_fecha_inicio.required' => 'Este campo es requerido',
            'alianza_fecha_inicio.before' => 'La fecha de inicio debe ser una fecha anterior a la fecha de termino',
            'alianza_fecha_termino.required' =>'Este campo es requerido',
            #'alianza_fecha_termino.after' => 'La fecha de inicio debe ser una fecha anterior a la fecha de termino',
            'alianza_urlpdf.required' =>'Este campo es requerido',

        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            $alliance = new Alianza;
            $alliance->alianza_proyecto = $request->alianza_proyecto;
            $alliance->alianza_tipo = $request->alianza_tipo;
            $alliance->alianza_dependencia = $request->alianza_dependencia;
            $alliance->alianza_nom_convenio = $request->alianza_nom_convenio;
            $alliance->alianza_fecha_inicio = $request->alianza_fecha_inicio;
            $alliance->alianza_fecha_termino = $request->alianza_fecha_termino;


            /*
            ---------------------------------------------------------------
                Subir documento de alianza
            ---------------------------------------------------------------
            */


            if($request->hasFile('alianza_urlpdf')){
                $name = "alianza_".$request->alianza_urlpdf.time().".".$request->file('alianza_urlpdf')->extension();
                $path = $request->alianza_urlpdf->storeAs('/public/alliance', $name);
                $path2 ="/alianza".'/'.$name;
                //Image::create(['path' => $path2]);
                $alliance->alianza_urlpdf = $name;

            }else{
                $alliance->alianza_urlpdf = 'N/A';
            }

            $alliance->save();

            return redirect('admin/alianzas')->with('message', 'Alianza Registrada');
        }
    }


    public function edit(Request $request, $id)
    {

        $alliance = Alianza::find($id);
        $alliance->alianza_proyecto = $request->alianza_proyecto;
        $alliance->alianza_tipo = $request->alianza_tipo;
        $alliance->alianza_dependencia = $request->alianza_dependencia;
        $alliance->alianza_nom_convenio = $request->alianza_nom_convenio;
        $alliance->alianza_fecha_inicio = $request->alianza_fecha_inicio;
        $alliance->alianza_fecha_termino = $request->alianza_fecha_termino;

        /*
        ---------------------------------------------------------------
            Actualizar documento de alianza
            Elimina y carga el nuevo documento
        ---------------------------------------------------------------
        */

        if($request->hasFile('alianza_urlpdf')){

            Storage::disk('public')->delete('alliance/'.$alliance->alianza_urlpdf);
            $name = "alianza_".$request->alianza_urlpdf.time().".".$request->file('alianza_urlpdf')->extension();
            $path = $request->alianza_urlpdf->storeAs('/public/alliance', $name);

            $alliance->alianza_urlpdf = $name;

        }


        $alliance->save();

        return redirect('admin/alianzas')->with('message', 'Registro Actualizado');
    }

    public function delete(Request $request, $id)
    {
        $alliance = Allience::find($id);
        File::delete(public_path("pdf/alianzas/".$alliance->alianza_urlpdf));
        DB::table('alianzas')->where('id', '=', $id)->delete();
        #$alliance->delete();

        return redirect('admin/alianzas')->with('message', 'Registro Eliminado');

    }

    public function filter(Request $request)
    {

        $rules = array(
            'filter_type' => 'required',
            'filter_value' => 'required',
            'filter_value_2' => 'date|after:filter_value',
        );

        $messages = array(
            'filter_type.required' =>'Este campo es requerido',
            'filter_value.required' =>'Este campo es requerido',
            'filter_value_2.after' => 'La fecha de inicio debe ser una fecha anterior a la fecha de termino',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            if($request->filter_type == "alianza_fecha_inicio" || $request->filter_type == "alianza_fecha_termino"){

                $alliances = Allience::whereBetween($request->filter_type, [$request->filter_value, $request->filter_value_2])->orderBy('id', 'desc')->paginate(20);
            }else{
                
                $alliances = Allience::where($request->filter_type, 'like','%'.$request->filter_value.'%')->orderBy('id', 'desc')->paginate(20);
            }
         
            

            return view('admin.alliance.index', ['alliances' => $alliances]);
        }
        
    }

}
