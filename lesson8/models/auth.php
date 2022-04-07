<?php

function auth($login, $pass){
    $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($login)));
    $passDb = getOneResult("SELECT * FROM users WHERE users.name='{$login}'");
    if(password_verify($pass, $passDb['password'])){
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $passDb['id'];
        $_SESSION['role'] = $passDb['role'];
        return true;
    }
    return false;
}

function is_auth(){
    if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
        $hash = $_COOKIE['hash'];
        $user = getAssocResult("SELECT * FROM `users` WHERE `hash` = '{$hash}'")[0]['login'];
        if (!empty($user)){
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']);;
}

function get_user() {
    return $_SESSION['login'];
}

function is_admin(){
    if (isset($_SESSION['role'])){
        if ($_SESSION['role'] == '1'){
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function addHashForUser($id, $hash){
    executeSql("UPDATE `users` SET `hash` = '{$hash}' WHERE `id` = '{$id}'");
}