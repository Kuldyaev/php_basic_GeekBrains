<div id="cartHeader" class="center">
   <?php if($cartIsEmpty): ?>
      <p>В Вашей корзине пока нет товаров</p>
   <?php endif; ?>
   <?php if(!$cartIsEmpty): ?>
      <div class="headerItem center" >
         <p>В Вашей корзине:</p>
      </div>
      <div class="headerMiddle center middle">
         <div class="headerItem center">
            <p>Всего позиций:&nbsp;</p><p id="sumPositions"><?=$positions?></p>
         </div>
         <div class="headerMiddle center">
            <p>на сумму&nbsp;</p><p id="totalAmount"><?=$amount?></p><p>&nbsp;руб.</p>
         </div>
      </div>
      <div class="headerItem center">
         <a href="/order"><button>оформить заказ</button></a>
      </div>      
   <?php endif; ?>
</div>
<ul class="cartList" id="myList"> 
<?php foreach ($cart as $item):?>
   <li id="item<?=$item['good_id']?>" data-line=<?=$item['good_id']?> data-id=<?=$item['good_id']?>>
      <div class="itenImg">
         <a href="/item/?id=<?=$item['good_id']?>" class="imglink"><img src="images/imgs_goods_300/<?=$item['good_id']?>.jpg" alt="small img" class="imgimg"></a>
      </div>
      <div class="itemTitle center h100 ">
         <a href="/item/?id=<?=$item['good_id']?>" class="imglink title"><?=$item['name']?></a>
      </div>
      <div class="priceBlock">
         <h5>цена за ед.</h5> 
         <div  class="center h70"> 
         <a href="/item/?id=<?=$item['good_id']?>" class="imglink title"><?=$item['price']?> руб.</a>
         </div>
      </div>
      <div class="quantityBlock">
         <h5 class="center">количество</h5>
         <div  class="center h70">
            <div class="center h70">
               <img src="images/less.png" alt="delete item" class="qBtns less" data-index=<?=$item['good_id']?>  data-quantity=<?=$item['quantity']?> id="less<?=$item['good_id']?>" data-session=<?=session_id()?>>
            </div>
            <div class="center h70">
               <p id="quantity<?=$item['good_id']?>"><?=$item['quantity']?></p><p>&nbsp;шт.</p>
            </div>
            <div class="center h70">
               <img src="images/more.png" alt="delete item" class="qBtns more" data-index=<?=$item['good_id']?> data-session=<?=session_id()?>>
            </div>   
         </div>
      </div>
      <div class="quantityBlock">
         <h5 class="center">всего</h5>
         <div  class="center h70"> 
            <p id="sum<?=$item['good_id']?>" data-price=<?=$item['price']?>><?=$item['quantity']*$item['price']?></p><p>&nbsp;руб.</p>
         </div>
      </div>
      <div class="deleteBlock h100 center" >
         <img src="images/delete.png" alt="delete item" class="delete" data-index=<?=$item['good_id']?> data-line=<?=$item['id']?> data-session=<?=session_id()?>>
      </div>
   </li>
<?php endforeach;?>
</ul>


<script>
   function checkSum(){
      document.getElementById('sumPositions').textContent = document.getElementById('myList').children.length;
      var amount = 0;
      document.querySelectorAll('li').forEach((elem)=>{
         const myIndex = "sum" + String(elem.dataset.id);
         amount += Number(document.getElementById(myIndex).textContent);
      });
      document.getElementById('totalAmount').textContent = amount;
   };

   let deleteBtns = document.querySelectorAll('.delete');
   deleteBtns.forEach(btn => {
      btn.addEventListener('click', function(e){
         const data ={
            operand1: btn.dataset.line,
            operand2: btn.dataset.session,
            operation: "deleteInCart"
         };
         (async()=>{
            fetch("/calc", {
                  method: 'POST', 
                  headers: new Headers({'Content-Type': 'application/json'}),
                  body: JSON.stringify(data)
                  })
                  .then(responce => responce.json())
                  .then(result =>{
                     if(result.result === "ok" && result.operation === "deleteInCart"){
                        const myIndex = "item" + String(btn.dataset.index);
                        document.getElementById(myIndex).remove();
                        checkSum();
                     }
                  })
         })();
      });
   });

   let moreBtns = document.querySelectorAll('.more');
   moreBtns.forEach(btn => {
      btn.addEventListener('click', function(e){
         const data ={
            operand1: btn.dataset.index,
            operand2: btn.dataset.session,
            operation: "incInCart"
         };
         (async()=>{
            fetch("/calc", {
               method: 'POST', 
               headers: new Headers({'Content-Type': 'application/json'}),
               body: JSON.stringify(data)
               })
               .then(responce => responce.json())
               .then(result =>{
                  if(result.result === "ok" && result.operation === "incInCart"){
                     const myIndex = "quantity" + String(result.operand1);
                     const myText = String(result.operand2);
                     document.getElementById(myIndex).textContent = myText;
                     const lessIndex = "less" + String(result.operand1);
                     if (Number(result.operand2) > 1) {document.getElementById(lessIndex).style.opacity=0.5};
                     const mySumIndex = "sum" + String(result.operand1);
                     document.getElementById(mySumIndex).textContent = Number(result.operand2 * document.getElementById(mySumIndex).dataset.price);
                     checkSum();
                  }
               })
         })();
      });
   });

   let lessBtns = document.querySelectorAll('.less');
   lessBtns.forEach(btn => {
      if (Number(btn.dataset.quantity) === 1){
         btn.style.opacity=0.3;
      } else { btn.addEventListener('click', function(e){
         const myIndex = "quantity" + String(btn.dataset.index);
         if (Number(document.getElementById(myIndex).textContent) === 1){
            console.log("Do you want delete this item?");
         } else {
            const data ={
                  operand1: btn.dataset.index,
                  operand2: btn.dataset.session,
                  operation: "decInCart"
               };
               (async()=>{
               fetch("/calc", {
                     method: 'POST', 
                     headers: new Headers({'Content-Type': 'application/json'}),
                     body: JSON.stringify(data)
                     })
                     .then(responce => responce.json())
                     .then(result =>{
                        if(result.result === "ok" && result.operation === "decInCart"){
                           const myText = String(result.operand2);
                           document.getElementById(myIndex).textContent = myText;
                           if (Number(result.operand2) === 1) {btn.style.opacity=0.3;}
                           const mySumIndex = "sum" + String(result.operand1);
                           document.getElementById(mySumIndex).textContent = Number(result.operand2 * document.getElementById(mySumIndex).dataset.price);
                           checkSum();
                        }
                     })
               })();
         }
      });
    }
   });
</script>