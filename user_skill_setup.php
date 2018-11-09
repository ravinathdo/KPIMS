
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
                            <span>Skill Setup</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->


                    <form class="form-horizontal" action="user_skill_setup_step2.php" method="post">

                        <div class="content-top">
                            <div class="col-md-4 ">


                                <div class="panel panel-primary">
                                    <div class="panel-heading ">Core Skills</div>
                                    <div class="panel-body form-horizontal">
                                        <span class="mando-msg">* Fields are mandatory</span>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Year Month <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="month_year" type="text" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Networking</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="1" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-xs-4">Windows Server</label> 
                                            <div class="col-xs-8">
                                                <input id="text1" name="2" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text2" class="control-label col-xs-4">AD/AAD</label> 
                                            <div class="col-xs-8">
                                                <input id="text2" name="3" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text3" class="control-label col-xs-4">Exchange</label> 
                                            <div class="col-xs-8">
                                                <input id="text3" name="4" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text4" class="control-label col-xs-4">Office 365</label> 
                                            <div class="col-xs-8">
                                                <input id="text4" name="5" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text5" class="control-label col-xs-4">Azure Bakup/DPM</label> 
                                            <div class="col-xs-8">
                                                <input id="text5" name="6" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text6" class="control-label col-xs-4">Azure VM/Hyper-V</label> 
                                            <div class="col-xs-8">
                                                <input id="text6" name="7" type="text" class="form-control">
                                            </div>
                                        </div> 
                                       
                                    </div></div>


                            </div>
                            <div class="col-md-4 ">


                                <div class="panel panel-primary">
                                    <div class="panel-heading ">Microsoft 365</div>
                                    <div class="panel-body form-horizontal">

                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">EMS</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="8" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-xs-4">MDOP</label> 
                                            <div class="col-xs-8">
                                                <input id="text1" name="9" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="text3" class="control-label col-xs-4">DLP/AIP</label> 
                                            <div class="col-xs-8">
                                                <input id="text3" name="10" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text4" class="control-label col-xs-4">Win10 Ent</label> 
                                            <div class="col-xs-8">
                                                <input id="text4" name="11" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text5" class="control-label col-xs-4">Cloud App Security</label> 
                                            <div class="col-xs-8">
                                                <input id="text5" name="12" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text2" class="control-label col-xs-4">Intune</label> 
                                            <div class="col-xs-8">
                                                <input id="text2" name="13" type="text" class="form-control">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 ">8</div>
                            <div class="clearfix"> </div>
                        </div>


                    </form>
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

