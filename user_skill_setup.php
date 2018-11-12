
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
                            <div class="col-md-3 ">
                                <!--Core Skills 1-8-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">Core Skills</div>
                                    <div class="panel-body form-horizontal">
                                        <span class="mando-msg">* Fields are mandatory</span>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Year Month <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="month_year" type="month" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Networking <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="1" type="text" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-xs-4">Windows Server <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text1" name="2" type="text" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text2" class="control-label col-xs-4">AD/AAD <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text2" name="3" type="text" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text3" class="control-label col-xs-4">Exchange <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text3" name="4" type="text"  required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text4" class="control-label col-xs-4">Office 365 <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text4" name="5" type="text" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text5" class="control-label col-xs-4">Azure Bakup/DPM <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text5" name="6" type="text" required="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text6" class="control-label col-xs-4">Azure VM/Hyper-V <span class="mando-msg">*</span></label> 
                                            <div class="col-xs-8">
                                                <input id="text6" name="7" type="text" required="" class="form-control">
                                            </div>
                                        </div> 

                                    </div></div>
                                <!--Microsoft 365-  9-14 -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">Microsoft 365</div>
                                    <div class="panel-body form-horizontal">

                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">EMS</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="9" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-xs-4">MDOP</label> 
                                            <div class="col-xs-8">
                                                <input id="text1" name="10" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="text3" class="control-label col-xs-4">DLP/AIP</label> 
                                            <div class="col-xs-8">
                                                <input id="text3" name="11" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text4" class="control-label col-xs-4">Win10 Ent</label> 
                                            <div class="col-xs-8">
                                                <input id="text4" name="12" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text5" class="control-label col-xs-4">Cloud App Security</label> 
                                            <div class="col-xs-8">
                                                <input id="text5" name="13" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text2" class="control-label col-xs-4">Intune</label> 
                                            <div class="col-xs-8">
                                                <input id="text2" name="14" type="text" class="form-control">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!--System Center 15-17-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">System Center</div>
                                    <div class="panel-body form-horizontal">
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">OMS</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="15" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">SCCM</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="16" type="text" class="form-control">
                                            </div>
                                        </div>		
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">SCOM</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="17" type="text" class="form-control">
                                            </div>
                                        </div>		


                                    </div>
                                </div>
                                <!--Azure Solutions 18-21-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">Azure Solutions</div>
                                    <div class="panel-body form-horizontal">
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Azure Site Recovery Solutions</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="18" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Vnet/VPN/NSG/WAF</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="19" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Automation</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="20" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Azure EA Portal</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="21" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--Data/SharePoint 22-23-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">Data/SharePoint</div>
                                    <div class="panel-body form-horizontal">
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Azure Data Services</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="22" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">SharePoint Administration</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="23" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div></div>
                                <!--Security 23-25-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">Security</div>
                                    <div class="panel-body form-horizontal">
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Sophos Security</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="23" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">Sophos Firewall</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="24" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">CheckPoint Firewall</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="25" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-offset-4 col-xs-8">
                                                <button name="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--AWS Cloud 26-28-->
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">AWS Cloud</div>
                                    <div class="panel-body form-horizontal">
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">VPC</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="26" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">EC2</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="27" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="control-label col-xs-4">EBS/S3</label> 
                                            <div class="col-xs-8">
                                                <input id="text" name="28" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-2 ">
                            </div>
                            <div class="col-md-2 ">
                            </div>
                            <div class="col-md-2 ">
                            </div>
                            <div class="col-md-2 ">
                            </div>






                            <div class="clearfix"> </div>
                        </div>

                        <div class="content-top">
                            <div class="col-md-12 ">
                                <?php
                                $sql = "SELECT kpi_skill.*,kpi_skill_category.skill_category_description FROM kpi_skill
INNER JOIN kpi_skill_category
ON kpi_skill.skill_category_id = kpi_skill_category.skill_category_id";
                                ?>
                                <table id="example" class="display" cellspacing="0" width="100%" >
                                    <?php
                                    $dataSet = getData($sql);
                                    foreach ($dataSet as $value) {
                                        ?>
                                        <tr>
                                            <td><?= $value['skill_id'] ?></td>
                                            <td <?= $value['note_css'] ?>><?= $value['skill_category_description'] ?></td>
                                            <td><?= $value['skill_description'] ?></td>
                                            <td><input id="text" name="<?= $value['skill_id'] ?>" <?= $value['note_html'] ?> type="text" class="form-control"></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

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

