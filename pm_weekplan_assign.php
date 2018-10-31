
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start();?>
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

        <!--pie-chart--->
        <script src="js/pie-chart.js" type="text/javascript"></script>
        <script type="text/javascript">

       $(document).ready(function () {
           $('#demo-pie-1').pieChart({
               barColor: '#3bb2d0',
               trackColor: '#eee',
               lineCap: 'round',
               lineWidth: 8,
               onStep: function (from, to, percent) {
                   $(this.element).find('.pie-value').text(Math.round(percent) + '%');
               }
           });

           $('#demo-pie-2').pieChart({
               barColor: '#fbb03b',
               trackColor: '#eee',
               lineCap: 'butt',
               lineWidth: 8,
               onStep: function (from, to, percent) {
                   $(this.element).find('.pie-value').text(Math.round(percent) + '%');
               }
           });

           $('#demo-pie-3').pieChart({
               barColor: '#ed6498',
               trackColor: '#eee',
               lineCap: 'square',
               lineWidth: 8,
               onStep: function (from, to, percent) {
                   $(this.element).find('.pie-value').text(Math.round(percent) + '%');
               }
           });


       });

        </script>
        <!--skycons-icons-->
        <script src="js/skycons.js"></script>
        <!--//skycons-icons-->
    </head>
    <body>
        <div id="wrapper">

            <!----->
            <?php include './_tree.php';?>
            
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="content-main">

                    <!--banner-->	
                    <div class="banner">
                        <h2>
                             <a href="home.php">Home</a>
                            <i class="fa fa-angle-right"></i>
                            <span>Week Plan Assign</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
                    <div class="content-top">
                        <div class="col-md-4 ">
                            <?php
                            $weekplan_id = $_GET['weekplan_id'];
                            $sql = "SELECT kpi_week_plan.*,kpi_user.first_name,kpi_user.empno FROM kpi_week_plan  INNER JOIN kpi_user "
                                    . " ON kpi_week_plan.user_created = kpi_user.id WHERE kpi_week_plan.id = $weekplan_id ";
//                            echo $sql;
                            $result = getData($sql);
                            foreach ($result as $value) {
                                ?>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="from_date" class="control-label col-xs-4">Task</label> 
                                        <div class="col-xs-8">
                                            <?= $value['task']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-xs-4">Plan Date</label> 
                                        <div class="col-xs-8">
                                            <?= $value['plan_date']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="control-label col-xs-4">Duration</label> 
                                        <div class="col-xs-8">
                                            <?= $value['estimated_duration']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text1" class="control-label col-xs-4">Status</label> 
                                        <div class="col-xs-8">
                                            <?= $value['status_code']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text2" class="control-label col-xs-4">Created By</label> 
                                        <div class="col-xs-8">
                                            <?= $value['first_name']; ?>[<?= $value['empno']; ?>]
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text3" class="control-label col-xs-4">Remark</label> 
                                        <div class="col-xs-8">
                                            <?= $value['remark']; ?>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-xs-offset-4 col-xs-8">
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-8 ">
                            <div class="panel panel-default">
                                <div class="panel-heading ">Assign User</div>
                                <div class="panel-body">
                                    
                                </div>
                            </div>
                        </div>
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

