<!DOCTYPE html>
<html>
    <head>
        <title>View Subjects</title>
        <?php $this->load->view("head"); ?>
        <style type="text/css">
            .alert {
                margin: 10px 10px;
            }
        </style>
    </head>
    <body>
        <!--  wrapper -->
        <div id="wrapper">
            <!-- navbar top -->
            <?php $this->load->view("top"); ?>
            <!-- end navbar top -->
            <!-- navbar side -->
            <?php $this->load->view("panel"); ?>
            <div id="page-wrapper">
                <div class="row">
                    <!-- Page Header -->
                    <div class="col-lg-12">
                      <div class="page-header">
                        <h1 class="heading">Standard Wise Subjects</h1>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li>Subjects</li>
                            <li class="active">Standard Wise Subjects</li>
                        </ol>
                      </div>
                    </div>
                    <!--End Page Header -->

                </div>
                <div class="row clearfix">
                    <?php $count=0; foreach($AllStandards as $standard) {
                        $id = $standard->standard_id;
                        $subjects = 's_'.$id;
                        //$subjects = 's_'.$$id;
                    ?>

                    <div class="col-lg-4">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $standard->standard; ?>  <a href="#" id="<?php echo $id; ?>" data-toggle="modal" data-target="#AddSubject" class="btn btn-info btn-xs pull-right standard_id">Add Subject</a>
                            </div>

                            <?php if (isset($_SESSION['SubjectAdded'])) { if ($_SESSION['SubjectAdded'] == '1' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                            <?php unset($_SESSION['SubjectAdded']); unset($_SESSION['StandardId']); } else if($_SESSION['SubjectAdded'] == '0' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-danger">Something went wrong. Please try again.</div>
                            <?php unset($_SESSION['SubjectAdded']); unset($_SESSION['StandardId']); } } ?>

                            <?php if (isset($_SESSION['SubjectDeleted'])) { if ($_SESSION['SubjectDeleted'] == '1' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-success"><?php echo "Record Deleted Succesfully" ?></div>
                            <?php unset($_SESSION['SubjectDeleted']); unset($_SESSION['StandardId']); } else if($_SESSION['SubjectDeleted'] == '0' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-danger">Something went wrong. Please try again.</div>
                            <?php unset($_SESSION['SubjectDeleted']); unset($_SESSION['StandardId']); } } ?>

                            <?php if (isset($_SESSION['SubjectUpdated'])) { if ($_SESSION['SubjectUpdated'] == '1' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-success"><?php echo "Record Updated Succesfully" ?></div>
                            <?php unset($_SESSION['SubjectUpdated']); unset($_SESSION['StandardId']); } else if($_SESSION['SubjectUpdated'] == '0' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-danger">Something went wrong. Please try again.</div>
                            <?php unset($_SESSION['SubjectUpdated']); unset($_SESSION['StandardId']); } } ?>

                            <!-- Welcome -->
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($$subjects as $subject) { ?>

                                        <tr>
                                            <td><?php echo $subject->sub_name; ?></td>
                                            <td>
                                                <a href="<?php echo base_url("index.php/Subject_Controller/EditSubject/$subject->sub_id");?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil update"></i></a>&nbsp;
                                                <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Subject_Controller/DeleteSubject/$subject->sub_id/$subject->standard_id")?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o delete"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php $count++; if($count%3 == 0) { echo "</div><div class='row'>"; } } ?>
                </div>
            </div>
        </div>
        <!-- Add Subject Modal -->
        <div id="AddSubject" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Subject</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url("index.php/Subject_Controller/InsertSubject") ?>" method="POST" role="form">
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td>Subject</td>
                      <td><input type="text" name="SubjectName"></td>
                      <input type="hidden" name="standard_id" id="standard_id" value="">
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <input type="submit" class="btn btn-default" name="add_subject" value="Add">
                      </td>
                    </tr>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Add Subject Modal Ends -->
        <?php $this->load->view("footer"); ?>
        <script type="text/javascript">
            //Assigning id
            $('.standard_id').click(function() {
                var id = $(this).attr('id');
                //alert(id);
                $('#standard_id').val(id);
            });

            //Ajax

        </script>
        <script>
            $(function () {
                $("#example").dataTable();
            })
        </script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>





