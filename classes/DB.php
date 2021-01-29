<?php 

    class DB {
        private $host   = "localhost";
        private $user   = "root";
        private $pass   = "";
        private $dbNmae = "register-with-pdo-oop";

        public function connect() {
            try {
                $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbNmae;
                $pdo = new PDO($dsn, $this->user, $this->pass);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            } 
            catch (PDOException $e) {
                echo "Error: " .$e->getMessage();
            }
            
        }
    }

?>