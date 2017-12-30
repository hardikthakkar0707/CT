<?php
    $i=1;
    //print_r($AllTests);
    //print_r($AllStudentsAllTestsResults);
    //print_r($AllTestTestNames);
    //print_r($AllTestsResult);
    $final_results = array();
    $i = 0;
    if($AllTestsResult != 0) {
        foreach($AllTestsResult as $test_results) {
            $marks = explode(",",$test_results->marks_csv);
            $tests = explode(",",$test_results->test_id_csv);
            $final_tests = "";
            $final_marks = "";
            //$AllTestTestNames = explode(",",$AllTestTestNames);
            $j=0; $total=0;
            foreach($AllTestTestNames as $test_names){
                if(in_array($test_names->test_name,$tests)) {
                    $final_tests .= $test_names->test_name;
                    $final_marks .= $marks[$j];
                    $j++;
                } else {
                    $final_tests .= $test_names->test_name;
                    $final_marks .= "0/0";
                }
                if($total < count($AllTestTestNames)-1) : $final_marks .= ","; $final_tests .= ","; endif;
                $total++;
            }
            $final_results[$i]["test_id_csv"] = $final_tests;
            $final_results[$i]["marks_csv"] = $final_marks;
            $i++;
        }
    }

	$graph_colors = array("#DC143C","#00008B","#006400","#20B2AA","#FFA500","#8B4513","#6A5ACD","#800080","#cffa1b","#fe3bcc","#45d7f3","#04e2cd","#ec4a68","#703be8");
    ?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php $this->load->view("head") ?>
        <title>TutionClasses</title>
        <script>
            $(document).ready(function(){
            	$(".canvasjs-chart-credit").remove();
            	$("Trial Version").hide();
            });
        </script>
        <script type="text/javascript">
            $('#box').on('click', function() {
            	$(this).toggleClass('clicked');
            });
        </script>
        <script type="text/javascript">
            window.onload = function () {
              var chart = new CanvasJS.Chart("chartContainer", {
              	//backgroundColor: "#20B2AA",
              	animationEnabled: true,
              animationDuration: 1000,
                title: {
                  text: "Student Result Graph",
                  fontSize: 30
                },
                animationEnabled: true,
                axisX: {
                  gridColor: "Silver",
                  tickColor: "silver",
                },
                toolTip: {
                  shared: true
                },
                theme: "theme2",
                axisY: {
                  gridColor: "Silver",
                  tickColor: "silver"
                },
                legend: {
                  verticalAlign: "center",
                  horizontalAlign: "right"
                },
                data: [
                <?php if($AllTestsResult != 0) { for($i=0;$i<count($AllTestsResult);$i++){?>
                {
                  type: "line",
                  showInLegend: true,
                  lineThickness: 3,
                  name: "<?php echo $AllTestsResult[$i]->stud_name; ?>",
                  markerType: "square",
                  color: "<?php echo $graph_colors[$i]; ?>",
                  dataPoints: [ <?php
										$marks = explode(",",$final_results[$i]['marks_csv']);
										$tests = explode(",",$final_results[$i]['test_id_csv']);
										for($j=0;$j<count($marks);$j++){
											$value = explode("/",$marks[$j]);
											echo '{y: '.$value[0].', label:  "'.$tests[$j].'"}';
											if($j < count($marks)-1 ) echo ",";
										}
                	?> ]
            	 }
            <?php if($i < count($AllTestsResult)-1 ) echo ","; } } ?> ],
                legend: {
                  cursor: "pointer",
                  itemclick: function (e) {
                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                      e.dataSeries.visible = false;
                    }
                    else {
                      e.dataSeries.visible = true;
                    }
                    chart.render();
                  }
                }
              });

              chart.render();
            }
        </script>
        <script src="<?php echo base_url("assets/js/canvasjs.min.js"); ?>"></script>
    </head>
    <body>
        <?php
            if($AllStudentsAllTestsResults != 0) {
                foreach($AllStudentsAllTestsResults as $test) {
                    $row = $test;
                }
            }
            include("top.php");
        ?>
        <!--  page-wrapper -->
        <div id="page-wrapper">
        <div class="row">
             <!-- page header -->
            <div class="col-lg-12">
                <div class="page-header text-center">
                    <h1 class="heading">Search Results</h1>
                    <h3><?php echo "Standard : ".$SearchTerm['standard']." | Subject : ".$SearchTerm['subject']; ?></h3>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("index.php/Faculty_Controller/ViewResults"); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Search Results</li>
                    </ol>
                  </div>
            </div>
            <!--end page header -->
        </div>
        <div class="container">
				<div class="row">
                <?php if($AllStudentsAllTestsResults != 0) { ?>
                <div class="col-md-12 table-responsive" style="margin-top: 50px;">
                    <table class="table table-bordered table-hover text-center" id="sampleTable">
                        <tbody>
                            <tr>
                                <th style="background-color:<?=$graph_colors[10]?>; color:#fff;text-align:center;">Students</th>
                                <?php $i=0; foreach ($AllTests as $test) {
                                    $test_arr[] = $test->test_name; ?>
                                <th style="background-color:<?=$graph_colors[$i]?>; color:#fff;text-align:center;">
                                    <?php echo $test->test_name; ?>
                                </th>
                                <?php $i++; } ?>
                                <th style="background-color:<?=$graph_colors[11]?>; color:#fff;text-align:center;">Total</th>
                            </tr>
                            <?php foreach ($AllStudentsAllTestsResults as $student) { ?>
                            <tr>
                                <td><?=$student->stud_name;?></td>
                                <?php
                                $marks = explode(',',$student->marks_csv);
                                $subject_wise_tests = explode(',',$student->test_csv);
                                $i = 0;$total_marks=0;$out_of=0;
                                foreach($test_arr as $tests) {
                                    echo "<td>";
                                    if(in_array($tests,$subject_wise_tests)) {
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
                <div class="col-md-12">
                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                    <style>
                                .canvasjs-chart-credit {
                                    display:none;
                                }
                                </style>
                </div>
                <?php } else { echo "No Results Found.."; } ?>
            </div>
        </div>

        <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>