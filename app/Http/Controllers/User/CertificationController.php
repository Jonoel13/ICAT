<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;

use DB;
use File;
use Validator;
use App\Models\Certification;
use Illuminate\Support\Str;
use App\Http\Helper;


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
    public function index(Request $request, $name)
    {


        $certifications = Certification::where('curp', $name)->get();

        return view('user.certifications.index',['certifications' => $certifications]);
    }


}
