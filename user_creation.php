
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
            <?php include './_top_header.php'; ?>

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
                    <div class="content-top">
                        <div class="col-md-8 ">
                            <?php
                            if (isset($_POST['btnUserCreation'])) {
                                $pword = $_POST['empno'];
                                $sql = "INSERT INTO kpi_user
            ('".$_POST['first_name']."',
             '".$_POST['last_name']."',
             '".$_POST['empno']."',
             '".$_POST['nic']."',
             '".$pword."',
             `".$_POST['user_role']."`,
             `ACTIVE`,
             `1`)
VALUES ('first_name',
        'last_name',
        'empno',
        'nic',
        'pword',
        'user_role',
        'status_code',
        'user_created')";
                                setData($sql, $msgArray);
                            
                                
                                
                            }
                            ?>
                            <!----->
                            <div class="grid-form1">
                                <h3 id="forms-horizontal">User Creation <span class="mando-msg">* fields are mandatory</span></h3>
                                <form class="form-horizontal" action="user_creation.php" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label hor-form">Employee Number <span class="mando-msg">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" required="" name="empno" class="form-control" id="inputEmail3" placeholder="Employee Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label hor-form">First Name <span class="mando-msg">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text"  required=""  name="first_name" class="form-control" id="inputEmail3" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label hor-form">Last Name</label>
                                        <div class="col-sm-10">
                                            <input type="text"    name="last_name" class="form-control" id="inputEmail3" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label hor-form">NIC <span class="mando-msg">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text"  required=""  name="nic" class="form-control" id="inputEmail3" placeholder="NIC">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label hor-form">User Role <span class="mando-msg">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="user_role" class="form-control" required="">
                                                <option value="">--select--</option>
<?php
$sql = "SELECT * FROM kpi_user_role";
$data = getData($sql);
foreach ($data as $value) {
    ?>
                                                    <option value="<?= $value['user_role'] ?>"><?= $value['description'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label hor-form">Password</label>
                                        <div class="col-sm-10">
                                            Default password will be same as the Employee Number 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="btnUserCreation" class="btn btn-default">Create User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!---->

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

