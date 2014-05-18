<?php

class Stock extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select()->from('stock_transfer')->where('branch_id',$branch)->where('delete_status',0);
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
        $this->db->select()->from('stock_transfer')->where('branch_id',$branch)->where('delete_status',0);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }

    function update_stock_transfer($guid,$item,$quty,$cost,$sell,$tax,$net,$supplier,$stock){
         $this->db->where(array('stock_transfer_id'=>$guid,'item'=>$item));
         $item_value=array('stocks_history_id'=>$stock,'tax'=>$tax,'quty'=>$quty,'supplier_id'=>$supplier,'cost'=>$cost,'sell'=>$sell,'amount'=>$net);
         $this->db->update('stock_transfer_x_items',$item_value);
         
    }
    function add_stock_transfer($guid,$item,$quty,$cost,$sell,$tax,$net,$supplier,$stock){
         $item_value=array('stocks_history_id'=>$stock,'stock_transfer_id'=>$guid,'tax'=>$tax,'item'=>$item,'quty'=>$quty,'supplier_id'=>$supplier,'cost'=>$cost,'sell'=>$sell,'amount'=>$net);
         $this->db->insert('stock_transfer_x_items',$item_value);
         $os_item=  $this->db->insert_id();
         $this->db->where('id',$os_item);
         $this->db->update('stock_transfer_x_items',array('guid'=>md5('stock_transfer_x_items'.$item.$os_item)));
    }
    
    function search_items($search,$destination){
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
           // echo $destination;
            $this->db->select()->from('items')->where('branch_id',$destination);
            $dest=  $this->db->get();
            $item=$dest->result_array();
            
            foreach ($sql->result() as $row){
                if($row->quty >0){
                    for($i=0;$i<count($item);$i++){
                   if($item[$i]['code']==$row->code){
                $data[]=$row;
                    }
                    }
                }
             //   echo $item[0]['code'];
             //  echo  $row->code;
            }
               // $this->db->like('suppliers_x_items.supplier_id',$guid); 
         
         return $data;
     
     }
     function get_stock_transfer($guid){
         $this->db->select('branches.store_name,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,stock.quty as item_limit,suppliers.guid as s_guid,suppliers.first_name as s_name,suppliers.company_name as c_name,suppliers.address1 as address,stock_transfer.*,stock_transfer_x_items.tax as order_tax,stock_transfer_x_items.item ,stock_transfer_x_items.quty ,stock_transfer_x_items.cost ,stock_transfer_x_items.sell ,stock_transfer_x_items.guid as o_i_guid ,stock_transfer_x_items.amount ,stock_transfer_x_items.stocks_history_id as stock_id,,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('stock_transfer')->where('stock_transfer.guid',$guid);
         $this->db->join('branches', "branches.guid = stock_transfer.destination ",'left');
         $this->db->join('stock_transfer_x_items', "stock_transfer_x_items.stock_transfer_id = stock_transfer.guid ",'left');
         $this->db->join('stocks_history', 'stock_transfer_x_items.stocks_history_id=stocks_history.guid','left');
         $this->db->join('stock', 'stocks_history.stock_id=stock.guid','left');
         $this->db->join('items', "items.guid=stock_transfer_x_items.item AND stock_transfer_x_items.stock_transfer_id='".$guid."' ",'left');
         $this->db->join('taxes', "items.tax_id=taxes.guid AND items.guid=stock_transfer_x_items.item  ",'left');
         $this->db->join('tax_types', "taxes.type=tax_types.guid AND items.tax_id=taxes.guid AND items.guid=stock_transfer_x_items.item  ",'left');
         $this->db->join('suppliers', "suppliers.guid=stock_transfer_x_items.supplier_id AND stock_transfer_x_items.stock_transfer_id='".$guid."'",'left');
         $this->db->join('suppliers_x_items', "suppliers_x_items.supplier_id=stock_transfer_x_items.supplier_id AND suppliers_x_items.item_id=stock_transfer_x_items.item AND stock_transfer_x_items.stock_transfer_id='".$guid."'  ",'left');
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
          $this->db->delete('stock_transfer_x_items');
     }
     function stock_transfer_approve($guid){
         $this->db->select('stock_transfer_x_items.*,stock_transfer.destination')->from('stock_transfer')->where('stock_transfer.guid',$guid);
         $this->db->join('stock_transfer_x_items',"stock_transfer.guid=stock_transfer_x_items.stock_transfer_id",'left');
         $sql=  $this->db->get();
         foreach ($sql->result() as $row){
             $price=$row->sell;
             $quty=$row->quty;
             $item=$row->item;
             $destination=$row->destination;
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
                
                $this->db->select('id')->from('stock')->where('branch_id',$destination)->where('item',$item)->where('price',$price);
                $new_stock=  $this->db->get();
                if($new_stock->num_rows()>0){
                    foreach ($new_stock->result() as $stock){
                        $stock_quty=  $stock->quty;
                        $stock_id=$stock->guid;
                    }
           
                    $this->db->where('guid',$stock_id);
                    $this->db->update('stock',array('quty'=>$stock_quty+$quty));
                }else{
                    $this->db->insert('stock',array('item'=>$item,'quty'=>$quty,'price'=>$price,'branch_id'=>$destination));
                    $id=  $this->db->insert_id();
                    $this->db->where('id',$id);
                    $this->db->update('stock',array('guid'=>  md5('stock'.$item.$id)));
                }
             
         }
         
        $this->db->where('guid',$guid);
      $this->db->update('stock_transfer',array('stock_status'=>1));
      
        
     }
     function  check_approve($guid){
          $this->db->select()->from('stock_transfer')->where('guid',$guid)->where('stock_status',1);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
               return FALSE;
            }else{
                return TRUE;
            }
            
     }
      function search_branch($search){
          $like=array('store_name'=>$search,'code'=>$search,'phone'=>$search,'email'=>$search,'city'=>$search,'state'=>$search,'country'=>$search,'website'=>$search);       
          $this->db->select()->from('branches')->where('guid <>',$this->session->userdata('branch_id'))->where('active_status',1)->where('delete_status',0);
          $this->db->or_like($like);
          $this->db->limit($this->session->userdata('data_limit'));
          $sql=  $this->db->get();
          $data=array();
          foreach($sql->result() as $row){
              if($row->guid!=$this->session->userdata('branch_id')){
                  $data[]=$row;
              }
          }
          return $data;
     }
    
}
?>
