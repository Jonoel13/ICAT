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
    public function index()
    {
        $users = User::all();

        return view('admin.users.index',['users' => $users]);
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


    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $profile = Profile::where('user_curp', $user->name)->delete();

        $user->delete();
    }


}
