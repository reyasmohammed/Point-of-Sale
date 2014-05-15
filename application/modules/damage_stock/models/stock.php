<?php

class Stock extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select()->from('damage_stock')->where('branch_id',$branch)->where('delete_status',0);
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
        $this->db->select()->from('damage_stock')->where('branch_id',$branch)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }

    function update_damage_stock($guid,$item,$quty,$cost,$sell,$tax,$net,$supplier,$stock){
         $this->db->where(array('damage_stock_id'=>$guid,'item'=>$item));
         $item_value=array('stocks_history_id'=>$stock,'tax'=>$tax,'quty'=>$quty,'supplier_id'=>$supplier,'cost'=>$cost,'sell'=>$sell,'amount'=>$net);
         $this->db->update('damage_stock_x_items',$item_value);
         
    }
    function add_damage_stock($guid,$item,$quty,$cost,$sell,$tax,$net,$supplier,$stock){
         
         
         $item_value=array('stocks_history_id'=>$stock,'damage_stock_id'=>$guid,'tax'=>$tax,'item'=>$item,'quty'=>$quty,'supplier_id'=>$supplier,'cost'=>$cost,'sell'=>$sell,'amount'=>$net);
         $this->db->insert('damage_stock_x_items',$item_value);
         $os_item=  $this->db->insert_id();
         $this->db->where('id',$os_item);
         $this->db->update('damage_stock_x_items',array('guid'=>md5('damage_stock_x_items'.$item.$os_item)));
    }
    
    function search_items($search){
        $bid=$this->session->userdata['branch_id'];
       
        $this->db->select('stocks_history.guid as stock_id,suppliers.first_name,suppliers.guid as s_guid,items_setting.purchase,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,brands.name as b_name,items_department.department_name as d_name,items_category.category_name as c_name,items.name,items.guid as i_guid,items.code,items.image,items.tax_Inclusive,items.tax_id,stocks_history.price as price,stocks_history.cost as cost,stock.quty as quty')->from('stock')->where('stock.branch_id',$bid)->where('stock.quty >',0);
        //$this->db->distinct('stocks_history.cost');
        $this->db->join('stocks_history', 'stocks_history.stock_id=stock.guid','left');
        $this->db->join('suppliers', 'suppliers.guid=stocks_history.supplier_id','left');
        $this->db->join('items', 'items.guid=stocks_history.item_id','left');
        $this->db->join('items_category', 'items.category_id=items_category.guid','left');
        $this->db->join('brands', 'items.brand_id=brands.guid','left');
        $this->db->join('items_setting', 'items.guid=items_setting.item_id AND items_setting.purchase=1','left');
        $this->db->join('items_department', 'items.depart_id=items_department.guid','left');
        $this->db->join('taxes', "items.tax_id=taxes.guid  ",'left');
        $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid ",'left');
        $like=array('items.guid'=>1,'items.code'=>$search,'items.barcode'=>$search,'items_category.category_name'=>$search,'brands.name'=>$search,'items_department.department_name'=>$search,'items.name'=>$search);
            $this->db->limit($this->session->userdata['data_limit']);
            $this->db->or_like($like);   
            $this->db->group_by('stocks_history.cost');
            $sql=$this->db->get();
            $data=array();
            foreach ($sql->result() as $row){
                if($row->quty >0){
                $data[]=$row;
                }
            }
               // $this->db->like('suppliers_x_items.supplier_id',$guid); 
         
         return $data;
     
     }
     function get_damage_stock($guid){
         $this->db->select('items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,stock.quty as item_limit,suppliers.guid as s_guid,suppliers.first_name as s_name,suppliers.company_name as c_name,suppliers.address1 as address,damage_stock.*,damage_stock_x_items.tax as order_tax,damage_stock_x_items.item ,damage_stock_x_items.quty ,damage_stock_x_items.cost ,damage_stock_x_items.sell ,damage_stock_x_items.guid as o_i_guid ,damage_stock_x_items.amount ,damage_stock_x_items.stocks_history_id as stock_id,,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('damage_stock')->where('damage_stock.guid',$guid);
         $this->db->join('damage_stock_x_items', "damage_stock_x_items.damage_stock_id = damage_stock.guid ",'left');
         $this->db->join('stocks_history', 'damage_stock_x_items.stocks_history_id=stocks_history.guid','left');
         $this->db->join('stock', 'stocks_history.stock_id=stock.guid','left');
         $this->db->join('items', "items.guid=damage_stock_x_items.item AND damage_stock_x_items.damage_stock_id='".$guid."' ",'left');
         $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=damage_stock_x_items.item  ",'left');
         $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=damage_stock_x_items.item  ",'left');
         $this->db->join('suppliers', "suppliers.guid=damage_stock_x_items.supplier_id AND damage_stock_x_items.damage_stock_id='".$guid."'",'left');
         $this->db->join('suppliers_x_items', "suppliers_x_items.supplier_id=damage_stock_x_items.supplier_id AND suppliers_x_items.item_id=damage_stock_x_items.item AND damage_stock_x_items.damage_stock_id='".$guid."'  ",'left');
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
          $this->db->delete('damage_stock_x_items');
     }
     function damage_stock_approve($guid){
         $this->db->select()->from('damage_stock_x_items')->where('damage_stock_id',$guid);
         $sql=  $this->db->get();
         foreach ($sql->result() as $row){
             $price=$row->sell;
             $quty=$row->quty;
             $item=$row->item;
               $this->db->select('quty,guid')->from('stock')->where('branch_id',$this->session->userdata('branch_id'))->where('item',$item)->where('price',$price);
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
      $this->db->update('damage_stock',array('stock_status'=>1));
      
        
     }
     function  check_approve($guid){
          $this->db->select()->from('damage_stock')->where('guid',$guid)->where('stock_status',1);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
               return FALSE;
            }else{
                return TRUE;
            }
            
     }
    
}
?>
