<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'content/class/db.php';
    $status = 1;
    $date = date('Y/m/d');



if (isset($_POST['register'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $email = $_POST['email'];
        $reemail = $_POST['reemail'];
        $address = $_POST['address'];
        $postnumber = $_POST['postnumber'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];

        


        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (strlen($username) >= 3 && strlen($username) <= 32) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                                if (strlen($password) >= 6 && strlen($password) <= 60) {
                                    
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if ($email == $reemail) {
                                    
                                    if ($password == $repassword) {

                                        if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                            DB::query('INSERT INTO users VALUES (id, :fullname, :username, :password, :email, :address, :postnumber, :city, :phone, :date, :status)', array(':fullname'=>$fullname, ':username'=>$username, ':password'=>$password, ':email'=>$email, ':address'=>$address, ':postnumber'=>$postnumber, ':city'=>$city, ':phone'=>$phone, ':date'=>$date, ':status'=>$status));

                                            // DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, \'0\', \'\')', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
                                            echo "Success!";
                                    } else {
                                            echo 'Email er allerede i brug!';
                                    }

                                } else { 
                                    echo 'Kodeord stemmer ikke overens!';
                                }  
                                } else {
                                    echo 'Email stemmer ikke overens';
                                }                               
                                 
                        } else {
                                        echo 'Ugyldig email!';
                                }
                        } else {
                                echo 'Ugyldigt kodeord!';
                        }
                        } else {
                                echo 'Ugyldigt brugernavn';
                        }
                } else {
                        echo 'Ugyldigt brugernavn';
                }

        } else {
                echo 'Brugeren findes allerede!';
        }
}
?>


<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="content/css/register.css">
    <title>Register</title>
</head>
<body>
     <form method="POST" class="registerform">
        <h2 class="registerform__headline">Registrer</h2>
        <section class="registerform__col1">
            <section class="registerform__inputcontainer">
                <label for="fullname" class="registerform__label">Fulde navn</label>
                <input type="text" class="registerform__input" name="fullname" id="fullname">
            </section>
            <section class="registerform__inputcontainer">
                <label for="username" class="registerform__label">Brugernavn</label>
                <input type="text" class="registerform__input" name="username" id="username">
            </section>
            <section class="registerform__inputcontainer">
                <label for="email" class="registerform__label">E-mail</label>
                <input type="email" class="registerform__input" name="email" id="email">
            </section>
            <section class="registerform__inputcontainer">
            <label for="reemail" class="registerform__label">Gentag e-mail</label>
            <input type="email" class="registerform__input" name="reemail" id="reemail">
            </section>
            
            <section class="registerform__inputcontainer">
            <label for="password" class="registerform__label">Kodeord</label>
            <input type="password" class="registerform__input" name="password" id="password">
            </section>
            
        </section>
        <section class="registerform__col2">
            <section class="registerform__inputcontainer">
                <label for="repassword" class="registerform__label">Gentag kodeord</label>
                <input type="password" class="registerform__input" name="repassword" id="repassword">
            </section>
            <section class="registerform__inputcontainer">        
                <label for="address" class="registerform__label">Adresse</label>
                <input type="text" class="registerform__input" name="address" id="address">
            </section>
            <section class="registerform__inputcontainer">
                <label for="postnumber" class="registerform__label">Postnummer</label>
                <input type="number" class="registerform__input" name="postnumber" id="postnumber">
            </section>
            <section class="registerform__inputcontainer">
                <label for="city" class="registerform__label">By</label>
                <input type="text" class="registerform__input" name="city" id="city">
            </section>
            <section class="registerform__inputcontainer">
                <label for="phone" class="registerform__label">Telefon</label>
                <input type="number" class="registerform__input" name="phone" id="phone">
            </section>
        </section>
        <section class="registerform__checkcontainer">
            <input type="checkbox" name="check" id="check">
            <label for="check" class="registerform__terms">Jeg accepterer servicevilkår og brugervilkår</label>
        </section>
        <button name="register" id="register">Registrer</button>
     </form>
</body>
</html>