<?php

function mathOperations($arg1, $arg2, $operation){
    switch ($operation){
        case "sum":
            return  $arg1 + $arg2;
            break;
        case "dif":
            return  $arg1 - $arg2;
            break;
        case "mul":
            return  $arg1 * $arg2;
            break;
        case "div":
            return ($arg2 != 0) ? $arg1 / $arg2 : "Деление на ноль";
            break;
        default:
            return "Error";
    }
};