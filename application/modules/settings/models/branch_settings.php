<?php
class Branch_settings extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get(){
                $this->db->select('master_data.*');
                $this->db->from('master_data')->where('branch_id',  $this->session->userdata('branch_id'));   
                $query=$this->db->get();
                return $query->result(); 
        
    }
   
    function get_settings(){
        $this->db->select()->from('master_data')->where('branch_id',  $this->session->userdata('branch_id'));
        $sql=  $this->db->get();
        return $sql->result();
    }
    function check_duplicate(){
        $this->db->select()->from('master_data')->where('branch_id',  $this->session->userdata('branch_id'));
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
            
        }else{
            return TRUE;
        }
    }
    function update($data){
        
        foreach ($data as $key=>$val){
            $this->db->where(array('branch_id'=>  $this->session->userdata('branch_id'),'key'=>$key));
             $this->db->update('master_data',array('prefix'=>$val));
           
        }
        
        
       
    }
    function save($data){
        
        foreach ($data as $key=>$val){
             $this->db->insert('master_data',array('key'=>$key,'prefix'=>$val,'branch_id'=>  $this->session->userdata('branch_id')));
             $id=  $this->db->insert_id();
             $this->db->where('id',$id);
             $this->db->update('master_data',array('guid'=>  md5('master_data'.$id)));
        }
        
        
       
    }
    function delete()
    {
        $this->db->where('branch_id',  $this->session->userdata('branch_id'));
        $this->db->delete('master_data');
    }
  
  
}
?>
