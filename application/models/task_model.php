<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model {
    private $tbl = 'task';

    function __construct() {
        parent::__construct();
    }

    function get_all()
    {
        $query = $this->db->get($this->tbl);
        return $query->result();
    }

    function get_task($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get($this->tbl);
        return $query->row();
    }

    function insert_task($data) {
        $this->db->insert($this->tbl,$data);
        return $this->db->insert_id();
    }

    function update_task($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->tbl,$data);
    }

    function delete_task($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->tbl);
    }
}

/* End of file _model.php */