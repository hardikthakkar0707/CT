<!DOCTYPE HTML>
<html>
    <head>
        <title>Contact Us</title>
        <?php $this->load->view("head"); ?>
        <style type="text/css">

        </style>
    </head>
    <body>
        <?php $this->load->view("menu"); ?>
        <div class="container schedule">
            <h3>Contact Us</h3>
            <?php if(isset($res)){ ?>
            <div class="col-md-12" style="margin-bottom: 5%;margin-top: 50px;">
                <?php foreach ($res as $value) {?>
                <div class="col-md-4">
                    <p><u><?php echo $value->branch_area;?></u></p>
                <b>Address</b>:&nbsp;<?php echo $value->address;?><br>
                <b>Phone&nbsp;&nbsp;&nbsp;</b>:&nbsp;<?php echo $value->phone_no1 ." ,"; echo $value->phone_no2; ?>
                <b>Email&nbsp;&nbsp;&nbsp;&nbsp;</b>:&nbsp;<?php echo $value->email ; ?>
                </div>
                <?php }?>
            </div>
            <?php }?>
        </div>
        <?php $this->load->view("footer"); ?>
    </body>
</html>
