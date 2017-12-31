<?php
class Login_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    public function AdminLogin(){
        $this->db->select('*');
        $result=$this->db->get('admin');
        return $result->result();
    }
}
?>  




