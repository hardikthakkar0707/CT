<!DOCTYPE html>
<html>
    <head>
        <title>Add Subjects</title>
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
                    <!-- page header -->
                    <div class="col-lg-12">
                       <div class="page-header">
                        <h1 class="heading">Edit Subject</h1>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Subject_Controller/ViewSubject"); ?>">Subjects</a></li>
                            <li class="active">Edit Subject</li>
                        </ol>
                      </div>
                    </div>
                    <!--end page header -->
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Enter Subject Details
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Subject_Controller/UpdateSubject"); ?>">
                                                <?php if (isset($res)) { ?>
                                                <div class="form-group">
                                                    <?php
                                                    foreach ($res as $value) {
                                                        $sub_id=$value->sub_id;
                                                        $std_id=$value->standard_id;
                                                    }
                                                    ?>

                                                    <input  type="hidden" name="subid" value="<?php if(isset($res)){ echo $sub_id;}?>"  >
                                                    <input  type="hidden" name="stdid" value="<?php if(isset($res)){ echo $std_id;}?>"  >
                                                </div>
                                                <?php } ?>

                                                <div class="form-group">
                                                    <label>Subject Name</label>
                                                    <input class="form-input form-control" placeholder="Subject Name" name="SubjectName" value="<?php if(isset($res)){ $res= trim($res['0']->sub_name); echo $res;  } ?>" required ><!-- pattern="[A-Za-z]{3,}"  -->
                                                </div>

                                                <input type="submit" class="btn btn-default" value="Update" name="UpdateSubject">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end page-wrapper -->

                            </div>

                            <!-- end page-wrapper -->
                        </div>
                        <!-- end wrapper -->
                    </div>
                    <!-- Core Scripts - Include with every page -->
                </div></div>
    <?php $this->load->view("footer"); ?>
                </body>
                </html>





