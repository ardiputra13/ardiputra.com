<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

    public function get($table)
    {
        $query = $this->db->get($table);
        return $query;
    }

    public function get_pagination($table, $limit=0, $offset=0)
    {
        $query = $this->db->limit($limit, $offset)->get($table);
        return $query;
    }

    public function getJoinOne_pagination($table, $table_join, $table_key, $table_join_key, $limit=0, $offset=0, $orderBy)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table_join, $table_join.'.'.$table_join_key .'='. $table.'.'.$table_key);
        $this->db->order_by($orderBy, 'DESC');
        $query = $this->db->limit($limit, $offset)->get();
        return $query;
    }

    public function getJoinOneWhere($table, $table_join, $table_key, $table_join_key, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table_join, $table_join.'.'.$table_join_key .'='. $table.'.'.$table_key);
        $query = $this->db->where($where)->get();
        return $query;
    }

    public function get_where($table, $where)
    {
        $query = $this->db->where($where)->get($table);
        return $query;
    }

    public function insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function update($table, $where, $data)
    {
        $query = $this->db->where($where)->update($table, $data);
        return $query;
    }

    public function delete($table, $where)
    {
        $query = $this->db->where($where)->delete($table);
        return $query;
    }
}