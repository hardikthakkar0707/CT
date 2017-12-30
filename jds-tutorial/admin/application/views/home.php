<!DOCTYPE html>
<html>
    <head>
        <title>Tution Classes | Admin</title>
        <style>
            #page-wrapper{
                background: #fff;
                
            }
            .text-center{
                background:#5B2C6F;
                color: #fff;
            }
            .text-center:hover{
                opacity: 0.9;
            }
            .loader {
                margin-left: 40px;
                border: 16px solid #fff; /* Light grey */
                /*border-top: 16px solid #3498db; /* Blue */
                border-radius: 50%;
                width: 120px;
                height: 120px;  
            }
        </style>
    <?php $this->load->view("head"); ?>
    </head>
    <body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php $this->load->view("top"); ?>
        <!-- end navbar top -->
        <!-- navbar side -->
        <?php $this->load->view("panel"); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header heading">Home</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<!--            <h1 style="color:white;text-align:center;margin-top:155px;font-size:50px;">Welcome</h1>-->
 
        </div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <?php $this->load->view("footer"); ?>
    </body>
    </html>


