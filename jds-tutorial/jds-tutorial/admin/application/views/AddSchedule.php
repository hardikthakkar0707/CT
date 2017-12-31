<!DOCTYPE html>
<html>
    <head>
        <title>add schedule</title>
    <?php $this->load->view("head"); ?>
    <style type="text/css">
        .time{
            padding: 10px;
        }
        .box{
            width: 37px;
        }
    </style>
    </head>
    <body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php $this->load->view("top"); ?>
        
        <div id="page-wrapper" style="margin: 84px 0 0 0;">
            <a href="<?php echo base_url("index.php/ScheduleController/GetData")?>" class="btn">Back</a><br>
            <?php if(isset($schres)){?>
            
            <form method="post" action="<?php echo base_url("index.php/ScheduleController/InsertSchedule"); ?>">
            <select class="form-input" name="std">
                <option >Standard</option>
                <option value="maths">1<sup>st</sup></option>
                <option value="2">2<sup>nd</sup></option>
                <option value="3">3<sup>rd</sup></option>
                <option value="4">4<sup>th</sup></option>
                <option value="5">5<sup>th</sup></option>
                <option value="6">6<sup>th</sup></option>
                <option value="7">7<sup>th</sup></option>
                <option value="8">8<sup>th</sup></option>
                <option value="9">9<sup>th</sup></option>
                <option value="10">10<sup>th</sup></option>
                <option value="11">11<sup>th</sup></option>
                <option value="12">12<sup>th</sup></option>
            </select>
            <table border="1" class="table table-bordered dataTable">
                <tr>
                    <th>No</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
              
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                                
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                  <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                  <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                  <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                           <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                  <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                           <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                               <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                               <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                           <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                           <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                               <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                              <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                       <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                           <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                 <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                                
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">
                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                        <td><span>Subject</span>
                            <select name="sub[]">
                                <?php foreach ($schres as $value) {?>
                               <option value="<?php echo $value->sub_name; ?>"><?php echo $value->sub_name; ?></option>
                                 <?php } ?>
                            </select><br>
                            <span class="time">Time</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="start[]" class="box" placeholder="Time">
                            <span class="time">To</span><input type="text" pattern="[A-Za-z0-9]{1,}" required name="end[]" class="box" placeholder="To">

                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="hidden1" value="maths">
            <input type="hidden" name="hidden2" value="2">
            <input type="hidden" name="hidden3" value="3">
            <input type="hidden" name="hidden4" value="4">
            <input type="hidden" name="hidden5" value="5">
            <input type="hidden" name="hidden6" value="6">
            <input type="submit" name="btn" class="btn btn-primary" value="Save">
            </form>
            <?php }?>
        </div>

        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <?php $this->load->view("footer"); ?>
    </body>
    </html>





  