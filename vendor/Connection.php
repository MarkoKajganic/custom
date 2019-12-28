<?php

 class Connection
 {
     protected $dbSettings;
     protected $connection;

     public function __construct($db){
         $this->dbSettings = $db;
    }

     protected function OpenCon()
     {
         $dbhost = $this->dbSettings['dbLocation'];
         $dbuser = $this->dbSettings['dbUser'];
         $dbpass = $this->dbSettings['dbPass'];
         $db = $this->dbSettings['dbName'];
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