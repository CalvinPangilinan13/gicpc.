<?php
class Admin_model extends CI_Model
{

    function saverecords($name, $email, $password)
    {
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password
        );
        $this->db->insert('tbladmin', $data);
    }
    function adminlist()
    {
        $query = $this->db->get('tbladmin');
        return $query->result();
    }
    // For record Deletion
    public function delete($uid)
    {
        $query = $this->db->where('id', $uid)
            ->delete('tbladmin');

    }
}
