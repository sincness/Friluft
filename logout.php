<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'content/class/db.php';
include 'content/class/loginclass.php';

if (!Login::isLoggedIn()) {
        die("Ikke logget ind.");
}

if (isset($_POST['confirm'])) {

        if (isset($_POST['alldevices'])) {

                DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));

        } else {
                if (isset($_COOKIE['SNID'])) {
                        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
                }
                setcookie('SNID', '1', time()-3600);
                setcookie('SNID_', '1', time()-3600);
        }

}

?>
<h1>Vil du logge ud af din bruger?</h1>
<p>Er du sikker på at du vil logges af??</p>
<form action="logout.php" method="post">
        <input type="checkbox" name="alldevices" value="alldevices"> Log ud af alle enheder?<br />
        <input type="submit" name="confirm" value="Confirm">
</form>
