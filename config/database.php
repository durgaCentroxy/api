<?php
    class database{
        //specifing the database credentials
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "first_api";
        public $conn;
        //connecting to the databse
        public function getConnection()
        {
            $this->conn = NULL;
            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";db=" . $this->db, $this->user, $this->password);
                $this->conn->exec("some names utf-8");
                echo "Connected";
            } catch (PDOException $exception) {
                echo "Connection error" . $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>