<?php
    //include_once '../config/Environment.php';
    
    class Database 
    {
        // DB Parameters
        private $host = 'localhost';
        private $db_name = 'myblog';
        private $username = null;
        private $password = null;
        private $conn;

        //Constructor

        public function __construct()
        {
            $this->username = getenv('USERNAME');
            $this->password = getenv('PASSWORD');
        }
        
        // DB Connect
        public function connect()
        {
            $this->conn = null;

            try 
            {
                //$this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username);
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch (PDOException $e) 
            {
                echo 'Connection Error: ' . $e->getMessage();
            }
            return $this->conn;
        }
    }