
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
            <?php include './_tree.php'; ?>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="content-main">

                    <!--banner-->	
                    <div class="banner">
                        <h2>
                            <a href="home.php">Home</a>
                            <i class="fa fa-angle-right"></i>
                            <span>New Weekly plan</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
                    <div class="content-top">
                        <div class="col-md-8 ">
                            <span class="mando-msg">* Fields are mandatory</span>
                            <?php
                            if (isset($_POST['submit'])) {
                                $estimated_duration = $_POST['from_time'] . ' TO ' . $_POST['to_time'];
                                $sql = "INSERT INTO kpi_week_plan
            (`plan_date`,
             `task`,
             `estimated_duration`,
             `remark`,
             `status_code`,
             `assign_to`,
             `user_created`)
VALUES ('" . $_POST['plan_date'] . "',
        '" . $_POST['task'] . "',
        '$estimated_duration',
        '" . $_POST['remark'] . "',
        'ACTIVE',
        '" . $_SESSION['userbean']['id'] . "',
        '" . $_SESSION['userbean']['id'] . "');";
//                                echo $sql;
                                $msgArray = array('msgsuccess' => 'New Plan created', 'msgerror' => 'Invalid input or duplicate entry');
                                setData($sql, $msgArray);
                            }
                            ?>

                            <form class="form-horizontal" action="junior_weekplan_matrix.php" method="post">
                                <div class="form-group">
                                    <label for="plan_date" class="control-label col-xs-4">Plan Date <span class="mando-msg">*</span></label> 
                                    <div class="col-xs-8">
                                        <input id="plan_date" required="" name="plan_date" type="date" min="<?= $_SESSION['today']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="task" class="control-label col-xs-4">Task <span class="mando-msg">*</span></label> 
                                    <div class="col-xs-8">
                                        <input id="task" name="task" required="" type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="estimated_duration" class="control-label col-xs-4">Estimated Duration <span class="mando-msg">*</span></label> 
                                    <div class="col-xs-4">
                                        From <input id="estimated_duration" required="" name="from_time" type="time" class="form-control">
                                    </div>
                                    <div class="col-xs-4">
                                        To   <input id="estimated_duration" required="" name="to_time" type="time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="remark" class="control-label col-xs-4">Remark</label> 
                                    <div class="col-xs-8">
                                        <textarea id="remark" name="remark" cols="40" rows="5" class="form-control"></textarea>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-xs-offset-4 col-xs-8">
                                        <button name="submit" type="submit"  class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 "></div>
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

