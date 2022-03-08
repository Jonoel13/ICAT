<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;

use DB;
use File;
use Validator;
use App\Models\Enroll;
use Illuminate\Support\Str;


class ApiEnrollController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
    )
    {
         #$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getByCurp(Request $request, $curp)
    {
        #$response['certificacion'] = Certification::where('curp', $curp)->get(['curp', 'estatus', 'fecha']);
        $response = Enroll::where('curp', $curp)->get();

        return response()->json($response);

    }

    public function getAll(Request $request)
    {
        $response = Enroll::all()->get();
        return response()->json($response);

    }

}
