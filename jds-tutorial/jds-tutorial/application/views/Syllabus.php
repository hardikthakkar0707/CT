<!DOCTYPE HTML>
<html>
<head>
	<title>Syllabus </title>
	<?php $this->load->view("head"); ?>
	<style type="text/css">
		.glyphicon { margin-right:5px; }
.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 10px;
}
.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
{
    background: #428bca;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item img
{
    float: left;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0 0 11px;
}
.thumbnail .caption {
    padding: 9px;
    color:#01315A;
}
	</style>
</head>
<body style="background-color: #eee;">
	<?php $this->load->view("menu"); ?>
	<div class="container m-top">
            <?php if(isset($res)){?>
    <div id="products" class="row list-group">
        <?php foreach ($res as $value) {?>
        <div class="item  col-xs-3 col-lg-3">
            <div class="thumbnail">
                <a href="<?php echo base_url("admin/panel/img/syllbus/$value->syllbus"); ?>"><img class="group list-group-image" src="<?php echo base_url("admin/panel/img/pdficon.png"); ?>" alt="" /></a>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                       <?php echo $value->subject;?></h4>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
            <?php }?>
</div>
	<?php $this->load->view("footer"); ?>
</body>
</html>