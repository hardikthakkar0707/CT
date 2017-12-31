<!DOCTYPE html>
<html>
    <head>
        <title>Tution Classes | Admin</title>
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
                        <h1 class="page-header heading">Add Syllabus</h1>
                    </div>
                    <!--end page header -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add More Syllabus
                            </div>
                            <div class="panel-body">
                                <?php 
                                if(isset($res)){
                                foreach ($res as $value) {
                                    $row=$value;
                                    //print_r($row);
                                }
                                }
                                ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        
                                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/Syllbus_Controller/addmoreinsert') ?>">
                                             <input type="hidden" class="form-input form-control" placeholder="Subject Nam" name="standardid" value="<?php echo $row->std_name;?>" >
                                            <input type="hidden" class="form-input form-control" placeholder="Subject Nam" name="syylbusid" value="<?php echo $row->standard_id ;?>" >

                                            <div class="form-group">
                                                <label>Subject Name</label>
                                                 <input class="form-input form-control" placeholder="Subject Name" name="BranchPhone1" pattern="[a-zA-Z0-9]{3,}" required>
                                            </div>
                                             
                                              
                                           
                                            
                                            <div class="form-group">
                                                <label>Syllabus [PDF Only]</label>
                                                <input type="file" class="form-input" name="ImageUpload"  required>
                                            </div>
                                            <input type="submit" class="btn btn-default" value="Submit" name="Submit">
                                            <input type="reset" class="btn btn-default" value="Reset">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end page-wrapper -->

                        </div>

                        <!-- end page-wrapper -->
                    </div>
                    <!-- end wrapper -->

                    <!-- Core Scripts - Include with every page -->
                    <?php $this->load->view("footer"); ?>
                    </body>
                    </html>





