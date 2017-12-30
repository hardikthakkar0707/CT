<?php
ob_start();
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Branch_Model');
    }
    public function Updatebranch(){
        if(isset($_POST['SubmitImage'])){
            $branch_id=$_POST['branch_id'];
            $AlbumName=$_POST['AlbumName'];
            $Add=$_POST['Add'];
            $BranchPhone1=$_POST['BranchPhone1'];
            $BranchPhone2=$_POST['BranchPhone2'];
            $Email=$_POST['Email'];
            $data=array('branch_area'=>$AlbumName,'address'=>$Add,'phone_no1'=>$BranchPhone1,'phone_no2'=>$BranchPhone2,'email'=>$Email);
            $success=  $this->Branch_Model->Updatebranch($branch_id,$data);
            $_SESSION['Updatebranch']=$success;
            redirect('Branch_Controller/ViewBranch');
        }
    }
    public function Fetchbranchupdate($id){
        $result['res']=$this->Branch_Model->Fetchbranchupdate($id);
        $this->load->view('AddBranch',$result);
    }
    public function DeleteBranch($id){
        $success=$this->Branch_Model->DeleteBranch($id);
        $_SESSION['DeleteBranch']=$success;
        redirect('Branch_Controller/ViewBranch');
    }
    public function AddBranch() {
        $this->load->view('AddBranch');
    }
    public function ViewBranch() {
        $result['resBranch']=  $this->Branch_Model->FetchRecord();
        $this->load->view('ViewBranch',$result);
    }
    public function InsertBranch() {
        if (isset($_POST['SubmitImage'])) {
            $AlbumName = $_POST['AlbumName'];
            $Add = $_POST['Add'];
            $BranchPhone1 = $_POST['BranchPhone1'];
            $BranchPhone2 = $_POST['BranchPhone2'];
            $Email = $_POST['Email'];
            $data = array('branch_area' => $AlbumName, 'address' => $Add, 'phone_no1' => $BranchPhone1, 'phone_no2' => $BranchPhone2, 'email' => $Email);
           $success= $this->Branch_Model->insertBranch($data);
           $_SESSION['InsertBranch']=$success;
           redirect('Branch_Controller/ViewBranch');
        }
    }

}
