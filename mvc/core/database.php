<?php
    class DataBase{
        protected $conn;
        protected $servername="localhost";
        protected $username="cuongnguyen";
        protected $password="cuong28021999";
        protected $dbname="appql";
        function __construct()
        {
            $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            $this->conn->query("SET names 'utf8'");
        }
        function query($stringQuery){
            
        }
    }
?>