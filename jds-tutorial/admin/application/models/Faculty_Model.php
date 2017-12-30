<?php
class Faculty_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function activedeactive($id, $data) {
        $this->db->where('faculty_id', $id);
        return $this->db->update('faculty_mst', $data);
    }

    //Update Basic Faculty Details
    function UpdateFaculty($id, $data) {
        $this->db->where('faculty_id', $id);
        return $this->db->update('faculty_mst', $data);
    }

    //Delete Faculty Standard and Subjects Data
    public function DeleteFacultyStdSub($id) {
        $this->db->where('faculty_id', $id);
        return $this->db->delete('faculty_std_sub');
    }

      public function Deletefaculty($id) {
        $this->db->where('faculty_id', $id);
        return $this->db->delete('faculty_mst');
    }

    public function FetchSubjects($id) {
        $this->db->select('*');
        $this->db->where('standard_id',$id);
        $result = $this->db->get('subject_mst');
        return $result->result();
    }

    public function FetchAllStandards() {
        $this->db->select('*');
        $result = $this->db->get('standard_mst');
        return $result->result();
    }

    public function FetchAllFaculties() {
        $this->db->select('*');
        $result = $this->db->get('faculty_mst');
        return $result->result();
    }

     public function FetchAllSubjects($id) {
        $this->db->select('*');
        $this->db->where('standard_id',$id);
        $result = $this->db->get('subject_mst');
        return $result->result();
    }

    public function FacultyWiseSubjects($id) {
        $this->db->select('*');
        $this->db->join('standard_mst s','f.standard_id = s.standard_id');
        $this->db->where('faculty_id',$id);
        $q = $this->db->get('faculty_std_sub f');
        return $q->result();
    }

     public function EditFaculty($id) {
        $this->db->where('faculty_id',$id);
        $this->db->select('*');
        $result = $this->db->get('faculty_mst');
        return $result->result();
    }
    //Insert Basic Faculty Data
    public function InsertFaculty($data1) {
        $this->db->insert('faculty_mst', $data1);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    //Insert Faculty Standard and Subjects Data
    public function InsertFacultyStdSub($std) {
        return $this->db->insert('faculty_std_sub', $std);
    }
}
?>




