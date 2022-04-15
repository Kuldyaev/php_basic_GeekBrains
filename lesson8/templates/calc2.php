<?php
$result = 0;
$arg1 = 0;
$arg2 = 0;
$operation = "";
$text="";

if (!empty($_GET)) {
    $arg1 = $_GET['arg1'];
    $arg2 = $_GET['arg2'];
    $operation = $_GET['operation'];
    $result = mathOperations($arg1, $arg2, $operation);
}


if (!empty($_POST)) {
    $text = "text";
}
?>

<form name="my" action="" method="get">
    <label for="oper1">operand 1</label>
    <input type="text" name="arg1" value="<?=$arg1?>" id="oper1">
    <br/>
    <label for="oper2">operand 2</label>
    <input type="text" name="arg2" value="<?=$arg2?>" id="oper2">
</form>
<br/>
<div class="btnsBlock">
    <button onclick="myFunction('sum')" id="btn1" style="margin-left:10px"><b>+</b></button>
    <button onclick="myFunction('dif')" id="btn2"><b>-</b></button>
    <button onclick="myFunction('mul')" id="btn3"><b>*</b></button>
    <button onclick="myFunction('div')" id="btn4"><b>/</b></button>
</div>
<br/>
<form name="resultform"> 
    <br/>
    <label for="result">result</label>
    <input readonly type="text" name="result" value="<?=$result?>" id="result">
</form>
<p><?=$text?></p>

<script>
function myFunction(operation){
    let myform = document.forms.my;
    let resultform = document.forms.resultform;
    let myresult = resultform.elements.result;
    let myId = "btn1";
    switch(operation){
        case 'sum':
            myId = "btn1";
            break;
        case 'dif':
            myId = "btn2";
            break;
        case 'mul':
            myId = "btn3";
            break;
        default:
            myId = "btn4"
    };
    let myBtns = document.querySelectorAll('.btnsBlock button');
    myBtns.forEach(btn => {btn.style.backgroundColor = 'silver'});
    let myBtn = document.getElementById(myId);
    myBtn.style.backgroundColor = 'green';
    const data ={
        operand1: myform.elements.arg1.value,
        operand2: myform.elements.arg2.value,
        operation: operation
    };
    (async()=>{
        fetch("/calc", {
            method: 'POST', 
            headers: new Headers({'Content-Type': 'application/json'}),
            body: JSON.stringify(data)
            })
            .then(responce => responce.json())
            .then(result =>{myresult.value = result.result;})
    })();
}
</script>