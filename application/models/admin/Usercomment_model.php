<?php
class Usercomment_model extends CI_Model
{


    public function managecomment()
    {
        $query = $this->db->select('id, postid, name, emailid, comment, status, create_date')
            ->from('tblcomment')
            ->get();
        return $query->result();
    }


    public function Approvedcomment($postid, $status)
    {
        $data = array(
            'status' => $status

        );
        $query = $this->db->where('postid', $postid)
            ->update('tblcomment', $data);
    }



    public function getwebsitedetails($id)
    {
        $query = $this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,
        tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date')
            ->join('tblcategory', 'tbladdnews.Category=tblcategory.id', 'left')
            ->join('tblsub_category', 'tbladdnews.Sub_category=tblsub_category.id', 'left')
            ->from('tbladdnews')
            ->where('tbladdnews.id', $id)
            ->get();
        return $query->row();
    }
    public function get_latest_postid()
    {
        $this->db->select_max('postid');
        $query = $this->db->get('tblcomment'); // Replace with actual table name

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return (int) $row->postid;
        }
        return 0;
    }

    public function commentsave($postid, $name, $emailid, $comment, $status)
    {
        $data = [
            'postid' => $postid,
            'name' => $name,
            'emailid' => $emailid, // must match DB column name exactly
            'comment' => $comment,
            'status' => $status
        ];

        $insert = $this->db->insert('tblcomment', $data);

        if (!$insert) {
            log_message('error', 'Insert FAILED!');
            log_message('error', 'SQL: ' . $this->db->last_query());
            log_message('error', 'Error: ' . print_r($this->db->error(), true));
        }

        return $insert;
    }

}

