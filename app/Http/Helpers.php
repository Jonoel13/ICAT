<?php
namespace App\Http;

use App\Models\Standard;
use App\Models\Date;
use App\Models\Quote;
use App\Models\Profile;
use App\Models\Enroll;


class Helpers
{

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


    public static function profileCheck($data)
    {
        $profile = Profile::where('user_curp', $data)->first();

        return $profile->user_check_ok;
    }

    public static function groupEnrolments($data)
    {
        $result = Enroll::where('enrol_group', $data)->count();

        return $result;
    }



}
