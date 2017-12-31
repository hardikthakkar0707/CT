<?php
ob_start();
if(!ini_get('date.timezone'))
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Faculty_Model');
    }

    public function updateFaculty() {
        $count = 0;
        $standard = "";
        $subject = "";

        if (isset($_POST['AddFaculty'])) {
            $id = $_POST['facultyid'];
            $FName = $_POST['FName'];
            $Exp = $_POST['Exp'];
            $Degree = $_POST['Degree'];
            //Counting Number of Standards and Subject Data
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'standard') === 0) {
                    $count++;
                }
            }

            $Achievments = $_POST['Achievments'];
            $Description = $_POST['Description'];
            $Email = $_POST['Email'];
            $Cno = $_POST['Cno'];
            $gender = $_POST['gender'];
            $Password = $_POST['Password'];
            $new_file_name = $FName."_".time().".jpeg";

            /*             * ***************************************image upoding ****************************************** */
            if ($this->input->post('AddFaculty') && !empty($_FILES['ImageUpload']['name'])) {
                $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                $uploadPath = 'panel/img/Faculty';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $new_file_name;
                $config['max_size']	= '500'; //500kb
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Topper')) {
                    $fileData = $this->upload->data();
                    $data = array('faculty_name' => $FName, 'experience' => $Exp, 'degree' => $Degree, 'achievment' => $Achievments, 'description' => $Description, 'email' => $Email, 'password' => $Password, 'photo' => $fileData['file_name'],'contact_no'=>$Cno,'gender'=>$gender);
                }
                if (!empty($data)) {
                    $this->Faculty_Model->UpdateFaculty($id, $data);
                     $this->Faculty_Model->DeleteFacultyStdSub($id);
                    for($i=0;$i<$count;$i++) {
                        $standard = implode(',',$_POST['standard'.$i]);
                        $subject = implode(',',$_POST['subject'.$i]);
                        $std = array('faculty_id' => $id, 'standard_id' => $standard, 'subjects' => $subject);
                        $success = $this->Faculty_Model->InsertFacultyStdSub($std);
                    }
                    $_SESSION["updateFaculty"] = $success;
                    redirect("Faculty_Controller/ViewFaculty");
                }
            } else { //If Image not uploaded
                    $data = array('faculty_name' => $FName, 'experience' => $Exp, 'degree' => $Degree, 'achievment' => $Achievments, 'description' => $Description, 'email' => $Email, 'password' => $Password,'contact_no'=>$Cno,'gender'=>$gender);

                $this->Faculty_Model->UpdateFaculty($id, $data);
                $this->Faculty_Model->DeleteFacultyStdSub($id);

                for($i=0;$i<$count;$i++) {
                    $standard = implode(',',$_POST['standard'.$i]);
                    $subject = implode(',',$_POST['subject'.$i]);
                    $std = array('faculty_id' => $id, 'standard_id' => $standard, 'subjects' => $subject);
                    $success = $this->Faculty_Model->InsertFacultyStdSub($std);
                }
                $_SESSION["updateFaculty"] = $success;
                redirect("Faculty_Controller/ViewFaculty");
            }
        }
    }

    public function EditFaculty($id) {
        $result['FacultyDetails'] = $this->Faculty_Model->EditFaculty($id);
        $result['AllStandards'] = $this->Faculty_Model->FetchAllStandards();
        foreach($result['FacultyDetails'] as $faculty) {
            $result['s_'.$faculty->faculty_id] = $this->Faculty_Model->FacultyWiseSubjects($faculty->faculty_id);
            foreach ($result['s_'.$faculty->faculty_id] as $standard) {
                $result['sub_'.$standard->standard_id] = $this->Faculty_Model->FetchAllSubjects($standard->standard_id);
            }
        }
        $this->load->view('AddFaculty', $result);
    }

    public function Deletefaculty($id) {
        if (!empty($id)) {
            $success = $this->Faculty_Model->Deletefaculty($id);
            $_SESSION['Deletefaculty'] = $success;
            redirect('Faculty_Controller/ViewFaculty');
        }
    }

    public function activedeactive($id, $fid) {
        if ($fid == '1') {
            $data = array('active' => 0);
            $this->Faculty_Model->activedeactive($id, $data);
            $_SESSION['activedeactive'] = '1';
            redirect('Faculty_Controller/ViewFaculty');
        } elseif ($fid == '0') {
            $data = array('active' => 1);
            $this->Faculty_Model->activedeactive($id, $data);
            $_SESSION['activedeactive'] = '0';
            redirect('Faculty_Controller/ViewFaculty');
        }
    }

    public function AddFaculty() {
        $result['AllStandards'] = $this->Faculty_Model->FetchAllStandards();
        $this->load->view('AddFaculty', $result);
    }

    public function FetchSubjects() {
        $id = $this->input->post('id');
        $subjects = $this->Faculty_Model->FetchSubjects($id);
        foreach ($subjects as $subject) {
            echo "<option value='".$subject->sub_name."'>".$subject->sub_name."</option>";
            //$result['subject_id'] = $subject->sub_id;
        }
    }

    public function ViewFaculty() {
        $result['AllFaculties'] = $this->Faculty_Model->FetchAllFaculties();
        foreach($result['AllFaculties'] as $faculty) {
            $result['s_'.$faculty->faculty_id] = $this->Faculty_Model->FacultyWiseSubjects($faculty->faculty_id);
        }
        $this->load->view('ViewFaculty', $result);
    }

    public function InsertFaculty() {
        //print_r($_POST); die();
        $count = 0;
        $standard = "";
        $subject = "";

        if (isset($_POST['AddFaculty'])) {
            $FName = $_POST['FName'];
            $Exp = $_POST['Exp'];
            $Degree = $_POST['Degree'];
            //Counting Number of Standards and Subject Data
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'subject') === 0) {
                    $count++;
                }
            }
            $Achievments = $_POST['Achievments'];
            $Description = $_POST['Description'];
            $Email = $_POST['Email'];
            $Cno = $_POST['Cno'];
            $gender = $_POST['gender'];
            $Password = $_POST['Password'];
            $new_file_name = $FName."_".time().".jpeg";
            /*             * ***************************************image upoding ****************************************** */
            if ($this->input->post('AddFaculty') && !empty($_FILES['ImageUpload']['name'])) {

                $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                $uploadPath = 'panel/img/Faculty';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $new_file_name;
                $config['max_size']	= '500'; //500kb
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Topper')) {
                    $fileData = $this->upload->data();
                    $data = array('faculty_name' => $FName, 'experience' => $Exp, 'degree' => $Degree, 'achievment' => $Achievments, 'description' => $Description, 'email' => $Email, 'password' => $Password, 'photo' => $fileData['file_name'], 'contact_no' => $Cno, 'gender' => $gender, 'active' => '0');

                }
                if (!empty($data)) {
                    $id = $this->Faculty_Model->InsertFaculty($data);
                    for($i=0;$i<$count;$i++) {
                        $standard = implode(',',$_POST['standard'.$i]);
                        $subject = implode(',',$_POST['subject'.$i]);
                        $std = array('faculty_id' => $id, 'standard_id' => $standard, 'subjects' => $subject);
                        $success = $this->Faculty_Model->InsertFacultyStdSub($std);
                    }
                    $_SESSION["InsertFaculty"] = $success;
                    redirect("Faculty_Controller/ViewFaculty");
                }
            }
            /*             * ***************************************image upoding ****************************************** */
        }
    }

}
