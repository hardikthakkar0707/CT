<style>
	.dashboard {
		border-radius:unset;
	}
	.navbar-default .navbar-nav>li>a.btn-warning:hover {
		background:#FA6210;
		color:#fff;
	}

</style>
<div class="container-fluid top-bar">
		<div class="container" style="margin-bottom: 2%;">
			<div class="row">
				<div class="col-sm-3">
					<img src="<?php echo base_url("assets/images/logo1.png");?>" alt=""/>
				</div>
				<div class="col-sm-6">
					<h3>MediaMaggi Tutorials</h3>
				</div>
				<div class="col-sm-3 contact_info">
					<span class="fa fa-envelope"></span> mediamaggi@info.com <br>
						<span style="padding: 2px 12px 6px 10px;background: #FA6210;color: #fff;font-size: 16px;font-style: normal;border-radius: 0 6px 6px 0;"><span class="fa fa-phone"></span> &nbsp;&nbsp;+91 9876543210</span>
					<?php //if($_SESSION['login']==0){?>
												<?php if(isset($_SESSION['studentid'])){?>
					<h6>Welcome <?php echo $_SESSION['studentname'];?></h6>
												<?php } ?>
					<?php //} ?>
				</div>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
		<div class="container">
			<div class="row">
			<!-- <div class="col-sm-5">
				<img src="images/logo.png">
			</div> --> <!-- end of col5 -->
				<div class="col-sm-12 my-menu">
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my-navbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div><!-- end of navbar-header -->
						<div class="collapse navbar-collapse" id="my-navbar">

							<ul class="nav navbar-nav pull-left nav-ul">
								<li><a href="<?php echo base_url('index.php/welcome'); ?>">Home</a></li>
								<li><a href="<?php echo base_url('index.php/welcome/AboutUs'); ?>">About Us</a></li>
								<li><a href="<?php echo base_url("index.php/FacultyProfile_Controller/FacultyProfile"); ?>">Profile Of Faculty</a></li>
								<li><a href="<?php echo base_url("index.php/Syllabus_Controller/SyllabusStandard"); ?>">Syllabus</a></li>
								<li><a href="<?php echo base_url("index.php/Schedule_controller/"); ?>">Monthly Schedule</a></li>
								<li><a href="<?php echo base_url("index.php/Toper_Controller/Toppers"); ?>">Toppers</a></li>

								<?php if(!isset($_SESSION['facultyid'])&& !isset($_SESSION['studentid'])){?>
								<li><a href="<?php echo base_url("index.php/Faculty_Controller/LoginStaff"); ?>">Login Faculty</a></li>
								<li><a href="<?php echo base_url("index.php/Student_Controller/LoginStudent"); ?>">Login Student</a></li>
								<?php }?>
								
								<li><a href="<?php echo base_url("index.php/Contactus_Controller/ContactUs"); ?>">Contact Us</a></li>

								<?php if(isset($_SESSION['studentid']) ){?>
									<li><a href="<?php echo base_url("index.php/Student_Controller/ViewResults"); ?>" class="btn btn-warning dashboard">My Dashboard</a></li> <?php }?>
								
								<?php if(isset($_SESSION['facultyid']) ){?>
									<li><a href="<?php echo base_url("index.php/Faculty_Controller/ViewResults"); ?>" class="btn btn-warning dashboard">My Dashboard</a></li> <?php }?>
							</ul>
						</div><!-- end of collapse -->
					</nav>
				</div><!-- end of col7 -->
			</div> <!-- end of row -->
		</div>
	</div>