<br/>
<?php foreach ($catalog as $img):?>
    <div class="imgCard">
        <div class="imgheader">
            <div class="imgtitle"><?=$img['title']?></div>
            <div class="imginfo">
                <div class="imgviews">views: <?=$img['views']?></div>
                <div class="imgdelete">
                    <? if($is_admin) :?>
                        <a href="catalog/?id=<?=$img['id']?>&action=delete">X</a>
                    <? endif; ?>
                </div>
            </div>
        </div>
        <a href="/oneimg/?id=<?=$img['id']?>" class="imglink"><img src="images/imgs_small/<?=$img['id']?>.jpg" alt="small img" class="imgimg"></a>
    </div>
<?php endforeach;?>