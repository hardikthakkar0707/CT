<!DOCTYPE HTML>
<html>
<head>
	<title>Toppers</title>
	<?php $this->load->view("head"); ?>
</head>
<body>
		<?php $this->load->view("menu"); ?>
    	<div class="container m-top m-bottom">
			<h3>Result Years</h3>
                        <?php if(isset($res)){ ?>
			<div class="col-md-12">
                            <?php foreach ($res as $value) {?>
				<div class="col-md-3">
					<div class="text-center folder">
						<a href="<?php echo base_url("index.php/Toper_Controller/Toppers/$value->year_id"); ?>"><i class="fa fa-folder-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $value->year;?></a>
					</div>
				</div>
                            <?php }?>
			</div>
                        <?php }?>
		</div>
		<?php $this->load->view("footer"); ?>
</body>
</html>
