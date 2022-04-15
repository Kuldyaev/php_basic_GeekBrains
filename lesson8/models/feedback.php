<?php

function getGFeedback($goods_id) {
    return getAssocResult("SELECT id, author, date, feedback  FROM feedback WHERE goods_id = {$goods_id} ORDER BY id DESC");
}