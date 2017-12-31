<?php
class FacultyProfile_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    public function fetchFaculties($id){
        $this->db->where('active','1');
        $this->db->select('*');
        $this->db->from('faculty_mst f');
        $this->db->join('faculty_std_sub s', 'f.faculty_id=s.faculty_id');
        $this->db->where('s.standard_id',$id);
        //$this->db->order_by('');
        $result=$this->db->get();
        return $result->result();
    }
    public function FetchAllStandards() {
        $this->db->select('*');
        $this->db->from('standard_mst');
        $q = $this->db->get();
        return $q->result();
    }
}
?>




