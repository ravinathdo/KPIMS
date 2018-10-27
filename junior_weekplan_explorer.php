
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
                            <span>Weekly plan Date Explorer</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
                    <div class="content-top">
                        <div class="col-md-12 ">
                            <form class="form-inline" action="junior_weekplan_explorer.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputName2">To Date</label>
                                    <input id="from_date" name="from_date" type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">From Date</label>
                                    <input id="from_date" name="to_date" type="date" class="form-control">

                                </div>
                                <button name="btnExplorer" type="submit" class="btn btn-default">Explorer</button>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <?php if (isset($_POST['btnExplorer'])) {
                                echo ' From:'. $_POST['from_date'] . '   To:' .$_POST['to_date'];
                                ?>
                                <table  id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Plan Date</th>
                                            <th>Task</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = " SELECT * FROM kpi_week_plan WHERE plan_date >= '" . $_POST['from_date'] . "' AND plan_date <= '" . $_POST['to_date'] . "' ";
//                                        echo $sql;
                                        $resultx = getData($sql);
                                        if ($resultx != FALSE) {
                                            while ($row = mysqli_fetch_assoc($resultx)) {
                                                ?>
                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= $row['plan_date']; ?></td>
                                                    <td><?= $row['task']; ?></td>
                                                    <td><?= $row['estimated_duration']; ?></td>
                                                    <td><?= $row['status_code']; ?></td>
                                                    <td><a href="junior_weekplan_actuals.php?weekplan_id=<?= $row['id']; ?>">Actuals</a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php }
                            ?>


                            <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
                            <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
                            <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
            });
                            </script>

                        </div>
                        <div class="clearfix"> 
                        </div>
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

