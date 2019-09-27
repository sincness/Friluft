<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'content/class/db.php';
include 'content/class/loginclass.php';



if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password'])) {
                        $welcome = 'Velkommen til '.$username.'!';
                        $message = '<br><a href="logout.php">Log ud!</a>';
                        // $chkmark = 1;
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
                        DB::query('INSERT INTO login_tokens VALUES (id, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                        

                } else {
                        $message = 'Forkert kodeord';
                }

        } else {
                $message = 'Bruger findes ikke';
        }

}

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="content/css/login.css">
    <title>Login</title>
</head>
<body>
    <form autocomplete="off" method="POST" class="loginform">
        <h2 class="loginform__headline">Log ind</h2>
        
        <?php
        if (isset($message)) {
          echo '<p class="loginform__message">'.$message.'</p>';
        }
        if (isset($welcome)) {
          echo '<p class="loginform__welcome">'.$welcome.'</p>';
        }
        ?>
        
        <section class="loginform__container">
            <section class="loginform__inputcontainer">
                <label for="username" class="loginform__label">E-mail / Brugernavn</label>
                <input type="text" class="loginform__input" name="username" id="username">
            </section>
            <section class="loginform__inputcontainer">
                <label for="password" class="loginform__label">Kodeord</label>
                <input type="password" class="loginform__input" name="password" id="password">
            </section>
        </section>
        <p class="loginform__p">Jeg har glemt mit <a href="#" class="loginform__link"> kodeord</a> </p>
        <p class="loginform__p">Opret en <a href="register.php" class="loginform__link">bruger</a> </p>
        <button name="login" id="login">Log ind</button>

    </form>
</body>
</html>






 

 <!-- Stylesheet -->
 <!-- <link rel="stylesheet" href="content/css/style.css" />
 <title>Login</title>
<main class="main">
  <section id="notice">
    <div id="box">
      <form method="post" name="login-form" class="login">
        <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
        <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
        <button name="login" type="submit" onclick="validate();" id="btn">Login</button>
        <?php  
        if(isset($chkmark))  
        {  
        echo '<svg id="checkmark" class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>';
        
        // sleep(5);
        header("<script>setTimeout (function(){</script>Location: login_success.php<script>}, 2000);</script>", true, 303);
        exit;
        }  
        ?> 
        <p class="text" id="text"></p>
      </form>
    </div>
  </section>
</main>
-->