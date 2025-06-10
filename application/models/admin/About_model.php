<?php
class About_model extends CI_Model
{
    // Insert a new about record
    public function saveAbout($data)
    {
        $this->db->insert('tblabout', $data);
    }

    // Fetch all about records
    public function aboutList()
    {
        $query = $this->db->get('tblabout');
        return $query->result();
    }

    // Get single record by ID
    public function getAboutById($id)
    {
        return $this->db->get_where('tblabout', ['id' => $id])->row();
    }

    // Update existing record
    public function updateAbout($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tblabout', $data);
    }

    // Delete record
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tblabout');
    }

    public function getaboutdetails($id)
    {
        $query = $this->db->select('id, title, subtitle, content, founder_name, founded_date, vision, mission, location, contact_email, social_links, image_url, status, last_updated')
            ->from('tblabout')
            ->where('id', $id)
            ->get();
        return $query->row(); // returns a single object
    }
    public function getAllAbout()
    {
        return $this->db->get('tblabout')->result(); // adjust table name if needed
    }
}
