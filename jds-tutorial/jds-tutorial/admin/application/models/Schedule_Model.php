<?php

class Schedule_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function FetchRecord() {
        $this->db->select('*');
        $result = $this->db->get('subject_mst');
        return $result->result();
    }
     public function DeleteSedual($id) {
        $this->db->where('standard', $id);
        return $this->db->delete('schedule_mst');
    }
}
?>  




