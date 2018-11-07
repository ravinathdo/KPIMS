
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
include './DB.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>KPIMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="KPI Management System" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <script src="js/jquery.min.js"></script>
        <!-- Mainly scripts -->
        <script src="js/jquery.metisMenu.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
        <!-- Custom and plugin javascript -->
        <link href="css/custom.css" rel="stylesheet">
        <script src="js/custom.js"></script>
        <script src="js/screenfull.js"></script>
        <script>
            $(function () {
                $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

                if (!screenfull.enabled) {
                    return false;
                }

                $('#toggle').click(function () {
                    screenfull.toggle($('#container')[0]);
                });



            });
        </script>

        <!----->


        <!--skycons-icons-->
        <script src="js/skycons.js"></script>
        <!--//skycons-icons-->
    </head>
    <body>
        <div id="wrapper">

            <!----->
            <?php
            include './_tree.php';
            ?>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="content-main">

                    <!--banner-->	
                    <div class="banner">
                        <h2>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                            <span>Dashboard</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
<?php if ($_SESSION['userbean']['user_role'] == 'JENGINEER') { ?> 
                        <div class="content-top">
                            <div class="col-md-2 ">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">ACTIVE Plans</div>
                                    <div class="panel-body"><h1>
                                        <?php
                                        $sql = "SELECT COUNT(id) AS CNT FROM kpi_week_plan WHERE (assign_to = '" . $_SESSION['userbean']['id'] . "' OR user_created = '" . $_SESSION['userbean']['id'] . "') AND status_code = 'ACTIVE'";
                                        $data = getData($sql);
                                        if ($data) {
                                            foreach ($data as $value) {
                                                echo $value['CNT'];
                                            }
                                        } else {
                                            echo '0';
                                        }
                                        ?></h1>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-10 ">8</div>
                            <div class="clearfix"> </div>
                        </div>
<?php } ?>

                    <div class="content-top">
                        <div class="col-md-4 ">
                        </div>
                        <div class="col-md-8 ">8</div>
                        <div class="clearfix"> </div>
                    </div>
                    <!---->

                    <!---->
                    <?php
                    include './_footer.php';
                    ?>

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!---->
        <!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

