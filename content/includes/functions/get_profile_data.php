<?php
include 'content/class/db.php';

if (htmlspecialchars($_GET["id"])) {
    $getUrlId = htmlspecialchars($_GET["id"]);
    if(    $username = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$getUrlId))) {
        $username = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$getUrlId))[0]['username'];
        $postnumber = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$getUrlId))[0]['postnumber'];
        $city = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$getUrlId))[0]['city'];
        $phone = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$getUrlId))[0]['phone'];
        $date = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$getUrlId))[0]['date'];
    } else {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}