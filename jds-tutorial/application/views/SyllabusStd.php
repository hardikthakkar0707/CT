<!DOCTYPE HTML>
<html>
    <head>
        <title>Syllabus</title>
        <?php $this->load->view("head"); ?>
        <style>
            .img-responsive{
               margin: 0 auto;
            }
            .well-sm {
                padding: 5px;
            }
            .well {
                margin-bottom: unset;
                border: unset;
            }
            .accordion-toggle:hover {
                text-decoration: none;
            }
            .accordion-toggle:focus {
                text-decoration: none;
            }
            .panel-default>.panel-heading {
                color: #fff;
                background-color: #01315A;
                border-color: #ddd;
            }
            .panel-heading {
                border-top-left-radius: unset;
                border-top-right-radius: unset;
            }
        </style>
    </head>
    <body>
        <?php $this->load->view("menu"); ?>
        <div class="container m-top m-bottom" id="portfolio">
            <h2>Syllabus</h2>
            <div class="panel-group" id="accordion">
            <?php if(isset($AllStandards)) {
                $count = 1;
                foreach($AllStandards as $standard) {
                $standard_in = 's_'.$standard->standard_id;
            ?>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $standard->standard; ?>">
                      <span class="glyphicon glyphicon-plus"></span>
                      <?php echo $standard->standard; ?>
                    </a>
                  </h4>
                </div>
                <div id="<?php echo $standard->standard; ?>" class="panel-collapse collapse <?php echo($count==1) ? "in" : ""; ?>">
                     <div class="row" style="margin: 10px 0;">
                        <?php if(isset($$standard_in) && !empty($$standard_in)) { foreach($$standard_in as $value) { ?>
                         <div class="col-md-1 col-sm-2 col-xs-5" style="padding: 10px 0; margin:10px;">
                             <div class="well well-sm" style="text-align: center;">
                                <img class="img-responsive" src="<?php echo base_url("assets/images/pdf.png"); ?>" align="middle">
                                <p><?php echo $value->sub_name; ?></p>
                                <a href="<?php echo base_url("admin/panel/img/syllabus/$value->syllabus"); ?>" target="_blank" class="btn btn-success btn-xs" ><i class="fa fa-download"></i> Download</a>
                             </div>
                         </div>
                         <?php } } else { ?>
                            <div class="col-md-12">
                                Syllabus Not Uploaded
                            </div>
                         <?php } ?>
                     </div>
                  </div>
                <!-- </div> -->
              </div><!-- /single panel -->

            <?php $count++; } } ?>
            </div><!-- ./panel-group -->
        </div>
        <?php $this->load->view("footer"); ?>
        <script type="text/javascript">
            $('.collapse').on('shown.bs.collapse', function(){
            $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
            }).on('hidden.bs.collapse', function(){
            $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
            });
        </script>
    </body>
</html>
