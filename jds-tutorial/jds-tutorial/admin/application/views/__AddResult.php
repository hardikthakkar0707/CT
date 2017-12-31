<!DOCTYPE html>
<html>
    <head>
        <title>Tution Classes | Admin</title>
        <?php $this->load->view("head"); ?>
        <style type="text/css">
            select.form-control {
                -webkit-appearance: none;
            }
            select.standard, select.subject, select.existing-tests {
                -webkit-appearance: menulist;
            }
            .test-input,.test-select,.test-or {
                padding-right: unset;
                padding-left: unset;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
        function getSubjects(standard) {
            $.post("<?php echo base_url(); ?>index.php/Result_Controller/FetchSubjects/", {id: standard.value}, function(data) {
                console.log(data);
                $('#subject').html(data);
            });
            $.post("<?php echo base_url(); ?>index.php/Result_Controller/FetchTests/", {id: standard.value}, function(data) {
                console.log(data);
                $('.existing-tests').html(data);
            });
        }

        $(document).ready(function() {
            $("#AddResults").click(function() {
                //alert('test');
                $existing = $("#ExistingTest").val();
                $newtest = document.getElementById('NewTestName').value;
                //alert($existing+"_"+$newtest); 
                if($existing == '' && $newtest == '') {
                    alert('Please add Test Name');
                    return false;
                } else if($existing != '' && $newtest != '') {
                    alert('You cannot add two tests.');
                    return false;
                } else {
                    return true;
                }
            });
        });
        
        </script>
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
                    <h1 class="heading"><?php if(isset($EditResult)) {echo "Edit Test Result";} else {echo "Add Test Results";} ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo base_url("index.php/Result_Controller/ViewResult"); ?>">All Tests</a></li>
                        <li class="active">Add / Edit Test Result</li>
                    </ol>
                </div>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-6">
                            <?php echo(isset($error)) ? '<div class="alert alert-danger">'.$error.'</div>' : ''; ?>
                            <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Result_Controller/InsertResult"); ?>">

                                <div class="form-group">
                                    <label>Standard</label>
                                    <select class="form-input form-control standard" name="Standard" onchange="getSubjects(this);" required>
                                        <option value="">Select Standard</option>
                                    <?php foreach($AllStandards as $standard) { ?>
                                    <option value="<?php echo $standard->standard_id ?>" <?php echo(isset($StudentDetails) && $standard->standard_id == $row->standard_id) ? "selected" : "" ; ?>>
                                            <?php echo $standard->standard; ?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <?php if(!isset($EditResult)) { ?>
                                <div class="col-sm-5 form-group test-input">
                                  <label>New Test Name</label>
                                  <input class="form-control" placeholder="New Test Name" name="NewTestName" id="NewTestName" value="">
                                </div>
                                <div class="col-sm-2 form-group test-or text-center">
                                    <label>OR</label>
                                </div>
                                <?php } ?>
                                <div class="<?php echo (isset($EditResult)) ? "" : "col-sm-5"; ?> form-group test-select">
                                    <label>Select Existing Tests</label>
                                    <select class="<?php echo (isset($EditResult)) ? "form-input" : ""; ?> form-control existing-tests" name="ExistingTest" id="ExistingTest">
                                        <option value="">Select Standard First</option>
                                    </select>
                                </div>
                                

                                <div class="form-group">
                                    <label>Subject</label>
                                    <select class="form-input form-control subject" name="Subject" id="subject" required>
                                        <?php if(isset($StudentDetails)) {
                                            $subject_selected = explode(",",$row->subject);
                                            foreach($AllSubjects as $subject) {
                                        ?>
                                        <option value="<?php echo $subject->sub_name; ?>" <?php if(in_array($subject->sub_name, $subject_selected)) : echo "selected"; endif; ?>>
                                            <?php echo $subject->sub_name; ?>

                                            </option>
                                        <?php } } else { ?>
                                        <option>Select Standard First</option>
                                        <?php } ?>
                                    </select>
                                </div>
                               
                               <div class="form-group">
                                  <label>Upload Marks <br> <span style="color:blue;font-size:12px;font-weight: normal;">(Note: Only Excels Are Allowed.)</span></label>
                                    <input type="file" class="form-input" name="MarksExcelUpload" required>
                               </div>
                               <div class="form-group">
                                  <input type="submit" class="btn btn-default" value="Submit" name="AddResults" id="AddResults">
                               </div>
                            </form>
                         </div>
                         <div class="col-lg-6">
                             <h4>Sample Excel Format <a href="<?php echo base_url('panel/sample-excel.xlsx'); ?>" class="btn btn-success btn-xs" target="_blank">Download</a></h4>
                            <img src="<?php echo base_url('panel/img/excel-format.jpg'); ?>">
                         </div>
                    </div>
                </div>
        <!-- end page-wrapper -->

        </div>

        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <?php $this->load->view("footer"); ?>
    </body>
    <script type="text/javascript">
         $(document).ready(function() {

        var iCnt = 0;
        // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.
        var container = $(document.createElement('div')).css({
            padding: '5px', margin: '20px'
        });

        $('#btAdd').click(function(){
            if (iCnt <= 10)
            {
                //alert(iCnt);
                iCnt = iCnt + 1;

                // ADD TEXTBOX.
                $(container).append('<div class="form-group" style="margin-top:1%;"><label>Subjects</label><select name="subject' + iCnt + '" class="form-input form-control"><option value="English">English</option><option value="Hindi">Hindi</option><option value="Gujarati">Gujarati</option></select></div><div form-group"><label>Marks</label><input class="form-input form-control" name="marks' + iCnt + '"></div>');

                // SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
                if (iCnt == 1)
                {

                    var divSubmit = $(document.createElement('div'));
                    

                }

                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                $('#main').after(container, divSubmit);
            }
            // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
            // (20 IS THE LIMIT WE HAVE SET)
            else
            {      
                $(container).append('<label>Reached the limit</label>'); 
                $('#btAdd').attr('class', 'bt-disable'); 
                $('#btAdd').attr('disabled', 'disabled');
            }
        });

        // REMOVE ONE ELEMENT PER CLICK.
        $('#btRemove').click(function() {
            if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
        
            if (iCnt == 0) { 
                $(container)
                    .empty() 
                    .remove(); 

                $('#btSubmit').remove(); 
                $('#btAdd')
                    .removeAttr('disabled') 
                    .attr('class', 'bt');
            }
        });

        // REMOVE ALL THE ELEMENTS IN THE CONTAINER.
        $('#btRemoveAll').click(function() {
            $(container)
                .empty()
                .remove(); 

            $('#btSubmit').remove(); 
            iCnt = 0; 
            
            $('#btAdd')
                .removeAttr('disabled') 
                .attr('class', 'bt');
        });
    });

    // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
    var divValue, values = '';

    function GetTextValue() {

        $(divValue) 
            .empty() 
            .remove(); 
        
        values = '';

        $('.input').each(function() {
            divValue = $(document.createElement('div')).css({
                padding:'5px', width:'200px'
            });
            values += this.value + '<br />'
        });

        $(divValue).append('<p><b>Your selected values</b></p>' + values);
        $('body').append(divValue);
    }
    </script>
    </html>





  