
<!DOCTYPE html>
<html>
    <head>
        <title>Add Faculty</title>
    <?php  $this->load->view("head"); ?>
    <style type="text/css">
        select.form-control {
            -webkit-appearance: none;
        }
        select.standard, select.branch {
            -webkit-appearance: menulist;
            padding: 6px 4px;
        }
        select.subject {
            padding: 6px 4px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        // Add Row Code
        function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = (table.rows.length);
            var newcell = table.insertRow(rowCount).outerHTML='<tr id="row'+rowCount+'"><td><select class="form-control standard" name="standard'+rowCount+'[]" onchange="getSubjects(this);" id="'+rowCount+'"><option value="">Select Standard</option><?php foreach($AllStandards as $standard) { ?><option value="<?php echo $standard->standard_id ?>" <?php echo(isset($StudentDetails) && $standard->standard_id == $row->standard_id) ? "selected" : "" ; ?>><?php echo $standard->standard; ?></option><?php } ?></select></td><td><select class="form-control subject" name="subject'+rowCount+'[]" multiple="multiple" id="subject'+rowCount+'" size="3"><?php if(isset($StudentDetails)) {$subject_selected = explode(",",$row->subject);foreach($AllSubjects as $subject) {?><option value="<?php echo $subject->sub_name; ?>" <?php if(in_array($subject->sub_name, $subject_selected)) : echo "selected"; endif; ?>><?php echo $subject->sub_name; ?></option><?php } } else { ?><option>Select Standard First</option><?php } ?></select></td><td><a href="#" onclick="deleteRow('+rowCount+')" data-toggle="tooltip" data-placement="top" name="delete'+rowCount+'" id="delete'+rowCount+'" title="Delete"><i class="fa fa-trash-o delete"></i></a></td></tr>';
        }

        // Delete Row Code
        function deleteRow(no) {
            try {
                document.getElementById("row"+no+"").outerHTML="";
            }catch(e) {
                alert("Sorry, First row cannot be deleted. You can only update it.");
            }
        }

        // Sortable Code
        var fixHelperModified = function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width())
            });
            return $helper;
        };
        $(".table-sortable tbody").sortable({
            helper: fixHelperModified
        }).disableSelection();
        $(".table-sortable thead").disableSelection();
        $("#add_row").trigger("click");

    </script>
    <script type="text/javascript">
        $(document).ready(function (e){
            jQuery(document).on('change', ".standard", function(){
                var standard = $(this).val();
                //var text = $(this).find("option:selected").text(); //only time the find is required
                //var name = $(this).attr('name');
                var id = $(this).attr('id');
                //alert(standard+" "+id);
                $.post("<?php echo base_url(); ?>index.php/Faculty_Controller/FetchSubjects/", {id: standard}, function(data) {
                    console.log(data);
                    //$(this).closest("#subject").html(data);
                    $('#subject'+id).html(data);
                });
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
                 <!-- page header -->
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1 class="heading">Faculty Registration</h1>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Faculty_Controller/ViewFaculty"); ?>">Faculties</a></li>
                            <li class="active">Faculty Registration</li>
                        </ol>
                      </div>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <?php
                        if(isset($FacultyDetails)){
                            $insert='updateFaculty';
                            foreach ($FacultyDetails as $value) {
                                $row=$value;
                                $faculties = 's_'.$value->faculty_id;
                            }
                        }else{
                            $insert='InsertFaculty';
                        }

                        ?>
                        <div class="panel-body">
                            <div class="row">
                               <!--  <div class="col-lg-6"> -->
                               <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Faculty_Controller/$insert")?>">
                                   <input type="hidden" class="form-input form-control" placeholder="facultyid" name="facultyid" value="<?php if(isset($row)){echo $row->faculty_id;}?>">

                                        <div class="col-md-6 form-group">
                                            <label>Faculty Name</label>
                                            <input class="form-input form-control" placeholder="Faculty Name" name="FName" value="<?php if(isset($row)){echo $row->faculty_name;}?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Exp. [in Years]</label>
                                            <input class="form-input form-control" placeholder="Exp" name="Exp" value="<?php if(isset($row)){echo $row->experience;}?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Degree</label>
                                            <input class="form-input form-control" placeholder="Degree" name="Degree" value="<?php if(isset($row)){echo $row->degree;}?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Achievments</label>
                                            <input class="form-input form-control" placeholder="Achievments" name="Achievments" value="<?php if(isset($row)){echo $row->achievment;}?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Standards & Subjects</label> <a href="#" class="btn btn-info btn-xs" onclick="addRow('tab_logic')">Add More</a>
                                            <table class="table table-bordered table-hover" style="width:75%" id="tab_logic">
                                                <tbody>
                                                    <?php if(isset($FacultyDetails)) {
                                                        $i = 0;
                                                        foreach ($$faculties as $faculty) {
                                                            $subjects = 'sub_'.$faculty->standard_id;
                                                        ?>
                                                    <tr id='row<?php echo ($i == 0) ? "" : $i; ?>'>
                                                        <td><!-- onchange="getSubjects(this);" -->
                                                            <select class="form-control standard" name="standard<?=$i?>[]" id="<?=$i?>">
                                                                <option value="">Select Standard</option>
                                                               <?php foreach($AllStandards as $standard) { ?>
                                                               <option value="<?php echo $standard->standard_id ?>" <?php echo($standard->standard_id == $faculty->standard_id) ? "selected" : "" ; ?>>
                                                                    <?php echo $standard->standard; ?>
                                                                </option>
                                                               <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control subject" name="subject<?=$i?>[]" multiple="multiple" id="subject0" size="3">
                                                                <?php if(isset($FacultyDetails)) {
                                                                    $subject_selected = explode(",",$faculty->subjects);
                                                                    foreach($$subjects as $subject) {
                                                                ?>
                                                                <option value="<?php echo $subject->sub_name; ?>" <?php if(in_array($subject->sub_name, $subject_selected)) : echo "selected"; endif; ?>>
                                                                    <?php echo $subject->sub_name; ?>

                                                                    </option>
                                                                <?php } } else { ?>
                                                                <option>Select Standard First</option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="deleteRow('<?php echo $i; ?>')" data-toggle="tooltip" data-placement="top" name="action[]" title="Delete">
                                                                <i class="fa fa-trash-o delete"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; } } else { ?>
                                                    <tr id='row'>
                                                        <td><!-- onchange="getSubjects(this);" -->
                                                            <select class="form-control standard" name="standard0[]" id="0">
                                                                <option value="">Select Standard</option>
                                                               <?php foreach($AllStandards as $standard) { ?>
                                                               <option value="<?php echo $standard->standard_id ?>">
                                                                    <?php echo $standard->standard; ?>
                                                                </option>
                                                               <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control subject" name="subject0[]" multiple="multiple" id="subject0" size="3">
                                                                <option>Select Standard First</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <a href="#" onclick="deleteRow('0')" data-toggle="tooltip" data-placement="top" name="action[]" title="Delete">
                                                                <i class="fa fa-trash-o delete"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Description</label>
                                            <textarea class="form-input form-control" placeholder="Description" rows="3" name="Description"  required> <?php if(isset($row)){ $des =trim($row->description); echo $des ;}?></textarea>
                                        </div>
                                        <div class="col-md-6 form-group" style="<?php if(isset($Fetchupdate)){ echo "margin-top:-72px;"; }?>">
                                            <label>Email Address</label>
                                            <input type="email" class="form-input form-control" required placeholder="Email" name="Email" value="<?php if(isset($row)){echo $row->email;}?>">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-input form-control" placeholder="Password" name="Password" value="<?php if(isset($row)){echo $row->password;}?>" required>
                                        </div>
                                    <div class="col-md-6 form-group">
                                            <label>Gender</label> <br><input type="radio" name="gender" value="Male" <?php if(isset($row)){ if($row->gender=='Male'){echo "checked";}}?> > Male
                                            <input type="radio" name="gender" value="Female" <?php if(isset($row)){ if($row->gender=='Female'){echo "checked";}}?>> Female
                                        </div>
                                   <?php if(!isset($Fetchupdate)){?>
                                   <div class="col-md-6 form-group">
                                            <label>Contact No</label>
                                            <input class="form-input form-control" placeholder="Contact No" name="Cno" value="<?php if(isset($row)){echo $row->contact_no;}?>" required>
                                        </div>
                                   <?php }?>
                                       <div class="col-md-6 form-group">
                                            <label>Faculty Photo<br> <span style="color:blue;font-size:12px;font-weight: normal;">(Note: Photo format : jpg | png | jpeg | gif & Maximum Size : 500kb are allowed.)</span></label>
                                            <input type="file" class="form-input" name="ImageUpload" accept="image/*" >
                                            <?php if(isset($row)){?> <img src="<?php echo base_url("panel/img/Faculty/$row->photo"); ?>" width="75px" height="75px"> <?php }?>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="submit" class="btn btn-default" value="Submit" name="AddFaculty">
                                        </div>

                                    </form>
                                <!-- </div> -->
                    </div>
                </div>
        <!-- end page-wrapper -->

        </div>

        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

</div></div>
    <!-- Core Scripts - Include with every page -->
    <?php $this->load->view("footer"); ?>

    </body>
    </html>





