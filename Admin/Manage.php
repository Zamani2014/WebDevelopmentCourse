<?php
//namespace Phppot;
//use \Phppot\Member;
require "../src/DB.php";

if (!empty($_SESSION["userId"])) {
    require_once __DIR__ . './src/Member.php';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["FirstName"])) {
        $displayName = ucwords($memberResult[0]["display_name"]);
    } else {
        $displayName = $memberResult[0]["UserName"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--  <base href="http://www.AfarinWeb.ir/"/> -->
    <link rel="stylesheet" type="text/css" href="../styles/styles.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <script>
    function removes(id){
         
        var ans = confirm("آیا برای حذف این مورد اطمینان دارید؟");
        if(ans){//if true delete row
            window.location.assign("delete.php?id="+id);
        }
        else{//if false 
            // do nothing
        }
    }
     
     
    </script>
 </head>
<body>
    <div id="Container" class="borderClass">
        <?php include '../header.php' ?>
        <div id="mainContent" class="borderClass">
            <h1>مدیریت مطالب</h1>
            <hr>
            <?php
                //we create a table
                echo "<table>";
                // create table th 
                echo "<tr > <th> شناسه </th> <th> موضوع </th> <th> محتوا </th> <th> تاریخ ایجاد </th> </tr>";
                $sql=" SELECT * FROM ContentTbl ";
                $st=$conn->prepare($sql);
                $st->execute();
                $total=$st->rowCount();//get the number of rows returned
                if($total < 1 ){//if no row was returned
                    echo "<tr> <td style> No Data: DataBase Empty </td> ";//print out error message
                    echo "<td> No Data: DataBase Empty </td> ";//print out error message
                    echo " <td> No Data: DataBase Empty </td>";//print out error message
                    echo " <td> No Data: DataBase Empty </td>";//print out error message
                    echo "<td> No Data: DataBase Empty  </td>";//print out error message
                    
                }
                    else{
                    while($res = $st->fetchObject()){//loop through the returned rows
                        echo "<tr>";
                        echo "<td> $res->ID </td> <td> $res->Subject </td> <td> محتوای مطلب </td> <td> $res->DateTime </td> <td> <a href=# onclick=removes($res->ID)> حذف مورد </a> </td>";
                        echo"</tr>";
                    }
                }
                echo "</table>";
                ?>
            
        </div>
        <div id="sidebar" class="borderClass">
        <ul id='mainMenu'>
            <li><a href='index.php'>صفحه اصلی</a></li>
            <li><a href='Add.php'>افزودن مطلب جدید</a></li>
            <li><a href='Manage.php'>مدیریت مطالب</a></li>
        </ul>
        </div>
        <div id="footer" class="borderClass">
            <?php include '../footer.php'?>
            <p>کلیه حقوق مادی و معنوی نرم افزار و محتوای این سایت محفوظ است.</p> 
        </div>
    </div>
</body>
</html>