<?php
class Admin_model extends CI_Model {

    function saverecords($name, $email, $password) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password
        );
        $this->db->insert('tbladmin', $data);
    }
}
