<?php

class User_model extends CI_Model {

    public function insert($data = array())
    {
        $insert = $this->db->insert('users', $data);

        return $insert;
    }

    public function all()
    {
        $rows = $this->db->get('users')->result();
        return $rows;
    }

    public function get($where = array())
    {
        $row = $this->db->where($where)->get('users')->row();

        return $row;
    }


    public function update($where = array(), $data = array())
    {
        $update = $this->db->where($where)->update('users', $data);

        return $update;
    }

    public function delete($where = array())
    {
        $delete = $this->db->delete('users', $where);
        return $delete;
    }
}
