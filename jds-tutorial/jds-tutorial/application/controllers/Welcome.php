<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$_SESSION['login']=1;
		$this->load->view('index');
	}
       public function AboutUs()
	{
		$_SESSION['login']=1;
		$this->load->view('AboutUs');
	}

	public function LoginStaff()
	{
		$_SESSION['login']=1;
		$this->load->view('LoginStaff');
	}
        public function SyllabusStandard()
	{
		$_SESSION['login']=1;
		$this->load->view('SyllabusStd');
	}
	public function Syllabus()
	{
		$_SESSION['login']=1;
		$this->load->view('Syllabus');
	}
//	public function LoginStudent()
//	{
//		$_SESSION['login']=1;
//		$this->load->view('LoginStudent');
//	}
//	public function Student()
//	{
//		$_SESSION['login']=0;
//		$this->load->view('Student');
//	}
	public function TopperYear()
	{
		$_SESSION['login']=1;
		$this->load->view('TopperYears');
	}
	public function Toppers()
	{
		$_SESSION['login']=1;
		$this->load->view('Toppers');
	}
	public function Schedule()
	{
		$_SESSION['login']=1;
		$this->load->view('Schedule');
	}
	public function FacultyProfile()
	{
		$_SESSION['login']=1;
		$this->load->view('FacultyProfile');
	}
}
