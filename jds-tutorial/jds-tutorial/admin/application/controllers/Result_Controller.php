<?php
ob_start();
if( ! ini_get('date.timezone') ) {
    date_default_timezone_set('GMT');
}

defined('BASEPATH') OR exit('No direct script access allowed');

class Result_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Result_Model');
        $this->load->library('excel');//load PHPExcel library
    }

    public function AddResult() {
        $result['AllStandards'] = $this->Result_Model->FetchAllStandards();
		$this->load->view('AddResult',$result);
    }

    public function EditResult() {
        $result['AllStandards'] = $this->Result_Model->FetchAllStandards();
        $result['EditResult'] = 1;
		$this->load->view('AddResult',$result);
    }

	public function TestResult($roll) {
        $result['StudentDetails'] = $this->Result_Model->FetchStudentDetails($roll);
        $result['AllTests'] = $this->Result_Model->FetchStudentsAllTest($roll);
        $result['AllTestSubjects'] = $this->Result_Model->FetchTestSubjects($roll);
        //print_r($result['AllTests']); die();
		$this->load->view('TestResult',$result);
	}

    public function ViewResult() {
        $result['AllStudents'] = $this->Result_Model->FetchAllStudents();
        foreach($result['AllStudents'] as $student) {
            $result['t_'.$student->stud_id] = $this->Result_Model->FetchResult($student->roll_no);
            //print_r($result['t_'.$student->stud_id]);
            //die();
        }
        $this->load->view('ViewResult', $result);
    }

    public function ViewTests() {
        $result['AllTests'] = $this->Result_Model->FetchAllTests();
        foreach($result['AllStudents'] as $student) {
            $result['t_'.$student->stud_id] = $this->Result_Model->FetchResult($student->roll_no);
            //print_r($result['t_'.$student->stud_id]);
            //die();
        }
        $this->load->view('ViewResult', $result);
    }

    public function FetchSubjects() {
        $id = $this->input->post('id');
        $subjects = $this->Result_Model->FetchSubjects($id);
        foreach ($subjects as $subject) {
            echo "<option value='".$subject->sub_name."'>".$subject->sub_name."</option>";
            //$result['subject_id'] = $subject->sub_id;
        }
    }

    public function FetchTests() {
        $id = $this->input->post('id');
        $tests = $this->Result_Model->FetchAllTestsWithStandards($id);
        if(!empty($tests)) {
            echo "<option value=''>Select Test</option>";
            foreach ($tests as $test) {
                echo "<option value='".$test->test_id."'>".$test->test_name."</option>";
                //$result['subject_id'] = $subject->sub_id;
            }
        } else {
            echo "<option value=''>No Tests for selected standard</option>";
        }
        //print_r($tests); die();

    }

    public function InsertResult() {
        if (isset($_POST['AddResults'])) {
            //print_r($_POST);
            //print_r($_FILES);
            $new_test_name = $_POST['NewTestName'];
            $existing_test = $_POST['ExistingTest'];
            $standard = $_POST['Standard'];
            $subject = $_POST['Subject'];
            $file_name= '';
            $extension = '';

            if(isset($_POST['NewTestName']) && !empty($_POST['NewTestName'])) {
                $testData = array('test_name'=>$new_test_name);
                $testDetails = $this->Result_Model->InsertTest($testData);
            } else {
                $testDetails = $existing_test;
            }

            if(isset($_POST['ExistingTest']) && !empty($_POST['ExistingTest'])) {
                $result = $this->Result_Model->CheckResultData($existing_test,$subject);
                if($result > 0) {
                    $result['Updated'] = $this->Result_Model->DeleteExistingResults($existing_test,$subject);
                }
            }

            if ($this->input->post('AddResults') && !empty($_FILES['MarksExcelUpload']['name'])) {
                $_FILES['Excel']['name'] = $_FILES['MarksExcelUpload']['name'];
                $_FILES['Excel']['type'] = $_FILES['MarksExcelUpload']['type'];
                $_FILES['Excel']['tmp_name'] = $_FILES['MarksExcelUpload']['tmp_name'];
                $_FILES['Excel']['error'] = $_FILES['MarksExcelUpload']['error'];
                $_FILES['Excel']['size'] = $_FILES['MarksExcelUpload']['size'];
                $uploadPath = 'panel/results/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'xls|xlsx';
                //$new_file_name = $test_name."_".$standard."_".$subject."_".time()."xlsx";
                //$config['file_name'] = $new_file_name;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('Excel')) {
                    $fileData = $this->upload->data();
                    $file_path=$fileData['full_path']; //uploaded file path
                    chmod($file_path,0777); //change permissions
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('AddResult', $error);
                }

                $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007
                //Set to read only
                $objReader->setReadDataOnly(true);
                //Load excel file
                $objPHPExcel=$objReader->load($file_path);
                $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel
                $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);
                    //loop from first data untill last data
                    for($i=2;$i<=$totalrows;$i++)
                    {
                        $RollNo= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                        $Marks= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1
                        echo $RollNo;
                        echo $Marks;
                        $resultData=array('roll_no'=>$RollNo, 'test_id'=>$testDetails, 'standard_id'=>$standard ,'subject'=>$subject ,'marks'=>$Marks);
                        $success = $this->Result_Model->InsertResultData($resultData);
                    }
                    unlink($file_path); //File Deleted After uploading in database .

                    if($result['Updated'] != '' ) {
                        $_SESSION["ResultsUpdated"] = $success;
                    } else {
                        $_SESSION["ResultsAdded"] = $success;
                    }

                    redirect("Result_Controller/ViewResult");
            }
        }
    }
}