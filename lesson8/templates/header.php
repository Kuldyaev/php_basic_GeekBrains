<header>
    <div class="projectName">
        ДЗ к Базовому курсу РНР от <a href="https://www.gb.ru" class="projectName">GeekBrains</a>
    </div>
    <div class="authBlock">
        <div class="orderPlace">
            <? if($auth) : ?>
              <a href="/orders"><button>Orders</button></a>  
            <? endif; ?>
        </div>
        <div class="cartPlace">
            <a href="/cart"><button>Cart</button></a>    
        </div>
        <div class="regPlace" style="margin-left:10px">    
            <?if ($auth) :?>
                <a href="/?logout"><button id='outBtn'>LogOut</button></a>
            <? else :?>
                <a href="/login"><button>LogIn</button></a>
            <? endif; ?>
        </div>
    </div>     
</header>