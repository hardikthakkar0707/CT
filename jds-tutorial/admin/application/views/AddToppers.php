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
                         <div class="page-header">
                        <h1 class="heading"><?php if(!isset($EditTopper)){ echo "Add Topper Student"; }else{ echo "Edit Topper Student"; } ?></h1>
                       <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Toper_Controller/ViewToppers"); ?>">Toppers</a></li>
                            <li class="active"><?php if(!isset($EditTopper)){ echo "Add Topper Student"; }else{ echo "Edit Topper Student"; } ?></li>
                        </ol>
                      </div>

                    </div>
                    <!--end page header -->
                </div>
                <?php
                    if(isset($EditTopper)){
                        $insert="UpdateTopper";
                        foreach ($EditTopper as $value) {
                            $row=$value;
                        }
                    } else {
                        $insert="InsertNewTopper";
                    }
                ?>

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Enter Student Details
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <?php echo(isset($error)) ? '<div class="alert alert-danger">'.$error.'</div>' : ''; ?>
                                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Toper_Controller/$insert") ?>">
                                             <div class="form-group">
                                                <label>Result Year</label>
                                                <select class="form-input form-control" name="ResultYear" <?php echo(!isset($row)) ? "required" : ""; ?>>
                                                    <?php foreach($AllYears as $years) { ?>
                                                    <option value="<?php echo $years->year_id; ?>" <?php if(isset($row)) : echo($row->year_id == $years->year_id) ? "selected" : ""; endif; ?>>
                                                        <?php echo $years->year; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                              <?php if (isset($row)) { ?>
                                              <input type="hidden" class="form-input form-control" placeholder="Result Year" name="toperid" value=" <?php if(isset ($row)){ echo $row->topper_id; } ?>">
                                              <?php  }?>
                                            </div>
                                            <div class="form-group">
                                                <label>Standard</label>
                                                <select class="form-input form-control" name="Standard" <?php echo(!isset($row)) ? "required" : ""; ?>>
                                                     <?php foreach($AllStandards as $standards) { ?>
                                                    <option value="<?php echo $standards->standard_id; ?>" <?php if(isset($row)) : echo($row->standard_id == $standards->standard_id) ? "selected" : ""; endif;?>>
                                                        <?php echo $standards->standard; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input class="form-input form-control" placeholder="Subject" name="Subject" value="<?php if(isset($row)){echo $row->subject;}?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Student Name</label>
                                                <input class="form-input form-control" placeholder="Student Name" name="StudentName" value="<?php if(isset($row)){echo $row->student_name;}?>" <?php echo(!isset($row)) ? "required" : ""; ?>>
                                            </div>
                                            <div class="form-group">
                                                <label>Result  [Ex: 99% or 198 / 200]</label>
                                                <input class="form-input form-control" type="text" placeholder="Result" name="Result" value="<?php if(isset($row)){echo $row->result;}?>" <?php echo(!isset($row)) ? "required" : ""; ?> >
                                            </div>
                                            <div class="form-group">
                                                <label>Student Photo <span style="color:blue;font-size:12px;font-weight: normal;">(Note: Photo format : jpg | png | jpeg | gif & Maximum Size : 500kb are allowed.)</span></label>

                                                <input type="file" class="form-input" name="ImageUpload" accept="image/*" value="<?php if(isset($row)){ echo $row->photo;}?> " >
                                               <?php if(isset($row)) {?> <img src="<?php echo base_url("panel/img/topperimage/$row->photo")?>"  width="100px" height="100px"><?php } ?>
                                            </div>

                                            <input type="submit" class="btn btn-default" value="Submit" name="ActionTopper">
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
                </div>
</div></div>
                <!-- Core Scripts - Include with every page -->
<?php $this->load->view("footer"); ?>
                </body>
                </html>





