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
                        <h1 class="heading">Standard Wise Syllabus</h1>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li>Syllabus</li>
                            <li class="active">Standard Wise Syllabus</li>
                        </ol>
                      </div>
                    </div>
                    <!--End Page Header -->
            </div>
            <div class="row clearfix">
                    <?php $count=0; foreach($AllStandards as $standard) {
                        $id = $standard->standard_id;
                        $syllabuses = 's_'.$id;
                        //$subjects = 's_'.$$id;
                    ?>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $standard->standard." Standard Syllabus"; ?>  <a href="<?php echo base_url("index.php/Syllabus_Controller/AddSyllabus/$id"); ?>" id="<?php echo $id; ?>" class="btn btn-info btn-xs pull-right standard_id">Add Syllabus</a>
                            </div>

                            <?php if (isset($_SESSION['SyllabusAdded'])) { if ($_SESSION['SyllabusAdded'] == '1' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                            <?php unset($_SESSION['SyllabusAdded']); unset($_SESSION['StandardId']); } else if($_SESSION['SyllabusAdded'] == '0' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-danger">Something went wrong. Please try again.</div>
                            <?php unset($_SESSION['SyllabusAdded']); unset($_SESSION['StandardId']); } } ?>

                            <?php if (isset($_SESSION['SyllabusDeleted'])) { if ($_SESSION['SyllabusDeleted'] == '1' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-success"><?php echo "Record Deleted Succesfully" ?></div>
                            <?php unset($_SESSION['SyllabusDeleted']); unset($_SESSION['StandardId']); } else if($_SESSION['SyllabusDeleted'] == '0' && $_SESSION['StandardId'] == $id) { ?>
                                <div class="alert alert-danger">Something went wrong. Please try again.</div>
                            <?php unset($_SESSION['SyllabusDeleted']); unset($_SESSION['StandardId']); } } ?>

                            <!-- Welcome -->
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Syllabus</th>
                                            <th>Download</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($$syllabuses as $syllabus) {
                                            $url = base_url("panel/img/syllabus/$syllabus->syllabus");
                                        ?>

                                        <tr>
                                            <td><?php echo $syllabus->sub_name; ?></td>
                                            <td><a href="<?php echo base_url("panel/img/syllabus/$syllabus->syllabus");?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o"></i> Download</a></td>
                                            <td>
                                                <a onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Syllabus_Controller/DeleteSyllabus/$syllabus->syllabus_id/$syllabus->syllabus/$syllabus->standard_id"); ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o delete"></i></a>
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


<?php $this->load->view("footer"); ?>
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
