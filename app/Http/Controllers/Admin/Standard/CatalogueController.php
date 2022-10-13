<?php

namespace App\Http\Controllers\Admin\Standard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

use DB;
use File;
use Validator;
use App\Models\Standard;
use App\Models\Allience;
use App\Models\Instructor;
use App\Models\Group;
use App\Models\Enroll;
use Illuminate\Support\Str;


class CatalogueController extends Controller
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
   

    public function filter(Request $request)
    {
        $groups = Group::where('group_name','000001')
            ->where('group_shortname', 'like', '%' . $request->filter . '%')
            ->where('group_private','Público')
            ->orderBy('group_shortname', 'asc')
            ->paginate(12);

        return view('standard.catalogue.index', ['groups' => $groups]);
    }


    public function catalogueCertification(Request $request)
    {

        $standards = Standard::orderBy('updated_at')->get();
        $groups = Group::where('group_name','000001')
            ->where('group_private','Público')
            ->orderBy('group_shortname', 'asc')
            ->paginate(12);

        return view('standard.catalogue.index',['groups' => $groups]);
    }


    public function showCertification(Request $request, $id)
    {

        $group = Group::find($id);

        return view('standard.catalogue.show',['group' => $group]);
    }
}