<nav class="navbar-default navbar-static-side" role="navigation" style="margin-top: 20px;">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php  echo base_url("index.php/Login_Controller/Home")?>"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Toper_Controller/ViewToppers"); ?>"><i class="fa fa-user-plus"></i>  Toppers</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Subject_Controller/ViewSubject"); ?>"><i class="fa fa-book"></i> Subjects</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Standard_Controller/ViewStandard"); ?>"><i class="fa fa-sort-amount-asc"></i> Standards</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Faculty_Controller/ViewFaculty"); ?>"><i class="fa fa-user-md "></i> Faculty</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Student_Controller/ViewStudent"); ?>"><i class="fa fa-user"></i> Student</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Branch_Controller/ViewBranch"); ?>"><i class="fa fa-chain "></i> Branch</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Result_Controller/ViewResult"); ?>"><i class="fa fa-th "></i> Results</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Syllabus_Controller/ViewSyllabus"); ?>"><i class="fa fa-file-pdf-o"></i>Syllabus</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-desktop "></i> Schedule</a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="<?php echo base_url("index.php/ScheduleController/AddSchedule"); ?>"><i class="fa fa-plus "></i>Add Schedule</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/ScheduleController/GetData"); ?>"><i class="fa fa-eye "></i>View Schedule</a>
                            </li>
                        </ul>
                    </li>
                   <!--  <li>
                        <a href="#"><i class="fa fa-desktop "></i> Schedule</a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="<?php echo base_url("index.php/welcome/AddSchedule"); ?>"><i class="fa fa-plus "></i>Add Schedule</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("index.php/welcome/ViewSchedule"); ?>"><i class="fa fa-eye "></i>View Schedule</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>