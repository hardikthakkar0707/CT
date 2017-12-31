<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}

class Student_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Student_Model');
    }

    public function LoginStudent() {
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) {
            redirect('Student_Controller/ViewResults');
        } else {
            $this->load->view('LoginStudent');
        }
    }

    public function LogOut() {
        unset($_SESSION['studentid']);
        unset($_SESSION['roll_no']);
        unset($_SESSION['isLoggedIn']);
        redirect("Student_Controller/LoginStudent");
    }

    public function ViewResults() {
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) {
            $id = $_SESSION['studentid'];
            $roll_no = $_SESSION['roll_no'];
            $result['AllTestsResult'] = $this->Student_Model->GetStudentResultBySubject($roll_no);
            $result['AllTestTestNames']= $this->Student_Model->FetchTestTestNames($roll_no);
            $result['AllTestSubjects']= $this->Student_Model->FetchTestSubjects($roll_no);
            $result['AllTests']= $this->Student_Model->FetchStudentsAllTest($roll_no);
            if(count($result['AllTests']) > 0) {
                $this->load->view('Student',$result);
            } else {
                $result['AllTestTestNames'] = 0;
                $result['AllTests'] = 0;
                $result['AllTestsResult'] = 0;
                $result['AllTestSubjects'] = 0;
                $this->load->view('Student',$result);
            }

        } else {
            $this->load->view('LoginStudent');
        }
    }

    public function Student() {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $flag = 0;
            $res = $this->Student_Model->StudentLogin();
            foreach ($res as $value) {
                if ($value->email_id == $email && $value->password == $password) {
                    $id = $value->stud_id;
                    $roll_no = $value->roll_no;
                    $student_name = $value->stud_name;
                    $student_photo = $value->photo;
                    $flag = 1;
                    break;
                }
            }
            if ($flag == 1) {
                $_SESSION['isLoggedIn'] = '1';
                $_SESSION['studentid'] = $id;
                $_SESSION['studentname'] = $student_name;
                $_SESSION['roll_no'] = $roll_no;
                redirect('Student_Controller/ViewResults');
            } else {
                $_SESSION['StudentRestricted'] = '0';
                redirect('Student_Controller/LoginStudent');
            }

        }

    }
}
