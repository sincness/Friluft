<?php
include '../../class/db.php';
        $getUrlId = 1;
        $search_output = DB::query("SELECT users.username FROM users WHERE users.username LIKE :username", array(":username"=>"%".$_POST['search']."%"));
        $username = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$getUrlId))[0]['username'];

        echo ($username);