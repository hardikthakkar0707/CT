<!DOCTYPE HTML>
<html>
    <head>
        <title>Toppers</title>
        <?php $this->load->view("head"); ?>
        <style>
            .img-responsive{
                display: block;
                max-width: 100%;
                height: 130px;
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
        <div class="container" id="portfolio">
            <h2>Toppers</h2>
            <div class="panel-group" id="accordion">
            <?php if(isset($AllYears)) {
                $count = 1;
                foreach($AllYears as $year) {
                $year_in = 'a_'.$year->year_id;
            ?>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $year->year; ?>">
                      <span class="glyphicon glyphicon-plus"></span>
                      <?php echo $year->year; ?>
                    </a>
                  </h4>
                </div>
                <div id="<?php echo $year->year; ?>" class="panel-collapse collapse <?php echo($count==1) ? "in" : ""; ?>">
                     <div class="row" style="margin: 10px 0;">
                        <?php if(isset($$year_in) && !empty($$year_in)) { foreach($$year_in as $value) { ?>
                         <div class="col-md-5" style="padding: 10px 0; margin:20px; border: 2px dashed #2b9dff; ">
                             <div class="col-md-4"><img src="<?php echo ($value->photo == '') ? base_url("admin/panel/img/male.png") : base_url("admin/panel/img/topperimage/".$value->photo); ?>" height="140"></div>
                             <div class="col-md-8" style="padding: 0 0;"">
                                 <h4>Name : <?php echo $value->student_name;?></h4>
                                 <p>Standard : <?php echo $value->standard ?></p>
                                 <p>Subject : <?php echo $value->subject ?></p>
                                 <p>Result : <?php echo $value->result;?></p>
                             </div>
                         </div>
                         <?php } } else { ?>
                            <div class="col-md-12">
                                No Toppers
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
