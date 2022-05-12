<?php
namespace App\Http;

use App\Models\Standard;


class Helpers
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

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

}
