<!DOCTYPE html>
<html>
    <head>
        <title>View schedule</title>
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
        <div id="page-wrapper">
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header heading">View Schedule</h1>
                </div>
                <!--End Page Header -->

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Schedule
                        </div>
                        
                <!-- Welcome -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php 
                                  if (isset($_SESSION['InsertSchedule'])) {
                            if ($_SESSION['InsertSchedule'] == '1') {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                <?php
                                unset($_SESSION['InsertSchedule']);
                            } else {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Added UnSuccesfully" ?></div>
                                <?php
                                unset($_SESSION['InsertSchedule']);
                            }
                        }
                                 if (isset($_SESSION['deletesedual'])) {
                            if ($_SESSION['deletesedual'] == '1') {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                <?php
                                unset($_SESSION['deletesedual']);
                            } else {
                                ?>
                                <div class="alert alert-success"><?php echo "Record  Not Delete " ?></div>
                                <?php
                                unset($_SESSION['deletesedual']);
                            }
                        }
                                ?>
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Standard</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $a=1;
                                        foreach ($res as $value) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $value->standard; 
                                                if($value->standard==1)
                                                {
                                                   echo "<sup>st</sup>";
                                                }elseif ($value->standard==2) {
                                                    echo "<sup>nd</sup>";
                                                }elseif ($value->standard==3) {
                                                    echo "<sup>rd</sup>";
                                                }else{
                                                     echo "<sup>th</sup>";
                                                }
                                            ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url("index.php/ScheduleController/FullSchedule/$value->standard"); ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">View Schedule</a> &nbsp;
                                                <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/ScheduleController/deletesedual/$value->standard");?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
        <?php  $this->load->view("footer"); ?>
        <script>
  $(function(){
    $("#example").dataTable();
  } )
  </script>
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
    </body>
    </html>





  