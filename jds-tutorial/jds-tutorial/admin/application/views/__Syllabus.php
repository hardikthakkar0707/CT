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
                    <h1 class="page-header heading">View Syllabus</h1>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">All Syllabus</div>
                        <?php 
                        if (isset($_SESSION['deletesyllbusindata'])) {
                                if ($_SESSION['deletesyllbusindata'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['deletesyllbusindata']);
                                } else {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Delete UnSuccesfully" ?></div>
                                    <?php
                                    unset($_SESSION['deletesyllbusindata']);
                                }
                            }
                                   ?>
                        <!-- Welcome -->
                        <?php 
                        if(!empty($res)){
                            foreach ($res as $value) {
                                $rowid=$value->standard_id;
                                
                            }
                        ?>
                        <div style="margin-left: 92%;margin-top: 12px;">
                            
                            <a href="<?php echo base_url("index.php/Syllbus_Controller/addmore/$rowid");?>" data-toggle="tooltip" data-placement="left" title="Add Syllabus">
                                <div style="width:50px;height:50px;background-color:#8E44AD;border-radius:100%;text-align:center;padding-top:14px;color:#fff;box-shadow: 0px 2px 12px 0px #5B2C6F;">
                                    <i class="fa fa-plus"></i>
                                </div>

                            </a>
                        </div>
                        <?php } ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Std</th>
                                            <th>Syllabus</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($res)){ ?>
                                    <tbody>
                                        <?php $no=1; foreach ($res as $value) {
//                                             print_r($value);?>
                                        <tr>
                                            <td><?php echo $no; $no++;?></td>
                                            <td><?php echo $value->std_name;?>
                                               <?php if($value->std_name==1){?>
                                                       <sup>st</sup></td>
                                                <?php }elseif($value->std_name==2){?>
                                                       <sup>nd</sup></td>
                                                <?php }elseif($value->std_name==3){?>
                                                       <sup>rd</sup></td>
                                                <?php }else{?>
                                                       <sup>rd</sup></td>
                                                <?php } ?>
                                
                                <td><a href="<?php echo base_url("panel/img/syllbus/$value->syllbus");?>"><img src="<?php echo base_url("panel/img/pdficon.png") ?> "   height="100px"></a></td>
                                            <td>
<!--                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil update"></i></a>&nbsp;-->
                                                <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Syllbus_Controller/deletesyllbusindata/$value->syllbus_id/$value->standard_id")?>" data-toggle="tooltip" data-placement="top" title="Delete">  
                                                    <i class="fa fa-trash-o delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <?php }?>
                                </table>
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
