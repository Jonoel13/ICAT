<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Certification;

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

        if(Auth::user()->id_rol == 10):
            return view('home');
        else:
            return view('admin.dashboard.home', ['countCer' => $countCer]);
        endif;
    }

    public function test()
    {
        return view('admin.dashboard.home');
    }
}
