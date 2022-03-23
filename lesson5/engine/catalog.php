<?php

function getImgs() {
    return getAssocResult("SELECT id, title, views FROM imgs ORDER BY views DESC");
}

function getOneImg($id) {
    return getOneResult("SELECT id, title, way, views FROM imgs WHERE id = {$id}");
}