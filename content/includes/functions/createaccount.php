<?php
include '../../class/db.php';
    $status = 1;
    $date = date('d/m/Y h:i:s', time());
    // $email = $_POST['email'];
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    // if(!DB::)
    DB::query('INSERT INTO users VALUES (id, :username, :password, :email, :address, :postnumber, :city, :phone, date, :status)', array(':username'=>$username, ':password'=>$password, ':email'=>$email, ':address'=>$address, ':postnumber'=>$postnumber, ':city'=>$city, ':phone'=>$phone, ':date'=>$date, ':status'=>$status));




if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $postnumber = $_POST['postnumber'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];


        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (strlen($username) >= 3 && strlen($username) <= 32) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                                if (strlen($password) >= 6 && strlen($password) <= 60) {
                                    
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if ($password == $repassword) {

                                        if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                            DB::query('INSERT INTO users VALUES (id, :username, :password, :email, :address, :postnumber, :city, :phone, :date, :status)', array(':username'=>$username, ':password'=>$password, ':email'=>$email, ':address'=>$address, ':postnumber'=>$postnumber, ':city'=>$city, ':phone'=>$phone, ':date'=>$date, ':status'=>$status));

                                            // DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, \'0\', \'\')', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
                                            echo "Success!";
                                    } else {
                                            echo 'Email er allerede i brug!';
                                    }

                                } else { 
                                    echo 'Kodeordet stemmer ikke overens!';
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