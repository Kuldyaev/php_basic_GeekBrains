<div class="card">
    <div class="itemInfoPlace">
        <div class="itemImgPlace">
            <img src="/images/imgs_goods_600/<?=$item['id']?>.jpg" alt="item image">
        </div>
        <div class="itemInfo">
            <div class="itemName">
                <h3><?=$item['name']?></h3>
            </div>
            <div class="itemPrice">
               <h4>Цена:  <?=$item['price']?> руб.</h4> 
            </div>
            <div class="buyBtn">
                <button class="buy" id="buyBtn" data-itemid=<?=$item['id']?> data-session=<?=session_id()?>><b>BUY</b></button>
            </div>
            <h5>Описание товара:</h5> 
            <div class="itemDescription">
                <p><?=$item['s_describ']?></p>
            </div>
        </div>
    </div>
    <div class="itemFeedback">
        <div id="feedbackHeader">
            <div class='feedbackHeaderItem'>
                <h4>Отзывы о товаре:</h4>
            </div>
            <div class='feedbackHeaderItem'>
                <button onclick="showForm()">add feedback</button>
            </div>
        </div>
        <div id="feedbackForm" style="display:none">
            kemf;kms;l
        </div>
        <div class="feedbackDesk">
            <div class="oneFeedback">
                <? if(count($feedback) == 0): ?> 
                    Для данного товара пока нет отзывов.
                <? endif ?>
                <? if(count($feedback) != 0): ?> 
                    <?php foreach ($feedback as $post):?>
                        <div class="feedbackItem">
                            <div class="feedbackHeader"> 
                                <div class="feedbackAuthor">                         
                                    автор: <b><?=$post['author']?></b>
                                </div>
                                <div class="feedbackDate">
                                    <?=$post['date']?>
                                </div>
                            </div>
                            <div class="feedbackText">    
                                <?=$post['feedback']?>
                            </div>
                        </div>    
                    <? endforeach;?>    
                <? endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    function showForm(){
        document.getElementById('feedbackForm').style.display = "block";
    }


    const btn = document.getElementById('buyBtn');
    btn.addEventListener('click', function(e){
        const data ={
            operand1: btn.dataset.itemid,
            operand2: btn.dataset.session,
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
    });
</script>
