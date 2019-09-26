
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
class DB {
    private static function connect () {
        $pdo = new PDO('mysql:host=localhost;dbname=db;charset=utf8', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    public static function query($query, $param = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($param);
        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}
// $message = DB::query("SELECT * FROM users");
// print_r( $message );
// echo implode( ", ", $message );
// foreach($message as $value){
//     //Print the element out.
//     echo ''.$value['message'].'';
// }