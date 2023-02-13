<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

use DB;
use File;
use Validator;
use App\Models\User;
use App\Models\Enroll;
use App\Models\Profile;
use App\Models\Certification;
use Illuminate\Support\Str;


class ProfileController extends Controller
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


    /*----------Users acounts----------------------------------------------------------*/
    public function index()
    {
        $users = User::all();

        return view('admin.users.index',['users' => $users]);
    }



    public function new()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $rules = array(
            'user_name' => 'required',
            'user_email' => 'required',
            'user_id_rol' => 'required',

        );

        $messages = array(
            'user_name.required' =>'Este campo es requerido',
            'user_email.required' =>'Este campo es requerido',
            'user_id_rol.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

        $user = new User;
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->id_rol = $request->user_id_rol;
        $user->password = bcrypt($request->user_password);

        $user->save();

        }

        return redirect('usuario')->with('message', 'Registro Exitoso');
    }


    /*----------Users Profiles----------------------------------------------------------*/



    

    public function Profiles()
    {
        $profiles = Profile::all();

        return view('admin.users.profiles.index',['profiles' => $profiles]);
    }

    public function formPassword(Request $request, $id)
    {
        $user = User::find($id);

        return view('admin.users.password',['user' => $user]);
    }


    public function updatePassword(Request $request, $id)
    {
        $rules = array(
            'user_password'=> 'required',
        );

        $messages = array(
            'user_password.required' =>'Este campo es requerido',
            
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            $password = $request->user_password;

            $user = User::find($id);
            $user->password = bcrypt($password);
            $profile = Profile::where('user_curp', $user->name)->first();
            $user->save();

            $to_name = $profile->user_nombre;
            $to_email = $profile->user_email;

            $data = array( 'name' => $profile->user_nombre, 'user' => $profile->user_email, 'password' => $password);


            Mail::send('emails.password', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Datos de acceso');
                $message->from('icat@cdmx.gob.mx','Icat CDMX');
            });


            return redirect()->back()->with('message', 'Registro Exitoso');
        } 
    }



    public function deleteProfile(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return redirect()->back()->with('message', 'Registro Eliminado');
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        //$profile = Profile::where('user_curp', $user->name)->delete();

        $user->delete();

        return redirect()->back()->with('message', 'Registro Eliminado');
    }


}
