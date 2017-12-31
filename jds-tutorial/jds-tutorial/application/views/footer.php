<div class="footer">
    <div class="wrap">
        <div class="footer-grids">
            <div class="footer-grid">
                <div class="logo">
                    <a href="index.html"><img src="<?php echo base_url("assets/images/logo1.png"); ?>" alt=""/></a>
                </div>
            </div>
            <!-- <div class="footer-grid">
                    <h3>RECENT POSTS</h3>
                    <ul>
                            <li><a href="#">Vestibulum felis</a></li>
                            <li><a href="#">Mauris at tellus</a></li>
                            <li><a href="#">Donec ut lectus</a></li>
                            <li><a href="#">vitae interdum</a></li>
                    </ul>
            </div>
            <div class="footer-grid">
                    <h3>USEFUL INFO</h3>
                    <ul>
                            <li><a href="#">Hendrerit quam</a></li>
                            <li><a href="#">Amet consectetur </a></li>
                            <li><a href="#">Iquam hendrerit</a></li>
                            <li><a href="#">Donec ut lectus </a></li>
                    </ul>
            </div> -->
            <div class="footer-grid">
                <h3>SOCIAL MEDIA LINKS</h3>
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>

                </ul>
            </div>
            <div class="footer-grid f-cu">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>CONTACT US</h3>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $this->db->limit(2);
                        $this->db->select('*');
                        $res = $this->db->get('branch_mst')->result_array();

                        
                        ?>
                        <?php foreach ($res as $value) {
                            //print_r($value);?>
                        <div class="col-md-6">
                            <h5><?php echo $value['branch_area'];?></h5>
                            <p><?php echo $value['address'];?></p>
                            <div class="footer-grid-address">
                               
                                <p>Phone: <?php echo $value['phone_no1'];?>,<?php echo $value['phone_no2'];?></p>
                                <p>Email:<a class="email-link" href="#"><?php echo $value['email'];?></a></p>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <!--<p>123,Santinagar,Surat</p>
                <div class="footer-grid-address">
                        <p>Tel.800-255-9999</p>
                        <p>Phone: 1234 568,1234865</p>
                        <p>Email:<a class="email-link" href="#">email(at)academia.com</a></p>
                </div>-->
            </div>
        </div>
        <!-- <div class="footer-grid footer-lastgrid">	
        </div> -->
        <div class="clear"> </div> 
    </div>
    <div class="copy-right">
        <p>Power by <a href="#">Mediamaggi</a></p>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>