<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Schedule_Model');
    }
    public function deletesedual($id){
        $success=$this->Schedule_Model->DeleteSedual($id);
        $_SESSION['deletesedual']=$success;
        redirect('ScheduleController/GetData');
    }

    public function index() {
        $this->load->view("AddSchedule", $result);
    }

    public function AddSchedule() {
        $result['schres'] = $this->Schedule_Model->FetchRecord();
       // print_r($result);
        //die;
        $this->load->view('AddSchedule',$result);
    }

    public function InsertSchedule() {
        $std = $_POST['std'];
        $sub = $_POST['sub'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $count = count($_POST['sub']);

        for ($i = 0; $i < $count; $i++) {
            $data = array(
                'sub_id' => $sub[$i],
                'standard' => $std,
                'start_time' => $start[$i],
                'end_time' => $end[$i],
                'day' => '1'
            );
            #print_r($data);
            $res = $this->db->insert('schedule_mst', $data);
            
        }
        $_SESSION['InsertSchedule']=$res;
            redirect('ScheduleController/GetData');
    }

    public function GetData() {
        $this->db->select('*');
        $this->db->group_by('standard');
        $result['res'] = $this->db->get('schedule_mst')->result();
        $this->load->view("ViewSchedule", $result);
    }

    public function FullSchedule($id) {
        $this->db->where('standard', $id);
        $this->db->select('*');
        $result['res'] = $this->db->get('schedule_mst')->result();
        $this->load->view("FullSchedule", $result);
    }

}
