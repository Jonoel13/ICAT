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


    public function show(Request $request, $name, $id)
    {

        $certification = Certification::find($id);
        $today =date("Y-m-d");
        $quotes = DB::table('quotes')->where('quote_user_curp', $certification->curp)
            ->where('quote_user_curp', $certification->curp)
            ->where('quote_date','>=', $today)
            ->join('dates', 'quotes.quote_date_id', '=', 'dates.id')
            ->select('quotes.*', 'dates.date_place', 'dates.date_standar')
            ->get();

        return view('user.certifications.show',['certification' => $certification, 'quotes' => $quotes]);
    }


}
