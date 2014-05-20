<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
   function get_modules(){
        $this->db->select('modules.module_name,modules.guid')->from('modules_x_branches')->where('modules_x_branches.branch_id',  $this->session->userdata('branch_id'))->where('modules_x_branches.active_status',1)->where('modules_x_branches.delete_status',0);
        $this->db->join('modules','modules.guid=modules_x_branches.module_id','left');
        $sql=  $this->db->get();
        
        $data=array();
        $i=0;
        foreach ($sql->result_array() as $row){
            $this->config->load($row['module_name']."/posnic");
            $acl_list =  $this->config->item('M_ACL');
            $permission=$acl_list;
            if($row['guid']!=NULL){
                $module=$row['module_name'];
                $row['module_name']= $this->lang->line($row['module_name']);
                for($j=0;$j<count($acl_list);$j++){
                    $acl_list[$j]=$this->lang->line($acl_list[$j]);
                }
            $data[$i][0]=$row;
            $data[$i][1]=$acl_list;
            $data[$i][2]=$module;
            $data[$i][3]=$permission;
            $i++;
            }
        }
        return $data;
   }
   function add_module_permission($guid,$per,$module){
       $this->db->insert('modules_x_permissions',array('permission'=>$per,'branch_id'=>$this->session->userdata('branch_id'),'module_id'=>$module,'user_group_id'=>$guid));
     
   }
   function update_module_permission($guid,$per,$module){
       $this->db->select('id')->from('modules_x_permissions')->where('user_group_id',$guid)->where('branch_id',$this->session->userdata('branch_id'))->where('module_id',$module);
       $sql=  $this->db->get();
       if($sql->num_rows()>0){
            $this->db->where(array('user_group_id'=>$guid,'branch_id'=>$this->session->userdata('branch_id'),'module_id'=>$module));
            $this->db->update('modules_x_permissions',array('permission'=>$per));
       }else{
            $this->db->insert('modules_x_permissions',array('permission'=>$per,'branch_id'=>$this->session->userdata('branch_id'),'module_id'=>$module,'user_group_id'=>$guid));
            
       }
   }
   function get_user_groups($guid){
      
        $this->db->select('modules.module_name,modules.guid,modules_x_permissions.module_id,modules_x_permissions.permission,user_groups.group_name')->from('modules_x_branches')->where('modules_x_branches.branch_id',  $this->session->userdata('branch_id'))->where('modules_x_branches.active_status',1)->where('modules_x_branches.delete_status',0);
        $this->db->join('modules','modules.guid=modules_x_branches.module_id','left');
        $this->db->join('modules_x_permissions',"modules_x_permissions.module_id=modules_x_branches.module_id AND modules_x_permissions.user_group_id ='$guid'",'left');
         $this->db->join('user_groups',"user_groups.guid=modules_x_permissions.user_group_id OR user_groups.guid='$guid'",'left');
        $sql=  $this->db->get();
        
        $data=array();
        $i=0;
        foreach ($sql->result_array() as $row){
            $this->config->load($row['module_name']."/posnic");
            $acl_list =  $this->config->item('M_ACL');
            $origin=$acl_list;
            if($row['guid']!=NULL){
                $module=$row['module_name'];
                $row['module_name']= $this->lang->line($row['module_name']);
              
                $permission=array();
             
                for($j=0;$j<count($acl_list);$j++){
              
                     $per_v= substr($row['permission'],$j,1);
                    if($per_v=="" or $per_v==0){          
                    $second_array = array("$acl_list[$j]" => 0);
                    $permission = array_merge((array)$permission, (array)$second_array);
                       }else{
                    $second_array = array("$acl_list[$j]" => 1);
                    $permission = array_merge((array)$permission, (array)$second_array);
                        
                   }
                     $acl_list[$j]=$this->lang->line($acl_list[$j]);
                }
                    
                 $permission = array_merge((array)$permission, (array)$second_array);
            
            $data[$i][0]=$row;
            $data[$i][1]=$acl_list;
            $data[$i][2]=$module;
            $data[$i][3]=$origin;
            $data[$i][4]=$permission;
            $i++;
            
            }
          
            
           
        }
       
   return $data;
   }
}
?>
