<div class="center desk">
   <h4>Список заказов</h4>
   <br/>
   <br/>
    <? if ($isListEmpty): ?>
        <div>
            <h5> Orders List is empty now</h5>
        </div>
    <? endif; ?>
    <ul class="orderList" id="myList"> 
    <?php foreach ($orders as $order):?>
        <li>
            <div class='center orderdetail'>
                <?=$order['id']?>
            </div>
            <div class='center orderdetail'>
                <?=$order['username']?>
            </div> 
            <div class='center orderdetail'>
                <?=$order['items']?>
            </div>
            <div class='center orderdetail'>
                <?=$order['amount']?>
            </div>
            <div class='center orderdetail'>
                <?=$order['open_date']?>
            </div>
            <div class='center orderdetail'>
                <?=$order['close_date']?>
            </div>
            <div class='center orderdetail'>
                <?=$order['orderstatus']?>
            </div>
            <div class='center orderdetail delete'>
               <? if ($is_admin): ?>
                <a href="/orders/?action=deleteorder&orderid=<?=$order['id']?>" class="deleteLink"><h6>DELETE</h6></a>
               <? endif; ?>
            </div>
        </li>
    <?php endforeach;?>
    </ul>
</div>