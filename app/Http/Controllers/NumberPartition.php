<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberPartition extends Controller
{
    //
    function partitionNum($num){
        $partitionArray = [];
        $i = 10;
        while ($num > $i / 10){
            // echo ($num % $i - $num % ($i / 10));
            $value = $num % $i - $num % ($i / 10);
            array_push($partitionArray, $value);
            $i *= 10;
        }
        return array_reverse($partitionArray);
    }
}
