<!DOCTYPE html>
<head>
   <title>View Toppers</title>
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
                <h1 class="heading">Year wise Toppers List <a href="#" data-toggle="modal" data-target="#ResultYear" class="btn btn-info">Add New Year</a></h1>
              </div>
            </div>
            <!--End Page Header -->
         </div>
         <div class="row">
            <div class="col-lg-12">
               <!-- Advanced Tables -->
               <div class="panel panel-default">
                  <div class="panel-heading">
                     List of Years
                  </div>
                  <!-- Welcome -->
                  <div class="panel-body">

                    <!-- Add Topper Year Status -->
                     <?php if (isset($_SESSION['addTopperYear'])) {
                     if ($_SESSION['addTopperYear'] == '1') { ?>
                     <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                     <?php unset($_SESSION['addTopperYear']); }  elseif ($_SESSION['addTopperYear'] == 'year_exists') { ?>
                     <div class="alert alert-warning"><?php echo "Record Already Exist, Try Adding Some Different URL" ?></div>
                     <?php unset($_SESSION['addTopperYear']); } else { ?>
                    <div class="alert alert-danger"><?php echo "Something went wrong !! Please try again." ?></div>
                     <?php unset($_SESSION['addTopperYear']); } } ?>

                      <!-- Delete Year Check -->
                     <?php if (isset($_SESSION['DeleteYear'])) {
                        if ($_SESSION['DeleteYear'] == '1') {
                            ?>
                     <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                     <?php
                        unset($_SESSION['DeleteYear']);
                        }  else {?>
                     <div class="alert alert-success"><?php echo "Record Delete UnSuccesfully" ?></div>
                     <?php unset($_SESSION['DeleteYear']);
                        }
                        } ?>

                      <!-- Update Year Check -->
                      <?php  if (isset($_SESSION['updatetopperyear'])) {
                           if ($_SESSION['updatetopperyear'] == '1') {
                               ?>
                     <div class="alert alert-success"><?php echo "Record Update Succesfully" ?></div>
                     <?php
                        unset($_SESSION['updatetopperyear']);
                        }  else {?>
                     <div class="alert alert-success"><?php echo "Record Update UnSuccesfully" ?></div>
                     <?php   unset($_SESSION['updatetopperyear']);
                        }
                        }
                        ?>
                     <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Result Year</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <?php if(!empty($years)){
                              ?>
                           <tbody>
                              <?php $no=1; foreach ($years as $value) {?>
                              <tr>
                                 <td><?php echo $no; $no++;?></td>
                                 <td><?php echo $value->year; ?></td>
                                 <td><a href="<?php echo base_url("index.php/Toper_Controller/ViewToppers/$value->year_id");?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">View Toppers</a> &nbsp;
                                    <a href="<?php echo base_url("index.php/Toper_Controller/selectTopperYear/$value->year_id");?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil update"></i></a>&nbsp;
                                    <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Toper_Controller/DeleteYear/$value->year_id")?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fa fa-trash-o delete"></i>
                                    </a>
                                 </td>
                              </tr>
                              <?php }?>
                           </tbody>
                           <?php }?>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<!-- Result Year Modal -->
<div id="ResultYear" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Result Year</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url("index.php/Toper_Controller/addTopperYear") ?>" method="POST" role="form">
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <td>Result Year [Ex : 2016-17]</td>
              <td>
                <select class="form-control" required name="ResultYear">
                  <option value="2017-18">2017-18</option>
                  <option value="2018-19">2018-19</option>
                  <option value="2019-20">2019-20</option>
                  <option value="2020-21">2020-21</option>
                  <option value="2021-22">2021-22</option>
                  <option value="2022-23">2022-23</option>
                  <option value="2023-24">2023-24</option>
                  <option value="2024-25">2024-25</option>
                  <option value="2025-26">2025-26</option>
                  <option value="2026-27">2026-27</option>
                  <option value="2027-28">2027-28</option>
                  <option value="2028-29">2028-29</option>
                  <option value="2029-30">2029-30</option>
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <input type="submit" class="btn btn-default" name="add_result_year" value="Add">
                <input type="reset" class="btn btn-default" name="reset" value="Reset">
              </td>
            </tr>
          </tbody>
        </table>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Result Year Modal -->

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