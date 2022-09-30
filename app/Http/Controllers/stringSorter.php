<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stringSorter extends Controller
{
    //
    function sortString($string){
        // $letters = str_split($string); natcasesort($letters);
        // $ret = "";
        // foreach($letters as $letter){
        //     $ret .= $letter;
        // }
        // return $ret;
        // echo preg_match('/[A-Z]/g', $string, $matches);
        $capitalPatterns = '/[A-Z]/';
        if(preg_match_all($capitalPatterns, $string, $matches)){
            
            return $matches[0];
        }
    }
}
