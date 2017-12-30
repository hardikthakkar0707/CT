<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Student_Model');
    }

    public function UpdateStudentData() {

        if (isset($_POST['AddStudent'])) {
            $id = $_POST['sid'];
            $Rno = $_POST['Rno'];
            $SName = $_POST['SName'];
            $SchoolName = $_POST['SchoolName'];
            $Branch = $_POST['Branch'];
            $Standard = $_POST['Standard'];
            $subject = implode(",", $_POST['subject']);
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            $gender = $_POST['gender'];
            $contact = $_POST['contact'];
            $new_file_name = $SName."_".time() . ".jpeg";
            /*             * *****************************************image*************************************** */
            if ($this->input->post('AddStudent') && !empty($_FILES['ImageUpload']['name'])) {
                $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                $uploadPath = 'panel/img/student';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $new_file_name;
                $config['max_size']	= '500'; // 500 kb
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Topper')) {
                    $fileData = $this->upload->data();

                  $data = array('roll_no' => $Rno, 'stud_name' => $SName, 'school_name' => $SchoolName, 'branch_id' => $Branch, 'standard_id' => $Standard, 'subject' => $subject, 'email_id' => $Email, 'password' => $Password, 'photo' => $fileData['file_name'], 'contact_no' => $contact, 'gender' => $gender);
                }
                if (!empty($data)) {
                  $success = $this->Student_Model->updatestudent($id, $data);
                    $_SESSION["UpdateStudentData"] = $success;
                    redirect("Student_Controller/ViewStudent");
                }
            } else {
                $data = array('roll_no' => $Rno, 'stud_name' => $SName, 'school_name' => $SchoolName, 'branch_id' => $Branch, 'standard_id' => $Standard, 'subject' => $subject, 'email_id' => $Email, 'password' => $Password, 'contact_no' => $contact, 'gender' => $gender);
                $success = $this->Student_Model->updatestudent($id, $data);
                $_SESSION["UpdateStudentData"] = $success;
                redirect("Student_Controller/ViewStudent");
            }
            /*             * *****************************************image*************************************** */
        }
    }

    public function EditStudent($id) {
        $result['AllStandards'] = $this->Student_Model->FetchAllStandards();
        $result['AllBranches'] = $this->Student_Model->FetchAllBranches();

        $result['StudentDetails'] = $this->Student_Model->FetchStudentData($id);
        foreach($result['StudentDetails'] as $student) {
            $result['AllSubjects'] = $this->Student_Model->FetchSubjects($student->standard_id);
        }
        $this->load->view('AddStudent', $result);
    }

    public function Deletestudent($id) {
        if (!empty($id)) {
            $succes = $this->Student_Model->Deletestudent($id);
            $_SESSION['Deletestudent'] = $succes;
            redirect('Student_Controller/ViewStudent');
        }
    }

    public function ViewStudent() {
        $result['AllStudents'] = $this->Student_Model->FetchAllStudents();
        $this->load->view('ViewStudent', $result);
    }

    public function AddStudent() {
        $result['AllStandards'] = $this->Student_Model->FetchAllStandards();
        $result['AllBranches'] = $this->Student_Model->FetchAllBranches();
        $this->load->view('AddStudent', $result);
    }

    public function FetchSubjects() {
        $id = $this->input->post('id');
        $subjects = $this->Student_Model->FetchSubjects($id);
        foreach ($subjects as $subject) {
            echo "<option value='".$subject->sub_name."'>".$subject->sub_name."</option>";
            //$result['subject_id'] = $subject->sub_id;
        }
    }

    public function InsertStudentData() {
        if (isset($_POST['AddStudent'])) {
            $Rno = $_POST['Rno'];
            $SName = $_POST['SName'];
            $SchoolName = $_POST['SchoolName'];
            $Branch = $_POST['Branch'];
            $Standard = $_POST['Standard'];
            $subject = implode(",", $_POST['subject']);
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            $gender = $_POST['gender'];
            $contact = $_POST['contact'];
            $new_file_name = $SName."_".time() . ".jpeg";

            /************************************************imageuploadin****************************** */
            if ($this->input->post('AddStudent') && !empty($_FILES['ImageUpload']['name'])) {
                $_FILES['Topper']['name'] = $_FILES['ImageUpload']['name'];
                $_FILES['Topper']['type'] = $_FILES['ImageUpload']['type'];
                $_FILES['Topper']['tmp_name'] = $_FILES['ImageUpload']['tmp_name'];
                $_FILES['Topper']['error'] = $_FILES['ImageUpload']['error'];
                $_FILES['Topper']['size'] = $_FILES['ImageUpload']['size'];
                $uploadPath = 'panel/img/student';
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
                    $data = array('roll_no' => $Rno, 'stud_name' => $SName, 'school_name' => $SchoolName, 'branch_id' => $Branch, 'standard_id' => $Standard, 'subject' => $subject, 'email_id' => $Email, 'password' => $Password, 'photo' => $fileData['file_name'], 'contact_no' => $contact, 'gender' => $gender);
                }

                if (!empty($data)) {
                    $success = $this->Student_Model->insertsubject($data);
                    $_SESSION["InsertStudentData"] = $success;
                    redirect("Student_Controller/ViewStudent");
                }

            } else {
                $data = array('roll_no' => $Rno, 'stud_name' => $SName, 'school_name' => $SchoolName, 'branch_id' => $Branch, 'standard_id' => $Standard, 'subject' => $subject, 'email_id' => $Email, 'password' => $Password, 'contact_no' => $contact, 'gender' => $gender);
                $success = $this->Student_Model->insertsubject($data);
                if($success['code'] != '') {
                     $_SESSION["InsertStudentData"] = $success['code'];
                 } else {
                    $_SESSION["InsertStudentData"] = $success;
                 }

                redirect("Student_Controller/ViewStudent");
            }
    }
}
}
