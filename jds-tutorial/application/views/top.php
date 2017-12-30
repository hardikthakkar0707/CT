<style>
@media only screen and (min-width:768px) {
    #navbar1 {
        background-color: #01315a;
    }
    .navbar {
        height: 100px;
        margin-bottom: unset;
        border-radius: unset;
    }
    .head {
        color:#fff;
    }
}
.page-header {
    margin:unset;
    border-bottom:unset;
}
</style>

<div class="navbar" id="navbar1">
        <div class="col-md-2 col-xs-12">
            <a class="navbar-brand" href="<?php echo base_url("index.php/Login_Controller/Home") ?>">
                <img src="<?php echo base_url("assets/images/logo1.png"); ?>" alt="">
            </a>
        </div>
        <div class="col-md-8 col-xs-12 text-center head">
            <h1>Media Maggi Tutorials</h1>
        </div>
        <div class="col-md-2 text-center head" style="margin-top:10px;">
            <?php if(isset($_SESSION['isFacLoggedIn']) && $_SESSION['isFacLoggedIn'] == 1) { ?>
                <p>Welcome <?php echo $_SESSION['facultyname']; ?></p>
                <a href="<?php echo base_url("index.php/Faculty_Controller/LogOut"); ?>" class="btn btn-success"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
            <?php } ?>

            <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) { ?>
                <p>Welcome <?php echo $_SESSION['studentname']; ?></p>
                <a href="<?php echo base_url("index.php/Student_Controller/LogOut"); ?>" class="btn btn-success"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
            <?php } ?>
        </div>
</div>