<nav class="navbar-default navbar-static-top" role="navigation">

    <?php include './_top.php'; ?>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="home.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span> </a>
                </li>
                <li>
                    <a href="hit_skill_explorer.php" class=" hvr-bounce-to-right"><i class="fa fa-archive nav_icon "></i><span class="nav-label">Skill Explorer</span> </a>
                </li>
                <li>
                    <a href="weekplan_explorer.php?flag=<?= $_SESSION['userbean']['user_role'] ?>" class=" hvr-bounce-to-right"><i class="fa fa-steam nav_icon "></i><span class="nav-label">Weekly Plan Explorer</span> </a>
                </li>
                <li><a href="PAFID_approval_explorer.php" class=" hvr-bounce-to-right"><i class="fa fa-bookmark nav_icon"></i>PAF Approval</a></li>
                <li><a href="hit_PAFID_employee_view.php" class=" hvr-bounce-to-right"><i class="fa fa-newspaper-o nav_icon"></i>Employee PAF Search</a></li>
                <li>
                    <a href="report_skill_ranking.php" class=" hvr-bounce-to-right"><i class="fa fa-sticky-note nav_icon "></i><span class="nav-label">Reports Skill Ranking</span> </a>
                </li>
            </ul>
        </div>
    </div>
</nav>