<?php //print_r($StudentDetails); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add student</title>
        <?php $this->load->view("head"); ?>
        <style type="text/css">
            select.form-control {
                -webkit-appearance: none;
            }
            select.standard, select.branch {
                -webkit-appearance: menulist;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
        function getSubjects(standard) {
            $.post("<?php echo base_url(); ?>index.php/Student_Controller/FetchSubjects/", {id: standard.value}, function(data) {
                console.log(data);
                $('#subject').html(data);
            });
        }
        </script>
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
                        <h1 class="heading">Add New Student</h1>
                         <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Login_Controller/ViewStudent"); ?>">All Students</a></li>
                            <li class="active">All Students</li>
                        </ol>
                      </div>
                    </div>
                    <!--end page header -->
                </div>
                <?php
                if (isset($StudentDetails)) {
                     foreach($StudentDetails as $value) {
                        $row=$value;
                    }
                    $insert="UpdateStudentData";
                }else{
                    $insert="InsertStudentData";
                }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="row">

                                    <!--  <div class="col-lg-6"> -->
                                    <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Student_Controller/$insert") ?>">

                                        <input type="hidden" class="form-input form-control" name="sid" value="<?php if(isset($row)){ echo $row->stud_id;}?>" >

                                        <div class="col-md-6 form-group">
                                            <label>Roll No</label>
                                            <input class="form-input form-control" placeholder="Roll No" name="Rno" value="<?php if(isset($row)){ echo $row->roll_no;}?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Student Name</label>
                                            <input class="form-input form-control" placeholder="Student Name" name="SName" value="<?php if(isset($row)){ echo $row->stud_name; }?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>School Name</label>
                                            <input class="form-input form-control" placeholder="School Name" name="SchoolName" value="<?php if(isset($row)){ echo $row->school_name;} ?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Branch</label>
                                            <select class="form-input form-control branch" name="Branch">
                                                <option value="">Select Branch</option>.
                                                <?php foreach ($AllBranches as $branch) { ?>
                                                    <option value="<?php echo $branch->branch_id; ?>" <?php echo(isset($StudentDetails) && $branch->branch_id == $row->branch_id) ? "selected" : "" ; ?>>
                                                        <?php echo $branch->branch_area; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Standard</label>
                                            <select class="form-input form-control standard" name="Standard" onchange="getSubjects(this);" required>
                                                <option value="">Select Standard</option>
                                               <?php foreach($AllStandards as $standard) { ?>
                                               <option value="<?php echo $standard->standard_id ?>" <?php echo(isset($StudentDetails) && $standard->standard_id == $row->standard_id) ? "selected" : "" ; ?>>
                                                    <?php echo $standard->standard; ?>
                                                </option>
                                               <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label>Subjects [Select multiple Subjects <kbd>Ctrl</kbd>+<kbd>Select</kbd>]</label>
                                            <select class="form-input form-control" name="subject[]" multiple="multiple" id="subject" size="3" required>
                                                <?php if(isset($StudentDetails)) {
                                                    $subject_selected = explode(",",$row->subject);
                                                    foreach($AllSubjects as $subject) {
                                                ?>
                                                <option value="<?php echo $subject->sub_name; ?>" <?php if(in_array($subject->sub_name, $subject_selected)) : echo "selected"; endif; ?>>
                                                    <?php echo $subject->sub_name; ?>

                                                    </option>
                                                <?php } } else { ?>
                                                <option>Select Standard First</option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label>Email Address</label>
                                            <input type="email" required class="form-input form-control" placeholder="Email" name="Email" value="<?php if(isset($row)){ echo $row->email_id;} ?> " required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-input form-control" placeholder="Password" name="Password" value="<?php if(isset($row)){ echo $row->password; }  ?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Gender</label>
                                            <br>
                                            <input type="radio" name="gender" value="Male" <?php if(isset($row)){ if($row->gender=='Male') echo "checked"; }  ?> required>Male
                                            <input type="radio" name="gender" value="Female" <?php if(isset($row)){ if($row->gender=='Female') echo "checked"; }  ?>>Female
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Contact No</label>
                                            <input class="form-input form-control" placeholder="Contact No" name="contact" value="<?php if(isset($row)){ echo $row->contact_no; } ?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Student Photo <br> <span style="color:blue;font-size:12px;font-weight: normal;">(Note: Photo format : jpg | png | jpeg | gif & Maximum Size : 500kb are allowed.)</span></label>
                                            <input type="file" class="form-input" name="ImageUpload" accept="image/*" >
                                            <?php if(isset($row)){?><img src="<?php echo base_url("panel/img/student/$row->photo"); ?>" width="100px" height="100px"><?php }?>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <br><br>
                                            <input type="submit" class="btn btn-default" value="Submit" name="AddStudent">
                                        </div>
                                    </form>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <!-- end page-wrapper -->

                        </div>

                        <!-- end page-wrapper -->
                    </div>
                    <!-- end wrapper -->
</div></div>
                    <!-- Core Scripts - Include with every page -->
<?php $this->load->view("footer"); ?>

                    </body>
                    </html>





