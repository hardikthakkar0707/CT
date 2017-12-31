<!DOCTYPE html>
<html>
    <head>
        <title>Add Branch</title>
    <?php $this->load->view("head"); ?>
    </head>
    <body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php $this->load->view("top"); ?>
        <!-- end navbar top -->
        <!-- navbar side -->
        <?php  $this->load->view("panel"); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">

                    <div class="page-header">
                        <h1 class="heading"><?php echo(isset($res)) ? "Edit Branch Details" : "Add Branch Details"; ?></h1>
                         <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Branch_Controller/ViewBranch"); ?>">All Branches</a></li>
                            <li class="active"><?php echo(isset($res)) ? "Edit Branch Details" : "Add Branch Details"; ?></li>
                        </ol>
                      </div>
                </div>
                <!--end page header -->
            </div>
            <?php if(isset($res)){
                    $insert="Updatebranch";
                    foreach ($res as $value) {
                        $row=$value;
                    }
               } else {
                    $insert="InsertBranch";
               }?>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enter Branch Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Branch_Controller/$insert"); ?>">
                                        <?php if(isset($row)){?>
                                              <input type="hidden" class="form-input form-control" placeholder="Branch Area" name="branch_id" value="<?php if(isset($row)){ echo $row->branch_id;}?>">
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Branch Area</label>
                                            <input class="form-input form-control" placeholder="Branch Area" name="AlbumName" value="<?php if(isset($row)){ echo $row->branch_area;}?>" pattern="[a-zA-Z0-9]{3,}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-input form-control" cols="29" rows="3" placeholder="Address" name="Add" required><?php if(isset($row)){ echo $row->address;}?></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Branch Phone 1</label>
                                            <input class="form-input form-control" placeholder="Phone" name="BranchPhone1" value="<?php if(isset($row)){ echo $row->phone_no1;}?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Branch Phone 2</label>
                                            <input class="form-input form-control" placeholder="Phone 2" name="BranchPhone2" value="<?php if(isset($row)){ echo $row->phone_no2;}?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-input form-control" placeholder="Branch Email" name="Email" value="<?php if(isset($row)){ echo $row->email;}?>" required>
                                        </div>
                                        <input type="submit" class="btn btn-default" value="Submit" name="SubmitImage">
                                    </form>
                                </div>
                    </div>
                </div>
        <!-- end page-wrapper -->

        </div>

    </div>
    <!-- end wrapper -->
</div>
</div></div>
    <!-- Core Scripts - Include with every page -->
    <?php  $this->load->view("footer"); ?>
    </body>
    </html>





