<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class Toper_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Toper_Model');
    }
    public function Toppers() {
        $years = $this->Toper_Model->fetchAllYears();
        foreach ($years as $year) {
            $result['a_'.$year->year_id] = $this->Toper_Model->fetchAllToppers($year->year_id);
        }
        $result['AllYears'] = $years;
        $this->load->view('Toppers',$result);
    }
}
