<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Certification;
use App\Models\Standard;
use App\Models\Image;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
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
        $countCer = Certification::where('estatus', 'Competente')->count();

        $standards = Standard::orderBy('name', 'desc')->get();

        $files = Image::orderBy('updated_at', 'desc')->get();


        if(Auth::user()->id_rol == 10):
            //return redirect('catalogo/certificaciones');
            return view('home'); 
        else:
            return view('admin.dashboard.home', ['countCer' => $countCer, 'files' => $files, 'standards' => $standards]);
        endif;
    }

    public function test(Request $request)
    {

        if($request->hasFile('image')){
            $name ='image1';
            $path = $request->image->storeAs('/public/photo', $name);
            $path2 ="/photo".'/'.$name;
            Image::create(['path' => $path2]);
            print($path2);
            die();
        }


        return redirect()->back();
    }

    public function store(Request $request, $name)
    {
        if($request->hasFile('image')){
            $path = $request->image->store('public');
            Image::create(['path' => $path]);
        }
    }

    public function delete(Request $request, $name)
    {
        Storage::disk('public')->delete($name);

        return redirect()->back();
    }






}
