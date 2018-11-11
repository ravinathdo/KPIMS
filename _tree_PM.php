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
                        <li><a href="user_creation.php" class=" hvr-bounce-to-right"> <i class="fa fa-area-chart nav_icon"></i>Create User</a></li>
                        <li><a href="user_update.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Update User</a></li>
                    </ul>
                </li>
                <li>
                    <a href="junior_weekplan_explorer.php" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Weekly Plan Explorer</span> </a>
                </li>
                <li><a href="user_skill_setup.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Skill Setup</a></li>
                <li><a href="user_skill_setup_view.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Skill View</a></li>
                <li><a href="junior_reports.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>Reports</a></li>
            </ul>
        </div>
    </div>
</nav>