<?php

class Toper_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function updatetoperyear($id, $data) {
        $this->db->where('year_id', $id);
        return $this->db->update('topper_year_mst', $data);
    }

    function updatetoper($id, $data) {
        $this->db->where('topper_id', $id);
        return $this->db->update('topper_mst', $data);
    }

    public function DeleteYear($id) {
        $this->db->where('year_id', $id);
        return $this->db->delete('topper_year_mst');
    }

    public function Deletetoper($id) {
        $this->db->where('topper_id', $id);
        return $this->db->delete('topper_mst');
    }

    //Preventing Duplicate Year Entries
    public function getTopperYear($year) {
        $year_array = array();
        $this->db->select('*')->from('topper_year_mst')->where('year', $year);
        $q = $this->db->get();
        return $q->num_rows();
    }

    public function TopperYearInsert($data) {
        $insert = $this->db->insert('topper_year_mst', $data);
        //$id = $this->db->insert_id();
        return $insert;
    }

    public function TopperInsert($data) {
        return $this->db->insert('topper_mst', $data);
    }

    //Select all years
    public function FetchAllYears() {
        $this->db->select('*')->from('topper_year_mst');
        $query = $this->db->get();
        return $query->result();
    }

    //Select all standards
    public function FetchAllStandards() {
        $this->db->select('*')->from('standard_mst');
        $query = $this->db->get();
        return $query->result();
    }

    //Select a Particular Year
    public function SelectYear($id) {
        $this->db->where('year_id', $id);
        $this->db->select('*');
        $q = $this->db->get('topper_year_mst');
        return $q->result();
    }

    //Select all toppers
    public function FetchAllToppers() {
        $this->db->select('*');
        $this->db->from('topper_mst i');
        $this->db->join('topper_year_mst a', 'i.year_id = a.year_id');
        $this->db->join('standard_mst s', 'i.standard_id = s.standard_id');
        //$this->db->group_by('year');
        $this->db->order_by('year', 'desc');
        $q = $this->db->get();
        return $q->result();
    }

    // Fetch All Toppers in that particular year
    public function FetchToppersOfYear($id) {
        $this->db->where('a.year_id', $id);
        $this->db->select('*');
        $this->db->from('topper_mst i');
        $this->db->join('topper_year_mst a', 'i.year_id =a.year_id');
        $q = $this->db->get();
        return $q->result();
    }

    //Select Year from Topper Master
    public function SelectYearFromTopper($id) {
        $this->db->where('year_id', $id);
        $this->db->select('*');
        $q = $this->db->get('topper_mst');
        return $q->result();
    }

    //Select Toppers Details
    public function SelectTopperDetails($id) {
        $this->db->select('*');
        $this->db->from('topper_mst');
        //$this->db->join('topper_year_mst a', 'i.year_id = a.year_id');
        //$this->db->join('standard_mst s', 'i.standard_id = s.standard_id');
        $this->db->where('topper_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

}
?>




