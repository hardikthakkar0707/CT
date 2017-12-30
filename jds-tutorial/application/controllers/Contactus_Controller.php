<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}

class Contactus_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Contactus_Model');
    }

    public function ContactUs() {
        $result['res'] = $this->Contactus_Model->contact_us();
        $this->load->view('ContactUs', $result);
    }

}
