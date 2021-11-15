<?php require "../src/DB.php";
require "../src/GetLastID.php";
require "../src/PrintError.php" ?>

<?php
//namespace Phppot;
//use \Phppot\Member;

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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/richtext.min.css">
    <script type="text/javascript" src="../js/jquery.richtext.min.js"></script>
    <script type="text/javascript" src="../js/EditorConfig.js"></script>
 </head>
<body>
<?php
    try {
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $subjectErr = $contentErr = $datetimeErr = "";
      $subject = $content = $datetime = $pkid = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {
        if (empty($_REQUEST['subject']))
        {
          $subjectErr = "وارد کردن موضوع مطلب ضروری است.";
        } else {
          $subject = test_input($_REQUEST['subject']);
        }
        
        if (empty($_REQUEST['content']))
        {
          $contentErr = "وارد کردن متن مطلب ضروری است.";
        } else {
          $content = test_input($_REQUEST['content']);
        }

        $pkid = GetLastID("ContentTbl");
        $pkid++;
        $datetime = date("Y/m/d");

        $sql = "INSERT INTO ContentTbl (ID, Subject, Content, DateTime)
        VALUES ('$pkid','$subject', '$content', '$datetime')";
        // use exec() because no results are returned
        $conn->exec($sql);
        header("Location: admin.php", TRUE, 301);
        exit();
      }
    }
      catch(Exception $ex) {
        //throw new Exception("Error");
        echo PrintError($ex);
      }
      catch(PDOException $e) {
        echo PrintError($e);
      }
      finally {
        $conn = null;
      }

      ?>
    <div id="Container" class="borderClass">
        <?php include '../header.php' ?>
        <div id="mainContent" class="borderClass">
            <h1>افزودن مطلب جدید</h1>
            <hr>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                موضوع مطلب &nbsp; <input type="text" name="subject" value="">
                <span class="error">* <?php echo $subjectErr;?></span>
                <br>
                <textarea class="content" name="content" value=""></textarea>
                <span class="error">* <?php echo $contentErr;?></span>
                <br>
                <input type="submit" value="ثبت مطلب">
            </form>
            
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
    <script>
        $(document).ready(function() {
            $('.content').richText();
        });
    </script>
</body>
</html>