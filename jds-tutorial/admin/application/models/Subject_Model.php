<?php

class Subject_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function InsertSubject($data) {
        return $this->db->insert('subject_mst', $data);
    }

    public function FetchOneSubject($id) {
        $this->db->where('sub_id', $id);
        $this->db->select('*');
        $result = $this->db->get('subject_mst');
        return $result->result();
    }

    //Fetch all standards
    public function FetchAllStandards() {
        $this->db->select('*')->from('standard_mst');
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchSubjects($id) {
        $this->db->select('*')->from('subject_mst sub');
        $this->db->join('standard_mst std', 'sub.standard_id = std.standard_id');
        $this->db->where('sub.standard_id',$id);
        $this->db->order_by('sub.sub_name', 'asc');
        $q = $this->db->get();
        return $q->result();
    }

    public function DeleteSubject($id) {
        $this->db->where('sub_id', $id);
        return $this->db->delete('subject_mst');
    }

    public function updatesubject($id, $data) {
        $this->db->where('sub_id', $id);
        return $this->db->update('subject_mst', $data);
    }

}
?>




