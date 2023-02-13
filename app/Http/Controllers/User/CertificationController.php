<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;

use DB;
use File;
use Validator;
use Auth;
use App\Models\Certification;
use App\Models\Standard;
use App\Models\Group;
use App\Models\Profile;
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


        $certifications = Certification::where('curp', $name)->orderBy('created_at', 'desc')->get();

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


    public function catalogo(Request $request)
    {


        $standards = Standard::orderBy('updated_at')->get();
        $groups = Group::where('group_name','000001')
            ->where('group_private','Público')
            ->orderBy('updated_at')
            ->get();

        return view('user.certifications.catalogo',['groups' => $groups]);
    }


    public function enrolment(Request $request, $id)
    {

        $curp = Auth::user()->name;

        $profile = Profile::where('user_curp', $curp)->first();

        $group = Group::find($id);

        return view('enroll.certification.enrolFast', ['profile' => $profile, 'group' => $group]);


    }

}
