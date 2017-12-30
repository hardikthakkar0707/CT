<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Subject_Model');
    }

    //$sub_id = $this->uri->segment(3);
    //$std_id = $this->uri->segment(4);
    public function DeleteSubject($sub_id, $std_id){
        $success=$this->Subject_Model->DeleteSubject($sub_id);
        $_SESSION['SubjectDeleted']=$success;
        $_SESSION['StandardId']= $std_id;
        redirect('Subject_Controller/ViewSubject');
    }
    public function AddSubject() {
        $this->load->view('AddSubject');
    }

    public function ViewSubject() {
        $standards=$this->Subject_Model->FetchAllStandards();
        foreach($standards as $standard) {
            $result['s_'.$standard->standard_id]=$this->Subject_Model->FetchSubjects($standard->standard_id);
        }
        $result['AllStandards'] = $standards;
        $this->load->view('ViewSubject',$result);
    }

    public function InsertSubject() {
        if(isset($_POST['SubjectName'])) {
            //print_r($_POST);
            $standard = $_POST['standard_id'];
            $subject = $_POST['SubjectName'];
            $data = array('sub_name' => $subject, 'standard_id' => $standard);
            $success = $this->Subject_Model->InsertSubject($data);
            $_SESSION['StandardId']= $_POST['standard_id'];
            $_SESSION['SubjectAdded']= $success;
            redirect('Subject_Controller/ViewSubject');
        }
    }
    public function EditSubject($id){
      $result['res']=  $this->Subject_Model->FetchOneSubject($id);
      $this->load->view('EditSubject',$result);
    }
    public function UpdateSubject(){
        if(isset($_POST['UpdateSubject'])){
            $subid=$_POST['subid'];
            $SubjectName=$_POST['SubjectName'];
            $data=array('sub_name'=>$SubjectName);
            $success=$this->Subject_Model->updatesubject($subid,$data);
            $_SESSION['StandardId']= $_POST['stdid'];
            $_SESSION['SubjectUpdated']=$success;
            redirect('Subject_Controller/ViewSubject');
        }
    }
}
