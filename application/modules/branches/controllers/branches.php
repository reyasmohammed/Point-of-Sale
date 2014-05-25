<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branches extends MX_Controller
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
        $data['active']='branches';
        $this->load->view('index',$data);
        $this->load->view('template/app/navigation',$this->posnic->modules());
        $this->load->view('template/app/footer');
    }
    function branches_data_table(){
        $aColumns = array( 'guid','guid','store_name','store_name','phone','email','store_name','store_name','store_name','active_status' );	
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
                    $like =array('name'=>  $this->input->get_post('sSearch'));
		}
            $this->load->model('branch_model')		   ;
            $rResult1 = $this->branch_model->get($end,$start,$like,$this->session->userdata['branch_id']);
            $iFilteredTotal =4;//$this->posnic->data_table_count('branches');
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
  function active(){
        $id=  $this->input->post('guid');
        $report= $this->posnic->posnic_module_active($id,'branches'); 
            if (!$report['error']) {
                echo 'TRUE';
            } else {
                echo 'FALSE';
            }
    }
    function deactive(){
        $id=  $this->input->post('guid');
        $report= $this->posnic->posnic_module_deactive($id,'branches'); 
        if (!$report['error']) {
            echo 'TRUE';
        } else {
            echo 'FALSE';
            }
    }
   function delete(){
        if($this->session->userdata['branches_per']['delete']==1){
            if($this->input->post('guid')){
                $guid=  $this->input->post('guid');
                $this->posnic->posnic_delete($guid,'branches');
                echo 'TRUE';
            }
        }else{
               echo 'FALSE';
        }
    }
    function add_branches(){
        if($this->session->userdata['branches_per']['add']=="1"){
            $this->load->library('form_validation');
                $this->form_validation->set_rules("branch_id",$this->lang->line('branch_id'),"required"); 
                $this->form_validation->set_rules("branch_name",$this->lang->line('branch_name'),"required");
                $this->form_validation->set_rules("address",$this->lang->line('address'),"required"); 
                $this->form_validation->set_rules("city",$this->lang->line('city'),"required"); 
                $this->form_validation->set_rules("state",$this->lang->line('state'),"required"); 
                $this->form_validation->set_rules("zip",$this->lang->line('zip'),"required"); 
                $this->form_validation->set_rules("country",$this->lang->line('country'),"required"); 
                $this->form_validation->set_rules("address",$this->lang->line('address'),"required"); 
                $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'max_length[12]|regex_match[/^[0-9]+$/]|xss_clean');
                $this->form_validation->set_rules('fax', $this->lang->line('fax'), 'max_length[12]|regex_match[/^[0-9]+$/]|xss_clean');
                $this->form_validation->set_rules('email', $this->lang->line('email'), 'required|valid_email'); 
                
                if ( $this->form_validation->run() !== false ) {
                    $values=array(
                        'code'=>$this->input->post('branch_id'),
                        'store_name'=>  $this->input->post('branch_name'),
                        'email'=>$this->input->post('email'),
                        'phone'=>$this->input->post('phone'),
                        'fax'=>$this->input->post('fax'),
                        'city'=>$this->input->post('city'),
                        'state'=>$this->input->post('state'),
                        'country'=>$this->input->post('country'),
                        'zip'=>$this->input->post('zip'),
                        'website'=>$this->input->post('website'),
                        'account_number'=>$this->input->post('account'),
                        'address'=>$this->input->post('address'),

                        'bank_name'=>$this->input->post('bank_name'),
                        'bank_location'=>$this->input->post('bank_location'),
                        'account_number'=>$this->input->post('account_no'),
                        'tax_cst'=>$this->input->post('cst'),
                        'tax_gst'=>$this->input->post('gst'),
                        'tax_reg'=>  $this->input->post('tax_no'));
                     $this->load->model('branch_model');
                         $where=array('code'=>$this->input->post('branch_id'),'phone'=>$this->input->post('phone'),'email'=>$this->input->post('email'));
                    if($this->branch_model->check_duplicate($where)){  
                       
                           $guid= $this->branch_model->add_new_branch($values);
                            $this->branch_model->add_module($guid);
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
 
            
    function edit_branches($guid){
       if($this->session->userdata['branches_per']['edit']=="1"){
              $this->load->model('branch_model')		   ;
              $data = $this->branch_model->edit_branch($guid);
              echo json_encode($data);
         }else{
            echo 'Noop';
         }
       
    }
    function update_branches(){  
        if($this->session->userdata['branches_per']['edit']==1){
             if($this->input->post('guid')){
                $guid=  $this->input->post('guid');
                $this->load->library('form_validation');
                $this->form_validation->set_rules("branch_id",$this->lang->line('branch_id'),"required"); 
                $this->form_validation->set_rules("branch_name",$this->lang->line('branch_name'),"required");
                $this->form_validation->set_rules("address",$this->lang->line('address'),"required"); 
                $this->form_validation->set_rules("city",$this->lang->line('city'),"required"); 
                $this->form_validation->set_rules("state",$this->lang->line('state'),"required"); 
                $this->form_validation->set_rules("zip",$this->lang->line('zip'),"required"); 
                $this->form_validation->set_rules("country",$this->lang->line('country'),"required"); 
                $this->form_validation->set_rules("address",$this->lang->line('address'),"required"); 
                $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'max_length[12]|regex_match[/^[0-9]+$/]|xss_clean');
                $this->form_validation->set_rules('fax', $this->lang->line('fax'), 'max_length[12]|regex_match[/^[0-9]+$/]|xss_clean');
                $this->form_validation->set_rules('email', $this->lang->line('email'), 'required|valid_email');                              	  
                        if ( $this->form_validation->run() !== false ) {
                            $values=array(
                        'code'=>$this->input->post('branch_id'),
                        'store_name'=>  $this->input->post('branch_name'),
                        'email'=>$this->input->post('email'),
                        'phone'=>$this->input->post('phone'),
                        'fax'=>$this->input->post('fax'),
                        'city'=>$this->input->post('city'),
                        'state'=>$this->input->post('state'),
                        'country'=>$this->input->post('country'),
                        'zip'=>$this->input->post('zip'),
                        'website'=>$this->input->post('website'),
                        'account_number'=>$this->input->post('account'),
                        'address'=>$this->input->post('address'),

                        'bank_name'=>$this->input->post('bank_name'),
                        'bank_location'=>$this->input->post('bank_location'),
                        'account_number'=>$this->input->post('account_no'),
                        'tax_cst'=>$this->input->post('cst'),
                        'tax_gst'=>$this->input->post('gst'),
                        'tax_reg'=>  $this->input->post('tax_no'));
                            $update_where=array('guid'=>$guid);
                            $this->load->model('branch_model');
                            $where=array('guid !='=>$guid,'code'=>$this->input->post('branch_id'),'phone'=>$this->input->post('phone'),'email'=>$this->input->post('email'));
                            if($this->branch_model->check_duplicate($where)){
                   
                    $this->branch_model->update($values,$guid);
                    echo 'TRUE';
                }else{
                        echo "ALREADY";
                }
                }else{
                    echo "FALSE";
                }
                }else{
                       echo "FALSE";
                }	             
           }else{
               echo "NOOP";
           }
    }
    
    
    function deactive_branches($guid){
                 $this->posnic->posnic_deactive($guid);
                 redirect('branches');
             
    }
    function active_branches($guid){
                 $this->posnic->posnic_active($guid);
                 redirect('branches');
             
    }
   function language($lang){
       $lang= $this->lang->load($lang);
       return $lang;
    }
     
  
}

?>
