<?php
$result = 0;
$arg1 = 0;
$arg2 = 0;
$operation = "";
$operationType = 'sum';

if (!empty($_GET)) {
    $arg1 = $_GET['arg1'];
    $arg2 = $_GET['arg2'];
    $operation = $_GET['operation'];
    $operationType = $_GET['operation'] ?? 'sum';
    $result = mathOperations($arg1, $arg2, $operation);
}
?>

<form action="/calc1/" method="get">
    <input type="text" name="arg1" value="<?=$arg1?>">
    <select name="operation">
        <option <?php if($operationType == 'sum') echo 'selected'; ?> value="sum">+</option>
        <option <?php if($operationType == 'dif') echo 'selected'; ?> value="dif">-</option>
        <option <?php if($operationType == 'mul') echo 'selected'; ?> value="mul">*</option>
        <option <?php if($operationType == 'div') echo 'selected'; ?> value="div">/</option>
    </select>
    <input type="text" name="arg2" value="<?=$arg2?>">
    <input type="submit" value="=">
    <input readonly type="text" name="result" value="<?=$result?>">
</form>
