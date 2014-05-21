<?php
class Module_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like){
                $this->db->select('modules.*');
                $this->db->from('modules_x_branches')->where('modules_x_branches.delete_status',0);
                $this->db->join('modules','modules.guid=modules_x_branches.module_id','left');
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
    function get_module_category($guid){
        $this->db->select()->from('modules_category')->where('guid',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function update($value,$id){
        $this->db->where('guid',$id);
        $this->db->update('modules_category',$value);
    }
    function delete($guid){
        $this->db->where(array('guid'=>$guid,'core !='=>1));
        $this->db->update('modules_category',array('delete_status'=>1));
    }
    function get_module_list(){
        $this->db->select('modules.*,modules_category.Category_name')->from('modules');
        $this->db->join('modules_category','modules_category.guid=modules.cate_id','left');
        $this->db->order_by('modules_category.Category_name');
        $this->db->order_by('modules.module_name');
        $sql=  $this->db->get();
        $module=$sql->result_array();
        $this->db->select('modules.guid')->from('modules_x_branches')->where('modules_x_branches.branch_id',  $this->session->userdata('branch_id'));
        $this->db->join('modules','modules.guid=modules_x_branches.module_id','left');
        $this->db->order_by('modules.module_name');
        $mode=  $this->db->get();
        $data=array();
        $mod_val=$mode->result_array();
        for($i=0;$i<count($module);$i++){
            $module[$i]['set']=0;
            for($j=0;$j<count($mod_val);$j++){
            if($module[$i]['guid']==$mod_val[$j]['guid']){
                $module[$i]['set']=1;
            }
           
            }
             $data[]=$module[$i];
        }
        
        print_r($data);
        exit();
        
//        $data=array();
//        foreach ($sql->result_array() as $row){
//            $row['module_name']=  $this->lang->line($row['module_name']);
//            $row['Category_name']=  $this->lang->line($row['Category_name']);
//            $data[]=$row;
//        }
//        $this->db->select()->from('modules_category')->where('core <>',11);
//        $cat=  $this->db->get();
//       $cat_val=array();
//        foreach ($cat->result_array() as $row){
//            $row['Category_name']=  $this->lang->line($row['Category_name']);
//            $cat_val[]=$row;
//        }
//        $data[]=$cat_val;
//        
//        
//        
//        
//        $this->db->select('modules.guid')->from('modules_x_branches')->where('modules_x_branches.branch_id',  $this->session->userdata('branch_id'));
//        $this->db->join('modules','modules.guid=modules_x_branches.module_id','left');
//        $mode=  $this->db->get();
//       $mod_val=array();
//        foreach ($mode->result_array() as $row){
//           
//            $mod_val[]=$row;
//        }
//        $data[]=$mod_val;
        
        
        return $data;
    }
  
}
?>
