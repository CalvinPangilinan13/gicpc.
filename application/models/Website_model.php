<?php
class Website_model extends CI_Model{


    public function get_count() 
    {
        return $this->db->count_all("tbladdnews");
    }

    function categoryList(){
        $query=$this->db->get('tblcategory');
        return $query->result();
        }

    public function getnewsubdetails($limit, $start)
    {
        $query=$this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,
        tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date')
	->join('tblcategory','tbladdnews.Category=tblcategory.id','left')
    ->join('tblsub_category','tbladdnews.Sub_category=tblsub_category.id','left')
	->from('tbladdnews')
    ->order_by('tbladdnews.id', 'desc')
     ->limit($limit, $start)
	->get();
	return $query->result();
   }

   
   public function resentlypost()
   {
       $query=$this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,
       tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date')
   ->join('tblcategory','tbladdnews.Category=tblcategory.id','left')
   ->join('tblsub_category','tbladdnews.Sub_category=tblsub_category.id','left')
   ->from('tbladdnews')
   ->order_by('tbladdnews.id', 'desc')
   ->get();
   return $query->result();
  }

  public function getsearch($sdata){
    $data1 = array('newtitle'=> $sdata);
    $data2 = array('category'=> $sdata);
      $query=$this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,
      tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date')
  ->join('tblcategory','tbladdnews.Category=tblcategory.id','left')
  ->join('tblsub_category','tbladdnews.Sub_category=tblsub_category.id','left')
  ->from('tbladdnews')
  ->like($data1)
  ->or_like($data2)
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


  public function getnewsubdetailscat()
  {
      $query=$this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,
      tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date')
  ->join('tblcategory','tbladdnews.Category=tblcategory.id','left')
  ->join('tblsub_category','tbladdnews.Sub_category=tblsub_category.id','left')
  ->from('tbladdnews')
  ->order_by('tbladdnews.id', 'desc')
  ->get();
  return $query->result();
 }

  public function getwebsitedetailscategory($id)
  {
      $query=$this->db->select('tbladdnews.id,newtitle,tblcategory.name as category,
      tblsub_category.subcategory_name as subcategory,Description,Upload_Image,create_date')
  ->join('tblcategory','tbladdnews.Category=tblcategory.id','left')
  ->join('tblsub_category','tbladdnews.Sub_category=tblsub_category.id','left')
  ->from('tbladdnews')
  ->where('tbladdnews.category',$id)
  ->get();
  return $query->result();
 }

public function commentsave($postid,$name,$emailid,$comment,$status){
    $data1=array(
    'postid'=>$postid,
    'name'=>$name,
    'emailid'=>$emailid,
    'comment'=>$comment,
    'status'=>$status
);
    $query=$this->db->insert('tblcomment',$data1);
      }


      public function getcomment($postid)
      {
          $query=$this->db->select('id, postid, name, emailid, comment, status, create_date')
          ->from('tblcomment')
          ->where('tblcomment.postid',$postid)
          ->where('tblcomment.status',1)
          ->get();
      	return $query->result();
     }

}

