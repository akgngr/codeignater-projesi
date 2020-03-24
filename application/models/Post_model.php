<?php

class Post_model extends CI_Model {

    /*
     * Bütün verileri çek
     */
    public function all()
    {
        $all = $this->db->get('posts')->result();

        return $all;
    }

    /*
     * Tek bir veriyi çek
     */
    public function get($where = array())
    {
        $get = $this->db->where($where)->get('posts')->row();

        return $get;
    }

    /*
     * Veri ekle
     */
    public function insert($data = array())
    {
        $insert = $this->db->insert('posts', $data);

        return $insert;
    }


    /*
     * Veriyi güncelle
     */
    public function update($where = array(), $data = array())
    {
        $update = $this->db->where($where)->update('posts', $data);

        return $update;
    }

    /*
     * Veri silmek
     */
    public function delete($where = array())
    {
        $delete = $this->db->where($where)->delete('posts');

        return $delete;
    }
}
