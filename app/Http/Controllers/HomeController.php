<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Certification;
use App\Models\Image;

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

        $files = Image::orderBy('updated_at', 'desc')->get();

        if(Auth::user()->id_rol == 10):
            return view('home');
        else:
            return view('admin.dashboard.home', ['countCer' => $countCer, 'files' => $files]);
        endif;
    }

    public function test(Request $request)
    {

        if($request->hasFile('image')){
            $path = $request->image->store('public');
            Image::create(['path' => $path]);
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $path = $request->image->store('public');
            Image::create(['path' => $path]);
        }
    }






}
