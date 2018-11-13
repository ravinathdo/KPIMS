
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
                            <span>Edit Profile</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
                    <div class="content-top">
                        <div class="col-md-6 ">
                            <?php
                            if (isset($_POST['submitPword'])) {
                                $oldPword = $_POST['oldPword'];
                                $newPword = $_POST['newPword'];
                                
                                $retypePword = $_POST['retypePword'];
                                $updateNowPword = sha1($retypePword);
                                
                                if($newPword == $retypePword ){
                                    $flag = TRUE;
                                $sql = "SELECT * FROM kpi_user WHERE id = '".$_SESSION['userbean']['id']."' AND pword = '$oldPword'";
                                $dataarr = getData($sql);
                                foreach ($dataarr as $value) {
                                    $sqlUp = "UPDATE kpi_user SET pword = '$updateNowPword' WHERE id = '".$_SESSION['userbean']['id']."'";
                                    setUpdate($sqlUp, TRUE);
                                    $flag = FALSE;
                                }
                                if($flag){
                                    echo '<p class="bg-warning">Invalid old password</p>';
                                }
                                }else{
                                     echo '<p class="bg-warning">Invalid old password</p>';
                                }
                                
                                
                                
                                
                                
                                
                            }
                            ?>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">First Name</label> 
                                    <div class="col-xs-8">
                                        <input readonly="" id="text" name="text" type="text" class="form-control" value="<?= $_SESSION['userbean']['first_name']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-xs-4">Last Name</label> 
                                    <div class="col-xs-8">
                                        <input readonly="" id="text1" name="text1" type="text" class="form-control" value="<?= $_SESSION['userbean']['last_name']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text2" class="control-label col-xs-4">Employee Number</label> 
                                    <div class="col-xs-8">
                                        <input readonly="" id="text2" name="text2" type="text" class="form-control" value="<?= $_SESSION['userbean']['empno']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text3" class="control-label col-xs-4">NIC</label> 
                                    <div class="col-xs-8">
                                        <input  readonly="" id="text3" name="text3" type="text" class="form-control"  value="<?= $_SESSION['userbean']['nic']?>">
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="text5" class="control-label col-xs-4">Job Title</label> 
                                    <div class="col-xs-8">
                                        <input readonly="" id="text5" name="text5" type="text" class="form-control"  value="<?= $_SESSION['userbean']['job_title']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text6" class="control-label col-xs-4">Date Appointment</label> 
                                    <div class="col-xs-8">
                                        <input readonly="" id="text6" name="text6" type="text" class="form-control"  value="<?= $_SESSION['userbean']['date_of_appointment']?>">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-xs-offset-4 col-xs-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form></div>
                        <div class="col-md-6 ">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Change Password</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" action="change_password.php" method="post">
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Old Password</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="oldPword" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-xs-4">New Password</label> 
                                            <div class="col-xs-8">
                                                <input id="text1" name="newPword" type="text" class="form-control" required="" pattern="^.{6,}$" title="Min Length 6">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text2" class="control-label col-xs-4">Retype New Password</label> 
                                            <div class="col-xs-8">
                                                <input id="text2" name="retypePword" type="text" class="form-control">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="submitPword" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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

