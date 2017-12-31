<?php
ob_start();
ini_set('display_errors','1');
error_reporting(E_ALL);
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Toper_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Toper_Model');
    }

    //Fetch Topper Year Details if Exist
    public function selectTopperYear($id) {
        $result['EditSelectedYear'] = $this->Toper_Model->SelectYear($id);
        $this->load->view('EditResultYear', $result);
    }

    //Add Topper Year
    public function addTopperYear() {
        if (isset($_POST['add_result_year'])) {
            $ResultYear=$_POST['ResultYear'];
            $year = $this->Toper_Model->getTopperYear($ResultYear);
            if($year == 0) {
                $data=array('year'=>$ResultYear);
                $success=$this->Toper_Model->TopperYearInsert($data);
                $_SESSION['addTopperYear']=$success;
                redirect('Toper_Controller/ViewResultYear');
            } else {
                $_SESSION['addTopperYear']= "year_exists";
                redirect('Toper_Controller/ViewResultYear');
            }
        }
    }

    //Update Result Year
    public function UpdateResultYear() {
        if (isset($_POST['SubmitImage'])) {
            $ResultYear=$_POST['ResultYear'];
            $Resultid=$_POST['Resultid'];
            $data=array('year'=>$ResultYear);
            $success=$this->Toper_Model->updatetoperyear($Resultid,$data);
            $_SESSION['updatetopperyear']=$success;
            redirect('Toper_Controller/ViewResultYear');
        }
    }

    //View All Toppers
    public function ViewToppers() {
        $result['ListAllToppers'] = $this->Toper_Model->FetchAllToppers();
        $this->load->view('ViewToppers', $result);
    }

    //Add New Topper Redirect
    public function AddNewTopper() {
        $result['AllYears'] = $this->Toper_Model->FetchAllYears();
        $result['AllStandards'] = $this->Toper_Model->FetchAllStandards();
        $this->load->view('AddToppers', $result);
    }

    //Edit Topper Redirect
    public function EditTopper($id) {
        $result['AllYears'] = $this->Toper_Model->FetchAllYears();
        $result['AllStandards'] = $this->Toper_Model->FetchAllStandards();
        $result['EditTopper'] = $this->Toper_Model->SelectTopperDetails($id);
        $this->load->view('AddToppers', $result);
    }

    //Insert Topper Into Database
    public function InsertNewTopper() {
        if (isset($_POST['ActionTopper'])) {
            //print_r($_POST);
            $yearid = $_POST['ResultYear'];
            $Standard = $_POST['Standard'];
            $Subject = $_POST['Subject'];
            $StudentName = $_POST['StudentName'];
            $Result = $_POST['Result'];
            $new_file_name = 'tpper' . time() . '.jpeg';
            /*             * ***************************imageuploading****************************************** */
            if (!empty($_FILES['ImageUpload']['name'])) {
                $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                $uploadPath = 'panel/img/topperimage';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $new_file_name;
                $config['max_size']   = '500'; //500 Kb
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Topper')) {
                    $fileData = $this->upload->data();
                    $data = array('year_id' => $yearid, 'standard_id' => $Standard, 'subject' => $Subject, 'student_name' => $StudentName, 'result' => $Result, 'photo' => $fileData['file_name']);
                } else {
                    $error['AllYears'] = $this->Toper_Model->FetchAllYears();
                    $error['AllStandards'] = $this->Toper_Model->FetchAllStandards();
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('AddToppers', $error);
                }
                if (!empty($data)) {
                    $success = $this->Toper_Model->TopperInsert($data);
                    $_SESSION['InsertTopper'] = $success;
                    redirect("Toper_Controller/ViewToppers");
                }
            } else {
                $data = array('year_id' => $yearid, 'standard_id' => $Standard, 'subject' => $Subject, 'student_name' => $StudentName, 'result' => $Result);
                $success = $this->Toper_Model->TopperInsert($data);
                $_SESSION["InsertTopper"] = $success;
                redirect("Toper_Controller/ViewToppers");
            }
            /*             * ***************************imageuploading****************************************** */
        }
    }

    //Update Topper
    public function UpdateTopper() {
        if (isset($_POST['ActionTopper'])) {
            $new_file_name = 'tpper' . time() . '.jpeg';
            $toperid = $_POST['toperid'];
            $yearid = $_POST['ResultYear'];
            $Standard = $_POST['Standard'];
            $Subject = $_POST['Subject'];
            $StudentName = $_POST['StudentName'];
            $Result = $_POST['Result'];

            /*             * ***********************************imageuploadin***************************************** */
            if (!empty($_FILES['ImageUpload']['name'])) {

                $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                $uploadPath = 'panel/img/topperimage';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $new_file_name;
                $config['max_size']	= '500'; //500 Kb
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Topper')) {
                    $fileData = $this->upload->data();
                    $data = array('year_id' => $yearid, 'standard_id' => $Standard, 'subject' => $Subject, 'student_name' => $StudentName, 'result' => $Result, 'photo' => $fileData['file_name']);
                } else {
                    $error['AllYears'] = $this->Toper_Model->FetchAllYears();
                    $error['AllStandards'] = $this->Toper_Model->FetchAllStandards();
                    $error['EditTopper'] = $this->Toper_Model->SelectTopperDetails($toperid);
                    $error['error'] = $this->upload->display_errors();
                    $this->load->view('AddToppers', $error);
                }
                if (!empty($data)) {
                    $success = $this->Toper_Model->updatetoper($toperid, $data);
                    $_SESSION["UpdateTopper"] = $success;
                    $id = trim($yearid);
                    redirect("Toper_Controller/ViewToppers");
                }
            }
            else {
                $data = array('year_id' => $yearid, 'standard_id' => $Standard, 'subject' => $Subject, 'student_name' => $StudentName, 'result' => $Result);
                $success = $this->Toper_Model->updatetoper($toperid, $data);
                $_SESSION["UpdateTopper"] = $success;
                $id = trim($yearid);
                redirect("Toper_Controller/ViewToppers");
            }

            /*             * ***********************************imageuploadin***************************************** */
        }
    }

    //Delete Topper
    public function DeleteTopper($id, $yid) {
        $success = $this->Toper_Model->Deletetoper($id);
        $_SESSION['DeleteTopper'] = $success;
        redirect("Toper_Controller/ViewToppers/$yid");
    }


    public function AddToppers() {
        $this->load->view('AddToppers');
    }

    //View Result Years
    public function ViewResultYear() {
        $result['years'] = $this->Toper_Model->FetchAllYears();
        //$result['toppers'] = $this->Toper_Model->FetchYearsWithTopper();
        $this->load->view('ViewResultYear', $result);
    }

    public function DeleteYear($id) {
        $success = $this->Toper_Model->DeleteYear($id);
        $_SESSION['DeleteYear'] = $success;
        redirect('Toper_Controller/ViewResultYear');
    }



    public function InsertTopper() {
        //  print_r($_POST);
        //print_r($_FILES);
        if (isset($_POST['SubmitImage'])) {
            $new_file_name = 'tpper' . time() . '.jpeg';

            $ResultYear = $_POST['ResultYear'];
            $StudentName = $_POST['StudentName'];
            $Result = $_POST['Result'];
            $Standerd = $_POST['Standerd'];
            if (isset($_POST['ResultYear'])) {
                $data = array('year' => $ResultYear);
                $id = $this->Toper_Model->TopperInsert($data);
                /*                 * ***********************************imageuploadin***************************************** */
                if ($this->input->post('SubmitImage') && !empty($_FILES['ImageUpload']['name'])) {

                    $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                    $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                    $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                    $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                    $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                    $uploadPath = 'panel/img/topperimage';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $new_file_name;
                    //$config['max_size']	= '100';
                    //$config['max_width'] = '1024';
                    //$config['max_height'] = '768';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('Topper')) {
                        $fileData = $this->upload->data();
                        $data2 = array('year_id' => $id, 'standard' => $Standerd, 'student_name' => $StudentName, 'result' => $Result, 'photo' => $fileData['file_name']);
                    }
                    if (!empty($data2)) {
                        $insert = $this->Toper_Model->TopperInsert2($data2);
                        $_SESSION["addtoper"] = $insert;
                        redirect('Toper_Controller/ViewResultYear');
                    }
                }
                /*                 * ***********************************imageuploadin***************************************** */
            }
        }
    }

}
