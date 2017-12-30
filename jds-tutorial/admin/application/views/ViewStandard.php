<!DOCTYPE html>
<html>
    <head>
        <title>View Standards</title>
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
            <div id="page-wrapper">
                <div class="row">
                    <!-- Page Header -->
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 class="heading">All Standards <a href="#" data-toggle="modal" data-target="#AddStandard" class="btn btn-info">Add New Standard</a></h1>
                            <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li>Standards</li>
                            <li class="active">All Standards</li>
                        </ol>
                          </div>
                    </div>
                    <!--End Page Header -->

                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Standards
                            </div>
                            <!-- Welcome -->
                            <div class="panel-body">

                                <?php if (isset($_SESSION['StandardAdded'])) {
                                if ($_SESSION['StandardAdded'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                <?php unset($_SESSION['StandardAdded']); }  else { ?>
                                    <div class="alert alert-danger"><?php echo "Something went wrong. Please try again." ?></div>
                                <?php unset($_SESSION['StandardAdded']); } } ?>


                                <?php if (isset($_SESSION['StandardDeleted'])) {
                                if ($_SESSION['StandardDeleted'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                <?php unset($_SESSION['StandardDeleted']); } else { ?>
                                    <div class="alert alert-success"><?php echo "Something went wrong. Please try again." ?></div>
                                <?php unset($_SESSION['StandardDeleted']); } } ?>


                                <?php if (isset($_SESSION['StandardUpdated'])) {
                                if ($_SESSION['StandardUpdated'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record updata Succesfully" ?></div>
                                <?php unset($_SESSION['StandardUpdated']); } else { ?>
                                    <div class="alert alert-danger"><?php echo "Something went wrong. Please try again." ?></div>
                                <?php unset($_SESSION['StandardUpdated']); } } ?>

                                <?php if(isset($res)) {?>
                                <div class="table-responsive">

                                    <table id="example" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Standard</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($res as $value) {?>

                                            <tr>
                                                <td><?php echo $no; $no++?></td>
                                                <td><?php echo $value->standard;?></td>
                                                <td>
                                                    <a href="<?php echo base_url("index.php/Standard_Controller/EditStandard/$value->standard_id")?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil update"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php  echo base_url("index.php/Standard_Controller/DeleteStandard/$value->standard_id")?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fa fa-trash-o delete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>

                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("footer"); ?>

         <!-- Add Subject Modal -->
        <div id="AddStandard" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Standard</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url("index.php/Standard_Controller/InsertStandard") ?>" method="POST" role="form">
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td>Standard</td>
                      <td><input type="text" name="StandardName"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <input type="submit" class="btn btn-default" name="add_standard" value="Add">
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





