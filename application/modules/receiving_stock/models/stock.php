<?php

class Stock extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select('stock_transfer.*,branches.store_name,branches.code as branch_code')->from('stock_transfer')->where('stock_transfer.destination',$branch)->where('stock_transfer.delete_status',0)->where('stock_transfer.stock_status',1);
                $this->db->join('branches',"branches.guid=stock_transfer.branch_id",'left');
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
        $this->db->select()->from('stock_transfer')->where('destination',$branch)->where('delete_status',0)->where('stock_transfer.stock_status',1);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }

     function get_stock_transfer($guid){
         $this->db->select('branches.code as branch_code,branches.store_name,items.tax_Inclusive ,tax_types.type as tax_type_name,taxes.value as tax_value,taxes.type as tax_type,stock.quty as item_limit,suppliers.guid as s_guid,suppliers.first_name as s_name,suppliers.company_name as c_name,suppliers.address1 as address,stock_transfer.*,stock_transfer_x_items.tax as order_tax,stock_transfer_x_items.item ,stock_transfer_x_items.quty ,stock_transfer_x_items.cost ,stock_transfer_x_items.sell ,stock_transfer_x_items.guid as o_i_guid ,stock_transfer_x_items.amount ,stock_transfer_x_items.stocks_history_id as stock_id,,items.guid as i_guid,items.name as items_name,items.code as i_code')->from('stock_transfer')->where('stock_transfer.guid',$guid);
         $this->db->join('branches', "branches.guid = stock_transfer.branch_id ",'left');
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
   
    
}
?>
