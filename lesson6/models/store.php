<?php

function getGoods() {
    return getAssocResult("SELECT id, name, price FROM goods");
}

function getOneGoodsCard($id) {
    return getOneResult("SELECT id, name, price, s_describ FROM goods WHERE id = {$id}");
}