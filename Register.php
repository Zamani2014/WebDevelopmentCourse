<!DOCTYPE html>
<?php require "src/DB.php";
require "src/GetLastID.php";
require "src/PrintError.php" ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ثبت نام</title>
    <!--  <base href="http://www.AfarinWeb.ir/"/> -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    
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

      $fnameErr = $lnameErr = $fanameErr = $nationalCodeErr = $unameErr = $pwdErr = "";
      $fname = $lname = $faname = $nationalno = $gender = $phoneno = $mobileno = $uname = $pwd = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {
        if (empty($_REQUEST['fname']))
        {
          $fnameErr = "وارد کردن نام کوچک ضروری است.";
        } else {
          $fname = test_input($_REQUEST['fname']);

            //if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            //$fnameErr = "برای نام تنها میتوانید از حروف و فضای سفید استفاده کنید.";
          //}
        }
        
        if (empty($_REQUEST['lname']))
        {
          $lnameErr = "وارد کردن نام خانوادگی ضروری است.";
        } else {
          $lname = test_input($_REQUEST['lname']);
        }

        if (empty($_REQUEST['faname']))
        {
          $fanameErr = "وارد کردن نام پدر ضروری است.";
        } else {
          $faname = test_input($_REQUEST['faname']);
        }

        if (empty($_REQUEST['nationalno']))
        {
          $nationalCodeErr = "وارد کردن کد ملی ضروری است.";
        } else {
          $nationalno = test_input($_REQUEST['nationalno']);
        }

        if (empty($_REQUEST['gender'])){
          $gender = test_input($_REQUEST['gender']);
        } else {
          $gender = test_input($_REQUEST['gender']);
        }

        if (empty($_REQUEST['phoneno']))
        {
          $phoneno = test_input($_REQUEST['phoneno']);
        } else {
          $phoneno = test_input($_REQUEST['phoneno']);
        }

        if (empty($_REQUEST['mobileno']))
        {
          $mobileno = test_input($_REQUEST['mobileno']);
        } else {
          $mobileno = test_input($_REQUEST['mobileno']);
        }

        if (empty($_REQUEST['uname']))
        {
          $unameErr = "وارد کردن نام کاربری ضروری است.";
        } else {
          $uname = test_input($_REQUEST['uname']);
        }

        if (empty($_REQUEST['pwd']))
        {
          $pwdErr = "وارد کردن گذرواژه ضروری است.";
        } else {
          $pwd = test_input($_REQUEST['pwd']);
          $pwd = md5($pwd);
        }

        $new_id = GetLastID("UsersTbl");
        $new_id++;
        $date = date("Y/m/d");

        $sql = "INSERT INTO UsersTbl (ID, FirstName, LastName, FatherName, NationalCode, Gender, Tel, Mobile, UserName, Password, Description, DateTime)
        VALUES ('$new_id','$fname', '$lname', '$faname', '$nationalno', '$gender', '$phoneno', '$mobileno', '$uname', '$pwd', 'New User', '$date')";
        // use exec() because no results are returned
        $conn->exec($sql);
        header("Location: Success.php", TRUE, 301);
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
    <?php include 'header.php' ?>
        <div id="mainContent" class="borderClass">
            <h1>ثبت نام</h1>
            <h2>برای عضویت لطفا فرم زیر را تکمیل نمائید.</h2>
            <p class="error">وارد کردن فیلد های ستاره دار ضروری است.</p>
            <form id="register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <fieldset>
                    <legend>اطلاعات هویتی</legend>
                <table>
                  <tr>
                    <td><label>نام:</label></td>
                    <td>
                      <input type="text" name="fname" value="" required  />
                      <br>
                      <span class="error">* <?php echo $fnameErr;?></span>
                    </td>
                    <td><label>نام خانوادگی:</label></td>
                    <td>
                      <input type="text" name="lname" value=""  required />
                      <br>
                      <span class="error">* <?php echo $lnameErr;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td><label>نام پدر:</label></td>
                    <td>
                      <input
                        type="text"
                        name="faname"
                        value=""
                      />
                      <br>
                      <span class="error">* <?php echo $fanameErr;?></span>
                    </td>
                    <td><label>کد ملی:</label></td>
                    <td>
                      <input
                        type="number"
                        name="nationalno"
                        value=""
                      />
                      <br>
                      <span class="error">* <?php echo $nationalCodeErr;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td><label>جنسیت:</label></td>
                    <td>
                      <label for="female">خانم</label
                      ><input type="radio" id="female" name="gender" value="خانم"  />
                    </td>
                    <td>
                      <label for="man">آقا</label
                      ><input type="radio" id="man" name="gender" value="آقا" checked/>
                    </td>
                    <td></td>
                  </tr>
                </table>
                </fieldset>
        
                <fieldset>
                    <legend>اطلاعات تماس</legend>
                <table>
                  <tr>
                    <td><label>شماره تلفن ثابت:</label></td>
                    <td>
                      <input
                        type="text"
                        name="phoneno"
                        value=""
                      />
                    </td>
                    <td>شماره همراه:</td>
                    <td>
                      <input
                        type="text"
                        name="mobileno"
                        value=""
                      />
                    </td>
                  </tr>
                </table>
            </fieldset>
        
            <fieldset>
            <legend>اطلاعات حساب کاربری</legend>
            <table>
                  <tr>
                    <td><label>نام کاربری:</label></td>
                    <td>
                      <input type="text" name="uname" value="" />
                      <br>
                      <span class="error">* <?php echo $unameErr;?></span>
                    </td>
                    <td>گذرواژه:</td>
                    <td>
                      <input type="password" name="pwd" value="" />
                      <br>
                      <span class="error">* <?php echo $pwdErr;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <canvas id="canvas"></canvas>
                    </td>
                    <td colspan="2">
                      <label for="">کد امنیتی:</label>&nbsp;<input name="code" />
                    </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td colspan="2">
                      <input type="submit" id="valid" value="ثبت نام!" /></td>
                    <td></td>
                    <td ></td>
                    <td></td>
                  </tr>
                </table>
            </fieldset>
              </form>
        

        </div>
        <div id="sidebar" class="borderClass">
        <?php include 'menu.php' ?>
        </div>
        <div id="footer" class="borderClass">
        <?php include 'footer.php'?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/jquery-captcha.js"></script>
    <script>
      // step-1
      const captcha = new Captcha($('#canvas'),{
        length: 6,
        width: 200,
        height: 60,
        font:'bold 23px Arial',
        resourceType:'aA0',// a-lowercase letters, A-uppercase letter, 0-numbers
        clickRefresh:true,
        caseSensitive:true,
        autoRefresh:false

      });
      // api
      //captcha.refresh();
      //captcha.getCode();
      //captcha.valid("");

      $('#valid').on('click', function() {
        const ans = captcha.valid($('input[name="code"]').val());
        alert(ans);
        captcha.refresh();
      })
    </script>
</body>
</html>