<?php
session_start();
    if(!empty($_SESSION["userId"])) {
        echo "<div id='header' class='borderClass'>
            <div id='memberDiv'><a href='logout.php'>خروج</a>&nbsp;|&nbsp;سلام </div>

            <!--  <h1>Web Design and Development Course</h1>-->
            <h1 id='website-name'>شرکت آفرین وب</h1>
            <h2 id='desc'>ارائه دهنده خدمات آموزش فناوری اطلاعات</h2>
        </div>";
    } else {
        echo "<div id='header' class='borderClass'>
            <div id='memberDiv'><a href='login.php'>ورود</a>&nbsp;|&nbsp;<a href='Register.php'>ثبت نام</a></div>

            <!--  <h1>Web Design and Development Course</h1>-->
            <h1 id='website-name'>شرکت آفرین وب</h1>
            <h2 id='desc'>ارائه دهنده خدمات آموزش فناوری اطلاعات</h2>
        </div>";
    }
    
?>


