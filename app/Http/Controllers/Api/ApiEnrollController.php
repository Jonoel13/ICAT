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
         $this->middleware('auth');
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

    public function getCertificationData(Request $request, $field, $value)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, X-CSRF-TOKEN');


        $data = DB::table('certification')
                ->join('profiles', 'certification.curp', '=', 'profiles.user_curp')
                ->where($field, '=', $value)
                ->select(
                    'certification.id',
                    'certification.curp',
                    'certification.estandar',
                    'certification.sector',
                    'certification.estatus',
                    'certification.constancia',
                    'profiles.user_nombre',
                    'profiles.user_app',
                    'profiles.user_apm',
                    'profiles.user_edad',
                    'profiles.user_sexo',
                    'profiles.user_telefono',
                    'profiles.user_email',
                    'profiles.user_academico',
                    'profiles.user_productivo',
                    'profiles.user_cp'
                )->get();

        $data2 = DB::table('certification')
                ->join('profiles', 'certification.curp', '=', 'profiles.user_curp')
                ->where($field, '=', $value)
                ->select(
                    'certification.id',
                    'certification.curp',
                    'certification.estandar',
                    'certification.sector',
                    'certification.estatus',
                    'certification.constancia',
                    'profiles.user_nombre',
                    'profiles.user_app',
                    'profiles.user_apm',
                    'profiles.user_edad',
                    'profiles.user_sexo',
                    'profiles.user_telefono',
                    'profiles.user_email',
                    'profiles.user_academico',
                    'profiles.user_productivo',
                    'profiles.user_cp'
                )->count();

        $data2 = DB::table('certification')
                ->join('profiles', 'certification.curp', '=', 'profiles.user_curp')
                ->where($field, '=', $value)
                ->select(
                    'certification.id',
                    'certification.curp',
                    'certification.estandar',
                    'certification.sector',
                    'certification.estatus',
                    'certification.constancia',
                    'profiles.user_nombre',
                    'profiles.user_app',
                    'profiles.user_apm',
                    'profiles.user_edad',
                    'profiles.user_sexo',
                    'profiles.user_telefono',
                    'profiles.user_email',
                    'profiles.user_academico',
                    'profiles.user_productivo',
                    'profiles.user_cp'
                )->count();

        $response = ['list' => $data, 'total'=> $data2];

        return response()->json($response);

    }


    

}
