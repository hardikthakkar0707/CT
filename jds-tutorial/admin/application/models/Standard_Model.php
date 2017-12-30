<?php

class Standard_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function InsertStandard($data) {
        return $this->db->insert('standard_mst', $data);
    }

    public function FetchRecord1($id) {
        $this->db->where('standard_id', $id);
        $this->db->select('*');
        $result = $this->db->get('standard_mst');
        return $result->result();
    }

    //Fetch all standards
    public function FetchAllStandards() {
        //$this->
    }

    public function FetchRecord() {
        $this->db->select('*');
        $result = $this->db->get('standard_mst');
        return $result->result();
    }

    public function DeleteStandard($id) {
        $this->db->where('standard_id', $id);
        return $this->db->delete('standard_mst');

    }

    public function UpdateStandard($id, $data) {
        $this->db->where('standard_id', $id);
        return $this->db->update('standard_mst', $data);
    }

}
?>




