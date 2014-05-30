<?php

class Stock extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select()->from('purchase_return')->where('branch_id',$branch)->where('delete_status',0);
                $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                $data=array();
                foreach ($query->result_array() as $row){
                    $row['date']=date('d-m-Y',$row['date']);
                    $data[]=$row;
                }
                return $data;
    }
   
    function count($branch){
        $this->db->select()->from('purchase_return')->where('branch_id',$branch)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }

    function update_purchase_return($guid,$item,$quty,$cost,$tax,$net){
         $this->db->where(array('purchase_return_id'=>$guid,'item'=>$item));
         $item_value=array('tax'=>$tax,'quty'=>$quty,'cost'=>$cost,'amount'=>$net);
         $this->db->update('purchase_return_x_items',$item_value);
         
    }
    function add_purchase_return($guid,$item,$quty,$cost,$tax,$net,$stock_history_id){
         $item_value=array('purchase_return_id'=>$guid,'tax'=>$tax,'item'=>$item,'quty'=>$quty,'cost'=>$cost,'amount'=>$net,'stocks_history_id'=>$stock_history_id);
         $this->db->insert('purchase_return_x_items',$item_value);
         $os_item=  $this->db->insert_id();
         $this->db->where('id',$os_item);
         $this->db->update('purchase_return_x_items',array('guid'=>md5('purchase_return_x_items'.$item.$os_item)));
    }
    
    function search_items($search,$bill){
         $data=array();         
        $this->db->select('stocks_history.guid as stocks_history,purchase_invoice.invoice,direct_grn_items.cost as dgrn_cost,direct_grn_items.quty as dgrn_quty,purchase_order_items.cost as grn_cost,grn_x_items.quty as grn_quty,items.code,items.uom,items.no_of_unit,items_setting.purchase_return,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,brands.name as b_name,items_department.department_name as d_name,items_category.category_name as c_name,items.name,items.guid as i_guid,items.code,items.image,items.tax_Inclusive,items.tax_id')->from('purchase_invoice')->where('purchase_invoice.guid',$bill)->where('purchase_invoice.branch_id',  $this->session->userdata('branch_id'));
        $this->db->join('grn_x_items', 'grn_x_items.grn=purchase_invoice.grn','left');
        $this->db->join('purchase_order_items', 'purchase_order_items.order_id=purchase_invoice.po','left');
        $this->db->join('direct_grn_items', 'direct_grn_items.order_id=purchase_invoice.grn AND purchase_invoice.po="non" ','left');     
        $this->db->join('items', ' items.guid=direct_grn_items.item OR items.guid=grn_x_items.item','left');
        $this->db->join('stocks_history', ' stocks_history.invoice_id=purchase_invoice.guid AND stocks_history.item_id=items.guid OR stocks_history.grn_id=purchase_invoice.grn  AND stocks_history.item_id=items.guid','left');
        $this->db->join('items_category', 'items.category_id=items_category.guid','left');
        $this->db->join('brands', 'items.brand_id=brands.guid','left');
        $this->db->join('items_setting', 'items.guid=items_setting.item_id AND items_setting.purchase=1','left');
        $this->db->join('items_department', 'items.depart_id=items_department.guid','left');
        $this->db->join('taxes', "items.tax_id=taxes.guid  ",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid ",'left');
        $this->db->group_by('items.guid');
           $sql=$this->db->get();
           
            foreach ($sql->result_array() as $row){
                if($row['dgrn_cost']!=""){
                    $row['cost']=$row['dgrn_cost'];
                }
                if($row['dgrn_quty']!=""){
                    $row['quty']=$row['dgrn_quty'];
                }

                if($row['grn_cost']!=""){
                    $row['cost']=$row['grn_cost'];
                }
                if($row['grn_quty']!=""){
                    $row['quty']=$row['grn_quty'];
                }
                $data[]=$row;
             
            }
            
            
            
         return $data;
     
     }
     function get_purchase_return($guid){
         $this->db->select('purchase_invoice.invoice ,suppliers.first_name,purchase_invoice.date as sales_date,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,purchase_return_x_items.quty as item_limit,purchase_return.*,purchase_return_x_items.tax as order_tax,purchase_return_x_items.item ,purchase_return_x_items.quty ,purchase_return_x_items.sell ,purchase_return_x_items.guid as o_i_guid ,purchase_return_x_items.amount ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('purchase_return')->where('purchase_return.guid',$guid);
         $this->db->join('purchase_invoice','purchase_invoice.guid=purchase_return.purchase_invoice_id','left');
         $this->db->join('suppliers','suppliers.guid=purchase_invoice.supplier_id','left');
         $this->db->join('purchase_return_x_items', "purchase_return_x_items.purchase_return_id = purchase_return.guid ",'left');
         $this->db->join('items', "items.guid=purchase_return_x_items.item AND purchase_return_x_items.purchase_return_id='".$guid."' ",'left');
         $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=purchase_return_x_items.item  ",'left');
         $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=purchase_return_x_items.item  ",'left');
          $sql=  $this->db->get();
         $data=array();
         foreach($sql->result_array() as $row){

          $row['date']=date('d-m-Y',$row['date']);
          $row['sales_date']=date('d-m-Y',$row['sales_date']);

          $data[]=$row;
         }
         return $data;
     }
     function delete_order_item($guid){      
          $this->db->where('guid',$guid);
          $this->db->delete('purchase_return_x_items');
     }
     function purchase_return_approve($guid){
         $this->db->select()->from('purchase_return_x_items')->where('purchase_return_id',$guid);
         $sql= $this->db->get();
         foreach ($sql->result() as $row){
             $price=$row->cost;
             $quty=$row->quty;
             $item=$row->item;
             $stock_history=$row->stocks_history_id;
               $this->db->select('stock.quty,stock.guid')->from('stocks_history')->where('stocks_history.guid',$stock_history);
               $this->db->join('stock','stock.guid=stocks_history.stock_id','left');
               $sql_order= $this->db->get();
            
                $stock_quty;
                $stock_id;
                foreach ($sql_order->result() as $stock){
                    $stock_quty= $stock->quty;
                    $stock_id=$stock->guid;
                }
           
                $this->db->where('guid',$stock_id);
                $this->db->update('stock',array('quty'=>$stock_quty-$quty));
                
               
                
             
         }
         
        $this->db->where('guid',$guid);
    $this->db->update('purchase_return',array('stock_status'=>1));
      
        
     }
     function  check_approve($guid){
          $this->db->select()->from('purchase_return')->where('guid',$guid)->where('stock_status',1);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
               return FALSE;
            }else{
                return TRUE;
            }
            
     }
      function search_purchase_invoice($search){
          
          $this->db->select('purchase_invoice.*,suppliers.first_name,suppliers.company_name')->from('purchase_invoice');
          $this->db->join('suppliers', 'suppliers.guid=purchase_invoice.supplier_id','left');
          $like=array('invoice'=>$search,'first_name'=>$search,'company_name'=>$search);       
          $this->db->or_like($like);
          $this->db->limit($this->session->userdata('data_limit'));
          $sql=  $this->db->get();
          $data=array();
          foreach($sql->result_array() as $row){
           $row['date']=date('d-m-Y',$row['date']);
                  $data[]=$row;
          }
          return $data;
     }
    
}
?>
