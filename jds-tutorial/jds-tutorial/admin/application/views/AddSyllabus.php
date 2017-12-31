<!DOCTYPE html>
<html>
    <head>
        <title>Add syllabus</title>
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
                    <?php foreach($Standard as $standard) {
                        $name = $standard->standard;
                    }
                    ?>
                    <!-- page header -->
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 class="heading">Add New Syllabus for <?php echo $name; ?></h1>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Syllabus_Controller/ViewSyllabus"); ?>"><i class="fa fa-dashboard"></i> Standard Wise Syllabus</a></li>
                            <li class="active">Add New Syllabus</li>
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
                                Enter Syllabus Details for <?php echo $name; ?>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <?php if($AllSubjects > 0) {?>
                                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/Syllabus_Controller/InsertSyllabus') ?>">
                                            <div class="form-group">
                                                <label>Select Subject</label>
                                                 <select class="form-input form-control" name="subject" id="subject">
                                                    <option>Select Subject</option>
                                                    <?php foreach($AllSubjects as $subject) { ?>
                                                    <option value="<?php echo $subject->sub_id; ?>"><?php echo $subject->sub_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="standard_id" value="<?php echo $subject->standard_id; ?>">
                                                <input type="hidden" name="standard_name" value="<?php echo $subject->standard; ?>">
                                                <input type="hidden" name="subject_name" id="subject_name" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Syllabus [PDF Only]</label>
                                                <input type="file" class="form-input" name="ImageUpload" required>
                                            </div>
                                            <input type="submit" class="btn btn-default" value="Submit" name="AddSyllabus">
                                        </form>
                                                    <?php } else { echo "No Subjects Found. Please Add Subjects First"; } ?>
                                    </div>
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
                    <script type="text/javascript">
                        //Assigning subjet name
                        $('#subject').change(function() {
                            var subjectName = $('#subject').find(":selected").text();
                            //alert(subjectName);
                            $('#subject_name').val(subjectName);
                        });
                    </script>
                    </body>
                    </html>





