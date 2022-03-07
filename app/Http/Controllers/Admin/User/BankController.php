<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;

use DB;
use File;
use Validator;
use App\Certification;
use Illuminate\Support\Str;


class BankController extends Controller
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
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, X-CSRF-TOKEN');

        $userCer = $json = json_decode(file_get_contents('https://icatcdmx.mx/sii/api/perfiles/Transporte'), true);
        $userLinea = $json = json_decode(file_get_contents('https://icatcdmx.mx/apiMoodle/profile/all'), true);

        #Certification::where('estatus', 'Competente')->paginate(15);

        return view('admin.bank.index', ['userLinea' => $userLinea, 'userCer'=> $userCer]);
    }


}
