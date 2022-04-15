<?php

function getImgs() {
    return getAssocResult("SELECT id, title, views FROM imgs ORDER BY views DESC");
}

function getOneImg($id) {
    return getOneResult("SELECT id, title, way, views FROM imgs WHERE id = {$id}");
}

function  addViewsToImage($id) {
    return executeSql("UPDATE imgs SET views = views + 1 WHERE id = $id");
}

function  deleteImageById($id) {
    return executeSql("DELETE FROM imgs WHERE id = $id");
}