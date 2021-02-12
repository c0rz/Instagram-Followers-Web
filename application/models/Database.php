<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->userTbl = 'instagram_web';
    }

    public function getData($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->userTbl);

        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        if (array_key_exists("user_id", $params)) {
            $this->db->where('user_id', $params['user_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } else if (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit']);
            }
            if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
                $result = $this->db->count_all_results();
            } else if (array_key_exists("returnType", $params) && $params['returnType'] == 'single') {
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->row_array() : false;
            } else {
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : false;
            }
        }
        return $result;
    }

    public function insert($data)
    {
        $insert = $this->db->insert($this->userTbl, $data);
        return $insert ? true : false;
    }

    public function update($data, $id)
    {
        $update = $this->db->update($this->userTbl, $data, array('user_id' => $id));
        return $update ? true : false;
    }

    public function delete($id)
    {
        $delete = $this->db->delete($this->userTbl, array('user_id' => $id));
        return $delete ? true : false;
    }

    // fungsi baru
    public function diupdate($data, $target)
    {
        $update = $this->db->update($this->userTbl, $data, $target);
        return $update ? true : false;
    }

    public function randGet($limit)
    {
        $this->db->select('*');
        $this->db->order_by('rand()');
        $this->db->limit($limit);
        $query = $this->db->get($this->userTbl);
        return $query->result_array();
    }
}
