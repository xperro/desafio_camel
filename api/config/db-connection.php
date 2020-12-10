<?php
class Database {
    private $host = "mysql";
    private $db_name = "mydb";
    private $username = "root";
    private $password = "root";

    public $connection;
    public function do_Connection(){
        $this->connection = null;
        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";port=3306;dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection Failed: " . $exception->getMessage();
        }
        return $this->connection;
    }
}
?>