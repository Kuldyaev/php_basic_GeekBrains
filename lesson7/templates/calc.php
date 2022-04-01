<?php
if ($operation == "deleteInCart"){

    removeItemFromCart($oper1, 1);

    $responce['operand1'] = $oper1;
    $responce['result'] = "ok";
    $responce['operation'] = $operation;

    echo json_encode($responce);

} else if($operation == "incInCart"){

    $newQuantity = incremQuantityInCart($oper1, 1);

    $responce['operand1'] = $oper1;
    $responce['operand2'] = $newQuantity['quantity'];
    $responce['result'] = "ok";
    $responce['operation'] = $operation;

    echo json_encode($responce);

} else if($operation == "decInCart"){

    $newQuantity = decremQuantityInCart($oper1, 1);

    $responce['operand1'] = $oper1;
    $responce['operand2'] = $newQuantity['quantity'];
    $responce['result'] = "ok";
    $responce['operation'] = $operation;

    echo json_encode($responce);

} else if($operation == "addItemToCart"){
    $result = "ok";
    if(count(getItemInCart($oper1, 1)) === 0){
        addItemToCart($oper1, 1);
        $result = "add";
    };

    $responce['operand1'] = $oper1;
    $responce['result'] = $result;
    $responce['operation'] = $operation;

    echo json_encode($responce);

} else {
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
                return ($arg2 != 0) ? $arg1 / $arg2 : "Деление на ноль";
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
}