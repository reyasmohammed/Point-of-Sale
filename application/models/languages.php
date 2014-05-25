<?php
class Languages extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like){
                $this->db->select();
                $this->db->from('language')->where('delete_status',0);
                $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                
                
                return $query->result_array(); 
        
    }
   
    function count(){
        $this->db->select()->from('language')->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }
    function check_duplicate($where,$order){
        $this->db->select()->from('modules_category')->where($where)->or_where('order',$order);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    function add_new($value,$eng){
        $this->db->insert('language',array('language_name'=>$value,'in_english'=>$eng));
       
    }
    function edit_language($guid){
        $this->db->select()->from('language')->where('id',$guid);
        $sql=  $this->db->get();
        return $sql->result_array();
        
    }
    function update($value,$id){
        $this->db->where('guid',$id);
        $this->db->update('modules_category',$value);
    }
    function delete($guid){
        $this->db->where('id',$guid);
        $this->db->update('language',array('delete_status'=>1));
    }
   
  
}
?>
