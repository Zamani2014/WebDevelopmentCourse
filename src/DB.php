<?php
// PDO
$servername = "localhost";
$username = "root";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername;dbname=AfarinDB", $username);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>


<?php
//$servername = "localhost";
//$username = "username";
//$password = "password";

//try {
//  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
 // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // $sql = "CREATE DATABASE myDBPDO";
  // use exec() because no results are returned
 // $conn->exec($sql);
 // echo "Database created successfully<br>";
//} catch(PDOException $e) {
 // echo $sql . "<br>" . $e->getMessage();
//}

//$conn = null;
?>