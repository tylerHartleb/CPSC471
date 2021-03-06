<?php
class Dependent {
    // database connection and table name
    private $conn;
    private $table_name = "Dependent";
    private $database = "HealthDatabase";

    // Object properties
    public $SIN;
    public $D_SSN;
    public $Relationship;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query =   "SELECT 
                    *
                    FROM
                        ". $this->database . "." . $this->table_name ."";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query); 

        //execute query 
        $stmt->execute();
        return $stmt;
    }

    public function returnAllDependents($SIN){
        $query =   "SELECT *
                    FROM $this->database.$this->table_name as d
                    WHERE d.SIN = $SIN";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();
        return $stmt;
    }

    function post($SIN, $D_SIN, $Relationship) {
        $query =   "INSERT INTO $this->database.$this->table_name(SIN, D_SIN, Relationship) VALUES
                    (?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$SIN, $D_SIN, $Relationship]);
        echo "\nNew record created successfuly";
    }

    function delete($SIN, $DSSN) {
        $query =   "DELETE FROM $this->database.$this->table_name as d
                    WHERE d.SIN = $SIN AND d.D_SIN = $DSSN";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        echo "\nDependent deleted\n";
    }

    function edit($SIN, $D_SSN, $Relationship) {
        $query =   "UPDATE $this->database.$this->table_name as d
                    SET d.Relationship = '$Relationship'
                    WHERE d.SIN = $SIN AND d.D_SIN = $D_SSN";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        echo "\nInformation updated\n";
    }
}

?>