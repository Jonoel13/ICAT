<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


use DB;
use File;
use Validator;
use App\Models\Home;
use Illuminate\Support\Str;

/**
* Este controlador pretende hacer dinámico para crear la inserción de nuevas secciones dentro de home desde el perfil administrador
* Pendiente el desarrollo de una herramienta con interfaz virtual de creación de landing page
*/

class HomeBuilderController extends Controller
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


    public function homeConfig()
    {
        $home = Home::find(1);
        return view('admin.homebuilder.index', ['home'=> $home]);
    }

    public function homeUpdate(Request $request)
    {
        $home = Home::find(1);

        if($request->hasFile('banner')){
            
            Storage::disk('public')->delete('banner/'.$home->banner);
            $name = "banner_".time().".".$request->file('banner')->extension();
            $path = $request->banner->storeAs('/public/banner', $name);
            $home->banner = $name;
            
        }
        
        $home->save();

        return redirect()->back()->with('message', 'Registro actualizado');

        
    }

}