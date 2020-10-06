<?php
class DB_connect {
    static $db;
    static $connect;

    private function __construct(){
        self::$connect = new PDO('mysql:host=localhost;dbname=eshop','root','root');
    }
    public static function getObject(){
        if(self::$db == null){
            self::$db =new self();

        }
        return self::$db;

    }
    public function dbSelect ($sqlQuery){
        try{
        $result = self::$connect->query($sqlQuery);
        }
        catch (PDOException $pdoError){
            die ('Error: '.$pdoError->getMessage());
        }
        return $result;
    }
    public function dbExec ($sqlQuery){
        try{
        $result = self::$connect->exec($sqlQuery);
        }
        catch (PDOException $pdoError){
            die ('Error: '.$pdoError->getMessage());
        }
        return $result;
    }
}   

?>