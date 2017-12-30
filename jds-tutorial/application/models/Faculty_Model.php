<?php
class Faculty_Model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    public function StaffLogin(){
        $this->db->select('*');
        $result=$this->db->get('faculty_mst');
        return $result->result();
    }

    public function FacultyTeaches($id) {
        $this->db->select('*')->from('faculty_std_sub f');
        $this->db->where('faculty_id',$id);
        $this->db->join('standard_mst std', 'f.standard_id=std.standard_id');
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchSubjects($id) {
        $this->db->select('*');
        $this->db->where('standard_id',$id);
        $result = $this->db->get('subject_mst');
        return $result->result();
    }

    public function FacultyWiseSubjects($std_id,$fac_id) {
        $this->db->select('*');
        //$this->db->join('standard_mst s','f.standard_id = s.standard_id');
        $this->db->where(array('faculty_id'=>$fac_id,'standard_id'=>$std_id));
        $q = $this->db->get('faculty_std_sub');
        return $q->result();
    }

    public function FetchAllTests($std_id,$subject) {
        $this->db->where(array('r.subject'=>$subject,'r.standard_id'=>$std_id));
        $this->db->select('*')->from('result_mst r');
        $this->db->join('test_mst t', 't.test_id=r.test_id');
        $this->db->group_by('r.test_id');
        $this->db->order_by('r.test_id');
        $q = $this->db->get();
        return $q->result();
    }

    public function AllStudentsAllTestsResults($std_id,$subject) {
        $this->db->select('t.*,s.stud_name,GROUP_CONCAT(t.test_name ORDER BY r.test_id ASC) as test_csv,GROUP_CONCAT(r.marks ORDER BY r.test_id) as marks_csv');
        $this->db->from('result_mst r');
        $this->db->where(array('r.subject'=>$subject,'r.standard_id'=>$std_id));
        $this->db->join('test_mst t', 't.test_id=r.test_id');
        $this->db->join('student_mst s', 's.roll_no=r.roll_no');
        $this->db->group_by('r.roll_no');
        $this->db->order_by('r.roll_no');
        $q = $this->db->get();
        return $q->result();
    }

    public function GetStudentResultBySubject($std_id,$subject) {
        $this->db->select('r.*,s.stud_name,s.roll_no,s.standard_id,t.test_name, r.subject,r.result_id , GROUP_CONCAT(marks ORDER BY r.subject ASC,r.test_id ASC) as marks_csv, GROUP_CONCAT(t.test_name ORDER BY r.subject ASC,r.test_id ASC) as test_id_csv')->from('result_mst r');
        $this->db->join('test_mst t','t.test_id = r.test_id');
        $this->db->join('student_mst s','s.roll_no = r.roll_no');
        $this->db->where(array('r.subject'=>$subject,'r.standard_id'=>$std_id));
        $this->db->group_by('r.roll_no');
        $this->db->order_by('t.test_name','r.test_id','r.roll_no');
        $q = $this->db->get();
        return $q->result();
    }

    public function FetchTestTestNames($std_id,$subject) {
        $this->db->where(array('r.subject'=>$subject,'r.standard_id'=>$std_id));
        //GROUP_CONCAT(t.test_name ORDER BY r.subject DESC,r.test_id) as test_name_csv
        $this->db->select('t.*')->from('result_mst r');
        $this->db->join('test_mst t', 't.test_id=r.test_id');
        $this->db->group_by('r.test_id');
        //$this->db->order_by('t.test_name,r.test_id');
        $q = $this->db->get();
        return $q->result();
    }
}
?>




