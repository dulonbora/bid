<?php
    class Kanexon{
        private $conn = null;
        
        private $hostname="localhost";
        private $username="geohaunt";
        private $password="#Assam2015";
        public function getDb(){
                $this->conn = new PDO("mysql:host=$this->hostname;dbname=servers88;charset=utf8",  $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
                return $this->conn;
        }


}?>