<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends MX_Controller
{
    function __construct() {
        parent::__construct();
          $this->load->library('posnic');              
    }
    function index(){
        $this->get_module(); 
    }
     function get_module(){
        $this->load->view('template/app/header'); 
        $this->load->view('header/header');         
        $this->load->view('template/branch',$this->posnic->branches());
        $data['active']='module';
        $this->load->view('index',$data);
        $this->load->view('template/app/navigation',$this->posnic->modules());
        $this->load->view('template/app/footer');
    }
    function module_data_table(){
        $aColumns = array( 'guid','module_name','module_name','module_name','module_name','active_status' );	
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
                $like =array('category_name'=>  $this->input->get_post('sSearch'));
            }
            $this->load->model('module_model');
            $rResult1 = $this->module_model->get($end,$start,$like);
            $iFilteredTotal =$this->module_model->count();
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
				else if ($aColumns[$i] == 'module_name' )
				{
					$row[] = $this->lang->line($aRow[$aColumns[$i]]);
				}				
				else if ( $aColumns[$i] != ' ' )
				{
					$row[] = $aRow[$aColumns[$i]];
				}				
			}				
		$output1['aaData'][] = $row;
		}
        
        echo json_encode($output1);
    }
   
   
    function update_module(){
           if($this->session->userdata['module_per']['edit']==1){
           if($this->input->post('module_name')){
                $this->form_validation->set_rules("module_name",$this->lang->line('module_name'),'required'); 
                $this->form_validation->set_rules("icon_class",$this->lang->line('icon_class'),'required'); 
                $this->form_validation->set_rules("order",$this->lang->line('order'),'numeric'); 
                if ( $this->form_validation->run() !== false ) {  
                      $id=  $this->input->post('guid');
                      $name=$this->input->post('module_name');                
                      $order=$this->input->post('order');                
                      $icon_class=$this->input->post('icon_class');                
                      $where=array('guid !='=>$id,'category_name'=>$name);
                      $this->load->model('module_model');
                if($this->module_model->check_duplicate($where,$order)){
                    $value=array('Category_name'=>$name,'order'=>$order,'icon_class'=>$icon_class);
                   
                    $this->module_model->update($value,$id);
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
   
   
    function edit_module($guid){
        if($this->session->userdata['module_per']['edit']==1){
            $this->load->model('module_model');
        $data=  $this->module_model->get_module($guid);
        echo json_encode($data);
        }else{
            echo 'FALSE';
        }
    }
            
    
    function delete(){
        if($this->session->userdata['module_per']['delete']==1){
            if($this->input->post('guid')){
             $guid=  $this->input->post('guid');
             $this->load->model('module_model');
             $this->module_model->delete($guid);
             echo 'TRUE';
            }
           }else{
            echo 'FALSE';
        }
    }
         
  
    function add_module(){
            if($this->session->userdata['module_per']['add']==1){
           if($this->input->post('module_name')){
                $this->form_validation->set_rules("module_name",$this->lang->line('module_name'),'required'); 
                $this->form_validation->set_rules("order",$this->lang->line('order'),'numeric'); 
                if ( $this->form_validation->run() !== false ) { 
                      $name=$this->input->post('module_name');                
                      $order=$this->input->post('order');                
                      $icon_class=$this->input->post('icon_class');                
                      $where=array('Category_name'=>$name);
                      $this->load->model('module_model');
                if($this->module_model->check_duplicate($where,$order)){
                    $value=array('Category_name'=>$name,'icon_class'=>$icon_class,'order'=>$order);
                    $this->module_model->add($value);
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
    function get_modules_list(){
        $this->load->model('module_model');
        $data=$this->module_model->get_module_list();
        echo json_encode($data);
    }
   function language($lang){
       $lang= $this->lang->load($lang);
       return $lang;
    }
   
}
?>
