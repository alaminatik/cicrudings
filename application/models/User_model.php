<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function inserter($table, $data) {

        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function inserter2($table, $data) {
        $db2 = $this->load->database('second_db', TRUE);
        $db2->insert($table, $data);
        $insert_id = $db2->insert_id();
        return $insert_id;
    }

    function deleter($field_name, $field_value, $table) {
        $result = $this->db->where($field_name, $field_value)->delete($table);
        return $this->db->affected_rows();
    }

    function delete_data($field_name, $field_value, $table) {
        $result = $this->db->where($field_name, $field_value)->delete($table);
        return $this->db->affected_rows();
    }

    public function updater($where, $tbl_name, $data) {

        $this->db->where($where);

        $result = $this->db->update($tbl_name, $data);
        return $this->db->affected_rows();
    }

    public function get_data($table = NULL, $orderby = NULL, $where = NULL) {
        $this->db->select('*');
        $this->db->from($table);
        if ($where != '') {
            $this->db->where($where);
        }
        if ($orderby != '') {
            $this->db->order_by($orderby, "DESC");
        }

        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_value($table = NULL, $orderby = NULL, $where = NULL) {
        $this->db->select('*');
        $this->db->from($table);
        if ($where != '') {
            $this->db->where($where);
        }
        if ($orderby != '') {
            $this->db->order_by($orderby, "DESC");
            $this->db->limit(6);
        }

        $result = $this->db->get()->result_array();
        return $result;
    }

    function check_exist($table = NULL, $where = NULL) {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $count = $query->num_rows();
        //print_r($count) ;
        //exit;
    }

    public function check_admin_login_info($email_address,$admin_password){
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email_address);
        $this->db->where('password',$admin_password);
        //$this->db->where('access_label',$access_label);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
}