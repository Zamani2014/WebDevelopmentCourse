<?php 

function GetLastID($tableName)
{
    try
    {
        $servername = "localhost";
        $username = "root";
        $password = "password";
        
        $conn = new PDO("mysql:host=$servername;dbname=AfarinDB", $username);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        
        $query = "SELECT MAX(ID) FROM `$tableName`;";
        $stmt  = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_NUM);

        if($result != null) {
            foreach ($stmt as $row) {
                return $row[0];
            }
        }
        else {
            return 0;
        }
        
    }
    catch (Exception $ex)
    {
        echo $ex->getMessage();
    }
}
