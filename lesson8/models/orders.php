<?php

function getOrders() {
    return getAssocResult("SELECT orders.id, users.name AS username, orders.items, amount, open_date, close_date, orders_status.name AS orderstatus FROM orders, users, orders_status 
                            WHERE  users.id  =  orders.user AND orders_status.id = orders.status ORDER BY open_date DESC");
}

function getUserOrders($user) {
    return getAssocResult("SELECT orders.id, users.name AS username, orders.items, amount, open_date, close_date, orders_status.name AS orderstatus FROM orders, users, orders_status 
                            WHERE  users.id  =  orders.user AND orders_status.id = orders.status AND users.name = '{$user}' ORDER BY open_date DESC");
}

function lastOrderId(){
    return getOneResult("SELECT id FROM orders ORDER BY id DESC LIMIT 1");
}

function makeOrder($user, $sum, $items, $hash){
    executeSql("INSERT INTO orders (user, items, amount, open_date, status) VALUES ($user,'{$items}','{$sum}', CURRENT_DATE(), 1)");
    $lastid = lastOrderId()['id'];
    return  executeSql("UPDATE current_cart SET cart_id = $lastid WHERE  cart_id = '{$hash}'");
}

function getUserId($username){
   return getOneResult("SELECT id FROM users WHERE users.name = '{$username}'");
}

function deleteOrder($orderid){
    return executeSql("DELETE FROM orders WHERE id = $orderid");
}

