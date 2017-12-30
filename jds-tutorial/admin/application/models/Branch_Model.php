<?php

class Branch_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function updatebranch($id, $data) {
        $this->db->where('branch_id', $id);
        return $this->db->update('branch_mst', $data);
    }

    public function insertBranch($data) {
        return $this->db->insert('branch_mst', $data);
    }

    public function Fetchbranchupdate($id) {
        $this->db->where('branch_id', $id);
        $this->db->select('*');
        $result = $this->db->get('branch_mst');
        return $result->result();
    }

    public function FetchRecord() {
        $this->db->select('*');
        $result = $this->db->get('branch_mst');
        return $result->result();
    }

    public function DeleteBranch($id) {
        $this->db->where('branch_id', $id);
        return $this->db->delete('branch_mst');
    }

}
?>  




