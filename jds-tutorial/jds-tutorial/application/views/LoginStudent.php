<?php
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) {
    redirect('Student_Controller/Student');
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>TutionClasses</title>
        <?php $this->load->view("head"); ?>
        <style type="text/css">
            .btn 
            {
                width: 100%;
                height: 45px;
                background :none;
                border:1px solid #fff;
                font-family: 'Dosis', sans-serif;
                margin-bottom: 10px;
                color:#fff;
            }
            .btn:hover
            {
                background-color: #014279;
                border:1px solid #fff;
            }
            .form-signin
            {
                max-width: 280px;
                padding: 15px;
                margin: 0 auto;
                margin-top:63px;
                background: rgba(1, 66, 121,0.9);
                border-radius: 10px;
                box-shadow: 0px 0 10px 0px #38356E;
            }
            .form-signin .form-signin-heading, .form-signin
            {
                margin-bottom: 30px;
            }
            .form-signin .form-control
            {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .form-signin .form-control:focus 
            {
                background-color: #014279;
                z-index: 2;
            }
            .form-signin input[type="text"], .form-signin input[type="password"]
            {
                margin-bottom: 20px;
                border:1px solid #fff;
                background: none;
                color:#fff;
            }
            .form-signin input[type="text"]::-webkit-input-placeholder, .form-signin input[type="password"]::-webkit-input-placeholder{ 
                color: #fff;
            }
            .form-signin-heading
            {
                color: #fff;
                text-align: center;
                text-shadow: 0 2px 2px rgba(0,0,0,0.5);
                border-right: 3px solid #fff;
                border-left: 3px solid #fff;
                border-radius: 3px;
                font-family: myFirstFont;
                font-weight: none;
                font-size:27px;
            }
            .form-signin hr{
                background-color: #fff}
            .form-signin a{
                color:#fff;
            }
        </style>

    </head>
    <body>
        <?php $this->load->view("menu"); ?>
        <div class="container-fluid bg">
            <div class="container s-login-bg">
                <form  method="post" class="form-signin" action="<?php echo base_url("index.php/Student_Controller/Student"); ?>">
                    <h1 class="form-signin-heading text-muted">Student Login</h1>
                    <?php 
                    if(isset($_SESSION['StudentRestricted'])){
                        if($_SESSION['StudentRestricted']==0){ ?>
                            <p style="color: red;text-align: center;padding: 5px;font-weight: 900;">
                                <?php echo "Invalid Email And Password"; ?> 
                            </p>
                        <?php } unset($_SESSION['StudentRestricted']);
                    } 
                    ?>
                    <input type="text" class="form-control" placeholder="Email address" name="email">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <input type="submit" class="btn btn-primary" name="subbtn">
                    <!-- <hr>
                    <a href="#">Forgotten password?</a> -->
                </form>
            </div>
        </div>
        <?php $this->load->view("footer"); ?>
    </body>
</html>
