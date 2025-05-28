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
        // Get the latest postid from the tblcomment table
        $query = $this->db->select_max('postid')->get('tblcomment');
        $result = $query->row();
        return $result ? $result->postid : 0; // Return 0 if no records exist
    }

    public function commentsave($postid, $name, $email, $comment, $status)
    {
        // Save the comment to the tblcomment table
        $data = [
            'postid' => $postid,
            'name' => $name,
            'emailid' => $email,
            'comment' => $comment,
            'status' => $status,
            'create_date' => date('Y-m-d H:i:s') // Optional: Add a timestamp
        ];
        $this->db->insert('tblcomment', $data);
    }


}

