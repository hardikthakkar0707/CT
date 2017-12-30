<?php
class Student_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    public function StudentLogin(){
        $this->db->select('*');
        $result=$this->db->get('student_mst');
        return $result->result();
    }

    public function GetStudentResult($id) {
        $this->db->select('*')->from('result_mst r');
        $this->db->join('test_mst t','t.test_id = r.test_id');
        $this->db->join('student_mst s','s.roll_no = r.roll_no');
        $this->db->where(' r.roll_no',$id);
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

    public function FetchTestTestNames($roll) {
        $this->db->where('roll_no',$roll);
        //GROUP_CONCAT(t.test_name ORDER BY r.subject DESC,r.test_id) as test_name_csv
        $this->db->select('t.*')->from('result_mst r');
        $this->db->join('test_mst t', 't.test_id=r.test_id');
        $this->db->order_by('r.subject ASC,r.test_id ASC');
        //$this->db->order_by('r.subject DESC,r.test_id');
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

	 public function GetStudentInformation($id) {
        $this->db->select('*')->from('student_mst s');
        $this->db->where('s.stud_id',$id);
        $this->db->join('standard_mst std','s.standard_id = std.standard_id');
        $q = $this->db->get();
        return $q->result();
    }
	 public function GetResult($id) {
        $q = $this->db->query("SELECT * FROM `result_mst` where roll_no = '".$id."' GROUP BY test_id, subject order by test_id, subject  ");
        return $q->result();
    }

    public function GetStudentResultBySubject($id) {
        $this->db->select('r.*,s.stud_name,s.roll_no,s.standard_id,t.test_name, r.subject,r.result_id , GROUP_CONCAT(marks ORDER BY r.subject ASC,r.test_id ASC) as marks_csv, GROUP_CONCAT(t.test_name ORDER BY r.subject ASC,r.test_id ASC) as test_id_csv')->from('result_mst r');
        $this->db->join('test_mst t','t.test_id = r.test_id');
        $this->db->join('student_mst s','s.roll_no = r.roll_no');
        $this->db->where('r.roll_no',$id);
        $this->db->group_by('r.subject');
        $this->db->order_by('r.subject ASC','t.test_name','r.test_id');
        $q = $this->db->get();
        return $q->result();
    }
}
?>