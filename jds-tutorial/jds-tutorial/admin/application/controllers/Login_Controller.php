<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_Model');
    }
    //public function functionName();
	public function index(){
	if (isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn'] == 1) {
            $this->load->view('home');
        }else{
        	$this->load->view('index');
        }
	}
    public function Home() {
        //session_destroy();
        if (isset($_SESSION['isAdminLoggedIn'])) {
            $this->load->view('home');
        } else {
            if (isset($_POST['Name'])) {
                $email = $_POST['Name'];
                $flag = 0;
                $password = $_POST['Password'];
                $result = $this->Login_Model->AdminLogin();
                foreach ($result as $value) {
                    if ($value->email == $email && $value->password == $password) {
                        $name = $value->user_name;
                        $flag = 1;
                        break;
                    }
                }
                if ($flag == 1) {
                    $this->session->set_userdata('Admin', $name);
                    $this->session->set_userdata('isAdminLoggedIn', 1);
                    $this->load->view('home');
                } else {
                    $msg['msg']="Invalid Username And Password";
                    $this->load->view('index',$msg);
                }
            } else {
                redirect('welcome');
            }
        }
    }
    public function Logout(){
        $this->session->unset_userdata('Admin');
        $this->session->unset_userdata('isAdminLoggedIn');
        redirect('welcome');
    }

}
