<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumToBinary extends Controller
{
    //
    function numToBinary($string){
        $numberPatterns = '/[0-9]+/';
        $binaryNums = [];
        preg_match_all($numberPatterns, $string, $matches);
        $numbers = $matches[0];

        for($i=0; $i < count($numbers);$i++){
            array_push($binaryNums, decbin($numbers[$i]));
        }

        $binaryString = str_replace($numbers, $binaryNums, $string);
        // echo $numbers[0];
        // echo $binaryNums[0];
        return $binaryString;
    }
}
