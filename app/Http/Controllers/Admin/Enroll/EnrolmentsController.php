<?php

namespace App\Http\Controllers\Admin\Enroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;

use DB;
use File;
use Validator;
use App\Models\Group;
use App\Models\Enroll;
use App\Models\Certification;
use App\Models\Standard;
use Illuminate\Support\Str;


class EnrolmentsController extends Controller
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



    public function enrolments(Request $request, $id)
    {

        $group = Group::find($id);

        $standard = Standard::find($group->id_standard);

        if($group->group_service_type == 2):

            $enrolments = Certification::where('estandar',$standard->name)
                ->where('grupo',$group->group_name)
                ->orderBy('curp', 'desc')->get();

            return view('admin.groups.certification', ['enrolments'=>$enrolments]);

        endif;



    }

}
