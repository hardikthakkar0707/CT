<?php

class Syllabus_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //Fetch all standards
    public function FetchAllStandards() {
        $this->db->select('*')->from('standard_mst');
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchAllSubjects($id) {
        $this->db->select('*')->from('subject_mst sub');
        $this->db->join('standard_mst std', 'sub.standard_id = std.standard_id');
        $this->db->where('sub.standard_id',$id);
        $this->db->order_by('sub.sub_name', 'asc');
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchSingleStandard($id) {
        $this->db->select('*')->from('standard_mst');
        $this->db->where('standard_id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchSyllabus($id) {
        $this->db->select('*')->from('syllabus_mst syl');
        $this->db->join('standard_mst std', 'syl.standard_id = std.standard_id');
        $this->db->join('subject_mst sub', 'syl.sub_id = sub.sub_id');
        $this->db->where('syl.standard_id',$id);
        $this->db->order_by('syl.standard_id', 'asc');
        $q = $this->db->get();
        return $q->result();
    }

    public function InsertSyllabus($data1) {
        return $this->db->insert('syllabus_mst', $data1);
    }


     public function DeleteSyllabus($id) {
        $this->db->where('syllabus_id', $id);
        return $this->db->delete('syllabus_mst');
    }


      public function Fetchstandard() {
        $this->db->select('*');
        $this->db->from(' syllabus_std_mst i');
        $this->db->join('syllabus_mst a', 'i.standard_id =a.standard_id');
        $this->db->group_by('i.standard_id');
        $query = $this->db->get();
        return $query->result();
    }
     public function Fetchstandard2($id) {
         $this->db->where('i.standard_id',$id);
        $this->db->select('*');
        $this->db->from(' syllabus_std_mst i');
        $this->db->join('syllabus_mst a', 'i.standard_id =a.standard_id');
        //$this->db->group_by('i.standard_id');
        $query = $this->db->get();
        return $query->result();
    }
}
?>




