<footer class="footer">
      <div class="container text-right">
        <p style="margin-top: 10px">Powered by Media Maggi.</p>
      </div>
    </footer>

	<script src="<?php echo base_url("panel/plugins/jquery-1.10.2.js"); ?>"></script>
    <script src="<?php echo base_url("panel/plugins/bootstrap/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("panel/plugins/metisMenu/jquery.metisMenu.js"); ?>"></script>
    <script src="<?php echo base_url("panel/scripts/siminta.js"); ?>"></script>
    <script src="<?php echo base_url("panel/datatable/jquery.dataTables.min.js"); ?>"></script>
     <script src="<?php echo base_url("panel/datatable/dataTables.bootstrap.js"); ?>"></script>

     <script>
    jQuery(document).ready(function($) {
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    });
    </script>
