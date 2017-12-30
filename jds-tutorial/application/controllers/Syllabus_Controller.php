<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class Syllabus_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Syllabus_Model');
    }

    public function SyllabusStandard() {
        $standards = $this->Syllabus_Model->FetchAllStandards();
        foreach ($standards as $standard) {
            $result['s_'.$standard->standard_id] = $this->Syllabus_Model->fetchSyllabus($standard->standard_id);
        }
        $result['AllStandards'] = $standards;
        $this->load->view('SyllabusStd',$result);
	}
}
