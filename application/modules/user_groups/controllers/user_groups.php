<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_groups extends MX_Controller
{
    function __construct() {
        parent::__construct();
          $this->load->library('posnic');              
    }
    function index(){
        $this->get(); 
    }
    function get(){
        $this->load->view('template/app/header'); 
        $this->load->view('header/header');         
        $this->load->view('template/branch',$this->posnic->branches());
        $data['active']='user_groups';
        $this->load->view('index',$data);
        $this->load->view('template/app/navigation',$this->posnic->modules());
        $this->load->view('template/app/footer');
    }
    function user_groups_data_table(){
        $aColumns = array( 'guid','group_name','group_name','group_name','active_status' );	
	$start = "";
	$end="";		
        if ( $this->input->get_post('iDisplayLength') != '-1' )	{
                $start = $this->input->get_post('iDisplayStart');
                $end=	 $this->input->get_post('iDisplayLength');              
        }	
        $order="";
        if ( isset( $_GET['iSortCol_0'] ) )
        {	
            for ( $i=0 ; $i<intval($this->input->get_post('iSortingCols') ) ; $i++ )
            {
                if ( $_GET[ 'bSortable_'.intval($this->input->get_post('iSortCol_'.$i)) ] == "true" )
                {
                        $order.= $aColumns[ intval( $this->input->get_post('iSortCol_'.$i) ) ]." ".$this->input->get_post('sSortDir_'.$i ) .",";
                }
            }

            $order = substr_replace( $order, "", -1 );

        }
		
        $like = array();

        if ( $_GET['sSearch'] != "" )
            {
                $like =array('group_name'=>  $this->input->get_post('sSearch'));
            }
        $rResult1 = $this->posnic->posnic_data_table($end,$start,$order,$like,'user_groups');
        $iFilteredTotal =$this->posnic->data_table_count('user_groups');		
        $iTotal =$iFilteredTotal;
        $output1 = array(
                "sEcho" => intval($_GET['sEcho']),
                "iTotalRecords" => $iTotal,
                "iTotalDisplayRecords" => $iFilteredTotal,
                "aaData" => array()
        );
        foreach ($rResult1 as $aRow )
        {
            $row = array();
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                if ( $aColumns[$i] == "id" )
                {
                    $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
                }
                else if ( $aColumns[$i] != ' ' )
                {
                        /* General output */
                    $row[] = $aRow[$aColumns[$i]];
                }

            }

        $output1['aaData'][] = $row;
        }
        echo json_encode($output1);
    }
   
   
    function add_user_groups(){
        if($this->session->userdata['user_groups_per']['add']==1){
                $this->form_validation->set_rules('user_groups',$this->lang->line('user_groups'),'required'); 
                $this->form_validation->set_rules('module_name',$this->lang->line('module_name'),'required'); 
                $this->form_validation->set_rules('module_id',$this->lang->line('module_id'),'required'); 
                if ( $this->form_validation->run() !== false ) {  
                     
                      $name=$this->input->post('user_groups');                
                      $where=array('group_name'=>$name);
                if($this->posnic->check_record_unique($where,'user_groups')){
                    $value=array('group_name'=>$name);
                 
                 $guid= $this->posnic->posnic_add_record($value,'user_groups');
                   
                   $data=$this->input->post('module_name');
                   $module=$this->input->post('module_id');
                   for($i=0;$i<  count($module);$i++){
                       $this->config->load($data[$i]."/posnic");
                        $acl_list =  $this->config->item('M_ACL');
                        $per="";
                     for($j=0;$j<count($acl_list);$j++){
                         
                         if(!$this->input->post($data[$i]."_".$acl_list[$j])){
                         
                             $per='0'.$per;
                         }else{
                               $per='1'.$per;
                         }
                     }
                     $this->load->model('groups');
                     $this->groups->add_module_permission($guid,$per,$module[$i]);
                   
                   }
                   
                   
                   
                    echo 'TRUE';
                }else{
                        echo "ALREADY";
                }
                }else{
                    echo "FALSE";
                }
              	             
       }else{
           echo "NOOP";
       }
    }
    function update_user_groups(){
        if($this->session->userdata['user_groups_per']['edit']==1){
                $this->form_validation->set_rules('user_groups',$this->lang->line('user_groups'),'required'); 
                $this->form_validation->set_rules('guid',$this->lang->line('guid'),'required'); 
                $this->form_validation->set_rules('module_name',$this->lang->line('module_name'),'required'); 
                $this->form_validation->set_rules('module_id',$this->lang->line('module_id'),'required'); 
                if ( $this->form_validation->run() !== false ) {  
                     $guid=$this->input->post('guid');   
                      $name=$this->input->post('user_groups');                
                      $where=array('guid !='=>$guid,'group_name'=>$name);
                if($this->posnic->check_record_unique($where,'user_groups')){
                    $value=array('group_name'=>$name);
                 $update=array('guid'=>$guid);
                  $this->posnic->posnic_update_record($value,$update,'user_groups');
                   
                   $data=$this->input->post('module_name');
                   $module=$this->input->post('module_id');
                   for($i=0;$i<  count($module);$i++){
                       $this->config->load($data[$i]."/posnic");
                        $acl_list =  $this->config->item('M_ACL');
                        $per="";
                     for($j=0;$j<count($acl_list);$j++){
                         
                         if(!$this->input->post($data[$i]."_".$acl_list[$j])){
                         
                             $per='0'.$per;
                         }else{
                               $per='1'.$per;
                         }
                     }
                     $this->load->model('groups');
                     $this->groups->update_module_permission($guid,$per,$module[$i]);
                   
                   }
                   
                   
                   
                    echo 'TRUE';
                }else{
                        echo "ALREADY";
                }
                }else{
                    echo "FALSE";
                }
              	             
       }else{
           echo "NOOP";
       }
    }

    function active(){
        $id=  $this->input->post('guid');
        $report= $this->posnic->posnic_module_active($id,'user_groups'); 
        if (!$report['error']) {
            echo 'TRUE';
        } else {
            echo 'FALSE';
        }
    }
    function deactive(){
        $id=  $this->input->post('guid');
        $report= $this->posnic->posnic_module_deactive($id,'user_groups'); 
        if (!$report['error']) {
            echo 'TRUE';
        } else {
            echo 'FALSE';
        }
    }
    function edit_user_groups($guid){
        if($this->session->userdata['user_groups_per']['edit']==1){
            $this->load->model('groups');
            $data=  $this->groups->get_user_groups($guid);
            echo json_encode($data);
        }else{
            echo 'FALSE';
        }
    }
            
    
    function delete(){
        if($this->session->userdata['user_groups_per']['delete']==1){
            if($this->input->post('guid')){
                $guid=  $this->input->post('guid');
                $this->posnic->posnic_delete($guid,'user_groups');
                echo 'TRUE';
            }
        }else{
            echo 'FALSE';
        }
    }
    
    function get_permissions_list(){
        $this->load->model('groups');
        $data=$this->groups->get_modules();
        echo json_encode($data);
    }
    function language($lang){
       $lang= $this->lang->load($lang);
       return $lang;
    }
   
}
?>
