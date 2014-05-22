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
        $this->db->select()->from('modules_category')->where('delete_status',0);
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
    function add($value){
        $this->db->insert('modules_category',$value);
        $id=  $this->db->insert_id();
        $this->db->where('id',$id);
        $this->db->update('modules_category',array('guid'=>  md5(($id*$id).'modules_category'.$id)));
    }
    function edit_language($guid){
        $this->db->select()->from('language')->where('id',$guid);
        $sql=  $this->db->get();
        $sql->result();
        foreach ($sql->result() as $row){
            return $row->language_name;
        }
    }
    function update($value,$id){
        $this->db->where('guid',$id);
        $this->db->update('modules_category',$value);
    }
    function delete($guid){
        $this->db->where(array('guid'=>$guid,'core !='=>1));
        $this->db->update('modules_category',array('delete_status'=>1));
    }
    function get_modules(){
        $this->db->select('modules.module_name');
        $this->db->from('modules_x_branches')->where('modules_x_branches.delete_status',0);
        $this->db->join('modules','modules.guid=modules_x_branches.module_id','left');
        $sql=  $this->db->get();
        return $sql->result_array();
    }
  
}
?>
