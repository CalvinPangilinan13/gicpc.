<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Dashboard_Model extends CI_Model {

public function totalnewcount(){
$query=$this->db->select('id')   
->get('tbladdnews');
return  $query->num_rows();
}

public function totalcategorycount(){
    $query=$this->db->select('id')   
     ->get('tblcategory');
    return  $query->num_rows();
    }

    public function totalsubcategorycount(){
    $query=$this->db->select('id')   
    ->get('tblsub_category');
    return  $query->num_rows();
    }

    public function totalcommentcount(){
    $query=$this->db->select('id')   
     ->get('tblcomment');
    return  $query->num_rows();
    }


}
