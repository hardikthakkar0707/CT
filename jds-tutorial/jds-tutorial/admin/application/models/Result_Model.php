<?php

class Result_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertsubject($data) {
        return $this->db->insert('student_mst', $data);
    }

    public function InsertTest($data) {
        $this->db->insert('test_mst',$data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function InsertResultData($data) {
        return $this->db->insert('result_mst',$data);
    }

    public function FetchSubjects($id) {
        $this->db->select('*');
        $this->db->where('standard_id',$id);
        $this->db->order_by('sub_name');
        $result = $this->db->get('subject_mst');
        return $result->result();
    }

    public function FetchResult($rollno) {
        $this->db->select('*,GROUP_CONCAT(subject) as subject_csv,GROUP_CONCAT(marks) as marks_csv')->from('result_mst r');
        $this->db->where('roll_no',$rollno);
        $this->db->join('test_mst t','t.test_id=r.test_id');
        $this->db->group_by('t.test_name');
        $this->db->order_by('r.subject');
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchTest($id) {
        $this->db->select('*')->from('test_mst');
        $this->db->where('test_id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchAllStandards() {
        $this->db->select('*');
        $result = $this->db->get('standard_mst');
        return $result->result();
    }

    public function FetchAllTests() {
        $this->db->select('*');
        $result = $this->db->get('test_mst');
        return $result->result();
    }

    public function FetchStudentDetails($roll) {
        $this->db->where('roll_no',$roll);
        $this->db->select('*')->from('student_mst');
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchTestSubjects($roll) {
        $this->db->where('roll_no',$roll);
        $this->db->select('*')->from('result_mst');
        $this->db->group_by('subject');
        $this->db->order_by('subject');
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchStudentsAllTest($roll) {
        $this->db->where('r.roll_no',$roll);
        $this->db->select('r.*,t.*,st.*,s.stud_name,GROUP_CONCAT(r.subject ORDER BY r.subject ASC) as subject_csv,GROUP_CONCAT(marks ORDER BY r.subject) as marks_csv');
        $this->db->from('result_mst r');
        $this->db->join('test_mst t', 't.test_id=r.test_id');
        $this->db->join('student_mst s', 's.roll_no=r.roll_no');
        $this->db->join('standard_mst st', 'st.standard_id=r.standard_id');
        $this->db->group_by('r.test_id');
        $this->db->order_by('r.test_id, r.subject');
        $result = $this->db->get();
        return $result->result();
    }

    public function FetchAllTestsWithStandards($id) {
        $this->db->where('r.standard_id',$id);
        $this->db->select('*');
        $this->db->from('result_mst r');
        $this->db->join('test_mst t', 't.test_id=r.test_id');
        $this->db->group_by('r.test_id');
        $result = $this->db->get();
        return $result->result();
    }

    public function CheckResultData($id,$sub) {
        $this->db->select('*');
        $this->db->from('result_mst');
        $array = array('test_id=' => $id, 'subject=' => $sub);
        $this->db->where($array);
        $q = $this->db->get();
        return $rowcount = $q->num_rows();
    }

    public function DeleteExistingResults($id,$sub) {
        $this->db->where(array('test_id' => $id, 'subject' => $sub));
        return $this->db->delete('result_mst');
    }

    public function FetchAllStudents() {
        $this->db->select('*');
        $this->db->from('student_mst stu');
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




