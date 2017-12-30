<style type="text/css">
    .logout {
        color: #fff;
        padding-right: 25px;
        padding-top: 10px;
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top navbar1" role="navigation" id="navbar1">
    <!-- navbar-header -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url("index.php/Login_Controller/Home") ?>">
            <img src="<?php echo base_url("panel/img/logo1.png"); ?>" alt="">
        </a>
    </div>
    <!-- end navbar-header -->
    <!-- navbar-top-links -->
    <div class="logout text-right">
        <p>Welcome Admin,</p>
        <a href="<?php echo base_url("index.php/Login_Controller/Logout"); ?>" class="btn btn-success btn-sm"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
    </div>
    <!-- end navbar-top-links -->
</nav>