<?php

class Student_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function updatestudent($id, $data) {
        $this->db->where('stud_id', $id);
        return $this->db->update('student_mst', $data);
    }
    public function insertsubject($data) {
        if($this->db->insert('student_mst', $data)) {
            return $success = 1;
        } else {
            return $error = $this->db->error();
            //return $error = $this->db->_error_number();
        }

    }

    public function Deletestudent($id) {
        $this->db->where('stud_id', $id);
        return $this->db->delete('student_mst');
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

    public function FetchAllBranches() {
        $this->db->select('*');
        $result = $this->db->get('branch_mst');
        return $result->result();
    }

    public function FetchAllStudents() {
        $this->db->select('*');
        $this->db->from('student_mst stu');
        $this->db->join('branch_mst b','stu.branch_id = b.branch_id');
        $this->db->join('standard_mst std','std.standard_id = stu.standard_id');
        $this->db->order_by('std.standard_id');
        $q = $this->db->get();
        return $q->result();
    }

      public function FetchStudentData($id) {
        $this->db->where('i.stud_id', $id);
        $this->db->select('*');
        $this->db->from('student_mst i');
        $this->db->join('branch_mst a', 'i.branch_id =a.branch_id');
        $this->db->join('standard_mst s', 's.standard_id =i.standard_id');
        $query = $this->db->get();
        return $query->result();
    }


}
?>




