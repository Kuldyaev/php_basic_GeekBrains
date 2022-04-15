<?php

function getCart($cart_id) {
    $myCart = (int)$cart_id;
    return getAssocResult("SELECT current_cart.id AS id, goods.name, current_cart.quantity, goods.price, goods.id AS good_id FROM current_cart, goods WHERE cart_id = $myCart AND goods.id = current_cart.item_id");
}

function removeItemFromCart($id, $cart_id){
    $myLine = (int)$id;
    return executeSql("DELETE FROM current_cart WHERE cart_id = '$cart_id' AND id = $myLine");
}

function incremQuantityInCart($goods_id, $cart_id){
    $myItem = (int)$goods_id;
    executeSql("UPDATE current_cart SET quantity = quantity + 1 WHERE  cart_id = '$cart_id' AND item_id = $myItem");
    return getOneResult("SELECT quantity FROM current_cart WHERE cart_id = '$cart_id' AND item_id = $myItem");
}

function decremQuantityInCart($goods_id, $cart_id){
    $myItem = (int)$goods_id;
    executeSql("UPDATE current_cart SET quantity = quantity - 1 WHERE  cart_id = '$cart_id' AND item_id = $myItem");
    return getOneResult("SELECT quantity FROM current_cart WHERE cart_id = '$cart_id' AND item_id = $myItem");
}

function getItemInCart($goods_id, $cart_id) {
    $myItem = (int)$goods_id;
    return getAssocResult("SELECT item_id FROM current_cart WHERE cart_id = '$cart_id' AND item_id = $myItem");
}

function addItemToCart($goods_id, $cart_id){
    return executeSql("INSERT INTO current_cart (item_id, quantity, cart_id) VALUES ( $goods_id, 1, '$cart_id')");
}