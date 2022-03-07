<?php

namespace App\Http\Controllers\Admin\Certification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

use DB;
use File;
use Validator;
use App\Quote;
use App\Date;
use Illuminate\Support\Str;


class ScheduleController extends Controller
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
        $today =date("Y-m-d");
        $dates = Date::orderBy('date_date', 'desc')
        ->where('date_date','>=', $today)
        ->orderBy('date_hour', 'asc')->paginate(20);

        return view('schedule.index', ['dates' => $dates]);
    }

    public function search(Request $request, $date)
    {

        $dates = Date::where('date_date', $date)
            ->orderBy('date_date', 'desc')->orderBy('date_hour', 'asc')->paginate(15);

        return view('schedule.index', ['dates' => $dates]);
    }

    public function quotes()
    {
        #$quotes = Quote::orderBy('id', 'desc')->paginate(20);
        $quotes = DB::table('quotes')
            ->join('dates', 'quotes.quote_date_id', '=', 'dates.id')
            ->select('quotes.*', 'dates.date_date', 'dates.date_hour')
            ->get();

        return view('schedule.quote.index', ['quotes' => $quotes]);
    }

    public function quoteEdit(Request $request, $id)
    {
        /*
        $rules = array(
            'quote_date_id' => 'required',
            'quote_user_name' => 'required',
            'quote_user_ap_p' => 'required',
            'quote_user_ap_m' => 'required',
            'quote_user_curp' => 'required',
            'quote_user_email' => 'required',
        );

        $messages = array(
            'quote_date_id.required' =>'Este campo es requerido',
            'quote_user_name.required' =>'Este campo es requerido',
            'quote_user_ap_p.required' =>'Este campo es requerido',
            'quote_user_ap_m.required' =>'Este campo es requerido',
            'quote_user_curp.required' =>'Este campo es requerido',
            'quote_user_email.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

                $quote = new Quote::find($request->id);

                $quote->quote_date_id = $request->quote_date_id;
                #$quote->quote_qr_id = bcrypt(str_random(10));
                $quote->quote_user_name = $request->quote_user_name;
                $quote->quote_user_ap_p = $request->quote_user_ap_p;
                $quote->quote_user_ap_m = $request->quote_user_ap_m;
                $quote->quote_user_curp = $request->quote_user_curp;
                $quote->quote_user_email = $request->quote_user_email;
                $quote->quote_status = 'No disponible';
                #$quote->quote_access = bcrypt(str_random(10));

                $date = Date::find($request->quote_date_id);

                $date->date_status = 'No disponible';
                $quote->quote_date = $date->date_date;
                $quote->quote_hour = $date->date_hour;

                $date->save();
                $quote->save();

                return redirect('citas')->with('message', 'Registro exitoso');
        }
        */
        return redirect('citas/lista');
    }

    public function quoteFind(Request $request, $id)
    {
        $quote = Quote::findOrFail($id);

        return view('schedule.quote.edit', ['quote' => $quote]);
    }

    public function form()
    {
        return view('schedule.form');
    }

    public function find(Request $request, $id)
    {
        $date = Date::findOrFail($id);

        return view('schedule.edit', ['date' => $date]);
    }

    public function store(Request $request)
    {
        $rules = array(
            'date_date' => 'required',
            'date_hour' => 'required',
            #'date_place' => 'required',
            'date_standar' => 'required',
        );

        $messages = array(
            'date_date.required' =>'Este campo es requerido',
            'date_hour.required' =>'Este campo es requerido',
            #'date_place.required' =>'Este campo es requerido',
            'date_standar.required' =>'Este campo es requerido',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('message-error', 'Completar campos requeridos');

        } else {

            $date = new Date;
            $date->date_date = $request->date_date;
            $date->date_hour = $request->date_hour;
            $date->date_place = "UC-GAM";
            $date->date_service = 'Certificación';
            $date->date_standar = $request->date_standar;
            $date->date_status = "Disponible";

            $date->save();

            return redirect('agenda')->with('message', 'Registro exitoso');
        }
    }

    public function edit(Request $request, $id)
    {

        $date = Date::find($id);
        $date->date_date = $request->date_date;
        $date->date_hour = $request->date_hour;
        $date->date_place = "UC-GAM";
        $date->date_standar = $request->date_standar;
        $date->date_status = $request->date_status;


        $date->save();

        return redirect('agenda')->with('message', 'Registro Actualizado');
    }

    public function delete(Request $request, $id)
    {
        $alliance = Date::find($id);
        DB::table('dates')->where('id', '=', $id)->delete();
        #$alliance->delete();

        return redirect('/alianzas')->with('message', 'Registro Eliminado');

    }

}
