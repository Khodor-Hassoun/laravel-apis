<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrefixNotation extends Controller
{
    //
    function calculate($string){
        $array = explode(' ',$string);

        $number1 = intval($array[1]);
        $number2 = intval($array[2]);
        $total = 0;

        if($array[0] == '+'){
            $total = $number1 + $number2;
        }
        if($array[0] == '-'){
            $total = $number1 - $number2;
        }
        if($array[0] == '*'){
            $total = $number1 * $number2;
        }
        if($array[0] == 'divide'){
            $total = $number1 / $number2;
        }

        return response()->json([
            "status" => "Success",
            "message" => $array[0].' '.$array[1].' '.$array[2].' -> '.$total
        ]);
    }
}
