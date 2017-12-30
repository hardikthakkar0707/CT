<?php
class Contactus_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    public function contact_us(){
        $this->db->select('*');
        $result=$this->db->get('branch_mst');
        return $result->result();
    }
}
?>  




