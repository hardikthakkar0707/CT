<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TutionClasses | Admin</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url('panel/plugins/bootstrap/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('panel/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('panel/plugins/pace/pace-theme-big-counter.css'); ?>" rel="stylesheet" />
   <link href="<?php echo base_url('panel/css/style.css'); ?>" rel="stylesheet" />
      <link href="<?php echo base_url('panel/css/main-style.css'); ?>" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="<?php echo base_url("panel/img/logo1.png"); ?>" alt="">
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" >

                    <div class="panel-heading " style="background-color:#01315A; color:#fff;">
                        <h3 class="panel-title text-center">Admin Login</h3>

                    </div>


                    <div class="panel-body">
                    <?php if(isset($msg))
                        {
                    		echo "<p style='text-align: center;font-weight: 900;color: white;'>".$msg."</p>";
                    	}?>
                        <form role="form" method="post" action="<?php echo base_url("index.php/Login_Controller/Home"); ?>">

                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="Name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="Password" type="password" value="">
                                </div>
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->

                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="btnLogIn" value="Log In" class="btn btn-lg btn-info btn-block">
                                <!-- <div class="form-group">
                                    <p style="margin-top:3%;margin-left:2%;"><a href="">Forget Password</a></p>
                                </div> -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url('panel/plugins/jquery-1.10.2.js'); ?>"></script>
    <script src="<?php echo base_url('panel/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('panel/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>


</body>

</html>
