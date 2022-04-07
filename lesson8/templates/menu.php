<nav>
    <div class='leftpart'>
        <a href="/" class="menuItem">Главная</a>
        <a href="/store" class="menuItem">Витрина</a>
        <a href="/catalog" class="menuItem">Галерея</a>
        <a href="/calc1" class="menuItem">Калькулятор1</a>
        <a href="/calc2" class="menuItem">Калькулятор2</a>
        <? if( isset($_SESSION['login'])) : ?>
            <a href="/orders" class="menuItem">Заказы</a> 
        <? endif; ?>
    </div>
    <div class='leftpart'>
       <p class="menuItem">Вы работаете на сайте как <?= $_SESSION['login']??'guest' ?></p>
    </div>
</nav>