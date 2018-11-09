
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
                            <span>Dashboard</span>
                        </h2>
                    </div>
                    <!--//banner-->
                    <!--content-->
                    <div class="content-top">
                        <div class="col-md-4 ">
                            <form class="form-horizontal" action="user_skill_setup_view.php" method="post">
                                <div class="form-group">
                                    <label for="text" class="control-label col-xs-4">Year Month</label> 
                                    <div class="col-xs-8">
                                        <input id="text" name="month_year" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-offset-4 col-xs-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="clearfix"> </div>
                    </div>



                    <div class="content-top">
                        <div class="col-md-12 ">

                            <?php
                            if (isset($_POST['submit'])) {
                                /*
                                  SELECT kpi_skill_matrix.*,kpi_skill.skill_description,kpi_skill_category.skill_category_description FROM kpi_skill_matrix
                                  INNER JOIN
                                  kpi_skill ON kpi_skill_matrix.skill_id = kpi_skill.skill_id
                                  INNER JOIN
                                  kpi_skill_category ON kpi_skill.skill_category_id = kpi_skill_category.skill_category_id
                                  WHERE kpi_skill_matrix.month_year = '2018' AND kpi_skill_matrix.employee_id = '3'
                                 *                                  */
                                $sql = " SELECT kpi_skill_matrix.*,kpi_skill.skill_description,kpi_skill_category.skill_category_description FROM kpi_skill_matrix
 INNER JOIN 
kpi_skill ON kpi_skill_matrix.skill_id = kpi_skill.skill_id
 INNER JOIN 
kpi_skill_category ON kpi_skill.skill_category_id = kpi_skill_category.skill_category_id
  WHERE kpi_skill_matrix.month_year = '" . $_POST['month_year'] . "' AND kpi_skill_matrix.employee_id = '" . $_SESSION['userbean']['id'] . "' ";
                                ?>
                                <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Year Month</th>
                                            <th>Category</th>
                                            <th>Skill</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultx = getData($sql);
                                        if ($resultx != FALSE) {
                                            while ($row = mysqli_fetch_assoc($resultx)) {
                                                ?>
                                                <tr>
                                                    <td><?= $row['month_year']; ?></td>
                                                    <td><?= $row['skill_category_description']; ?></td>
                                                    <td><?= $row['skill_description']; ?></td>
                                                    <td><?= $row['date_created']; ?></td>
                                                    <td><?= $row['status_code']; ?></td>
                                                    <td><?php if ($row['status_code'] == 'ACTIVE') { ?> 
                                                        <form action="" method="post">
                                                            <input type="hidden" name="score" value="<?= $row['id']; ?>" />
                                                            <input type="text" name="score" value="<?= $row['score']; ?>" />
                                                            <input type="submit" class="btn btn-primary" value="Update" />
                                                        </form>
                                                        <?php }else{
                                                             echo $row['score'];
                                                        } ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>

                            <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
                            <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
                            <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
            });
                            </script>

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

