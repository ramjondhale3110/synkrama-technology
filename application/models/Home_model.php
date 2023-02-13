<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function saveFromData($formData)
    {
        $this->db->insert('usertbl', $formData);
        return $this->db->insert_id();
    }

    public function getUserDetailByCond($cond)
    {
        $this->db->where($cond);
        $result = $this->db->get('usertbl')->result();
        return $result;
    }

    public function updateUserByCond($cond, $formData)
    {
        $this->db->where($cond);
        $this->db->update('usertbl', $formData);
    }
}
