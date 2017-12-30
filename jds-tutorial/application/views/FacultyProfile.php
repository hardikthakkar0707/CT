<!DOCTYPE HTML>
<html>
    <head>
        <title>Faculty</title>
        <?php $this->load->view("head"); ?>
        <style>
            .img-responsive{
               margin: 0 auto;
            }
            .well-sm {
                padding: 5px;
                min-height: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
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
            <h2>Faculties</h2>
            <div class="panel-group" id="accordion">
            <?php if(isset($AllStandards)) {
                $count = 1;
                foreach($AllStandards as $standard) {
                $faculty_in = 'f_'.$standard->standard_id;
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
                        <?php if(isset($$faculty_in) && !empty($$faculty_in)) { foreach($$faculty_in as $faculty) { ?>
                         <div class="col-md-5 col-sm-12 col-xs-12 well-sm" style="padding: 10px 0; margin:10px;">
                            <div class="col-sm-3"><img class="img-responsive" src="<?php echo base_url("admin/panel/img/Faculty/".$faculty->photo); ?>" align="left" width="100px" height="100px"></div>
                            <div class="col-sm-9">
                                <p>Faculty Name : <?php echo $faculty->faculty_name; ?> <br/>
                                Experience : <?php echo $faculty->experience; ?> <br/>
                                Degree : <?php echo $faculty->degree; ?> <br/>
                                Achievements : <?php echo $faculty->achievment; ?> <br/>
                                Contact No : <?php echo $faculty->contact_no; ?> <br/>
                                Subjects : <?php echo $faculty->subjects; ?></p>
                            </div>
                         </div>
                         <?php } } else { ?>
                            <div class="col-md-12">
                                No Faculties Assigned.
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
