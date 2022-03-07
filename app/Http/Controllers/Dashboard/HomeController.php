<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;

use DB;
use File;
use Validator;
use Auth;
use App\Certification;
use Illuminate\Support\Str;



class HomeController extends Controller
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

        $countCer = Certification::where('estatus', 'Competente')->count();

        if(Auth::user()->id_rol == 1){
            return view('admin.dashboard.home', ['countCer' => $countCer]);
        }
        else{
            return view('dashboard.home');
        }
    }


}
