<?php
class Syllabus_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
     public function fetchSyllabus($id) {
        $this->db->where('i.standard_id',$id);
        $this->db->select('*');
        $this->db->from('syllabus_mst i');
        $this->db->join('standard_mst s', 'i.standard_id =s.standard_id');
        $this->db->join('subject_mst sub', 'i.sub_id = sub.sub_id');
        $this->db->order_by('s.standard_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function FetchAllStandards() {
        $this->db->select('*');
        $this->db->from('standard_mst');
        $q = $this->db->get();
        return $q->result();
    }
//    public function fetchSyllbus(){
//        $this->db->select('*');
//        $result=$this->db->get('syllbus_std_mst');
//        return $result->result();
//    }
}
?>




