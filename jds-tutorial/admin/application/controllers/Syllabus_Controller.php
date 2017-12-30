<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Syllabus_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Syllabus_Model');
    }

    public function addmoreinsert() {
        if (isset($_POST['Submit'])) {
            $standardid = $_POST['standardid'];
            $syylbusid = $_POST['syylbusid'];
            $BranchPhone1 = $_POST['BranchPhone1'];
            $new_file_name = "Syllabus." . time() . ".pdf";

            /*             * ***************************************Pdf uploadin************************************************ */
            if ($this->input->post('Submit') && !empty($_FILES['ImageUpload']['name'])) {

                $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                $uploadPath = 'panel/img/Syllabus';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = $new_file_name;
                //$config['max_size']	= '100';
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Topper')) {
                    $fileData = $this->upload->data();
                    $data = array('Syllabus' => $BranchPhone1, 'standard_id' => $syylbusid, 'Syllabus' => $fileData['file_name']);
                }
                if (!empty($data)) {
                    $success = $this->Syllabus_Model->InsertSyllabus2($data);
                    $_SESSION["addmoreinsert"] = $success;
                    redirect("Syllabus_Controller/Syllabus/$syylbusid");
                }
            }
            /*             * ***************************************Pdf uploadin************************************************ */
        }
    }
    public function DeleteSyllabus($id, $file, $std_id) {
        unlink('panel/img/syllabus/'.$file);
        $result = $this->Syllabus_Model->DeleteSyllabus($id);
        $_SESSION['SyllabusDeleted'] = $result;
        $_SESSION['StandardId'] = $std_id;
        redirect("Syllabus_Controller/ViewSyllabus/");
    }

    public function ViewSyllabus() {
        $standards=$this->Syllabus_Model->FetchAllStandards();
        foreach($standards as $standard) {
            $result['s_'.$standard->standard_id]=$this->Syllabus_Model->FetchSyllabus($standard->standard_id);
        }
        $result['AllStandards'] = $standards;
        $this->load->view('ViewSyllabus',$result);
    }

    public function AddSyllabus($id) {
        $result['AllSubjects']=$this->Syllabus_Model->FetchAllSubjects($id);
        if(count($result['AllSubjects']) > 0) {
            $result['Standard']=$this->Syllabus_Model->FetchSingleStandard($id);
            $this->load->view('AddSyllabus',$result);
        } else {
            $result['AllSubjects'] = 0;
            $result['Standard']=$this->Syllabus_Model->FetchSingleStandard($id);
            $this->load->view('AddSyllabus',$result);
        }
        
    }

    public function Syllabus($id) {
        $result['res'] = $this->Syllabus_Model->Fetchstandard2($id);
        $this->load->view('Syllabus', $result);
    }

    public function InsertSyllabus() {
//        print_r($_POST);
//        print_r($_FILES);
//        //die;
        if (isset($_POST['AddSyllabus'])) {
            $subject_id = $_POST['subject'];
            $standard_id = $_POST['standard_id'];
            $subject = $_POST['subject_name'];
            $standard = $_POST['standard_name'];

            $new_file_name = $standard."_".$subject.".pdf";

            /*             * ***************************************Pdf uploadin************************************************ */
            if ($this->input->post('AddSyllabus') && !empty($_FILES['ImageUpload']['name'])) {

                $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                $uploadPath = 'panel/img/syllabus';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = $new_file_name;
                //$config['max_size']	= '100';
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Topper')) {
                    $fileData = $this->upload->data();
                    $data1 = array('standard_id' => $standard_id, 'sub_id' => $subject_id, 'syllabus' => $fileData['file_name']);
                }
                if (!empty($data1)) {
                    $success = $this->Syllabus_Model->InsertSyllabus($data1);
                    $_SESSION["SyllabusAdded"] = $success;
                    $_SESSION["StandardId"] = $standard_id;
                    redirect('Syllabus_Controller/ViewSyllabus');
                }
            }
            /*             * ***************************************Pdf uploadin************************************************ */
        }
    }

}
