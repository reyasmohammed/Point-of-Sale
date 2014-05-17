<?php

class Branch_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
        if($this->session->userdata('user_type')==2){
                $this->db->select('branches.*')->from('users_x_branches')->where('branches.delete_status',0);
                $this->db->join('branches', "branches.guid=users_x_branches.branch_id ",'left');
            
                 $this->db->limit($end,$start); 
                $this->db->or_like($like);    
                $this->db->group_by('branches.guid');
                $query=$this->db->get();
                return $query->result_array(); 
            
        }else{
                $this->db->select('branches.*')->from('users_x_branches')->where('branches.delete_status',0);
                $this->db->join('branches', "branches.guid=users_x_branches.branch_id AND user_id='".$this->session->userdata('guid')."'",'left');
            
                 $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                return $query->result_array(); 
        }
    
        
    }
    function edit_branch($guid){
                $this->db->select()->from('branches')->where('guid',$guid);
                $query=$this->db->get();
                return $query->result_array(); 
    }
    function check_duplicate($where){
        $this->db->select('id')->from('branches')->where($where);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    function add_new_branch($value){
        $this->db->insert('branches',$value);
        $id=  $this->db->insert_id();
        $this->db->where('id',$id);
        $guid=md5('branches'.$id);
        $this->db->update('branches',array('guid'=>$guid));
        $this->db->insert('users_x_branches',array('user_id'=>  $this->session->userdata('guid'),'branch_id'=>$guid));
        
    }
    function update($value,$guid){
        $this->db->where('guid',$guid);
        $this->db->update('branches',$value);
    }
}
?>
