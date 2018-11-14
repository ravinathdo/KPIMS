
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
            <?php include './_tree.php'; ?>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="content-main">
                    <!--banner-->	
                    <div class="banner">
                        <h2>
                            <a href="home.php">Home</a>
                            <i class="fa fa-angle-right"></i>
                            <span>PERFORMANCE APPRAISAL Approval Explorer</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
                    <div class="content-top">
                        <div class="col-md-8 ">

                            <?php
                            switch ($_SESSION['userbean']['user_role']) {
                                case 'ENGINEER':
                                    //show only  JENGINEER
                                    $sql = "SELECT kpi_performance_appraisal.* FROM kpi_performance_appraisal 
INNER JOIN kpi_user 
ON kpi_user.id = kpi_performance_appraisal.user_id 
WHERE kpi_user.user_role = 'JENGINEER'";
                                    
                                    break;
                                case 'TEAMLEAD':    //show only  JENGINEER + ENGINEER
                                       $sql = "SELECT kpi_performance_appraisal.* FROM kpi_performance_appraisal 
INNER JOIN kpi_user 
ON kpi_user.id = kpi_performance_appraisal.user_id 
WHERE kpi_user.user_role = 'JENGINEER' OR kpi_user.user_role = 'ENGINEER' ";
                                    break;
                                case 'SMANAGER'://show only  JENGINEER + ENGINEER + TEAMLEAD
                                      $sql = "SELECT kpi_performance_appraisal.* FROM kpi_performance_appraisal 
INNER JOIN kpi_user 
ON kpi_user.id = kpi_performance_appraisal.user_id 
WHERE kpi_user.user_role = 'JENGINEER' OR kpi_user.user_role = 'ENGINEER' OR kpi_user.user_role = 'TEAMLEAD' ";
                                    break;
                                case 'PM':
                                      $sql = "SELECT kpi_performance_appraisal.* FROM kpi_performance_appraisal 
INNER JOIN kpi_user 
ON kpi_user.id = kpi_performance_appraisal.user_id 
WHERE kpi_user.user_role = 'JENGINEER' OR kpi_user.user_role = 'ENGINEER' OR kpi_user.user_role = 'TEAMLEAD'  OR kpi_user.user_role = 'SMANAGER' ";
                                    break;
                                case 'HIT':
                                    $sql = "SELECT kpi_performance_appraisal.* FROM kpi_performance_appraisal 
INNER JOIN kpi_user 
ON kpi_user.id = kpi_performance_appraisal.user_id 
WHERE kpi_user.user_role = 'JENGINEER' OR kpi_user.user_role = 'ENGINEER' OR kpi_user.user_role = 'TEAMLEAD'  OR kpi_user.user_role = 'SMANAGER' OR kpi_user.user_role = 'PM' ";
                                    break;
                            }


                            $dataSet = getData($sql);
                            ?>

                            <table border="1" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>PAFNo</th>
                                        <th>Month Year</th>
                                        <th>Date Time</th>
                                        <th>Status</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($dataSet)
                                    foreach ($dataSet as $value) {
                                        ?> 
                                        <tr>
                                            <td><?= $value['PAFID'] ?></td>
                                            <td><?= $value['month_year'] ?></td>
                                            <td><?= $value['date_created'] ?></td>
                                            <td><?= $value['status_code'] ?></td>
                                            <?php if($value['status_code']=='ACTIVE'){ ?> 
                                            <td><a href="PAFID_approval_step1.php?id=<?= $value['PAFID'] ?>&status_code=<?= $value['status_code']?>">OBJECTIVE</a></td>
                                            <td><a href="PAFID_approval_step2.php?id=<?= $value['PAFID'] ?>&status_code=<?= $value['status_code']?>">BEHAVIOURAL</a></td>
                                            <td><a href="PAFID_proceed_step3.php?id=<?= $value['PAFID'] ?>&status_code=<?= $value['status_code']?>">OVERALL</a></td>
                                            <?php }?>
                                            <td><a href="PAFID_view.php?id=<?= $value['PAFID'] ?>&status_code=<?= $value['status_code']?>">VIEW</a></td>
                                        </tr>  
                                        <?php
                                    }
                                    ?>

                                    <?php ?>
                                </tbody>
                            </table>


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

