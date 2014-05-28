<?php
class Sales_bill extends MX_Controller{
   function __construct() {
                parent::__construct();
                $this->load->library('posnic');               
    }
    function index(){     
        $this->load->view('template/app/header'); 
        $this->load->view('header/header');         
        $this->load->view('template/branch',$this->posnic->branches());
        $data['active']='sales_bill';
        $this->load->view('index',$data);
        $this->load->view('template/app/navigation',$this->posnic->modules());
        $this->load->view('template/app/footer');
        
        
    }
    // goods Receiving Note data table
    function data_table(){
        $aColumns = array( 'invoice','invoice','invoice','code','c_name','s_name','date','total_items','total','invoice','invoice','guid' );	
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
     if($this->session->userdata['sales_bill_per']['add']==1){
        $this->form_validation->set_rules('sdn_guid',$this->lang->line('sdn_guid'), 'required');
      //  $this->form_validation->set_rules('sales_order_id',$this->lang->line('sales_order_id'), 'required');
        $this->form_validation->set_rules('bill_date',$this->lang->line('bill_date'), 'required');
        $this->form_validation->set_rules('bill_no', $this->lang->line('bill_no'), 'required'); 
        $this->form_validation->set_rules('customer_id', $this->lang->line('customer_id'), 'required'); 
       
           
            if ($this->form_validation->run() !== false ) {    
                $sdn_guid=  $this->input->post('sdn_guid');
                $sales_order_id=  $this->input->post('sales_order_id');
                $bill_date=strtotime($this->input->post('bill_date'));
                $bill_no= $this->input->post('bill_no');
                $remark=  $this->input->post('remark');
                $customer=  $this->input->post('customer_id');
                $note=  $this->input->post('note');
                 if(!$this->input->post('sales_order_id')){
                  $sales_order_id='non';
                }
               
                $value=array('customer_id'=>$customer,'invoice'=>$bill_no,'date'=>$bill_date,'so'=>$sales_order_id,'sdn'=>$sdn_guid,'remark'=>$remark,'note'=>$note);
                $guid=   $this->posnic->posnic_add_record($value,'sales_bill');
                $this->load->model('sales');
               
                if($this->input->post('sales_order_id')){
                    $this->sales->delivery_payable_amount($customer,$sdn_guid,$guid);
                    $this->sales->update_sales_delivery_note($sdn_guid);
                }
                else{
                    $this->sales->direct_delivery_payable_amount($sdn_guid,$guid);
                    $this->sales->update_direct_sales_delivery_note($sdn_guid);
                }
                 $this->posnic->posnic_master_increment_max('sales_bill')  ;
                 echo 'TRUE';
    
                }else{
                   echo 'FALSE';
                }
        }else{
                   echo 'Noop';
                }
           
    }
    function update(){
            
      if($this->session->userdata['sales_bill_per']['edit']==1){
       $this->form_validation->set_rules('sales_bill_guid',$this->lang->line('sales_bill_guid'), 'required');
       $this->form_validation->set_rules('guid',$this->lang->line('guid'), 'required');
        $this->form_validation->set_rules('delivery_date',$this->lang->line('delivery_date'), 'required');
      //  $this->form_validation->set_rules('dn_no', $this->lang->line('dn_no'), 'required'); 
        $this->form_validation->set_rules('delivered_quty[]', $this->lang->line('delivered_quty'), 'required|numeric'); 
        $this->form_validation->set_rules('items[]', $this->lang->line('items'), 'required'); 
            if ( $this->form_validation->run() !== false ) {    
                 $so=  $this->input->post('sales_bill_guid');
                 $guid=  $this->input->post('guid');
                $delivery_date=strtotime($this->input->post('delivery_date'));
                $total_amount=$this->input->post('grand_total');
               
                $remark=  $this->input->post('remark');
                $note=  $this->input->post('note');
                $value=array('date'=>$delivery_date,'so'=>$so,'remark'=>$remark,'note'=>$note,'total_amount'=>$total_amount);
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
   if($this->session->userdata['sales_bill_per']['delete']==1){
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
function  get_sales_order(){
     $guid=  $this->input->post('guid');
    $sdn=  $this->input->post('sdn');
    $this->load->model('sales');
    $data=  $this->sales->get_sales_order($guid,$sdn);
    echo json_encode($data);
    
}
function  get_direct_delivery_note(){
     $guid=  $this->input->post('guid');
    $this->load->model('sales');
    $data=  $this->sales->get_direct_delivery_note($guid);
    echo json_encode($data);
    
}
function  get_sales_bill($guid){
    if($this->session->userdata['sales_bill_per']['edit']==1){
    $this->load->model('sales');
    $data=  $this->sales->get_sales_bill($guid);
    echo json_encode($data);
    }
}
function sdn_approve(){
    if($this->session->userdata['sales_bill_per']['approve']==1){
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
       $data[]= $this->posnic->posnic_master_max('sales_bill')    ;
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
