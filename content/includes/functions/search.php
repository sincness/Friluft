<?php
include '../../class/db.php';
$getUrlId = 1;
if (isset($_GET['val'])) {
    $get_search_val = $_GET['val'];

    $search_output = DB::query("SELECT users.id, users.username FROM users WHERE users.username LIKE :username", array(":username"=>"%".$get_search_val."%"));
    
    foreach ($search_output as $val) {
        echo '<a href="profile.php?id='. $val['id'].'">'. $val['username'] . '</a>';
    }
}