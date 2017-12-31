<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        if (isset($_SESSION['Admin'])) {
            $this->load->view('home');
        } else {
            $this->load->view('index');
        }
    }
    public function AddSchedule()
	{
		$this->load->view('AddSchedule');
	}
	public function ViewSchedule()
	{
		$this->load->view('ViewSchedule');
	}
    
//        public function AddSyllabus()
//	{
//		$this->load->view('AddSyllabus');
//	}
//	public function ViewSyllabus()
//	{
//		$this->load->view('ViewSyllabus');
//	}
//	public function Syllabus()
//	{
//		$this->load->view('Syllabus');
//	}


//    public function AddBranch() {
//        $this->load->view('AddBranch');
//    }

//    public function AddFaculty() {
//        $this->load->view('AddFaculty');
//    }

//    public function AddStudent() {
//        $this->load->view('AddStudent');
//    }
//
//    public function AddToppers() {
//        $this->load->view('AddToppers');
//    }

//    public function ViewBranch() {
//        $this->load->view('ViewBranch');
//    }

//    public function ViewFaculty() {
//        $this->load->view('ViewFaculty');
//    }

//    public function ViewResultYear() {
//        $this->load->view('ViewResultYear');
//    }

//    public function ViewStudent() {
//        $this->load->view('ViewStudent');
//    }

//    public function Toppers() {
//        $this->load->view('Toppers');
//    }

//    public function AddSchedule() {
//        $this->load->view('AddSchedule');
//    }
//
//    public function ViewSchedule() {
//        $this->load->view('ViewSchedule');
//    }

//        public function AddSubject()
//	{
//		$this->load->view('AddSubject');
//	}
//	public function ViewSubject()
//	{
//		$this->load->view('ViewSubject');
//	}
}
