<!DOCTYPE html>
<html>
    <head>
        <title>Tution Classes | Admin</title>
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
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header heading">View Schedule</h1>
                    <?php #print_r($res); ?>
                </div>
                <!--End Page Header -->

            </div>
           <table class="table table-bordered">

                  <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>

                  </tr>
                <tbody>
                <tr>
                    <?php
                    $i=1;
                        foreach ($res as $value) {

                        ?>


                    <td><?php echo $value->sub_id; ?><p><?php echo $value->start_time; ?>&nbsp;to&nbsp;<?php echo $value->end_time; ?></p></td>

                  <?php
                    if($i==6 || $i==12 || $i==18 || $i==24 || $i==30 || $i==36 || $i==42)
                    {
                        echo "<tr>";
                    }
                    $i++;
                  } ?>
              </tr>
                  <!-- <tr>
                    <td>English<p>8:00</p></td>
                    <td>English<p>8:00</p></td>
                    <td>English<p>8:00</p></td>
                    <td>English<p>8:00</p></td>
                    <td>English<p>8:00</p></td>
                    <td>English<p>8:00</p></td>
                  </tr>
                  <tr>
                    <td>English<p>9:00</p></td>
                    <td>English<p>9:00</p></td>
                    <td>English<p>9:00</p></td>
                    <td>English<p>9:00</p></td>
                    <td>English<p>9:00</p></td>
                    <td>English<p>9:00</p></td>
                  </tr>
                  <tr>
                    <td>English<p>10:00</p></td>
                    <td>English<p>10:00</p></td>
                    <td>English<p>10:00</p></td>
                    <td>English<p>10:00</p></td>
                    <td>English<p>10:00</p></td>
                    <td>English<p>10:00</p></td>
                  </tr>
                  <tr>
                    <td>English<p>11:00</p></td>
                    <td>English<p>11:00</p></td>
                    <td>English<p>11:00</p></td>
                    <td>English<p>11:00</p></td>
                    <td>English<p>11:00</p></td>
                    <td>English<p>11:00</p></td>
                  </tr>
                  <tr>
                    <td>English<p>12:00</p></td>
                    <td>English<p>12:00</p></td>
                    <td>English<p>12:00</p></td>
                    <td>English<p>12:00</p></td>
                    <td>English<p>12:00</p></td>
                    <td>English<p>12:00</p></td>
                  </tr>
                  <tr>
                    <td>English<p>1:00</p></td>
                    <td>English<p>1:00</p></td>
                    <td>English<p>1:00</p></td>
                    <td>English<p>1:00</p></td>
                    <td>English<p>1:00</p></td>
                    <td>English<p>1:00</p></td>
                  </tr>
                  <tr>
                    <td>English<p>2:00</p></td>
                    <td>English<p>2:00</p></td>
                    <td>English<p>2:00</p></td>
                    <td>English<p>2:00</p></td>
                    <td>English<p>2:00</p></td>
                    <td>English<p>2:00</p></td>
                  </tr> -->
                </tbody>
            </table>

        <!-- end page-wrapper -->

        </div>

        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <?php $this->load->view("footer"); ?>
    </body>
    </html>





