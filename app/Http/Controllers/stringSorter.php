<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stringSorter extends Controller
{
    //
    function sortString($string){

        $capitalPatterns = '/[A-Z]/';
        $smallPatterns = '/[a-z]/';
        $numberPatterns = '/[0-9]/';
        $capitalLetters = '';
        $smallLetters = '';
        $numbers = '';
        $sortedString = '';
        $sortedArray = [];
        // Get all capital letters
        // if(preg_match_all($capitalPatterns, $string, $matches)){
        //     $capitalLetters = implode('',$matches[0]);
        // }
        // if(preg_match_all($smallPatterns, $string, $matches)){
        //     $smallLetters = implode('',$matches[0]);
        // }
        // if(preg_match_all($numberPatterns, $string, $matches)){
        //     $numbers = implode('',$matches[0]);
        // }
        // return $sortedString = $smallLetters.$capitalLetters.$numbers;

        if(preg_match_all($capitalPatterns, $string, $matches)){
            $capitalLetters = $matches[0];
            sort($capitalLetters);
        }
        if(preg_match_all($smallPatterns, $string, $matches)){
            $smallLetters = $matches[0];
            sort($smallLetters);
        }
        if(preg_match_all($numberPatterns, $string, $matches)){
            $numbers = $matches[0];
            sort($numbers);
        }
        // eA2a1E  aAeE12
        // for ($i = 0; $i < count($smallLetters); $i++) {
        //     if (ord($smallLetters[$i]) - ord($capitalLetters[$i]) == 32) {
        //         array_push($sortedArray, $smallLetters[$i]);
        //         array_push($sortedArray, $capitalLetters[$i]);
        //         unset($capitalLetters[$i]);
        //     } else array_push($sortedArray, $smallLetters[$i]);
        // }
        // for ($i = 0; $i < count($capitalLetters);$i++){
        //     array_push($sortedArray, $capitalLetters[$i]);
        // }
        // return($sortedArray);
        // 
        for($i = 0; $i <count($smallLetters); $i++){
            for($j = 0; $j< count($capitalLetters); $j++){
                if(!(in_array($smallLetters[$i],$sortedArray)) && !(in_array($capitalLetters[$j],$sortedArray))){
                    if(ord($smallLetters[$i]) - ord($capitalLetters[$j]) <= 32){
                        array_push($sortedArray, $smallLetters[$i]);
                        array_push($sortedArray, $capitalLetters[$j]);
                    }
                    if(ord($smallLetters[$i]) - ord($capitalLetters[$j]) > 32){
                        array_push($sortedArray, $capitalLetters[$j]);
                        array_push($sortedArray, $smallLetters[$i]);
                    }
                    // if(ord($smallLetters[$i]) - ord($capitalLetters[$j]) < 32){
                    //     array_push($sortedArray, $smallLetters[$i]);
                    //     array_push($sortedArray, $capitalLetters[$j]);
                    // }
                }
                
            }
            // if(!(in_array($smallLetters[$i],$sortedArray))){
            //     array_push($sortedArray, $smallLetters[$i]);
            // }
        }

        // for($i = 0; $i <count($capitalLetters); $i++) array_push($sortedArray, $capitalLetters[$i]);
        $merge = array_merge($sortedArray, $numbers);
        $sortedString = implode('',$merge);
        return $sortedString;

    }
}
