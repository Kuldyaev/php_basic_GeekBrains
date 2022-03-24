<?php foreach ($goods as $item):?>
    <div class="itemCard">
        <a href="/item/?id=<?=$item['id']?>" class="itemLink">
            <img src="images/imgs_goods_300/<?=$item['id']?>.jpg" alt="small img" class="imgimg">
        </a>
        <div class="itemInfo">
            <a href="/item/?id=<?=$item['id']?>" class="itemLink">
                <div class="itemName">
                    <?=$item['name']?>
                </div>
                <div class="itemPrice">
                    цена: <?=$item['price']?> руб.
                </div>
            </a>
            <div class="buyBtn">
                <button class="buy">BUY</button>
            </div>        
        </div>
    </div>
<?php endforeach;?>