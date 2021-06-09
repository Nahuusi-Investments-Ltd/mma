<?php
class Data_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_data_raw_query($query){
        return $this->db->query($query);
    }

    function get_table_data($table){
    	return $this->db->get($table);
    }

    function get_uuid(){
    	return $this->db->query('SELECT UUID() AS uuid')->row()->uuid;
    }

    function insert_table_data($table, $data){
    	return $this->db->insert($table, $data);
    }

    function get_table_data_where($table, $where){
    	return $this->db->get_where($table, $where);
    }

    function save_table_data($table, $data, $where){
    	return $this->db->update($table, $data, $where);
    }

    function delete_table_data($table, $where){
    	return $this->db->delete($table, $where);
    }

    function get_unique_id(){
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
}
?>