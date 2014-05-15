<?php

class Stock extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select()->from('opening_stock')->where('branch_id',$branch)->where('delete_status',0);
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
        $this->db->select()->from('opening_stock')->where('branch_id',$branch)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }

    function update_opening_stock($guid,$item,$quty,$cost,$sell,$per,$dis,$tax,$net,$supplier){
        
         $this->db->where(array('opening_stock_id'=>$guid,'item'=>$item));
         $item_value=array('discount_per'=>$per,'discount_amount'=>$dis,'tax'=>$tax,'quty'=>$quty,'supplier_id'=>$supplier,'cost'=>$cost,'sell'=>$sell,'amount'=>$net);
         $this->db->update('opening_stock_x_items',$item_value);
   
         
         
         
    }
    function add_opening_stock($guid,$item,$quty,$cost,$sell,$per,$dis,$tax,$net,$supplier){
         $item_value=array('opening_stock_id'=>$guid,'discount_per'=>$per,'discount_amount'=>$dis,'tax'=>$tax,'item'=>$item,'quty'=>$quty,'supplier_id'=>$supplier,'cost'=>$cost,'sell'=>$sell,'amount'=>$net);
         $this->db->insert('opening_stock_x_items',$item_value);
         $os_item=  $this->db->insert_id();
         $this->db->where('id',$os_item);
         $stock_id=md5('opening_stock_x_items'.$item.$os_item);
         $this->db->update('opening_stock_x_items',array('guid'=>$stock_id));
     }
    
    function search_items($search){
        $bid=$this->session->userdata['branch_id'];
        $this->db->select('items_setting.purchase,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,brands.name as b_name,items_department.department_name as d_name,items_category.category_name as c_name,items.name,items.guid as i_guid,items.code,items.image,items.tax_Inclusive,items.tax_id,items.selling_price as price,items.cost_price as cost')->from('items')->where('items.branch_id',$bid)->where('items.active_status',1)->where('items.delete_status',1);
        $this->db->join('items_category', 'items.category_id=items_category.guid','left');
        $this->db->join('brands', 'items.brand_id=brands.guid','left');
        $this->db->join('items_setting', 'items.guid=items_setting.item_id AND items_setting.purchase=1','left');
        $this->db->join('items_department', 'items.depart_id=items_department.guid','left');
        $this->db->join('taxes', "items.tax_id=taxes.guid  ",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid ",'left');
        $like=array('items.guid'=>1,'items.code'=>$search,'items.barcode'=>$search,'items_category.category_name'=>$search,'brands.name'=>$search,'items_department.department_name'=>$search,'items.name'=>$search);
            $this->db->limit($this->session->userdata['data_limit']);
            $this->db->or_like($like);     
            $sql=$this->db->get();
            $data=array();
            foreach ($sql->result() as $row){
                if($row->purchase==1){
                $data[]=$row;
                }
            }
             
         
         return $data;
     
     }
     function get_opening_stock($guid){
         $this->db->select('items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,suppliers_x_items.quty as item_limit,suppliers.guid as s_guid,suppliers.first_name as s_name,suppliers.company_name as c_name,suppliers.address1 as address,opening_stock.*,opening_stock_x_items.discount_per as dis_per ,opening_stock_x_items.discount_amount as item_dis_amt ,opening_stock_x_items.tax as tax_amt ,opening_stock_x_items.tax as order_tax,opening_stock_x_items.item ,opening_stock_x_items.quty ,opening_stock_x_items.cost ,opening_stock_x_items.sell ,opening_stock_x_items.guid as o_i_guid ,opening_stock_x_items.amount ,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('opening_stock')->where('opening_stock.guid',$guid);
         $this->db->join('opening_stock_x_items', "opening_stock_x_items.opening_stock_id = opening_stock.guid ",'left');
         $this->db->join('items', "items.guid=opening_stock_x_items.item AND opening_stock_x_items.opening_stock_id='".$guid."' ",'left');
         $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=opening_stock_x_items.item  ",'left');
         $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=opening_stock_x_items.item  ",'left');
         $this->db->join('suppliers', "suppliers.guid=opening_stock_x_items.supplier_id AND opening_stock_x_items.opening_stock_id='".$guid."'",'left');
         $this->db->join('suppliers_x_items', "suppliers_x_items.supplier_id=opening_stock_x_items.supplier_id AND suppliers_x_items.item_id=opening_stock_x_items.item AND opening_stock_x_items.opening_stock_id='".$guid."'  ",'left');
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
          $this->db->delete('opening_stock_x_items');
     }
     function opening_stock_approve($guid){
         $this->db->select()->from('opening_stock_x_items')->where('opening_stock_id',$guid);
         $sql=  $this->db->get();
         foreach ($sql->result() as $row){
             $price=$row->sell;
             $quty=$row->quty;
             $item=$row->item;
             $cost=$row->cost;
             $supplier=$row->supplier_id;
               $this->db->select('quty,guid')->from('stock')->where('branch_id',$this->session->userdata('branch_id'))->where('item',$item)->where('price',$price);
               $sql_order=  $this->db->get();
            if($sql_order->num_rows()==0){
                 $this->db->insert('stock',array('item'=>$item,'quty'=>$quty,'price'=>$price,'branch_id'=>$this->session->userdata('branch_id')));
                $id=  $this->db->insert_id();
                $this->db->where('id',$id);
                $stock_id= md5('stock'.$item.$id);
                $this->db->update('stock',array('guid'=>$stock_id));
                $this->db->insert('stocks_history',array('cost'=>$cost,'stock_id'=>$stock_id,'branch_id'=>$this->session->userdata('branch_id'),'item_id'=>$item,'supplier_id'=>$supplier,'added_by'=>  $this->session->userdata('guid'),'quty'=>$quty,'price'=>$price));
                $id=  $this->db->insert_id();
                $this->db->where('id',$id);
                $stocks_history= md5('stocks_history'.$item.$id);
                $this->db->update('stocks_history',array('guid'=>$stocks_history));
                
            }else{
                $stock_quty;
                $stock_id;
                foreach ($sql_order->result() as $stock){
                    $stock_quty=  $stock->quty;
                    $stock_id=$stock->guid;
                }
           
                $this->db->where('branch_id',$this->session->userdata('branch_id'))->where('item',$item);
                $this->db->update('stock',array('quty'=>$quty+$stock_quty));
                $this->db->insert('stocks_history',array('cost'=>$cost,'stock_id'=>$stock_id,'branch_id'=>$this->session->userdata('branch_id'),'item_id'=>$item,'supplier_id'=>$supplier,'added_by'=>  $this->session->userdata('guid'),'quty'=>$quty,'price'=>$price));
                $id=  $this->db->insert_id();
                $this->db->where('id',$id);
                $stocks_history= md5('stocks_history'.$item.$id);
                $this->db->update('stocks_history',array('guid'=>$stocks_history));
               
            }
             
             
         }
        
         
         
        $this->db->where('guid',$guid);
       $this->db->update('opening_stock',array('stock_status'=>1));
        
     }
     function  check_approve($guid){
          $this->db->select()->from('opening_stock')->where('guid',$guid)->where('stock_status',1);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
               return FALSE;
            }else{
                return TRUE;
            }
            
     }
    
}
?>
