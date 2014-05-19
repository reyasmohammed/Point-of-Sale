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
            if($row['guid']!=NULL){
                $row['module_name']= $this->lang->line($row['module_name']);
                for($j=0;$j<count($acl_list);$j++){
                    $acl_list[$j]=$this->lang->line($acl_list[$j]);
                }
            $data[$i][0]=$row;
            $data[$i][1]=$acl_list;
            $i++;
            }
        }
        return $data;
   }
}
?>
