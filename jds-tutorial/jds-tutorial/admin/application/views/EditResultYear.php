<!DOCTYPE html>
<html>
    <head>
        <title>Toppers</title>
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
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header heading">Edit Result Year</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Enter Year Details
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                <table class="table table-bordered table-hover">
                                    <form role="form" method="post" action="<?php echo base_url("index.php/Toper_Controller/UpdateResultYear") ?>">
                                    <tbody>
                                        <tr>
                                        <input type="hidden" class="form-input form-control" placeholder="Result Year" name="Resultid" value="<?php echo $EditSelectedYear['0']->year_id;?>" >
                                        <td>Result Year  [Ex : 2016-17]</td>
                                        <td><input  class="form-input form-control" placeholder="Result Year" name="ResultYear" value="<?php echo $EditSelectedYear['0']->year;?>" required  pattern="[0-9]{4}-[0-9]{2}" ></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="submit" class="btn btn-default" value="Submit" name="SubmitImage">
                                                <input type="reset" class="btn btn-default" value="Reset">
                                            </td>
                                        </tr>
                                    </tbody>
                                    </form>
                                </table>
                                </div>
                            </div>
                        </div>
        <!-- end page-wrapper -->

        </div>

        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->
            </div>
</div></div>
    <!-- Core Scripts - Include with every page -->
    <?php $this->load->view("footer"); ?>
    </body>
    </html>





