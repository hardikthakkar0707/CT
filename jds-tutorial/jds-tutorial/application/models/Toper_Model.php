<?php
class Toper_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    //Select all years
    public function FetchAllYears() {
        $this->db->select('*')->from('topper_year_mst');
        $this->db->order_by('year_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Select all toppers
    public function FetchAllToppers($year) {
        $this->db->select('*');
        $this->db->from('topper_mst i');
        $this->db->join('topper_year_mst a', 'i.year_id = a.year_id');
        $this->db->join('standard_mst s', 'i.standard_id = s.standard_id');
        $this->db->where('i.year_id',$year);
        //$this->db->group_by('year');
        //$this->db->order_by('year', 'desc');
        $q = $this->db->get();
        return $q->result();
    }

     public function fetchSyllbus() {
        $this->db->select('*');
        $this->db->from('topper_mst i');
        $this->db->join('topper_year_mst a', 'i.year_id =a.year_id');
        $this->db->group_by('a.year_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function fetchSyllbus1($id) {
        $this->db->where('a.year_id',$id);
        $this->db->select('*');
         $this->db->from('topper_mst i');
          $this->db->join('topper_year_mst a', 'i.year_id =a.year_id');
        //$this->db->group_by('a.standard_id');
        $query = $this->db->get();
        return $query->result();
    }
//    public function fetchSyllbus(){
//        $this->db->select('*');
//        $result=$this->db->get('syllbus_std_mst');
//        return $result->result();
//    }
}
?>




