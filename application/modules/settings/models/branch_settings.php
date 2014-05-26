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
    function check_duplicate($where){
        $this->db->select()->from('master_data')->where('branch_id',  $this->session->userdata('branch_id'));
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
            
        }else{
            return TRUE;
        }
    }
    function save($data){
        $this->db->insert('master_data',$data);
    }
  
  
}
?>
