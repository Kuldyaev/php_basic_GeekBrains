<?php
function mathOperation($arg1, $arg2, $operation){
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
            if ($arg2 !== 0){
                 return  $arg1 / $arg2; 
            } else {
                return "Error";
            };
            break;
        default:
            return "Error";
    }
};

$responce['operand1'] = $oper1;
$responce['operand2'] = $oper2;
$responce['operation'] = $operation;
$responce['result'] = mathOperation($oper1, $oper2, $operation);

echo json_encode($responce);
