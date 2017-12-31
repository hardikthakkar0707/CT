<!DOCTYPE HTML>
<html>
<head>
	<title>TutionClasses</title>
	<?php $this->load->view("head"); ?>
	<script>
		    // You can also use "$(window).load(function() {"
			    jQuery(function ($) {
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 2500,
			        speed: 600
			      });
			});
		  </script>
</head>
<body>
		<?php $this->load->view("menu"); ?>
		<div class="marquee">
			<p>How to add WordPress Related Posts Without Plugins</p>
			<p>Automate Your Dropbox Files With Actions</p>
		</div>
    	<!--start-image-slider---->
		<div class="image-slider">
		  <ul class="rslides" id="slider1">
		    <li><img src="<?php echo base_url("assets/assets/img/bnr1.jpg"); ?>" alt=""></li>
			<li><img src="<?php echo base_url("assets/assets/img/sd7.jpg"); ?>" alt=""></li>
			<li><img src="<?php echo base_url("assets/assets/img/pic01.jpg"); ?>" alt=""></li>
		  </ul>
	   </div>
		<!--End-image-slider---->

		<?php $this->load->view("footer"); ?>
</body>
</html>
