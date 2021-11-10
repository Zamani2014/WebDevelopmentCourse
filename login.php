<!DOCTYPE html>
<?php require "src/PrintError.php"; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <script>
    function validate() {
        var $valid = true;
        document.getElementById("uname").innerHTML = "";
        document.getElementById("pwd").innerHTML = "";
        
        var userName = document.getElementById("uname").value;
        var password = document.getElementById("pwd").value;
        if(userName == "") 
        {
            document.getElementById("uname").innerHTML = "وارد کردن نام کاربری صروری است.";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("pwd").innerHTML = "وارد کردن رمز عبور ضروری است.";
            $valid = false;
        }
        return $valid;
    }
    </script>
</head>
<body>
<?php
//namespace Phppot;
//use /src/DataSource;

try {
        $message = "";
        if (count($_POST) > 0) {
            if (!empty($_POST["uname"])) {
                session_start();
                $username = filter_var($_POST["uname"], FILTER_SANITIZE_STRING);
                $password = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);
                require_once (__DIR__ . "/src/Member.php");
                
                $member = new Member();
                $isLoggedIn = $member->processLogin($username, $password);
                if (!$isLoggedIn) {
                    $_SESSION["errorMessage"] = "نام کاربری و یا رمز عبور اشتباه است.";
                    $message = "نام کاربری یا رمز عبور استفاده است.";
                }
                header("Location: /Admin/index.php");
                exit();
            }
        }
    }
catch (Exception $ex){
    echo PrintError($ex);
}
?>
<div id="Container" class="borderClass">
<?php include 'header.php' ?>
        <div id="mainContent" class="borderClass">
            <div id="loginDiv" class="borderClass">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <div class="message"><?php if($message!="") { echo $message; } ?></div>
                    <table>
                        <tr>
                            <td>نام کاربری</td>
                            <td><input type="text" id="uname" name="uname" value="" /></td>
                        </tr>
                        <tr>
                            <td>گذرواژه</td>
                            <td><input type="password" id="pwd" name="pwd" value="" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="ورود"/></td>
                        </tr>
                    </table>
                </form>
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