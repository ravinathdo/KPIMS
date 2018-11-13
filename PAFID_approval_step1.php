
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
                            <span>PERFORMANCE APPRAISAL Review</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
                    <div class="content-top">
                        <div class="col-md-5 ">
                            <form action="PIFID_objective_setting_approval.php" method="post">
                                <input type="hidden" name="PAFID" value="<?= $_GET['id'] ?>" />
                                <?php
                                $sql = "SELECT kpi_goal_objective.*,kpi_goal_ratio.goal_ratio,kpi_goal_ratio.precentage FROM kpi_goal_objective
INNER JOIN kpi_goal_ratio 
ON kpi_goal_objective.goal_ratio_id = kpi_goal_ratio.id
WHERE kpi_goal_objective.user_role = 'JENGINEER'";
                                $data = getData($sql);
                                foreach ($data as $value) {
                                    ?>
                                    <input type="hidden" name="<?= $value['id'] ?>_goal_objective_id" value="<?= $value['id'] ?>" />
                                    <div class="panel panel-primary">
                                        <div class="panel-heading "><?= $value['goal_ratio'] ?> [<?= $value['point'] ?> %]</div>
                                        <div class="panel-body form-horizontal">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="textarea" class="control-label col-xs-4">Mid Year Review (Manager) </label> 
                                                    <div class="col-xs-8">
                                                        <textarea id="textarea" required="" name="<?= $value['id'] ?>_mid_year_comment_manager" cols="40" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textarea1" class="control-label col-xs-4">Annual Review (Manager)</label> 
                                                    <div class="col-xs-8">
                                                        <textarea id="textarea1"  required=""  name="<?= $value['id'] ?>_annual_comment_manager" cols="40" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div> 

                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button><br>
                            </form>
                        </div>
                        <div class="col-md-7 ">
                            <?php include './PAF.php';?>
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

