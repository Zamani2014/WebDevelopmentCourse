<?php
//namespace Phppot;
//use \Phppot\Member;
$displayName;
if (!empty($_SESSION["userId"])) {
    require_once __DIR__ . 'src/Member.php';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["FirstName"])) {
        $displayName = ucwords($memberResult[0]["FirstName"]);
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
    <link rel="stylesheet" type="text/css" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="styles/nivo-slider.css" type="text/css" media="screen" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script> 

    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider({
                directionNav:true,
                controlNav:true
            });
        });
    </script> 
 </head>
<body>
    <div id="Container" class="borderClass">
        <?php include 'header.php' ?>
        <div id="mainContent" class="borderClass">
            <h1>به آفرین وب خوش آمدید!</h1>
            <h2>یادگیری سریع طراحی و توسعه وب و اپلیکیشن.</h2>
            <p>
                حتما با اصطلاح برنامه نویسی آشنا هستید. برنامه نویسی در اصطلاح به قرار دادن کدهای از پیش تعریف شده در کنار هم در چهارچوب یک زبان برنامه نویسی خاص گفته می شود که در نهایت برنامه نویس یک فایل کامپایل شده داردکه می تواند آن را در اختیار دیگران قرار دهد.اما اگر همین کدها رو برای ایجاد یک سرویس آنلاین در کنار هم قرار بدهیم برنامه نویسی تحت وب نامیده می شود. به عنوان مثال یک نرم افزار حسابداری تحت وب که یک سرویس حسابرسی تحت وب ارائه می دهد و یا یک وب سایت رو با زبانهای برنامه نویسی تحت وب می نویسند.            </p>
            <!--<img src="images/web-development.jpg" width="770" height="250" />-->
            <div id="slider" class="nivoSlider">
                <img src="images/toystory.jpg" data-thumb="images/toystory.jpg" alt="" />
                <img src="images/up.jpg" data-thumb="images/up.jpg" alt="" title="This is an example of a caption" />
                <img src="images/walle.jpg" data-thumb="images/walle.jpg" alt="" data-transition="slideInLeft" />
                <img src="images/nemo.jpg" data-thumb="images/nemo.jpg" alt="" title="#htmlcaption" />
            </div>
        </div>
        <div id="sidebar" class="borderClass">
            <?php include 'menu.php' ?>
        </div>
        <div id="footer" class="borderClass">
            <?php include 'footer.php'?>
            <p>کلیه حقوق مادی و معنوی نرم افزار و محتوای این سایت محفوظ است.</p> 
        </div>
    </div>
</body>
</html>