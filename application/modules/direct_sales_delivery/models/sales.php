<?php

class Sales extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select('direct_sales_delivery.* ,customers.guid as s_guid,customers.first_name as s_name,customers.company_name as c_name');
             
                $this->db->from('direct_sales_delivery')->where('direct_sales_delivery.branch_id',$branch)->where('direct_sales_delivery.delete_status',0);
                $this->db->join('customers', 'customers.guid=direct_sales_delivery.customer_id','left');
                $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                return $query->result_array(); 
        
    }
   
    function count($branch){
        $this->db->select()->from('direct_sales_delivery')->where('branch_id',$branch)->where('active_status',1)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }
    function search_customers($search){
          $like=array('first_name'=>$search,'email'=>$search,'company_name'=>$search,'phone'=>$search,'email'=>$search);       
          $this->db->select('customer_category.discount,customers.*')->from('customers')->where('customers.branch_id',  $this->session->userdata('branch_id'))->where('customers.active_status',1)->where('customers.delete_status',0);
          $this->db->join('customer_category','customer_category.guid=customers.category_id  AND customers.active_status=1 AND customers.delete_status=0','left');
          $this->db->or_like($like);
          $sql=  $this->db->get();
          $data=array();
          foreach ($sql->result() as $row){
              if($row->active_status==1 && $row->delete_status==0){
                  $data[]=$row;
              }
          }
          return $data;
          
          
     }
    
    function search_items($search){
         $this->db->select('items.uom,items.no_of_unit,items.start_date,items.end_date,items.discount,items_setting.sales,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,brands.name as b_name,items_department.department_name as d_name,items_category.category_name as c_name,items.name,items.guid as i_guid,items.code,items.image,items.tax_Inclusive,items.tax_id,stock.*')->from('stock')->where('stock.branch_id',  $this->session->userdata['branch_id'])->where('items.branch_id',$this->session->userdata['branch_id'])->where('items.active_status',1)->where('items.delete_status',1);
         $this->db->join('items', "items.guid=stock.item ",'left');
         $this->db->join('items_category', 'items.category_id=items_category.guid','left');
         $this->db->join('items_setting', 'items.guid=items_setting.item_id AND items_setting.purchase=1','left');
         $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=stock.item ",'left');
         $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=stock.item ",'left');
         $this->db->join('brands', 'items.brand_id=brands.guid','left');
         $this->db->join('items_department', 'items.depart_id=items_department.guid','left');
         $like=array('items.active_status'=>$search,'items.name'=>$search,'items.code'=>$search,'items_category.category_name'=>$search,'brands.name'=>$search,'items_department.department_name'=>$search);
                $this->db->or_like($like);
                $this->db->limit($this->session->userdata['data_limit']);
                $sql=  $this->db->get();
                $data=array();
                foreach ($sql->result_array() as $row){
                    if($row['sales']==1){
                  if($row['end_date'] <  strtotime(date("Y/m/d"))){
                              $row['start_date']=0;
                               $row['end_date']=0;
                             
                    }else{
                            $row['start_date']=date('d-m-Y',$row['start_date']);
                            $row['end_date']=date('d-m-Y',$row['end_date']);
                    }
                       $data[]=$row;
                    }
                }
              
         
         return $data;
     
     }
     function get_direct_sales_delivery($guid){
         $this->db->select('items.uom,items.no_of_unit,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,customers.guid as c_guid,customers.first_name as s_name,customers.company_name as c_name,customers.address as address,direct_sales_delivery.*,direct_sales_delivery_x_items.quty ,direct_sales_delivery_x_items.stock_id ,direct_sales_delivery_x_items.discount as item_discount,direct_sales_delivery_x_items.price,direct_sales_delivery_x_items.guid as o_i_guid ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('direct_sales_delivery')->where('direct_sales_delivery.guid',$guid);
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
     function delete_order_item($guid){      
          $this->db->where('guid',$guid);
          $this->db->delete('direct_sales_delivery_x_items');
     }
     function approve_order($guid){
         $this->db->where('guid',$guid);
         $this->db->update('direct_sales_delivery',array('order_status'=>1));
         $this->db->select()->from('direct_sales_delivery_x_items')->where('direct_sales_delivery_id',$guid);
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
            $this->db->update('stock',array('quty'=>$quty-$row->quty));
         }
                 
        
     }
     function  check_approve($guid){
          $this->db->select()->from('direct_sales_delivery')->where('guid',$guid)->where('order_status',1);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
               return FALSE;
            }else{
                return TRUE;
            }
            
     }
     function add_direct_sales_delivery($guid,$item,$quty,$stock,$discount,$i){
         
         $this->db->select()->from('stock')->where('guid',$stock);
         $sql=  $this->db->get();
         $price;
         foreach ($sql->result() as $row)
         {
             $price=$row->price;
         }
         $this->db->insert('direct_sales_delivery_x_items',array('stock_id'=>$stock,'guid'=>  md5($i.$guid.$item),'discount'=>$discount,'price'=>$price,'item'=>$item,'quty'=>$quty,'direct_sales_delivery_id'=>$guid));
         
               
     }
     function update_direct_sales_delivery($guid,$quty){
         $this->db->where('guid',$guid);
         $this->db->update('direct_sales_delivery_x_items',array('quty'=>$quty));
     }
    
}
?>
