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
                        <h1 class="heading">All Branches <a href="<?php echo base_url("index.php/Branch_Controller/AddBranch"); ?>" class="btn btn-info">Add New Branch</a></h1>
                         <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li>Branch</li>
                            <li class="active">All Branches</li>
                        </ol>
                      </div>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Branch
                        </div>
                        <!-- Welcome -->
                        <div class="panel-body">
                            <?php
                            if (isset($_SESSION['InsertBranch'])) {
                                if ($_SESSION['InsertBranch'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['InsertBranch']);
                                } else {
                                    ?>
                                    <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again." ?></div>
                                    <?php
                                    unset($_SESSION['InsertBranch']);
                                }
                            }

                             if (isset($_SESSION['DeleteBranch'])) {
                                if ($_SESSION['DeleteBranch'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['DeleteBranch']);
                                } else {
                                    ?>
                                    <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again." ?></div>
                                    <?php
                                    unset($_SESSION['DeleteBranch']);
                                }
                            }
                            if (isset($_SESSION['Updatebranch'])) {
                                if ($_SESSION['Updatebranch'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Update Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['Updatebranch']);
                                } else {
                                    ?>
                                    <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again." ?></div>
                                    <?php
                                    unset($_SESSION['Updatebranch']);
                                }
                            }
                            ?>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Branch Area</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if (!empty($resBranch)) { ?>
                                        <tbody>
                                            <?php $no=1;foreach ($resBranch as $value) {
                                                ?>
                                                <tr>
                                                    <td><?php  echo $no; $no++;?></td>
                                                    <td><?php echo $value->branch_area;?></td>
                                                    <td><?php echo $value->address;?></td>
                                                    <td><?php echo $value->phone_no1; ?>,<?php echo $value->phone_no2; ?></td>
                                                    <td><?php echo $value->email;?></td>
                                                    <td>
                                                        <a href="<?php echo base_url("index.php/Branch_Controller/Fetchbranchupdate/$value->branch_id"); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil update"></i></a>&nbsp;
                                                        <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Branch_Controller/DeleteBranch/$value->branch_id")?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa fa-trash-o delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                        </tbody>
<?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view("footer"); ?>
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
