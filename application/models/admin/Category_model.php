<?php
class Category_model extends CI_Model{

function categoryList(){
$query=$this->db->get('tblcategory');
return $query->result();
}

function saverecords($name)
{
$query="INSERT INTO `tblcategory`( `name`) 
VALUES ('$name')";
$this->db->query($query);
}

// For record Deletion
public function delete($uid){
$query=$this->db->where('id',$uid)
->delete('tblcategory');
}
public function subcategorys($category,$subcategory){
    $data=array(
    'category_name'=>$category,
    'subcategory_name'=>$subcategory);
    $query=$this->db->insert('tblsub_category',$data);
    if($query){
    $this->session->set_flashdata('success','Sub Category successfull.');	
    redirect('admin/Category/subcategory');
    } else {
    $this->session->set_flashdata('error','Something went wrong. Please try again.');	
    redirect('admin/Category/subcategory');	
    }
    
    }

    public function getsubdetails()
    {
        $query=$this->db->select('tblsub_category.id,subcategory_name,name')
	->join('tblcategory','tblcategory.id=tblsub_category.category_name','left')
	->from('tblsub_category')
	->get();
	return $query->result();
   }
        // For record Deletion
        public function subdelete($uid){
        $query=$this->db->where('id',$uid)
        ->delete('tblsub_category');
        }
}
