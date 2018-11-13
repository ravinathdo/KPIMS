
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
                            <span>Dashboard</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
                    <div class="content-top">
                        <div class="col-md-4 ">
                            <?php
                            if (isset($_POST['submit'])) {

                                $PAFID = $_POST['PAFID'];
                                $employee_id = $_SESSION['userbean']['id'];

                                $sql = " SELECT goal_objective_id AS id FROM kpi_goal_employee WHERE PAFID = '$PAFID' ";
                                
                                $data = getData($sql);
                                foreach ($data as $value) {
                                    $goal_objective_id = $value['id'] . '_goal_objective_id'; // POST NAME
                                    $mid_year_comment_manager = $value['id'] . '_mid_year_comment_manager'; // POST NAME
                                    $annual_comment_manager = $value['id'] . '_annual_comment_manager'; // POST NAME
//                            $sql = "INSERT INTO kpi_goal_employee (PAFID,goal_objective_id,employee_id,mid_year_comment_employee,annual_comment_employee)
//VALUES ('$PAFID','$employee_id','$goal_objective_id','$mid_year_comment_employee','$annual_comment_employee')";
//                            
//                                    $sql = "INSERT INTO kpi_goal_employee (PAFID,goal_objective_id,employee_id,mid_year_comment_manager,annual_comment_employee)
//VALUES ('$PAFID','" . $_POST[$goal_objective_id] . "','$employee_id','" . $_POST[$mid_year_comment_employee] . "','" . $_POST[$annual_comment_employee] . "')";
//                                    
                                    $sql = "UPDATE  kpi_goal_employee SET mid_year_comment_manager = '" . $_POST[$mid_year_comment_manager] . "', annual_comment_manager = '" . $_POST[$annual_comment_manager] . "' 
WHERE PAFID = '$PAFID' AND goal_objective_id = '" . $_POST[$goal_objective_id] . "' ";
                                    
                                    echo $sql;
                                    $msgArray = array('msgsuccess' => '', 'msgerror' => '');
                                    setUpdate($sql, FALSE);
                                }
                                echo '<span class="mando-msg">OBJECTIVE SETTING created successfully updated</span>';
                            }
                            ?>
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

