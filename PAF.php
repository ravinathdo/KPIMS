


<?php
$PAFID = $_GET['id'];
if(isset($_GET['status_code']))
$status_code = $_GET['status_code'];
?>
<h4 style="text-align: center;margin-bottom: 10px">PERFORMANCE APPRAISAL FORM</h4>



<table border="1" style="width: 100%">
    <tbody>
        <tr>
            <td>Form No</td>
            <td colspan="3"><?= $PAFID ?></td>
        </tr>
        <tr>
            <td>JENGINEER</td>
            <td><?= $_SESSION['userbean']['first_name'] ?> <?= $_SESSION['userbean']['last_name'] ?></td>
            <td>Job Title</td>
            <td><?= $_SESSION['userbean']['job_title'] ?></td>
        </tr>
        <tr>
            <td>Evaluated by</td>
            <td> </td>
            <td>Date of Appointment</td>
            <td><?= $_SESSION['userbean']['date_of_appointment'] ?></td>
        </tr>
    </tbody>
</table>



<div class="panel panel-primary">
    <div class="panel-heading ">OBJECTIVE SETTING</div>
    <div class="panel-body">
        <p>Identify a minimum of three & a maximum of five SMART objectives. These objectives must be those that were agreed to be accomplished over the coming year.</p>

        <?php
        /*
          SELECT kpi_goal_employee.*,kpi_goal_objective.point,kpi_goal_ratio.goal_ratio FROM kpi_goal_employee
          INNER JOIN kpi_goal_objective
          ON kpi_goal_employee.goal_objective_id = kpi_goal_objective.id
          INNER JOIN kpi_goal_ratio
          ON kpi_goal_ratio.id = kpi_goal_objective.goal_ratio_id
          WHERE kpi_goal_employee.PAFID = 2 AND kpi_goal_employee.employee_id = 3
         */
        $sqlobj = "
SELECT kpi_goal_employee.*,kpi_goal_objective.point,kpi_goal_ratio.goal_ratio FROM kpi_goal_employee
INNER JOIN kpi_goal_objective 
ON kpi_goal_employee.goal_objective_id = kpi_goal_objective.id
INNER JOIN kpi_goal_ratio
ON kpi_goal_ratio.id = kpi_goal_objective.goal_ratio_id
WHERE kpi_goal_employee.PAFID = '$PAFID' ";

        $dataObj = getData($sqlobj);
        if ($dataObj)
            foreach ($dataObj as $value) {
                ?>
                <table border="1" style="width: 100%" >
                    <tbody>
                        <tr style="font-weight: bold">
                            <td style="width: 40%">Objective </td>
                            <td style="width: 60%"><?= $value['goal_ratio'] ?></td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Weightage (Out of 100%)</td>
                            <td><?= $value['point'] ?>%</td>
                        </tr>
                        <tr><td colspan="2">Mid Year Review</td></tr>
                        <tr>
                            <td>Comments (Employee)</td>
                            <td><?= $value['mid_year_comment_employee'] ?></td>
                        </tr>
                        <tr>
                            <td>Comments (Manager)</td>
                            <td><?= $value['mid_year_comment_manager'] ?></td>
                        </tr>
                        <tr><td colspan="2">Annual Review</td></tr>
                        <tr>
                            <td>Comments (Employee)</td>
                            <td><?= $value['annual_comment_employee'] ?></td>
                        </tr>
                        <tr>
                            <td>Comments (Manager)</td>
                            <td><?= $value['annual_comment_manager'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
            }
        ?>       

    </div>
</div>





<div class="panel panel-primary">
    <div class="panel-heading ">BEHAVIOURAL COMPETENCIES</div>
    <div class="panel-body">
        <table border="1">
            <thead>
                <tr>
                    <th>Competency</th>
                    <th>Description</th>
                    <th>Employee’s Rating(A/B/C/D)</th>
                    <th>Manager’s Rating(A/B/C/D)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlBeh = " SELECT kpi_employee_beh_competency.*,kpi_beh_competency.competency,kpi_beh_competency.description FROM kpi_employee_beh_competency
 INNER JOIN kpi_beh_competency 
 ON kpi_beh_competency.id = kpi_employee_beh_competency.beh_competency_id
WHERE kpi_employee_beh_competency.PAFID = '$PAFID'";
                $data = getData($sqlBeh);
                if ($data)
                    foreach ($data as $value) {
                        ?>
                        <tr>
                            <td><?= $value['competency'] ?></td>
                            <td><?= $value['description'] ?></td>
                            <td><?= $value['employee_rating'] ?></td>
                            <td><?= $value['manager_rating'] ?></td>
                        </tr>
                        <?php
                    }
                ?>

            </tbody>
        </table>

    </div>
</div>





<hr>
<div class="panel panel-primary">
    <div class="panel-heading ">OVERALL RATING</div>
    <div class="panel-body">

        <?php
        $sqlOver = "SELECT * FROM kpi_overall_rating WHERE PAFID = '$PAFID'";
        $data0 = getData($sqlOver);
        if ($data0)
            foreach ($data0 as $value) {
                ?>
                <table border="1" style="width: 100%">
                    <tbody>
                        <tr>
                            <td>Overall Performance Rating based on achievement of KPI’s (1,2,3,4)</td>
                            <td><?= $value['performance_rating'] ?></td>
                        </tr>
                        <tr>
                            <td>Overall Behavioural Rating based on competencies(A,B,C,D)</td>
                            <td><?= $value['behavioural_rating'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
            }
        ?>

    </div>
</div>





<hr>



<div class="panel panel-primary">
    <div class="panel-body">
        <h4 style="margin-top: 10px">OBJECTIVE SETTING SIGN OFF </h4>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Employee’s Comments</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr >
                    <td style="width: 75%">Immediate Line Manager’s Comments</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Chief Executive Officer</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Group HR (Head of Learning & Talent)</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>

        <hr>
        <h4 style="margin-top: 10px">MID YEAR REVIEW SIGN OFF </h4>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Employee’s Comments</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr >
                    <td style="width: 75%">Immediate Line Manager’s Comments</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Chief Executive Officer</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Group HR (Head of Learning & Talent)</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>

        <hr>
        <h4 style="margin-top: 10px">ANNUAL REVIEW SIGN OFF </h4>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Employee’s Comments</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr >
                    <td style="width: 75%">Immediate Line Manager’s Comments</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Chief Executive Officer</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 75%">Group HR (Head of Learning & Talent)</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>Signature</td>
                </tr>
            </tbody>
        </table>


        <?php
        if (isset($_GET['status_code']))
            if ($status_code == 'ACTIVE') {
                ?> 
        <form action="PAF_Complete.php?id=<?= $_GET['id'] ?>" method="post">
                    <input type="hidden" name="pafid" value="<?= $_GET['id'] ?>" />
                    <button name="submitComp" type="submit" class="btn btn-success">Reviewe And Complete</button>
                </form> <?php
            } else {
                ?> <h2 style="text-align: center;color: green"><?= $status_code ?></h2> <?php
            }
        ?>
    </div>
</div>


