<div class="orderInfo center">
   <div class="center infoPart" style="flex-direction: column">
      <? if(!isset($_SESSION['login'])): ?>
         <h6 style="backgr">You need to log in </h6>
      <? endif; ?>   
      <? if(isset($_SESSION['login'])): ?>
         <h4>User:  <?=$_SESSION['login']?></h4>
         <h4>items:  <?=$positions?> </h4>
         <h4>amount:  <?=$amount?> </h4>
      <? endif; ?>  
   </div>
   <div class="center infoPart">
       <? if(!isset($_SESSION['login'])): ?>
         <a href="/login">LOGIN</a>
      <? endif; ?>   
      <? if(isset($_SESSION['login'])): ?>
         <a href="order/?action=makeorder&items=<?=$positions?>&sum=<?=$amount?>&user=<?=$_SESSION['login']?>"><button>заказать</button></a>
      <? endif; ?>  
   </div>
</div>
<div class="center text">
   order contain:
</div>
<div class="center items">
<?php foreach ($cart as $item):?>
   <li class="listItem2">
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
               <p id="quantity<?=$item['good_id']?>"><?=$item['quantity']?></p><p>&nbsp;шт.</p>
            </div>
         </div>
      </div>
      <div class="quantityBlock">
         <h5 class="center">всего</h5>
         <div  class="center h70"> 
            <p id="sum<?=$item['good_id']?>" data-price=<?=$item['price']?>><?=$item['quantity']*$item['price']?></p><p>&nbsp;руб.</p>
         </div>
      </div>
   </li>
<? endforeach; ?>   
</div>