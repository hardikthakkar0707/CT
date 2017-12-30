<?php
    if(!empty($AllTests)) {
        foreach($AllTests as $test) {
            $row = $test;
        }
    }
    if(!empty($StudentDetails)) {
        foreach($StudentDetails as $student) {
            $student_name = $student->stud_name;
        }
    }
?>
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
                <div class="page-header">
                    <h1 class="heading"><?php echo $student_name; ?>'s Result</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo base_url("index.php/Result_Controller/ViewResult"); ?>">All Results</a></li>
                        <li class="active">Student's Result</li>
                    </ol>
                </div>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 50px;">
                    <?php
                        if(empty($AllTests)) {
                            echo "No Results Found !!";
                            die();
                        }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color: #5B2C6F;color:#fff;">Roll No: <?php echo $row->roll_no; ?></th>
                                <th style="background-color: #5B2C6F;color:#fff;">Name : <?php echo $row->stud_name; ?></th>
                                <th style="background-color: #5B2C6F;color:#fff;">Standard : <?php echo $row->standard; ?></th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered dataTable" id="sampleTable">
                        <tbody>
                            <tr>
                                <th>Test Names</th>
                                <?php foreach ($AllTestSubjects as $subject) {
                                    $subject_arr[] = $subject->subject;
                                ?>
                                <th><?=$subject->subject;?></th>
                                <?php } ?>
                                <th>Total</th>
                            </tr>
                            <?php foreach ($AllTests as $test) { ?>
                            <tr>
                                <td><?=$test->test_name;?></td>
                                <?php
                                $marks = explode(',',$test->marks_csv);
                                $test_wise_subjects = explode(',',$test->subject_csv);
                                $i = 0;$total_marks=0;$out_of=0;
                                foreach($subject_arr as $subs) {
                                    echo "<td>";
                                    if(in_array($subs,$test_wise_subjects)) {
                                        echo $marks[$i];
                                        //total logic starts
                                        $mark = explode('/',$marks[$i]);
                                        $total_marks += $mark[0];
                                        $out_of += $mark[1];+
                                        //total logic ends
                                        $i++;
                                    } else {
                                        echo "N/A";
                                    }
                                    echo "</td>";
                                }
                                ?>
                                <td><?=round(($total_marks/$out_of*100),2)."%";?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->
</div>
    <!-- Core Scripts - Include with every page -->
    <?php $this->load->view("footer"); ?>
    </body>

    </html>





