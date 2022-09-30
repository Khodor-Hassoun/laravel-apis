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
        $smallPatterns = '/[a-z]/';
        $numberPatterns = '/[0-9]/';
        $capitalLetters = '';
        $smallLetters = '';
        $numbers = '';
        $sortedString = '';
        
        // Get all capital letters
        if(preg_match_all($capitalPatterns, $string, $matches)){
            $capitalLetters = implode('',$matches[0]);
        }
        if(preg_match_all($smallPatterns, $string, $matches)){
            $smallLetters = implode('',$matches[0]);
        }
        if(preg_match_all($numberPatterns, $string, $matches)){
            $numbers = implode('',$matches[0]);
        }
        return $sortedString = $smallLetters.$capitalLetters.$numbers;
    }
}
