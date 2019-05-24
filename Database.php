<?php
    require_once 'config.php';

    class Database
    {

        private $conn;

        function __construct()
        {
            $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }else {
                $this->conn = $conn;
            }
        }

        function __destruct() 
        {
            if($this->conn)
                $this->conn->close();
        }

        function getIntervals()
        {   
            $out = array();
            $sql = "SELECT * FROM intervals";
            foreach ( $this->conn->query($sql) as $row ) {
                array_push($out, $row);
            }
            return $out;
        }
        
        function insertInterval(int $start_date, int $end_date, float $price)
        {
            $sql= "INSERT INTO intervals(start_date, end_date, price) VALUES ({$start_date},{$end_date},{$price})";
            $query = $this->conn->prepare($sql);
            return $query->execute();
        }

        function updateInterval(int $interval_id, int $start_date, int $end_date, float $price)
        {
            $sql="  UPDATE intervals
                    SET start_date={$start_date}, 
                        end_date ={$end_date}, 
                        price ={$price} 
                    WHERE id = {$interval_id}";
            $query = $this->conn->prepare($sql);
            return $query->execute();
        }

        function deleteIntervals()
        {
            $sql= "TRUNCATE TABLE intervals";
            $query = $this->conn->prepare($sql);
            return $query->execute();
        }
    }
?>