<?php
//namespace Phppot;
//use \Phppot\Member;
if (!empty($_SESSION["userId"])) {
    require_once __DIR__ . '../src/Member.php';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["FirstName"])) {
        $displayName = ucwords($memberResult[0]["FirstName"]);
    } else {
        $displayName = $memberResult[0]["UserName"];
    }
}
else{
    $displayName = "عزیز";
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
 </head>
<body>
    <div id="Container" class="borderClass">
        <?php include '../header.php' ?>
        <div id="mainContent" class="borderClass">
            <h1>به صفحه مدیریت آفرین وب خوش آمدید!</h1>
            <h2>کاربر محترم، <?php echo $displayName; ?> به بخش مدیریت خوش آمدید.</h2>
            <hr>
            
        </div>
        <div id="sidebar" class="borderClass">
        <ul id='mainMenu'>
            <li><a href='index.php'>صفحه اصلی</a></li>
            <li><a href='Add.php'>افزودن مطلب جدید</a></li>
            <li><a href='Manage.php'>مدیریت مطالب</a></li>
            <li><a href='../logout.php'>خروج از سیستم</a></li>
        </ul>
        </div>
        <div id="footer" class="borderClass">
            <?php include '../footer.php'?>
            <p>کلیه حقوق مادی و معنوی نرم افزار و محتوای این سایت محفوظ است.</p> 
        </div>
    </div>
</body>
</html>