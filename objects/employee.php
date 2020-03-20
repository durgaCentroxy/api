<?php
    class employee{
    //database connection and table name
    private $conn;
    private $table = "employee";

    //object prooperties
    public $id;
    public $name;
    public $mail;
    public $number;

    public function __construct($db){
        $this -> conn = $db;
    }
    function read(){
        $query = "SELECT 'id', 'name', 'mail', 'number' FROM 'employee' ";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        return $statement;
    }
}
?>