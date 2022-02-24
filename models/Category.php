<?php
    class Category 
    {
        // DB stuff
        private $conn;
        private $table = 'categories';

        //Properties
        public $id;
        public $name;
        public $created_at;

        // Constructor with DB
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // Get categories
        public function read()
        {
            // create query
            $query = 
            '
                SELECT
                    id,
                    name,
                    created_at
                FROM
                    ' . $this->table . '
                ORDER BY
                    created_at DESC
            ';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // execute statement
            $stmt->execute();

            return $stmt;
        }
    }