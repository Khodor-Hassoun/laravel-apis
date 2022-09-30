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

        // Sort string into 3 sorted arrays (capital, small, numbers)
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
        // Loop over the samll letters and then the capital letters and do a comparison
        for($i = 0; $i <count($smallLetters); $i++){
            for($j = 0; $j< count($capitalLetters); $j++){
                // First if condition to check if elements already exist in the sorted array
                if(!(in_array($smallLetters[$i],$sortedArray)) && !(in_array($capitalLetters[$j],$sortedArray))){
                    // Second if condition will insert the the elements depending on their ascii code
                    if(ord($smallLetters[$i]) - ord($capitalLetters[$j]) <= 32){
                        array_push($sortedArray, $smallLetters[$i]);
                        array_push($sortedArray, $capitalLetters[$j]);
                    }
                    if(ord($smallLetters[$i]) - ord($capitalLetters[$j]) > 32){
                        array_push($sortedArray, $capitalLetters[$j]);
                        array_push($sortedArray, $smallLetters[$i]);
                    }

                }
                
            }

        }

        $merge = array_merge($sortedArray, $numbers);
        $sortedString = implode('',$merge);
        return response()->json([
            "status" => "Success",
            "message" => $sortedString
        ]);

    }
}
