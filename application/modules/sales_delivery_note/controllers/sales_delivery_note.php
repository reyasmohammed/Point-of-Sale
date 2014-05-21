<?php
class Sales_delivery_note extends MX_Controller{
   function __construct() {
                parent::__construct();
                $this->load->library('posnic');               
    }
    function index(){     
        $this->load->view('template/app/header'); 
        $this->load->view('header/header');         
        $this->load->view('template/branch',$this->posnic->branches());
        $data['active']='sales_delivery_note';
        $this->load->view('index',$data);
        $this->load->view('template/app/navigation',$this->posnic->modules());
        $this->load->view('template/app/footer');
        
        
    }
    // goods Receiving Note data table
    function data_table(){
        $aColumns = array( 'sdn_guid','code','code','sales_delivery_note_no','c_name','s_name','date','total_items','total_amount','sales_delivery_note_active','sales_delivery_note_active','guid' );	
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
		$like =array(
                    'po_no'=>  $this->input->get_post('sSearch'),
                    'grn_no'=>  $this->input->get_post('sSearch'),
                        );
				
			}
					   
			$this->load->model('sales')	   ;
                        
			 $rResult1 = $this->sales->get($end,$start,$like,$this->session->userdata['branch_id']);
		   
		$iFilteredTotal =$this->sales->count($this->session->userdata['branch_id']);
		
