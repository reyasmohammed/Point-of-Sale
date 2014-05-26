<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MX_Controller 
{
    function __construct() {
        parent::__construct();
          $this->load->library('posnic');              
    }
    function index(){
     
        $this->load->view('template/app/header'); 
        $this->load->view('header/header');         
        $this->load->view('template/branch',$this->posnic->branches());
        $data['active']='settings';
        $this->load->model('branch_settings');
        $data['row']=  $this->branch_settings->get();
        $this->load->view('index',$data);
        $this->load->view('template/app/navigation',$this->posnic->modules());
        $this->load->view('template/app/footer');
    }
    
   
   
    function update_settings(){
           if($this->session->userdata['settings_per']['edit']==1){
           if($this->input->post('settings_name')){
                $this->form_validation->set_rules("settings_name",$this->lang->line('settings_name'),'required'); 
                if ( $this->form_validation->run() !== false ) {  
                      $id=  $this->input->post('guid');
                      $name=$this->input->post('settings_name');                
                      $where=array('guid !='=>$id,'name'=>$name);
                if($this->posnic->check_record_unique($where,'settings')){
                    $value=array('name'=>$name);
                    $update_where=array('guid'=>$id);
                    $this->posnic->posnic_update_record($value,$update_where,'settings');
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
    
   
    function get_settings(){
        $this->load->model('branch_settings');
        $data= $this->branch_settings->get_settings();
        echo json_encode($data);
    }
            
    
    function delete(){
        if($this->session->userdata['settings_per']['delete']==1){
            if($this->input->post('guid')){
             $guid=  $this->input->post('guid');
              $this->posnic->posnic_delete($guid,'settings');
             echo 'TRUE';
            }
           }else{
            echo 'FALSE';
        }
    }
    
    function save_settings(){
        
                $this->form_validation->set_rules("purchase_order",$this->lang->line('purchase_order'),'required'); 
                $this->form_validation->set_rules("grn",$this->lang->line('grn'),'required'); 
                $this->form_validation->set_rules("direct_grn",$this->lang->line('direct_grn'),'required'); 
                $this->form_validation->set_rules("purchase_invoice",$this->lang->line('purchase_invoice'),'required'); 
                $this->form_validation->set_rules("direct_invoice",$this->lang->line('direct_invoice'),'required'); 
                $this->form_validation->set_rules("purchase_return",$this->lang->line('purchase_return'),'required'); 
                $this->form_validation->set_rules("sales",$this->lang->line('sales'),'required'); 
                $this->form_validation->set_rules("sales_quotation",$this->lang->line('sales_quotation'),'required'); 
                $this->form_validation->set_rules("sales_order",$this->lang->line('sales_order'),'required'); 
                $this->form_validation->set_rules("sales_delivery_note",$this->lang->line('sales_delivery_note'),'required'); 
                $this->form_validation->set_rules("direct_sales_delivery",$this->lang->line('direct_sales_delivery'),'required'); 
                $this->form_validation->set_rules("direct_sales",$this->lang->line('direct_sales'),'required'); 
                $this->form_validation->set_rules("sales_bill",$this->lang->line('sales_bill'),'required'); 
                $this->form_validation->set_rules("sales_return",$this->lang->line('sales_return'),'required'); 
                $this->form_validation->set_rules("supplier_payment",$this->lang->line('supplier_payment'),'required'); 
                $this->form_validation->set_rules("sales_order",$this->lang->line('sales_order'),'required'); 
                $this->form_validation->set_rules("customer_payment",$this->lang->line('customer_payment'),'required'); 
                $this->form_validation->set_rules("opening_stock",$this->lang->line('opening_stock'),'required'); 
                $this->form_validation->set_rules("damage_stock",$this->lang->line('damage_stock'),'required'); 
                $this->form_validation->set_rules("stock_transfer",$this->lang->line('stock_transfer'),'required'); 
                if ( $this->form_validation->run() !== false ) { 
                    $data=array(
                      'purchase_order'=>$this->input->post('purchase_order'),
                      'grn'=>$this->input->post('grn'),
                      'direct_grn'=>$this->input->post('direct_grn'),
                      'purchase_invoice'=>$this->input->post('purchase_invoice'),
                      'direct_invoice'=>$this->input->post('direct_invoice'),
                      'purchase_return'=>$this->input->post('purchase_return'),
                      'sales'=>$this->input->post('sales'),
                      'sales_quotation'=>$this->input->post('sales_quotation'),
                      'sales_order'=>$this->input->post('sales_order'),
                      'sales_delivery_note'=>$this->input->post('sales_delivery_note'),
                      'direct_sales_delivery'=>$this->input->post('direct_sales_delivery'),
                      'direct_sales'=>$this->input->post('direct_sales'),
                      'sales_bill'=>$this->input->post('sales_bill'),
                      'sales_return'=>$this->input->post('sales_return'),
                      'supplier_payment'=>$this->input->post('supplier_payment'),
                      'customer_payment'=>$this->input->post('customer_payment'),
                      'opening_stock'=>$this->input->post('opening_stock'),
                      'damage_stock'=>$this->input->post('damage_stock'), 
                      'stock_transfer'=>$this->input->post('stock_transfer'));
                    
                      $this->load->model('branch_settings');
                if($this->branch_settings->check_duplicate()){
                   
                    $this->branch_settings->save($data);
                    echo 'TRUE';
                }else{
                   
                    $this->branch_settings->update($data);
                     echo 'TRUE';
                }
                }else{
                    echo "FALSE";
                }
                	             
           
         
    }
    function language($lang){
       $lang= $this->lang->load($lang);
       return $lang;
    }
   
   
}
?>
