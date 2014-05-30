<?php

class Stock extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select()->from('sales_return')->where('branch_id',$branch)->where('delete_status',0);
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
        $this->db->select()->from('sales_return')->where('branch_id',$branch)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }

    function update_sales_return($guid,$item,$quty,$sell,$tax,$net){
         $this->db->where(array('sales_return_id'=>$guid,'item'=>$item));
         $item_value=array('tax'=>$tax,'quty'=>$quty,'sell'=>$sell,'amount'=>$net);
         $this->db->update('sales_return_x_items',$item_value);
         
    }
    function add_sales_return($guid,$item,$quty,$sell,$tax,$net){
         $item_value=array('sales_return_id'=>$guid,'tax'=>$tax,'item'=>$item,'quty'=>$quty,'sell'=>$sell,'amount'=>$net);
         $this->db->insert('sales_return_x_items',$item_value);
         $os_item=  $this->db->insert_id();
         $this->db->where('id',$os_item);
         $this->db->update('sales_return_x_items',array('guid'=>md5('sales_return_x_items'.$item.$os_item)));
    }
    
    function search_items($search,$bill){
         $data=array();
         
        $this->db->select('sales_bill.invoice,direct_sales_x_items.price as ds_price,direct_sales_x_items.quty as ds_quty,sales_order_x_items.price as so_price,sales_order_x_items.quty as so_quty,direct_sales_delivery_x_items.price as dsd_price,direct_sales_delivery_x_items.quty as dsd_quty,direct_sales_x_items.item as ds_item,sales_order_x_items.item as so_item,items.code,items.uom,items.no_of_unit,items_setting.sales_return,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,brands.name as b_name,items_department.department_name as d_name,items_category.category_name as c_name,items.name,items.guid as i_guid,items.code,items.image,items.tax_Inclusive,items.tax_id')->from('sales_bill')->where('sales_bill.guid',$bill)->where('sales_bill.branch_id',  $this->session->userdata('branch_id'));
        $this->db->join('direct_sales_x_items', 'direct_sales_x_items.direct_sales_id=sales_bill.direct_sales_id','left');
        $this->db->join('direct_sales_delivery_x_items', 'direct_sales_delivery_x_items.direct_sales_delivery_id=sales_bill.sdn AND sales_bill.so="non" AND sales_bill.direct_sales_id="non" ','left');
        $this->db->join('sales_order_x_items', 'sales_order_x_items.sales_order_id=sales_bill.so','left');
        $this->db->join('items', 'items.guid=sales_order_x_items.item OR items.guid=direct_sales_x_items.item OR items.guid=direct_sales_delivery_x_items.item','left');
        $this->db->join('items_category', 'items.category_id=items_category.guid','left');
        $this->db->join('brands', 'items.brand_id=brands.guid','left');
        $this->db->join('items_setting', 'items.guid=items_setting.item_id AND items_setting.purchase=1','left');
        $this->db->join('items_department', 'items.depart_id=items_department.guid','left');
        $this->db->join('taxes', "items.tax_id=taxes.guid  ",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid ",'left');
           $sql=$this->db->get();
           
            foreach ($sql->result_array() as $row){
        if($row['ds_price']!=""){
            $row['price']=$row['ds_price'];
        }
        if($row['ds_quty']!=""){
            $row['quty']=$row['ds_quty'];
        }
        if($row['so_price']!=""){
            $row['price']=$row['so_price'];
        }
        if($row['so_quty']!=""){
            $row['quty']=$row['so_quty'];
        }
        if($row['dsd_price']!=""){
            $row['price']=$row['dsd_price'];
        }
        if($row['dsd_quty']!=""){
            $row['quty']=$row['dsd_quty'];
        }
                $data[]=$row;
             
            }
            
            
            
         return $data;
     
     }
    function get_sales_return($guid){
        $this->db->select('sales_bill.invoice,direct_sales_x_items.quty as ds_quty ,direct_sales_delivery_x_items.quty as dsd_quty ,sales_order_x_items.delivered_quty as so_quty ,customers.first_name,sales_bill.date as sales_date,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,sales_return_x_items.quty as item_limit,sales_return.*,sales_return_x_items.tax as order_tax,sales_return_x_items.item ,sales_return_x_items.quty ,sales_return_x_items.sell ,sales_return_x_items.guid as o_i_guid ,sales_return_x_items.amount ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('sales_return')->where('sales_return.guid',$guid);
        $this->db->join('sales_bill','sales_bill.guid=sales_return.sales_bill_id','left');
        $this->db->join('direct_sales', 'direct_sales.guid=sales_bill.direct_sales_id','left');
        $this->db->join('direct_sales_x_items', 'direct_sales_x_items.direct_sales_id=direct_sales.guid','left');
         
        $this->db->join('direct_sales_delivery', 'direct_sales_delivery.guid=sales_bill.sdn','left');
        $this->db->join('direct_sales_delivery_x_items', 'direct_sales_delivery_x_items.direct_sales_delivery_id=direct_sales_delivery.guid','left');
         
        $this->db->join('sales_order', 'sales_order.guid=sales_bill.so','left');
        $this->db->join('sales_order_x_items', 'sales_order_x_items.sales_order_id=sales_order.guid','left');
         
         
        $this->db->join('customers','customers.guid=sales_bill.customer_id','left');
        $this->db->join('sales_return_x_items', "sales_return_x_items.sales_return_id = sales_return.guid ",'left');
        $this->db->join('items', "items.guid=sales_return_x_items.item AND sales_return_x_items.sales_return_id='".$guid."' ",'left');
        $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=sales_return_x_items.item  ",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=sales_return_x_items.item  ",'left');
        $sql=  $this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){

          $row['date']=date('d-m-Y',$row['date']);
          $row['sales_date']=date('d-m-Y',$row['sales_date']);
            if($row['ds_quty']!=""){
                $row['item_limit']=$row['ds_quty'];
            }
            if($row['dsd_quty']!=""){
                $row['item_limit']=$row['dsd_quty'];
            }
            if($row['so_quty']!=""){
                $row['item_limit']=$row['so_quty'];
            }
          $data[]=$row;
         }
         return $data;
     }
     function delete_order_item($guid){      
          $this->db->where('guid',$guid);
          $this->db->delete('sales_return_x_items');
     }
     function sales_return_approve($guid){
         $this->db->select('items.no_of_unit,sales_return_x_items.*')->from('sales_return_x_items')->where('sales_return_x_items.sales_return_id',$guid);
         $this->db->join('items','items.guid=sales_return_x_items.item','left');
         $sql=  $this->db->get();
         foreach ($sql->result() as $row){
             $price=$row->sell;
             $quty=$row->quty;
             $item=$row->item;
             $no_of_unit=$row->no_of_unit;
             if($no_of_unit==0){
                 $no_of_unit=1;
             }
               $this->db->select('stock.quty,stock.guid')->from('stock')->where('item',$item)->where('price',$price*$no_of_unit);
              
               $sql_order=  $this->db->get();
            
                $stock_quty;
                $stock_id;
                foreach ($sql_order->result() as $stock){
                    $stock_quty=  $stock->quty;
                    $stock_id=$stock->guid;
                }
           
                $this->db->where('guid',$stock_id);
                $this->db->update('stock',array('quty'=>$stock_quty-$quty));
                
               
                
             
         }
         
        $this->db->where('guid',$guid);
    $this->db->update('sales_return',array('stock_status'=>1));
      
        
     }
     function  check_approve($guid){
          $this->db->select()->from('sales_return')->where('guid',$guid)->where('stock_status',1);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
               return FALSE;
            }else{
                return TRUE;
            }
            
     }
      function search_sales_bill($search){
          
          $this->db->select('sales_bill.*,customers.first_name,customers.company_name')->from('sales_bill');
          $this->db->join('customers', 'customers.guid=sales_bill.customer_id','left');
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
