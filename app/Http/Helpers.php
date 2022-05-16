<?php
namespace App\Http;

use App\Models\Standard;
use App\Models\Date;
use App\Models\Quote;



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



}
