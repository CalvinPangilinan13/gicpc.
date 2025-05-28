<?php
class Addnews_model extends CI_Model{
    
function fetch_subcate($category_name)
{
$this->db->where('category_name', $category_name);
$this->db->order_by('subcategory_name', 'ASC');
$query = $this->db->get('tblsub_category');

foreach($query->result() as $row)
{
$output .= '<option value="'.$row->id.'">'.$row->subcategory_name.'</option>';
}
return $output;
}

public function addnewss($title,$category,$subcategory,$description,$uploadimage){
    $data1=array(
    'newtitle'=>$title,
    'Category'=>$category,
    'Sub_category'=>$subcategory,
    'Description'=>$description,
    'Upload_Image'=>$uploadimage
);
    $query=$this->db->insert('tbladdnews',$data1);
    if($query){
    $this->session->set_flashdata('success','News successfull.');	
    redirect('admin/News/add');
    } else {
    $this->session->set_flashdata('error','Something went wrong. Please try again.');	
    redirect('admin/News/add');	
    }
    
    }

    public function get_count() 
    {
        return $this->db->count_all("tbladdnews");
    }

    public function getnewsubdetails($limit, $start)
    {
        $query=$this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,
        tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date,tbladdnews.Sub_category')
	->join('tblcategory','tbladdnews.Category=tblcategory.id','left')
    ->join('tblsub_category','tbladdnews.Sub_category=tblsub_category.id','left')
	->from('tbladdnews')
    ->order_by('tbladdnews.id', 'desc')
     ->limit($limit, $start)
	->get();
	return $query->result();
   }



   public function getwebsitedetails($id)
    {
        $query=$this->db->select('tbladdnews.id,newtitle,tbladdnews.Category as Categoryid,tblcategory.name as category,
        tbladdnews.Sub_category as subcategoryid,
        tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date')
	->join('tblcategory','tbladdnews.Category=tblcategory.id','left')
    ->join('tblsub_category','tbladdnews.Sub_category=tblsub_category.id','left')
	->from('tbladdnews')
    ->where('tbladdnews.id',$id)
	->get();
	return $query->row();
   }

    // For record Deletion
    public function deletenews($uid){
    $query=$this->db->where('id',$uid)
    ->delete('tbladdnews');
    }

    public function editdata($uid)
    {
        $query=$this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,tblcategory.id as idcate,
        tblsub_category.id as subcat,tblsub_category.subcategory_name as subcategory,Description,Upload_Image')
	->join('tblcategory','tbladdnews.Category=tblcategory.id','left')
    ->join('tblsub_category','tbladdnews.Sub_category=tblsub_category.id','left')
	->from('tbladdnews')
    ->where('tbladdnews.id',$uid)
	->get();
	return $query->row();
   }

   //For updating user details
public function updatenews($uid,$title,$category,$subcategory,$description,$Upload_Image){
    $data=array(
        'newtitle'=>$title,
        'Category'=>$category,
        'Sub_category'=>$subcategory,
        'Description'=>$description,
        'Upload_Image'=>$Upload_Image
        
     );	
    $query=$this->db->where('id',$uid)
    ->update('tbladdnews',$data);
    }

}

