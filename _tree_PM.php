<nav class="navbar-default navbar-static-top" role="navigation">

    <?php include './_top.php'; ?>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="home.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span> </a>
                </li>
                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">User Manager</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="user_creation.php" class=" hvr-bounce-to-right"> <i class="fa fa-user-plus nav_icon"></i>Create User</a></li>
                        <li><a href="user_update.php" class=" hvr-bounce-to-right"><i class="fa fa-users nav_icon"></i>Update User</a></li>
                    </ul>
                </li>
                <li>
                    <a href="junior_weekplan_explorer.php" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Weekly Plan Explorer</span> </a>
                </li>
                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Week Plan Request</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="smanager_weekplan_request.php" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>New Request</a></li>
                        <li><a href="smanager_weekplan_explorer.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Request Explorer</a></li>
                    </ul>
                </li>
                <li><a href="user_skill_setup.php" class=" hvr-bounce-to-right"><i class="fa fa-graduation-cap  nav_icon"></i>Skill Setup</a></li>
                <li><a href="user_skill_setup_view.php" class=" hvr-bounce-to-right"><i class="fa fa-eye nav_icon"></i>Skill View</a></li>
                <li>
                    <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Performance appraisal</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="user_create_PAFID.php" class=" hvr-bounce-to-right"><i class="fa fa-book nav_icon"></i>Create PAF</a></li>
                        <li><a href="PAFID_explorer.php" class=" hvr-bounce-to-right"><i class="fa fa-archive nav_icon"></i>PAF Explorer</a></li>
                        <li><a href="PAFID_approval_explorer.php" class=" hvr-bounce-to-right"><i class="fa fa-archive nav_icon"></i>PAF Approval</a></li>
                    </ul>
                </li>
               
                <!--<li><a href="junior_reports.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Reports</a></li>-->
            </ul>
        </div>
    </div>
</nav>