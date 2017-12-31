<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}

class Schedule_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        //  $this->load->model('Faculty_Model');
    }

    public function index() {
        $this->load->view('Schedule');
    }

    public function Schedule($id) {

        $this->db->where('standard', $id);
        $this->db->select('*');
        $result = $this->db->get('schedule_mst')->result();
        if(!empty($result))
        {
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    
                    $i=1;
                    
                    foreach ($result as $value) { ?>
                        <td><?php echo $value->sub_id; ?><p><?php echo $value->start_time; ?>&nbsp; To &nbsp;<?php echo $value->end_time; ?> </p></td>
                    <?php
                    
                        if($i==6 || $i==12 || $i==18 || $i==24 || $i==30 || $i==36 || $i==42)
                        {
                            echo "<tr>";
                        }
                        $i++;
                    } ?>
            </tbody>
        </table>
        <?php
                    #$this->load->view("FullSchedule", $result);
                }else{
                    echo "<h1>Schedule Not Avilable</h1>";
                }
    }

            }
            