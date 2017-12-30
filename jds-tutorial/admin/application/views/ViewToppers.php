<!DOCTYPE html>
<head>
    <title>Tution Classes | Admin</title>
    <?php $this->load->view("head"); ?>
</head>
<body>
    <div id="wrapper">
        <!--header start-->
        <?php $this->load->view("top"); ?>
        <!--header end-->
        <!--sidebar start-->
        <?php $this->load->view("panel"); ?>
        <!--sidebar end-->
        <!--main content start-->
        <div id="page-wrapper">
            <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
              <div class="page-header">
                <h1 class="heading">All Toppers <a href="<?php echo base_url("index.php/Toper_Controller/AddNewTopper")?>" class="btn btn-info">Add New Topper</a></h1>
                 <ol class="breadcrumb">
                    <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Toppers</li>
                    <li class="active">All Toppers</li>
                </ol>
              </div>
            </div>
            <!--End Page Header -->
         </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Welcome -->
                        <?php if (isset($_SESSION['InsertTopper'])) {
                        if ($_SESSION['InsertTopper'] == '1') { ?>
                        <div class="alert alert-success"><?php echo "Record Inserted Succesfully" ?></div>
                        <?php unset($_SESSION['InsertTopper']); } else { ?>
                        <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again" ?></div>
                        <?php unset($_SESSION['InsertTopper']); } } ?>

                        <?php if (isset($_SESSION['DeleteTopper'])) {
                        if ($_SESSION['DeleteTopper'] == '1') { ?>
                        <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                        <?php unset($_SESSION['DeleteTopper']); } else { ?>
                        <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again" ?></div>
                        <?php unset($_SESSION['DeleteTopper']); } } ?>

                        <?php if (isset($_SESSION['UpdateTopper'])) {
                        if ($_SESSION['UpdateTopper'] == '1') { ?>
                        <div class="alert alert-success"><?php echo "Record Update Succesfully" ?></div>
                        <?php unset($_SESSION['UpdateTopper']); } else {?>
                        <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again" ?></div>
                        <?php unset($_SESSION['UpdateTopper']); } } ?>

                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">List of All Toppers</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php if (isset($ListAllToppers)) { ?>
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Result Year</th>
                                            <th>Standard</th>
                                            <th>Subject</th>
                                            <th>Student Name</th>
                                            <th>Student Photo</th>
                                            <th>Result</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                        <tbody>
                                            <?php $no = 1; foreach ($ListAllToppers as $value) { ?>
                                                <tr>
                                                    <td><?php echo $no; $no++; ?></td>
                                                    <td><?php echo $value->year; ?></td>
                                                    <td><?php echo $value->standard; ?></td>
                                                    <td><?php echo $value->subject; ?></td>
                                                    <td><?php echo $value->student_name; ?></td>
                                                    <td>
                                                        <img src="<?php echo ($value->photo == '') ? base_url("panel/img/male.png") : base_url("panel/img/topperimage/".$value->photo); ?>" height="50px" width="50px">
                                                    </td>
                                                    <td><?php echo $value->result; ?></td>
                                                    <td>
                                                        <a href="<?php  echo base_url("index.php/Toper_Controller/EditTopper/$value->topper_id");?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil update"></i></a>&nbsp;
                                                        <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Toper_Controller/DeleteTopper/$value->topper_id/$value->year_id")?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa fa-trash-o delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                </table>
                                <?php } else { echo "No Toppers Found"; } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view("footer"); ?>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <script>
            $(function () {
                $("#example").dataTable();
            })
        </script>

</body>
</html>
