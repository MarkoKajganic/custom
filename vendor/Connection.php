<?php

 class Connection
 {
     private $dbSettings;
     private $connection;

     public function __construct($db){
         $this->dbSettings = $db;
//         exit();
    }

     protected function OpenCon()
     {
         $dbhost = $this->dbSettings['dbName'];
         $dbuser = "root";
         $dbpass = "root";
         $db = "quantox";
         $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

         $this->connection = $conn;
     }

     protected function CloseCon()
     {
         $this->connection->close();
     }

     public function query(string $query) {
         $this->OpenCon();

         $retVal = $this->connection->query($query);

         $this->CloseCon();

         return $retVal;
     }


 }