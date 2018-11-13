
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
                                $pword = $_POST['empno']; // employee number as the password 

                                $sql = "INSERT INTO kpi_user
            (`first_name`,
             `last_name`,
             `empno`,
             `nic`,
             `pword`,
             `user_role`,
             `status_code`,
             `user_created`)
VALUES ('" . $_POST['first_name'] . "',
             '" . $_POST['last_name'] . "',
             '" . $_POST['empno'] . "',
             '" . $_POST['nic'] . "',
             '" . sha1($pword) . "',
             '" . $_POST['user_role'] . "',
             'ACTIVE',
             '1');";
//                                echo $sql;
                                $msgArray = array('msgsuccess' => 'New user created successfuly', 'msgerror' => 'Invalid input or duplicate record');
                                $setData = setData($sql, $msgArray);
                                if ($setData > 0) {
                                } else {
                                }
                            }
                            ?>
                            <!----->
                            <div class="grid-form1">
                                <h3 id="forms-horizontal">User Creation <span class="mando-msg">* fields are mandatory</span></h3>
                                <form class="form-horizontal" action="user_creation.php" method="post">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label hor-form">Employee Number <span class="mando-msg">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" required="" name="empno" class="form-control" id="inputEmail3" placeholder="Employee Number" pattern="^[0-9]{1,20}$" title="Numbers Only" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label hor-form">First Name <span class="mando-msg">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text"  required=""  name="first_name" class="form-control" id="inputEmail3" placeholder="First Name"  pattern="^[a-zA-Z\s]{1,50}$" title="Only letters are allowed, max 50" >
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
                                            <input type="text"  required=""  name="nic" class="form-control" id="inputEmail3" placeholder="NIC" pattern="(?:((^\d{9})(v$))|((^\d{9})(x$))|(^\d{12}$))" title="9 digit with 'x' or 'v', 12 digit modern NIC" >
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
                        <div class="col-md-12 ">
                            <?php
                            $sql = " SELECT kpi_user.*,kpi_user_role.description 
FROM kpi_user 
INNER JOIN kpi_user_role 
ON kpi_user_role.user_role = kpi_user.user_role  ";
//                            echo $sql;
                            ?>
                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>EMP No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>NIC</th>
                                        <th>User Role</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
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
                                                <td><?= $row['empno']; ?></td>
                                                <td><?= $row['first_name']; ?></td>
                                                <td><?= $row['last_name']; ?></td>
                                                <td><?= $row['nic']; ?></td>
                                                <td><?= $row['description']; ?></td>
                                                <td><?= $row['status_code']; ?></td>
                                                <td><?= $row['date_created']; ?></td>
                                                <td><a href="admin_update_user.php?id=<?= $row['id']; ?>">Update</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
                            <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
                            <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
            });
                            </script>
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

