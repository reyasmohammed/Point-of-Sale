<?php
class Sales extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select('sales_delivery_note.so ,sales_order.total_items,sales_delivery_note.total_amount as total,sales_bill.branch_id,sales_delivery_note.sales_delivery_note_no as code,sales_bill.guid,sales_bill.date,sales_bill.invoice,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
                $this->db->from('sales_bill')->where('sales_bill.branch_id',$branch)->where('sales_bill.so <>','non')->where('sales_bill.direct_sales_id','non');
                $this->db->join('sales_delivery_note','sales_delivery_note.guid=sales_bill.sdn','left');
                $this->db->join('sales_order', 'sales_order.guid=sales_delivery_note.so AND sales_delivery_note.delete_status=0','left');
                $this->db->join('customers', 'customers.guid=sales_order.customer_id AND sales_order.guid=sales_delivery_note.so','left');
                $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                $data=array();
                foreach ($query->result_array() as $row){
                    $row['date']=date('d-m-Y',$row['date']);
                    $data[]=$row;
                }
//                
                $this->db->select('direct_sales_delivery.customer_id,direct_sales_delivery.total_items ,direct_sales_delivery.total_amt as total,sales_bill.branch_id,direct_sales_delivery.code,sales_bill.guid,sales_bill.date,sales_bill.invoice,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
                $this->db->from('sales_bill')->where('sales_bill.branch_id',$branch)->where('sales_bill.so','non')->where('sales_bill.direct_sales_id','non');
                $this->db->join('direct_sales_delivery', 'direct_sales_delivery.guid=sales_bill.sdn','left');
                $this->db->join('customers', 'customers.guid=direct_sales_delivery.customer_id','left');
                $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                foreach ($query->result_array() as $row){
                    $row['date']=date('d-m-Y',$row['date']);
                    $data[]=$row;
                }
                $this->db->select('direct_sales.customer_id,direct_sales.total_items ,direct_sales.total_amt as total,sales_bill.branch_id,direct_sales.code,sales_bill.guid,sales_bill.date,sales_bill.invoice,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
                $this->db->from('sales_bill')->where('sales_bill.branch_id',$branch)->where('sales_bill.so','non')->where('sales_bill.sdn','non');
                $this->db->join('direct_sales', 'direct_sales.guid=sales_bill.direct_sales_id','left');
                $this->db->join('customers', 'customers.guid=direct_sales.customer_id','left');
                $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                foreach ($query->result_array() as $row){
                    $row['date']=date('d-m-Y',$row['date']);
                    $data[]=$row;
                }
                
                return $data; 
        
    }
    function search_sales_order($like,$branch){
        $this->db->select('sales_order.guid as sales_order_guid,sales_order.customer_id,sales_delivery_note.*,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
        $this->db->from('sales_delivery_note')->where('sales_delivery_note.bill_status',0)->where('sales_order.branch_id',$branch)->where('sales_delivery_note.active_status',1)->where('sales_delivery_note.delete_status',0);
        $or_like=array('code'=>$like,'customers.company_name'=>$like,'customers.first_name'=>$like,'sales_delivery_note.sales_delivery_note_no'=>$like);
        $this->db->join('sales_order', 'sales_order.guid=sales_delivery_note.so AND sales_delivery_note.sales_delivery_note_status=1 AND sales_delivery_note.bill_status=0','left');
        $this->db->join('customers', 'customers.guid=sales_order.customer_id AND sales_delivery_note.sales_delivery_note_status=1 AND sales_delivery_note.bill_status=0','left');
        $this->db->or_like($or_like); 
        $this->db->limit($this->session->userdata['data_limit']/2);
        $sql=$this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){
            if($row['bill_status']==0){
            $row['date']=date('d-m-Y',$row['date']);
            $row['sales_delivery_note']='1';
             $data[]=$row;
            }

        }
       
                 $this->db->select('direct_sales_delivery.*,direct_sales_delivery.code as sales_delivery_note_no,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
        $this->db->from('direct_sales_delivery')->where('direct_sales_delivery.branch_id',$branch)->where('direct_sales_delivery.active_status',1)->where('direct_sales_delivery.delete_status',0);
        $or_like=array('direct_sales_delivery.code'=>$like,'customers.company_name'=>$like,'customers.first_name'=>$like);
        $this->db->join('customers', 'customers.guid=direct_sales_delivery.customer_id AND direct_sales_delivery.order_status=1','left');
        $this->db->or_like($or_like); 
        $this->db->limit($this->session->userdata['data_limit']/2);
        $sql=$this->db->get();
        foreach($sql->result_array() as $row){
             if($row['bill_status']==0){
            $row['date']=date('d-m-Y',$row['date']);
            $row['sales_delivery_note']='0';
             $data[]=$row;
             }

        }
      
         return $data;
               
        
    }
   
    
    function count($branch){
        $this->db->select()->from('sales_bill')->where('branch_id',$branch);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }
   
   
    function get_sales_order($guid,$sdn){
        $this->db->select('items.uom,items.no_of_unit,sales_delivery_note.customer_discount,sales_delivery_note.customer_discount_amount,sales_delivery_note.date as sd_date,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name,customers.address as address,sales_order.*  ,sales_order_x_items.discount as dis_per ,sales_order_x_items.item ,sales_order_x_items.delivered_quty as quty ,sales_order_x_items.price,sales_order_x_items.guid as o_i_guid ,sales_order_x_items.guid as o_i_guid  ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('sales_delivery_note')->where('sales_delivery_note.guid',$sdn)->where('sales_order.guid',$guid)->where('sales_order.order_status',1);
        $this->db->join('sales_order', 'sales_order.guid = sales_delivery_note.so ','left');
        $this->db->join('sales_order_x_items', 'sales_order_x_items.sales_order_id = sales_order.guid ','left');
        $this->db->join('items', "items.guid=sales_order_x_items.item AND sales_order_x_items.sales_order_id='".$guid."' ",'left');
        $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=sales_order_x_items.item  ",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=sales_order_x_items.item ",'left');
        $this->db->join('customers', "customers.guid=sales_order.customer_id AND sales_order_x_items.sales_order_id='".$guid."' ",'left');
       
        $sql=  $this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){             
                         
            $row['sd_date']=date('d-m-Y',$row['sd_date']);         
            $data[]=$row;
        }
        return $data;
     }
    function get_direct_delivery_note($guid){
         $this->db->select('items.uom,items.no_of_unit,direct_sales_delivery.customer_discount,direct_sales_delivery.customer_discount_amount,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,customers.guid as c_guid,customers.first_name as s_name,customers.company_name as c_name,customers.address as address,direct_sales_delivery.*,direct_sales_delivery_x_items.quty ,direct_sales_delivery_x_items.stock_id ,direct_sales_delivery_x_items.discount as item_discount,direct_sales_delivery_x_items.price,direct_sales_delivery_x_items.guid as o_i_guid ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('direct_sales_delivery')->where('direct_sales_delivery.guid',$guid);
         $this->db->join('direct_sales_delivery_x_items', "direct_sales_delivery_x_items.direct_sales_delivery_id = direct_sales_delivery.guid  ",'left');
         $this->db->join('items', "items.guid=direct_sales_delivery_x_items.item AND direct_sales_delivery_x_items.direct_sales_delivery_id='".$guid."' ",'left');
         $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=direct_sales_delivery_x_items.item  ",'left');
         $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=direct_sales_delivery_x_items.item  ",'left');
         $this->db->join('customers', "customers.guid=direct_sales_delivery.customer_id AND direct_sales_delivery_x_items.direct_sales_delivery_id='".$guid."'  ",'left');
         $sql=  $this->db->get();
         $data=array();
         foreach($sql->result_array() as $row){
             
          
       
         
          $row['date']=date('d-m-Y',$row['date']);
         
          $data[]=$row;
         }
         return $data;
     }
    function get_sales_bill($guid){
        $this->db->select('sales_delivery_note.date as sales_delivery_note_date,sales_delivery_note.note as sales_delivery_note_note,sales_delivery_note.remark as sales_delivery_note_remark,sales_delivery_note.sales_delivery_note_no,items.tax_Inclusive ,sales_delivery_note.so,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name,customers.address as address,sales_order.*,sales_order_x_items.discount as dis_per ,sales_order_x_items.item ,sales_order_x_items.quty ,sales_order_x_items.guid as o_i_guid ,sales_order_x_items.delivered_quty ,sales_order_x_items.price ,sales_order_x_items.guid as o_i_guid ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('sales_delivery_note')->where('sales_delivery_note.guid',$guid)->where('sales_delivery_note.delete_status',0);
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
     function delete_order_item($guid){      
          $this->db->where('guid',$guid);
          $this->db->update('sales_order_x_items',array('delete_status'=>1));
     }
     function deactive_order($guid){
         $this->db->select()->from('sales_order')->where('guid',$guid)->where('order_status',0);
         $sql=  $this->db->get();
         if($sql->num_rows()>0){
             $this->db->where('guid',$guid);
             $this->db->update('sales_order',array('active'=>0));
             echo 'TRUE';
         }else {
             echo "approve";
         }
     }
    function update_item_receving($items,$quty,$so){
        $where=array('sales_order_id'=>$so,'item'=>$items);
        $this->db->where($where);
        $this->db->update('sales_order_x_items',array('delivered_quty'=>$quty));
        
         
     }
    # Add Stock From Purchase Receve Note
    function add_stock($guid,$po_item,$Bid){
     
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
    function delete_sales_delivery_note_items($guid){
        $this->db->select()->from('sales_delivery_note')->where('guid',$guid);
        $sales_delivery_note=  $this->db->get();
        $order_id;
        foreach ($sales_delivery_note->result() as $row){
            $order_id= $row->po;
        }
        $this->db->select()->from('sales_order_x_items')->where('order_id',$order_id);
        $po=$this->db->get();
        foreach ($po->result() as $item){
            $quty;
            $free;
            $this->db->select()->from('sales_delivery_note_x_items')->where('sales_delivery_note',$guid)->where('item',$item->item) ;
            $sales_delivery_note_item=  $this->db->get();
            $sales_delivery_note_item_guid;
            foreach ($sales_delivery_note_item->result() as $sales_delivery_note_row)
            {
                $quty=$sales_delivery_note_row->quty;   
                $free=$sales_delivery_note_row->free; 
                $sales_delivery_note_item_guid=$sales_delivery_note_row->guid; 
            }
            
           
            $this->db->where('guid',$item->guid);
            $this->db->update('sales_order_x_items',array('received_quty'=>$item->received_quty-$quty,'received_free'=>$item->received_free-$free));
            $this->db->where('guid',$sales_delivery_note_item_guid);
            $this->db->update('sales_delivery_note_x_items',array('active'=>0,'active_status'=>0));
                    
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
    function update_sales_delivery_note($so){
        $this->db->where('guid',$so);
        $this->db->update('sales_delivery_note',array('bill_status'=>1));      
            
    }
    function update_direct_sales_delivery_note($so){
        $this->db->where('guid',$so);
        $this->db->update('direct_sales_delivery',array('bill_status'=>1));      
            
    }
    function direct_delivery_payable_amount($grn,$invoice){
        $this->db->select('total_amt,customer_id')->from('direct_sales_delivery')->where('guid',$grn);
        $sql=  $this->db->get();
        $amount;
        $customer_id;
        foreach ($sql->result() as $row){
            $amount=$row->total_amt;
            $customer_id=$row->customer_id;
        }
        $this->db->insert('customer_payable',array('customer_id'=>$customer_id,'invoice_id'=>$invoice,'amount'=>$amount,'branch_id'=>  $this->session->userdata['branch_id']));
        $id=  $this->db->insert_id();
        $this->db->where('id',$id);
        $this->db->update('customer_payable',array('guid'=>  md5($customer_id.$invoice.$id."customer_payable")));
    }
    function delivery_payable_amount($customer_id,$sdn_guid,$guid){
        $this->db->select('total_amount')->from('sales_delivery_note')->where('guid',$sdn_guid);
        $sql=  $this->db->get();
        $amount;
        foreach ($sql->result() as $row){
            $amount=$row->total_amount;
        }
        $this->db->insert('customer_payable',array('customer_id'=>$customer_id,'invoice_id'=>$guid,'amount'=>$amount,'branch_id'=>  $this->session->userdata['branch_id']));
        $id=  $this->db->insert_id();
        $this->db->where('id',$id);
        $this->db->update('customer_payable',array('guid'=>  md5($customer_id.$guid.$id."customer_payable")));
    }
    
}
?>
