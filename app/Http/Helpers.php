<?php
namespace App\Http;

use App\Models\Home;
use App\Models\Standard;
use App\Models\Date;
use App\Models\Quote;
use App\Models\Profile;
use App\Models\Enroll;
use App\Models\Certification;


class Helpers
{
    /**
    *********************************************************************
    ** Helpers Home Model
    *********************************************************************
    */
    public static function homeBanner(string $data)
    {
        $home = Home::find($data);

        return $home->banner;
    }


    /**
    *********************************************************************
    ** Helpers Standar Model
    *********************************************************************
    */

    public static function standarImage(string $data)
    {
        $standard = Standard::where('name', $data)->first();

        return $standard->image;
    }

    public static function standarImageId(string $data)
    {
        $standard = Standard::find($data);

        return $standard->image;
    }

    public static function standarDescriptionId(string $data)
    {
        $standard = Standard::find($data);

        return $standard->description;
    }

    public static function standarDiagnostico($data)
    {
        $standard = Standard::where('name', $data)->first();

        return $standard->diagnostico;
    }

    public static function standarDescription($data)
    {
        $standard = Standard::where('name', $data)->first();

        return $standard->description;
    }

    public static function standarName($data)
    {
        $standard = Standard::find($data);

        return $standard->name;
    }

    public static function standarMaterial($data)
    {
        $standard = Standard::where('name', $data)->first();

        return $standard->cert_material;
    }

    public static function standarCONOCER($data)
    {
        $standard = Standard::find($data);

        return $standard->link;
    }

    public static function standarDocumentation($data)
    {
        $standard = Standard::find($data);

        return $standard->documentation;
    }



    /**
    *********************************************************************
    ** Helpers Standar Model
    *********************************************************************
    */

    public static function dateStandard($data)
    {
        $date = Date::where('id', $data)->first();

        return $date->date_standar;
    }

    public static function dateMaterial($data)
    {
        $date = Date::where('id', $data)->first();

        $standard = Standard::where('name', $date->date_standar)->first();

        return $standard->cert_material;
    }

    public static function datePlanEv($data)
    {
        $date = Date::where('id', $data)->first();

        $standard = Standard::where('name', $date->date_standar)->first();

        return $standard->p_evaluation;
    }

    public static function dateDeliverables($data)
    {
        $date = Date::where('id', $data)->first();

        $standard = Standard::where('name', $date->date_standar)->first();

        return $standard->deliverables;
    }


    public static function profileCheck($data)
    {
        $profile = Profile::where('user_curp', $data)->first();

        return $profile->user_check_ok;
    }

    public static function groupEnrolments($standard, $id)
    {
        $data = Standard::find($standard);

        $result = Certification::where('estandar', $data->name)->where('grupo', $id)->count();

        return $result;
    }

    /**
    *********************************************************************
    ** Helpers Quote Model
    *********************************************************************
    */

    public static function quoteQrId($data)
    {
        $data = Quote::where('service_id', $data)->first();

        $result = 'No agendada';

        if($data):
            $result = $data->quote_access;

        endif;


        return $result;
    }


    /**
    *********************************************************************
    ** Helpers Quote Model
    *********************************************************************
    */

    public static function cetificationStatusCount($standard, $status)
    {
        $result = Certification::where('estandar', $standard)->where('estatus', $status)->count();

        return $result;
    }




}
