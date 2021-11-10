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

</head>
<body>
    <div id="Container" class="borderClass">
    <?php include 'header.php' ?>
        <div id="mainContent" class="borderClass">
            <h1>تماس با ما</h1>
            <h2>جهت ارتباط با تیم آموزشی آفرین وب فرم زیر را تکمیل کنید.</h2>
            <div class="borderClass">
                <form>
                    <table>
                        <tr>
                            <td>نام</td>
                            <td><input type="text" name="sender" value="" /></td>
                        </tr>
                        <tr>
                            <td>موضوع</td>
                            <td><input type="text" name="subject" value="" /></td>
                        </tr>
                        <tr>
                            <td>پست الکترونیکی</td>
                            <td><input type="text" name="email" value="" /></td>
                        </tr>
                        <tr>
                            <td>متن پیام</td>
                            <td>
                                <textarea id="msgText" name="message"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="ارسال"/></td>
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
        </div>
    </div>
</body>
</html>