		$iTotal =$this->sales->count($this->session->userdata['branch_id']);
		
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
				else if ( $aColumns[$i]== 'po_date' )
				{
					/* General output */
					$row[] = date('d-m-Y',$aRow[$aColumns[$i]]);
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
 
function save(){      
     if($this->session->userdata['sales_delivery_note_per']['add']==1){
        $this->form_validation->set_rules('sales_delivery_note_guid',$this->lang->line('sales_delivery_note_guid'), 'required');
        $this->form_validation->set_rules('delivery_date',$this->lang->line('delivery_date'), 'required');
        $this->form_validation->set_rules('dn_no', $this->lang->line('dn_no'), 'required'); 
        $this->form_validation->set_rules('delivered_quty[]', $this->lang->line('delivered_quty'), 'required|numeric'); 
        $this->form_validation->set_rules('items[]', $this->lang->line('items'), 'required'); 
           
            if ( $this->form_validation->run() !== false ) {    
                $so=  $this->input->post('sales_delivery_note_guid');
                $delivery_date=strtotime($this->input->post('delivery_date'));
                $dn_no= $this->input->post('dn_no');
                $total_amount=$this->input->post('grand_total');
                $remark=  $this->input->post('remark');
                $note=  $this->input->post('note');
                 $customer_discount=  $this->input->post('customer_discount');
                $customer_discount_amount=  $this->input->post('customer_discount_amount');
               
              $value=array('customer_discount_amount'=>$customer_discount_amount,'customer_discount'=>$customer_discount,'sales_delivery_note_no'=>$dn_no,'date'=>$delivery_date,'so'=>$so,'remark'=>$remark,'note'=>$note,'total_amount'=>$total_amount);
                $guid=   $this->posnic->posnic_add_record($value,'sales_delivery_note');
                $this->load->model('sales');
                $this->sales->update_sales_order_status($so);
                $quty=  $this->input->post('delivered_quty');
                $items=  $this->input->post('items');
           
                for($i=0;$i<count($items);$i++){
                        $this->load->model('sales');
                        $this->sales->update_item_receving($items[$i],$quty[$i],$so);
                       
                }
                $this->posnic->posnic_master_increment_max('sales_delivery_note')  ;
                 echo 'TRUE';
    
                }else{
                   echo 'FALSE';
                }
        }else{
                   echo 'Noop';
                }
           
    }
    function update(){
            
      if($this->session->userdata['sales_delivery_note_per']['edit']==1){
       $this->form_validation->set_rules('sales_delivery_note_guid',$this->lang->line('sales_delivery_note_guid'), 'required');
       $this->form_validation->set_rules('guid',$this->lang->line('guid'), 'required');
        $this->form_validation->set_rules('delivery_date',$this->lang->line('delivery_date'), 'required');
      //  $this->form_validation->set_rules('dn_no', $this->lang->line('dn_no'), 'required'); 
        $this->form_validation->set_rules('delivered_quty[]', $this->lang->line('delivered_quty'), 'required|numeric'); 
        $this->form_validation->set_rules('items[]', $this->lang->line('items'), 'required'); 
            if ( $this->form_validation->run() !== false ) {    
                 $so=  $this->input->post('sales_delivery_note_guid');
                 $guid=  $this->input->post('guid');
                $delivery_date=strtotime($this->input->post('delivery_date'));
                $total_amount=$this->input->post('grand_total');
               
                $remark=  $this->input->post('remark');
                $note=  $this->input->post('note');
                 $customer_discount=  $this->input->post('customer_discount');
                $customer_discount_amount=  $this->input->post('customer_discount_amount');
               
                $value=array('customer_discount_amount'=>$customer_discount_amount,'customer_discount'=>$customer_discount,'date'=>$delivery_date,'so'=>$so,'remark'=>$remark,'note'=>$note,'total_amount'=>$total_amount);
                $guid=  $this->input->post('guid');
                $update_where=array('guid'=>$guid);
                $this->posnic->posnic_update_record($value,$update_where,'sales_delivery_note');          
               
                $quty=  $this->input->post('delivered_quty');
                $items=  $this->input->post('items');
           
                for($i=0;$i<count($items);$i++){
                        $this->load->model('sales');
                        $this->sales->update_item_receving($items[$i],$quty[$i],$so);
                       
                }
                    
                    
                    
                 echo 'TRUE';
    
                }else{
                   echo 'FALSE';
                }
        }else{
                   echo 'Noop';
                }
          
}
        

function search_sales_order(){
        $search= $this->input->post('term');
        $this->load->model('sales');
        $data= $this->sales->search_sales_order($search,$this->session->userdata['branch_id'])    ;
        echo json_encode($data);
         
       
        
}
function delete(){
   if($this->session->userdata['sales_delivery_note_per']['delete']==1){
        if($this->input->post('guid')){
            $guid=  $this->input->post('guid');
            $this->load->model('sales');
            $status=$this->sales->check_approve($guid);
           if($status!=FALSE){
            $this->posnic->posnic_delete($guid,'sales_delivery_note');
                echo 'TRUE';
            }else{
                echo 'Approved';
            }
        
        }
    }else{
         echo 'FALSE';
    }
    
}
function  get_sales_order($guid){
  
    $this->load->model('sales');
    $data=  $this->sales->get_sales_order($guid);
    echo json_encode($data);
    
}
function  get_sales_delivery_note($guid){
    if($this->session->userdata['sales_delivery_note_per']['edit']==1){
    $this->load->model('sales');
    $data=  $this->sales->get_sales_delivery_note($guid);
    echo json_encode($data);
    }
}
function sdn_approve(){
    if($this->session->userdata['sales_delivery_note_per']['approve']==1){
        $id=  $this->input->post('guid');
        $so=  $this->input->post('so');
        $this->load->model('sales');
        $report=$this->sales->sdn_approve($id,$so);     
        if (!$report['error']) {
            echo 'TRUE';
        } else {
            echo 'FALSE';
        }
    }else{
        echo 'Noop';
    }
}

function order_number(){
       $data[]= $this->posnic->posnic_master_max('sales_delivery_note')    ;
       echo json_encode($data);
}
function search_items(){
       $search= $this->input->post('term');
       $guid= $this->input->post('suppler');
         if($search!=""){
            $this->load->model('purchase');
            $data= $this->purchase->serach_items($search,$this->session->userdata['branch_id'],$guid);      
            echo json_encode($data);
        }
        
}
function language($lang){
       $lang= $this->lang->load($lang);
       return $lang;
    }
}
?>
