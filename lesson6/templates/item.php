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
                <button class="buy"><b>BUY</b></button>
            </div>
            <h5>Описание товара:</h5> 
            <div class="itemDescription">
                <p><?=$item['s_describ']?></p>
            </div>
        </div>
    </div>
    <div class="itemFeedback">
        <h4>Отзывы о товаре:</h4>
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
