<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
class FacultyProfile_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('FacultyProfile_Model');
    }
    public function FacultyProfile()
	{
        $result['AllStandards'] = $this->FacultyProfile_Model->FetchAllStandards();
        foreach ($result['AllStandards'] as $standard) {
            $result['f_'.$standard->standard_id] = $this->FacultyProfile_Model->fetchFaculties($standard->standard_id);
        }
        $this->load->view('FacultyProfile',$result);
	}

}
