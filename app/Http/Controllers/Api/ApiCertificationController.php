<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;

use DB;
use File;
use Validator;
use App\Certification;
use Illuminate\Http\Response;
use Illuminate\Support\Str;


class ApiCertificationController extends Controller
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

    public function documentation(Request $request)
    {
        return view('api.documentation');
    }


    public function getByCurp(Request $request, $curp)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, X-CSRF-TOKEN');

        #$response['certificacion'] = Certification::where('curp', $curp)->get(['curp', 'estatus', 'fecha']);
        $response = Certification::where('curp', $curp)->get(['curp', 'estatus', 'fecha']);

        return response()->json($response);
    }

    public function getAll(Request $request, $sector)
    {

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, X-CSRF-TOKEN');

        /*
        $data = Certification::where('sector', $sector)
            ->get([
                'id',
                'curp',
                'estandar',
                'sector',
                'estatus',
                'calificacion',
                'constancia',
            ]);
        */
            $data = DB::table('certification')->where('sector', $sector)
                ->join('profiles', 'certification.curp', '=', 'profiles.user_curp')
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

        return response()->json(array('data'=> $data), 200);

    }


}
