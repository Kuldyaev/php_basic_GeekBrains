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
                <button class="buy" data-itemid=<?=$item['id']?> data-session=<?=session_id()?>>BUY</button>
            </div>        
        </div>
    </div>
<?php endforeach;?>

<script>
    const btns = document.querySelectorAll('.buy');
    btns.forEach(btn => {
        const id = btn.dataset.itemid;
        const cart = btn.dataset.session;
        btn.addEventListener('click', function(e){
            const data ={
                operand1: id,
                operand2: cart,
                operation: "addItemToCart"
            };
            (async()=>{
                fetch("/calc", {
                    method: 'POST', 
                    headers: new Headers({'Content-Type': 'application/json'}),
                    body: JSON.stringify(data)
                    })
                    .then(responce => responce.json())
                    .then(result =>{
                        if(result.result === "add" && result.operation === "addItemToCart"){
                        alert("Товар добавлен в корзину");
                        }
                        if(result.result === "ok" && result.operation === "addItemToCart"){
                        alert("Этот товар уже в корзине");
                        }
                    })
            })();
        })
    })
</script>