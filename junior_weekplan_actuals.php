
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
    <?php include_once './util.php'; ?>
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
                            <span>Weekly plan Actuals</span>
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
                                <form class="form-horizontal" >
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
                                <?php
                                if (isset($_POST['submitActual'])) {
                                    $actual_duration = $_POST['from_time'] . ' TO ' . $_POST['to_time'];
                                    $sql = "INSERT INTO kpi_week_plan_actual
            (`plan_id`,
             `actual`,
             `actual_duration`,
             `remark`,
             `status_code`,
             `user_created`)
VALUES ('" . $_POST['weekplan_id'] . "',
        '" . $_POST['actual'] . "',
        '$actual_duration',
        '" . $_POST['remark'] . "',
        'DONE',
        '" . $_SESSION['userbean']['id'] . "');";
                                    $msgArray = array('msgsuccess' => 'Actual created successfuly', 'msgerror' => 'Invalid input or duplicate record');
//                                    echo $sql;
                                    setData($sql, $msgArray);
                                }
                                ?>
                                <div class="panel-heading ">Actuals</div>
                                <div class="panel-body">
                                    <?php if ($_SESSION['userbean']['user_role'] == 'JENGINEER') { ?> 
                                        <form class="form-horizontal" action="junior_weekplan_actuals.php?weekplan_id=<?= $_GET['weekplan_id'] ?>" method="post">
                                            <input id="actual" name="weekplan_id" type="hidden" class="form-control" value="<?= $_GET['weekplan_id'] ?>">
                                            <div class="form-group">
                                                <label for="actual" class="control-label col-xs-4">Actual</label> 
                                                <div class="col-xs-8">
                                                    <input id="actual" name="actual" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="estimated_duration" class="control-label col-xs-4">Actual Duration</label> 
                                                <div class="col-xs-4">
                                                    From <input id="estimated_duration" name="from_time" type="time" class="form-control">
                                                </div>
                                                <div class="col-xs-4">
                                                    To   <input id="estimated_duration" name="to_time" type="time" class="form-control">
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
                                                    <button name="submitActual" type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>

                        <div class="col-md-12 ">
                            <?php
                            if (isset($_POST['approveBtn'])) {
                                date_default_timezone_set("Asia/Colombo");
                                $today = date("Y-m-d h:i:sa");

                                $sql = "UPDATE kpi_week_plan_actual
SET 
  `status_code` = 'REVIEW',
  `category` = '" . $_POST['category'] . "',
  `review_user` = '" . $_SESSION['userbean']['id'] . "',
  `review_date` = '$today'
WHERE `id` = '" . $_POST['actual_id'] . "';";
                                setUpdate($sql, TRUE);
                            }
                            ?>
                            <table class="table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Actual</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $sql = " SELECT * FROM kpi_week_plan_actual WHERE plan_id = '" . $_GET['weekplan_id'] . "'";
                                    $resultx = getData($sql);
                                    if ($resultx != FALSE) {
                                        while ($row = mysqli_fetch_assoc($resultx)) {
                                            ?>
                                            <tr>
                                                <td><?= $row['actual']; ?></td>
                                                <td><?= $row['actual_duration']; ?></td>
                                                <td><?= $row['status_code']; ?></td>
                                                <td><?= $row['remark']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['status_code'] != 'REVIEW') {
                                                        if ($_SESSION['userbean']['user_role'] == 'PM') {
                                                            ?>
                                                            <form action="pm_weekplan_actuals_review.php" method="post">
                                                                <input id="actual" name="actual_id" type="hidden" class="form-control" value="<?= $row['id']; ?>">
                                                                <input id="actual" name="plan_id" type="hidden" class="form-control" value="<?= $row['plan_id']; ?>">
                                                                <select name="category" required="">
                                                                    <option value="SLA">SLA</option>
                                                                    <option value="PAYBAL">PAYBAL</option>
                                                                </select>
                                                                <input type="submit" name="approveBtn" name="Approve"/>
                                                            </form>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo $row['category'];
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>



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

