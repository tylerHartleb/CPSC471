<?php
class Test{
    // database connection and table name
    private $conn;
    private $table_name = "Test";
    private $orders_table = "Orders";
    private $mr_tests_table = "MR_Tests";
    private $database = "HealthDatabase";
    
    // Object Properties
    public $TName;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    function read(){
        $query =   "SELECT
                    *
                    FROM
                        ".$this->database . "." . $this->table_name ."";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);
        
        //execute query
        $stmt->execute();
        return $stmt;
    }

    function readOrders(){
        $query =   "SELECT
                    *
                    FROM
                        ".$this->database . "." . $this->orders_table ."";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);
        
        //execute query
        $stmt->execute();
        return $stmt;
    }

    function readMR_Tests(){
        $query =   "SELECT
                    *
                    FROM
                        ".$this->database . "." . $this->mr_tests_table ."";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);
        
        //execute query
        $stmt->execute();
        return $stmt;
    }

    
    function getTests($Test_ID) {
        $query =   "SELECT *
                    FROM $this->database.$this->table_name as t
                    WHERE t.Test_ID = $Test_ID";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->execute();
        return $stmt;
    }
    
    function post($TName, $Test_ID, $Date, $Result) {
        $query =   "INSERT INTO $this->database.$this->table_name(TName, Test_ID, Date, Result) VALUES
                    (?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$TName, $Test_ID, $Date, $Result]);
        return $stmt;
    }

    function getMax() {
        $query =   "SELECT MAX(Test_ID) as largestID
                    FROM $this->database.$this->table_name";
        
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();
        return $stmt;
    }

    function delete($Test_ID) {
        $query =   "DELETE FROM $this->database.$this->table_name as p
                    WHERE p.Test_ID = $Test_ID";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        echo "\nTest deleted\n";
    }

    function edit_result($Test_ID, $Result) {
        $query =   "UPDATE $this->database.$this->table_name as p
                    SET p.Result = '$Result'
                    WHERE p.Test_ID = $Test_ID";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        echo "\nResult Updated!\n";
    }
}

?>