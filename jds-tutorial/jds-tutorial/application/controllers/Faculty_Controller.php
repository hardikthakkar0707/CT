<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}

class Faculty_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Faculty_Model');
    }

    public function LogOut() {
        unset($_SESSION['facultyid']);
        unset($_SESSION['facultyname']);
        unset($_SESSION['isFacLoggedIn']);
        redirect("Faculty_Controller/LoginStaff");
    }

    public function LoginStaff() {
        if (isset($_SESSION['isFacLoggedIn']) && $_SESSION['isFacLoggedIn'] == 1) {
            redirect('Faculty_Controller/ViewResults');
        } else {
            $this->load->view('LoginStaff');
        }
    }

    public function ViewResults() {
        if (isset($_SESSION['isFacLoggedIn']) && $_SESSION['isFacLoggedIn'] == 1) {
            $id = $_SESSION['facultyid'];
            $name = $_SESSION['facultyname'];
            $result['FacultyTeaches'] = $this->Faculty_Model->FacultyTeaches($id);
            //$result['AllTestSubjects']= $this->Faculty_Model->FetchTestSubjects($roll_no);
            //$result['AllTests']= $this->Faculty_Model->FetchStudentsAllTest($roll_no);
            $this->load->view('Faculty',$result);
        } else {
            $this->load->view('LoginStaff');
        }
    }

    public function SearchResults() {
        $std_id = $this->input->post('standard');
        $subject = $this->input->post('subject');
        $standard = $this->input->post('standard_name');
        $result['SearchTerm'] = array("standard"=>$standard,"subject"=>$subject);
        $result['AllStudentsAllTestsResults'] = $this->Faculty_Model->AllStudentsAllTestsResults($std_id,$subject);
        if(!empty($result['AllStudentsAllTestsResults'])) {
            $result['AllTestsResult'] = $this->Faculty_Model->GetStudentResultBySubject($std_id,$subject);
            $result['AllTestTestNames']= $this->Faculty_Model->FetchTestTestNames($std_id,$subject);
            $result['AllTests'] = $this->Faculty_Model->FetchAllTests($std_id,$subject);
            $this->load->view('FacSearchResults',$result);
        } else {
            $result['AllStudentsAllTestsResults'] = '0';
            $result['AllTests'] = '0';
            $result['AllTestsResult'] = '0';
            $this->load->view('FacSearchResults',$result);
        }
        //print_r($result['AllStudentsAllTestsResults']); die();

    }

    public function FetchSubjects() {
        $std_id = $this->input->post('id');
        $fac_id = $_SESSION['facultyid'];
        $all_subjects = $this->Faculty_Model->FacultyWiseSubjects($std_id,$fac_id);
        //print_r($subjects); die();
        if(!empty($all_subjects)) {
            foreach ($all_subjects as $subject) {
                $sub_array = explode(',',$subject->subjects);
                foreach ($sub_array as $sub) {
                    echo "<option value='".$sub."'>".$sub."</option>";
                }
                //$result['subject_id'] = $subject->sub_id;
            }
        } else {
            echo "<option value=''>No Subjects Found.</option>";;
        }

    }

    public function LogingStaff() {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $flag = 0;
            $res = $this->Faculty_Model->StaffLogin();
            foreach ($res as $value) {
                if ($value->email == $email && $value->password == $password) {
                    $id = $value->faculty_id;
                    $facultyname = $value->faculty_name;
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 1) {
                $_SESSION['isFacLoggedIn'] = '1';
                $_SESSION['facultyid'] = $id;
                $_SESSION['facultyname'] = $facultyname;
                redirect('Faculty_Controller/ViewResults');
            } else {
                $_SESSION['FacultyRestricted'] = '0';
                redirect('Faculty_Controller/LoginStaff');
            }
        } else {
            $this->load->view('LoginStaff');
        }
    }

}
