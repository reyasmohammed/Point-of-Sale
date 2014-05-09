<?php
class Sales extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select('sales_delivery_note.total_amount,sales_delivery_note.guid as sdn_guid,sales_order.*,sales_delivery_note.delete_status as sales_delivery_note_delete_status,sales_delivery_note.sales_delivery_note_no,sales_delivery_note.active_status as sales_delivery_note_active_status,sales_delivery_note.guid as sales_delivery_note_guid,sales_delivery_note.sales_delivery_note_status as sales_delivery_note_active, sales_delivery_note.date as sales_delivery_note_date,sales_delivery_note.sales_delivery_note_no ,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
                $this->db->from('sales_delivery_note')->where('sales_order.branch_id',$branch)->where('sales_order.active_status',1)->where('sales_order.delete_status',0)->where('sales_delivery_note.delete_status',0);
                $this->db->join('sales_order', 'sales_order.guid=sales_delivery_note.so AND sales_delivery_note.delete_status=0','left');
                $this->db->join('customers', 'customers.guid=sales_order.customer_id AND sales_order.guid=sales_delivery_note.so','left');
                $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                $data=array();
                foreach ($query->result_array() as $row){
                    if($row['sales_delivery_note_delete_status']==0){
                    $row['date']=date('d-m-Y',$row['date']);
                    $data[]=$row;
                    }
                }
                return $data; 
    }
    function search_sales_order($like,$branch){
        $this->db->select('sales_order.*,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
        $this->db->from('sales_order')->where('sales_order.branch_id',$branch)->where('sales_order.order_status',1)->where('sales_order.active_status',1)->where('sales_order.delete_status',0);
        $or_like=array('code'=>$like,'customers.company_name'=>$like,'customers.first_name'=>$like);
        $this->db->join('customers', 'customers.guid=sales_order.customer_id AND sales_order.order_status=1 ','left');
        $this->db->or_like($or_like); 
        $this->db->limit($this->session->userdata['data_limit']);
        $sql=$this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){
            if($row['order_status']==1){
              $row['expired']=0;
            if($row['exp_date'] < strtotime(date("Y/m/d"))){  
                $row['expired']=1;
            }
            $row['date']=date('d-m-Y',$row['date']);

            $row['exp_date']=date('d-m-Y',$row['exp_date']);

           

             $data[]=$row;
            }

        }
         return $data;
               
        
    }
   
    
    function count($branch){
        $this->db->select()->from('sales_delivery_note')->where('branch_id',$branch)->where('active_status',1)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }
   
   
    function get_sales_order($guid){
        $this->db->select('items.uom,items.no_of_unit,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name,customers.address as address,sales_order.*  ,sales_order_x_items.discount as dis_per ,sales_order_x_items.item ,sales_order_x_items.quty ,sales_order_x_items.price,sales_order_x_items.guid as o_i_guid ,sales_order_x_items.guid as o_i_guid  ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('sales_order')->where('sales_order.guid',$guid)->where('sales_order.order_status',1);
        $this->db->join('sales_order_x_items', 'sales_order_x_items.sales_order_id = sales_order.guid ','left');
        $this->db->join('items', "items.guid=sales_order_x_items.item AND sales_order_x_items.sales_order_id='".$guid."' ",'left');
        $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=sales_order_x_items.item  ",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=sales_order_x_items.item ",'left');
        $this->db->join('customers', "customers.guid=sales_order.customer_id AND sales_order_x_items.sales_order_id='".$guid."' ",'left');
       
        $sql=  $this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){             
                 
            $row['exp_date']=date('d-m-Y',$row['exp_date']);         
            $row['date']=date('d-m-Y',$row['date']);         
            $data[]=$row;
        }
        return $data;
     }
    function get_sales_delivery_note($guid){
        $this->db->select('items.uom,items.no_of_unit,sales_delivery_note.customer_discount as sdn_customer_discount,sales_delivery_note.customer_discount_amount as sdn_customer_discount_amount,sales_delivery_note.date as sales_delivery_note_date,sales_delivery_note.note as sales_delivery_note_note,sales_delivery_note.remark as sales_delivery_note_remark,sales_delivery_note.sales_delivery_note_no,items.tax_Inclusive ,sales_delivery_note.so,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name,customers.address as address,sales_order.*,sales_order_x_items.discount as dis_per ,sales_order_x_items.item ,sales_order_x_items.quty ,sales_order_x_items.guid as o_i_guid ,sales_order_x_items.delivered_quty ,sales_order_x_items.price ,sales_order_x_items.guid as o_i_guid ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('sales_delivery_note')->where('sales_delivery_note.guid',$guid)->where('sales_delivery_note.delete_status',0);
        $this->db->join('sales_order', 'sales_delivery_note.so=sales_order.guid','left');
      
        $this->db->join('sales_order_x_items', 'sales_order_x_items.sales_order_id = sales_order.guid  ','left');
        $this->db->join('items', "items.guid=sales_order_x_items.item AND sales_order_x_items.sales_order_id=sales_order.guid ",'left');
        $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=sales_order_x_items.item  ",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=sales_order_x_items.item  ",'left');
        $this->db->join('customers', "customers.guid=sales_order.customer_id AND sales_order_x_items.sales_order_id=sales_order.guid  ",'left');
        $sql=  $this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){             
            $row['date']=date('d-m-Y',$row['date']);       
            $row['sales_delivery_note_date']=date('d-m-Y',$row['sales_delivery_note_date']);       
            $row['exp_date']=date('d-m-Y',$row['exp_date']);         
          //  $row['date']=date('d-m-Y',$row['date']);         
            $data[]=$row;
        }
        return $data;
     }
    
    
    function update_item_receving($items,$quty,$so){
        $where=array('sales_order_id'=>$so,'item'=>$items);
        $this->db->where($where);
        $this->db->update('sales_order_x_items',array('delivered_quty'=>$quty));
     }
   
    function sdn_approve($guid,$so){
        $this->db->where('guid',$guid);
        $this->db->update('sales_delivery_note',array('sales_delivery_note_status'=>1));
        $this->db->select()->from('sales_order_x_items')->where('sales_order_id',$so);
        $sql=  $this->db->get();
        foreach ($sql->result() as $row){
            $quty;
            $stock_id;
            $this->db->select('quty,id')->from('stock')->where('item',$row->item)->where('price',$row->price)->where('branch_id',$this->session->userdata['branch_id']);
            $stock=  $this->db->get();
            foreach ($stock->result() as $s_row){
                $quty=$s_row->quty;
                $stock_id=$s_row->id;
            }
            $this->db->where('id',$stock_id);
            $this->db->update('stock',array('quty'=>$quty-$row->delivered_quty));
            
            
        }
    }
   
    function check_approve($guid){
            $this->db->select()->from('sales_delivery_note')->where('guid',$guid)->where('sales_delivery_note_status',1);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
                return FALSE;
            }else{
                return TRUE;
            }
            
    }
    function update_sales_order_status($so){
        $this->db->where('guid',$so);
        $this->db->update('sales_order',array('received_status'=>1));
    }
    
}
?>
