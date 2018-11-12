
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
                            <a href="home.php">Home</a>
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
                                    <div class="panel-heading">ACTIVE Weekly Plans</div>
                                    <div class="panel-body"><h1 style="text-align: center">
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
                            <div class="col-md-10 ">
                                
                                
                                <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                                
                                <script src="js/highcharts.js" type="text/javascript"></script>
                                <script src="js/exporting.js" type="text/javascript"></script>
                                <script>
                                
  
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Skill Matrix Summary'
    },
    subtitle: {
        text: 'Source: KPIMS'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['Networking', 24.2],
            ['Windows Server', 20.8],
            ['AD AAD', 14.9],
            ['Exchange', 13.7],
            ['Office 365', 13.1]
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
                                </script>
                                
                                
                                
                                
                                
                            </div>
                            <div class="clearfix"> </div>
                        </div>
<?php } ?>

                    <div class="content-top">
                        <div class="col-md-4 ">
                        </div>
                        <div class="col-md-8 "></div>
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

