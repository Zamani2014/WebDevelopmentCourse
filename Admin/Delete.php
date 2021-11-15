<?php
    require_once("../src/DB.php");
    
    if(isset($_GET['id'])){
    $id=$_GET['id'];    
    $sql="DELETE FROM ContentTbl where id= :id";    
    try{
        $st=$conn->prepare($sql);
        $st->bindValue(":id", $id);
        $st->execute();
        header("Location: Manage.php");
    }
    catch(PDOException $e){
        echo "An Error Occured: ". $e->getMessage();
    }
    }
    else{
        echo "<h1>Wrong Request</h1>";
    }
    
    $conn=null;
?>