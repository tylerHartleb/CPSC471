<?php
class Diagnosis {
    // database connection and table name
    private $conn;
    private $table_name = "Diagnosis";
    private $database = "HealthDatabase";

    // Object properties
    public $Condition;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
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

    function post($Condition) {
        $query =   "INSERT INTO $this->database.$this->table_name(`Condition`) VALUES
                    (?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$Condition]);
        echo "\nNew record created successfuly";
    }

    function returnPost($Condition) {
        $query =   "INSERT INTO $this->database.$this->table_name(`Condition`) VALUES
                    (?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$Condition]);
    }
    
    function findCond($Condition){
        $query =   "SELECT *
                    FROM $this->database.$this->table_name as d
                    WHERE d.condition = '$Condition'";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->execute();
        return $stmt;
    }

    function delete($Condition) {
        $query =   "DELETE FROM $this->database.$this->table_name as d
                    WHERE d.Condition = '$Condition'";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        echo "\nDiagnosis deleted\n";
    }
}
?>