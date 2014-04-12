<?php
class Delivery_note extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select('sales_order.*,delivery_note.delete_status as delivery_note_delete_status,delivery_note.delivery_note_no,delivery_note.active_status as delivery_note_active_status,delivery_note.guid as delivery_note_guid,delivery_note.delivery_note_status as delivery_note_active, delivery_note.date as delivery_note_date,delivery_note.delivery_note_no ,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
                $this->db->from('delivery_note')->where('sales_order.branch_id',$branch)->where('sales_order.active_status',1)->where('sales_order.delete_status',0)->where('delivery_note.delete_status',0);
                $this->db->join('sales_order', 'sales_order.guid=delivery_note.po AND delivery_note.delete_status=0','left');
                $this->db->join('customers', 'customers.guid=sales_order.supplier_id AND sales_order.guid=delivery_note.po','left');
                $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                $data=array();
                foreach ($query->result_array() as $row){
                    if($row['delivery_note_delete_status']==0){
                    $row['delivery_note_date']=date('d-m-Y',$row['delivery_note_date']);
                    $data[]=$row;
                    }
                }
                return $data; 
        
    }
    function search_sales_order($like,$branch){
        $this->db->select('sales_order.*,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
        $this->db->from('sales_order')->where('sales_order.branch_id',$branch)->where('sales_order.order_status',1)->where('sales_order.active_status',1)->where('sales_order.delete_status',0);
        $or_like=array('po_no'=>$like,'customers.company_name'=>$like,'customers.first_name'=>$like);
        $this->db->join('customers', 'customers.guid=sales_order.supplier_id ','left');
        $this->db->or_like($or_like); 
        $this->db->limit($this->session->userdata['data_limit']);
        $sql=$this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){
              $row['expired']=0;
            if($row['exp_date'] < strtotime(date("Y/m/d"))){  
                $row['expired']=1;
            }
            $row['po_date']=date('d-m-Y',$row['po_date']);

            $row['exp_date']=date('d-m-Y',$row['exp_date']);

           

             $data[]=$row;

        }
         return $data;
               
        
    }
    function supplier_vs_items($end,$start,$like,$branch,$suplier){
        
                $this->db->select('customers_x_items.* ,items.guid as i_guid,items.name as i_name,items.code as i_code')->from('customers_x_items')->where('customers.branch_id',$branch)->where('customers.active_status',1)->where('customers.active',0)->where('customers.delete_status',1)->where('customers_x_items.active_status',1)->where('customers_x_items.delete_status',1);
                $this->db->join('items', 'items.guid=customers_x_items.item_id','left');
                $this->db->join('customers', 'customers.guid=customers_x_items.supplier_id','left');
                $this->db->where('customers_x_items.supplier_id',$suplier);
               $this->db->limit($end,$start);   
                $this->db->like($like);     
                $query=$this->db->get();
                return $query->result_array(); 
        
    }
    function edit_supplier($guid){
                $this->db->select('customers.* ,customers_category.category_name as c_name,supplier_contacts.guid as c_guid,supplier_contacts.address as c_address,supplier_contacts.city as c_city,supplier_contacts.state as c_state,supplier_contacts.country as c_country,supplier_contacts.zip as c_zip ,supplier_contacts.email as c_email,supplier_contacts.phone as c_phone')->from('customers')->where('customers.guid',$guid);
                $this->db->join('supplier_contacts', 'supplier_contacts.supplier=customers.guid','left');
                $this->db->join('customers_category', 'customers.category=customers_category.guid','left');
                   
                $query=$this->db->get();
                return $query->result(); 
    }
    function add_contact($guid,$address,$city,$state,$country,$zip,$email,$phone){
        $this->db->insert('supplier_contacts',array('supplier'=>$guid,'address'=>$address,'city'=>$city,'state'=>$state,'country'=>$country,'zip'=>$zip,'email'=>$email,'phone'=>$phone));
        $id=$this->db->insert_id();
        $this->db->where('id',$id);
        $this->db->update('supplier_contacts',array('guid'=>  md5('supplier_conatct'.$id)));
    }
    function update_suplier_contact($guid,$address,$city,$state,$country,$zip,$phone,$email){
        $this->db->where('guid',$guid);
        $this->db->update('customers',array('address1'=>$address,'city'=>$city,'state'=>$state,'zip'=>$zip,'country'=>$country,'email'=>$email,'phone'=>$phone));
    }
    function delete_conatct($guid){
        $this->db->where('supplier',$guid);
        $this->db->delete('supplier_contacts');
    }
    function count($branch){
        $this->db->select()->from('sales_order')->where('branch_id',$branch)->where('active_status',1)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }
    function supplier_vs_items_count($branch,$guid){
        $this->db->select()->from('customers_x_items')->where('supplier_id',$guid)->where('branch_id',$branch)->where('active_status',1)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }
    function search_items($search,$branch){
          $this->db->select('items.* ,items_category.guid as c_guid,items_category.category_name as c_name,brands.guid as b_guid,brands.name as b_name,items_department.department_name as d_name')->from('items')->where('items.branch_id',$branch)->where('items.active_status',1)->where('items.delete_status',1);
                $this->db->join('items_category', 'items.category_id=items_category.guid','left');
                $this->db->join('brands', 'items.brand_id=brands.guid','left');
                $this->db->join('items_department', 'items.depart_id=items_department.guid','left');
               // $this->db->join('supplier', 'stock.supplier=supplier.id','left');
                $like=array('items.name'=>$search,'items.code'=>$search,'items.barcode'=>$search,'items_category.category_name'=>$search,'brands.name'=>$search,'items_department.department_name'=>$search);
                $this->db->or_like($like);     
                $query=$this->db->get();
                return $query->result();
    }
    function get_customers_x_items($guid){
        $this->db->select()->from('customers_x_items')->where('guid',$guid);
        $sql=  $this->db->get();
        $data=array();
        $item_id;
        foreach ($sql->result() as $row){
            $item_id=$row->item_id;
            $data[]=$row;
        }
        $this->db->select()->from('items')->where('guid',$item_id);
        $item=  $this->db->get();
        foreach ($item->result() as $row){
            $data[]=$row;
        }
        return $data;
    }
    function supplier_like($like,$bid){
          $this->db->select('customers.* ,customers_category.guid as c_guid,customers_category.category_name')->from('customers')->where('customers.branch_id',$bid)->where('customers.active_status',1)->where('customers.active',0)->where('customers.delete_status',1);
          $this->db->join('customers_category', 'customers_category.guid=customers.category','left');
          $this->db->or_like($like);
          $sql=  $this->db->get();
          return $sql->result();
    }
    
    function serach_items($search,$bid,$guid){
         $this->db->select('items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,brands.name as b_name,items_department.department_name as d_name,items_category.category_name as c_name,items.name,items.guid as i_guid,items.code,items.image,items.tax_Inclusive,items.tax_id,customers_x_items.*')->from('customers_x_items')->where('customers_x_items.delete_status',1)->where('customers_x_items.active',0)->where('customers_x_items.active_status',1)->where('customers_x_items.active',0)->where('customers_x_items.deactive_item',0)->where('customers_x_items.item_active',0)->where('items.branch_id',$bid)->where('items.active_status',1)->where('items.delete_status',1);
         $this->db->join('items', "items.guid=customers_x_items.item_id AND customers_x_items.supplier_id='".$guid."' ",'left');
         $this->db->join('items_category', 'items.category_id=items_category.guid','left');
         $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=customers_x_items.item_id AND customers_x_items.supplier_id='".$guid."'",'left');
         $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=customers_x_items.item_id AND customers_x_items.supplier_id='".$guid."'",'left');
         $this->db->join('brands', 'items.brand_id=brands.guid','left');
         $this->db->join('items_department', 'items.depart_id=items_department.guid','left');
          $like=array('items.name'=>$search,'items.code'=>$search,'items_category.category_name'=>$search,'brands.name'=>$search,'items_department.department_name'=>$search);
                $this->db->or_like($like); 
               // $this->db->like('customers_x_items.supplier_id',$guid); 
         $sql=  $this->db->get();
         return $sql->result();
     
     }
    function get_sales_order($guid){
        $this->db->select('items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,customers_x_items.quty as item_limit,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name,customers.address1 as address,sales_order.*,sales_order_items.discount_per as dis_per ,sales_order_items.discount_amount as item_dis_amt ,sales_order_items.tax as dis_amt ,sales_order_items.tax as order_tax,sales_order_items.item ,sales_order_items.quty ,sales_order_items.free,sales_order_items.guid as o_i_guid ,sales_order_items.received_quty ,sales_order_items.received_free ,sales_order_items.cost ,sales_order_items.sell ,sales_order_items.mrp,sales_order_items.guid as o_i_guid ,sales_order_items.amount ,sales_order_items.date,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('sales_order')->where('sales_order.guid',$guid);
        $this->db->join('sales_order_items', 'sales_order_items.order_id = sales_order.guid AND sales_order_items.delete_status=0','left');
        $this->db->join('items', "items.guid=sales_order_items.item AND sales_order_items.order_id='".$guid."' AND sales_order_items.delete_status=0",'left');
        $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=sales_order_items.item  AND sales_order_items.delete_status=0",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=sales_order_items.item  AND sales_order_items.delete_status=0",'left');
        $this->db->join('customers', "customers.guid=sales_order.supplier_id AND sales_order_items.order_id='".$guid."'  AND sales_order_items.delete_status=0",'left');
        $this->db->join('customers_x_items', "customers_x_items.supplier_id=sales_order.supplier_id AND customers_x_items.item_id=sales_order_items.item AND sales_order_items.order_id='".$guid."'  AND sales_order_items.delete_status=0",'left');
        $sql=  $this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){             
            $row['po_date']=date('d-m-Y',$row['po_date']);       
            $row['exp_date']=date('d-m-Y',$row['exp_date']);         
            $row['date']=date('d-m-Y',$row['date']);         
            $data[]=$row;
        }
        return $data;
     }
    function get_delivery_note($guid){
        $this->db->select('delivery_note.date as delivery_note_date,delivery_note.note as delivery_note_note,delivery_note.remark as delivery_note_remark,delivery_note.delivery_note_no,delivery_note_x_items.guid as delivery_note_items_guid,delivery_note_x_items.quty as rece_quty,delivery_note_x_items.free as rece_free,items.tax_Inclusive ,delivery_note.po,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,customers_x_items.quty as item_limit,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name,customers.address1 as address,sales_order.*,sales_order_items.discount_per as dis_per ,sales_order_items.discount_amount as item_dis_amt ,sales_order_items.tax as dis_amt ,sales_order_items.tax as order_tax,sales_order_items.item ,sales_order_items.quty ,sales_order_items.free,sales_order_items.guid as o_i_guid ,sales_order_items.received_quty ,sales_order_items.received_free ,sales_order_items.cost ,sales_order_items.sell ,sales_order_items.mrp,sales_order_items.guid as o_i_guid ,sales_order_items.amount ,sales_order_items.date,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('delivery_note')->where('delivery_note.guid',$guid)->where('delivery_note.delete_status',0);
        $this->db->join('sales_order', 'delivery_note.po=sales_order.guid','left');
        $this->db->join('delivery_note_x_items', 'delivery_note_x_items.delivery_note=delivery_note.guid','left');
        $this->db->join('sales_order_items', 'sales_order_items.order_id = sales_order.guid AND delivery_note_x_items.item=sales_order_items.item AND sales_order_items.delete_status=0','left');
        $this->db->join('items', "items.guid=sales_order_items.item AND items.guid=delivery_note_x_items.item AND sales_order_items.order_id=sales_order.guid AND sales_order_items.delete_status=0",'left');
        $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=sales_order_items.item  AND sales_order_items.delete_status=0",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=sales_order_items.item  AND sales_order_items.delete_status=0",'left');
        $this->db->join('customers', "customers.guid=sales_order.supplier_id AND sales_order_items.order_id=sales_order.guid  AND sales_order_items.delete_status=0",'left');
        $this->db->join('customers_x_items', "customers_x_items.supplier_id=sales_order.supplier_id AND customers_x_items.item_id=sales_order_items.item AND sales_order_items.order_id='".$guid."'  AND sales_order_items.delete_status=0",'left');
        $sql=  $this->db->get();
        $data=array();
        foreach($sql->result_array() as $row){             
            $row['po_date']=date('d-m-Y',$row['po_date']);       
            $row['delivery_note_date']=date('d-m-Y',$row['delivery_note_date']);       
            $row['exp_date']=date('d-m-Y',$row['exp_date']);         
            $row['date']=date('d-m-Y',$row['date']);         
            $data[]=$row;
        }
        return $data;
     }
     function delete_order_item($guid){      
          $this->db->where('guid',$guid);
          $this->db->update('sales_order_items',array('delete_status'=>1));
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
    function update_item_receving($po_item,$quty,$free){
        $this->db->select()->from('sales_order_items')->where('guid',$po_item);
        $sql=  $this->db->get();
        $received_quty;
        $received_free;
        $ordered_quty;
        $ordered_free;
        foreach ($sql->result() as $row){
            $received_quty=$row->received_quty;
            $received_free=$row->received_free;
            $ordered_quty=$row->quty;
            $ordered_free=$row->free;
         }
        $balance_quty=$ordered_quty-$received_quty;
        $balance_free=$ordered_free-$received_free;
        if($free>$balance_free){
            $free=$balance_free;
        }
        if($quty>$balance_quty){
            $quty=$balance_quty;
        }
        $data=array('received_quty'=>$received_quty+$quty,'received_free'=>$received_free+$free);
        $this->db->where('guid',$po_item);
        $this->db->update('sales_order_items',$data);
        
         
     }
    # Add Stock From Purchase Receve Note
    function add_stock($guid,$po_item,$Bid){
        $this->db->select()->from('delivery_note_x_items')->where('delivery_note',$guid);
        $delivery_note=$this->db->get();
        foreach ($delivery_note->result() as $delivery_note_row){
     
        
        $this->db->select()->from('sales_order_items')->where('order_id',$po_item)->where('item',$delivery_note_row->item);
        $sql=  $this->db->get();
        $price;
        foreach ($sql->result() as $row){
           $price=$row->sell;
        }
        $this->db->select()->from('stock')->where('branch_id',$Bid)->where('item',$delivery_note_row->item);
        $sql_order=  $this->db->get();
        if($sql_order->num_rows()>0){
            $stock_quty;
            foreach ($sql_order->result() as $stock){
                $stock_quty=  $stock->quty;
                $selling=$stock->price;
            }
            if($selling==$price){
            $this->db->where('branch_id',$Bid)->where('item',$delivery_note_row->item);
            $this->db->update('stock',array('quty'=>$delivery_note_row->quty+$stock_quty,'price'=>$price));
            }else{
             $this->db->insert('stock',array('item'=>$delivery_note_row->item,'quty'=>$delivery_note_row->quty,'price'=>$price,'branch_id'=>$Bid));
            $id=  $this->db->insert_id();
            $this->db->where('id',$id);
             
            $this->db->update('stock',array('guid'=>  md5('stock'.$delivery_note_row->item.$id)));
            }
        }else{
            $this->db->insert('stock',array('item'=>$delivery_note_row->item,'quty'=>$delivery_note_row->quty,'price'=>$price,'branch_id'=>$Bid));
            $id=  $this->db->insert_id();
            $this->db->where('id',$id);
             
            $this->db->update('stock',array('guid'=>  md5('stock'.$delivery_note_row->item.$id)));
        }
        }
    }
    function update_delivery_note_items_quty($guid,$quty,$free,$items,$po_item){
        $this->db->select()->from('delivery_note_x_items')->where('guid',$guid);        
        $sql=  $this->db->get();
      
        $old_quty;
        $old_free;
        $oquty;
        $ofree;
        $rquty;
        $rree;
        foreach ($sql->result() as $row){
           $old_free=$row->free;
      $old_quty=$row->quty;
        }
        
        $this->db->select()->from('sales_order_items')->where('guid',$po_item);
        $po=  $this->db->get();
        foreach ($po->result() as $prow){
            $ofree=$prow->free;
           $oquty=$prow->quty;
            $rfree=$prow->received_free;
            $rquty=$prow->received_quty;
        }
       $old_received_quty=$rquty-$old_quty;
      
        $old_received_free=$rfree-$old_free;
        $current_quty=$quty+$old_received_quty;
        $current_free=$free+$old_received_free;
        if($current_quty>$oquty){
          $quty=$oquty-$old_received_quty;
        }
        if($current_free>$ofree){
            $free=$ofree-$old_received_free;
        }
        $this->db->where('guid',$guid);
        $this->db->update('delivery_note_x_items',array('quty'=>$quty,'free'=>$free));
        $this->db->where('guid',$po_item);
        $this->db->update('sales_order_items',array('received_quty'=>$old_received_quty+$quty,'received_free'=>$free+$old_received_free));
        
    }
    function change_delivery_note_status($guid){
        $this->db->where('guid',$guid);
        $this->db->update('delivery_note',array('delivery_note_status'=>1));
    }
    function delete_delivery_note_items($guid){
        $this->db->select()->from('delivery_note')->where('guid',$guid);
        $delivery_note=  $this->db->get();
        $order_id;
        foreach ($delivery_note->result() as $row){
            $order_id= $row->po;
        }
        $this->db->select()->from('sales_order_items')->where('order_id',$order_id);
        $po=$this->db->get();
        foreach ($po->result() as $item){
            $quty;
            $free;
            $this->db->select()->from('delivery_note_x_items')->where('delivery_note',$guid)->where('item',$item->item) ;
            $delivery_note_item=  $this->db->get();
            $delivery_note_item_guid;
            foreach ($delivery_note_item->result() as $delivery_note_row)
            {
                $quty=$delivery_note_row->quty;   
                $free=$delivery_note_row->free; 
                $delivery_note_item_guid=$delivery_note_row->guid; 
            }
            
           
            $this->db->where('guid',$item->guid);
            $this->db->update('sales_order_items',array('received_quty'=>$item->received_quty-$quty,'received_free'=>$item->received_free-$free));
            $this->db->where('guid',$delivery_note_item_guid);
            $this->db->update('delivery_note_x_items',array('active'=>0,'active_status'=>0));
                    
        }
        
    }
    function check_approve($guid){
            $this->db->select()->from('delivery_note')->where('guid',$guid)->where('active',1);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
                return FALSE;
            }else{
                return TRUE;
            }
            
    }
    function update_delivery_note_status($po){
        $this->db->where('guid',$po);
        $this->db->update('sales_order',array('delivery_note_status'=>1));
                
            
    }
    
}
?>
