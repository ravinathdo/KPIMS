
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <?php include_once './DB.php'; ?>
    <head>
        <title>KPIMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="login">
            <h1><a href="#">KPIMS</a></h1>

            <div class="login-bottom">
                <h2>Login</h2>
                <?php
                if (isset($_POST['btnLogin'])) {
                    $pword = $_POST['pword'];
                    $sql = "SELECT kpi_user.*,kpi_user_role.access_level FROM kpi_user INNER JOIN kpi_user_role "
                            . " ON kpi_user_role.user_role =  kpi_user.user_role "
                            . " WHERE kpi_user.empno = '" . $_POST['empno'] . "' AND kpi_user.pword = '" . sha1($pword) . "' AND kpi_user.status_code = 'ACTIVE'";
                    echo $sql;
                    $result = getData($sql);
                    if ($result != null) {
                        foreach ($result as $value) {
                            $_SESSION['userbean'] = $value;
                            date_default_timezone_set("Asia/Colombo");
                            $today = date("Y-m-d");
                            $_SESSION['today'] = $today;
                        }
                        header("Location:home.php");
                    } else {
                        echo '<p class="bg-danger msg-error">Invalid username or password</p>';
                    }
                }
                ?>
                <form action="index.php" method="post">
                    <div class="col-md-6">
                        <div class="login-mail">
                            <input type="text" placeholder="Employee Number" required="" name="empno">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="login-mail">
                            <input type="password" placeholder="Password" required="" name="pword">
                            <i class="fa fa-lock"></i>
                        </div>
                        <a class="news-letter " href="#">
                            <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forget Password</label>
                        </a>
                    </div>
                    <div class="col-md-6 login-do">
                        <label class="hvr-shutter-in-horizontal login-sub">
                            <input type="submit" value="login" name="btnLogin">
                        </label>
                        <!--<p>Do not have an account?</p>-->
                        <!--<a href="signup.html" class="hvr-shutter-in-horizontal">Signup</a>-->
                    </div>

                    <div class="clearfix"> </div>
                </form>
            </div>
        </div>
        <!---->
<?php
include './_footer.php';
?> 
        <!---->
        <!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->
    </body>
</html>

