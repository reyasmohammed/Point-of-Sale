<?php

class Branch_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get($end,$start,$like,$branch){
                $this->db->select('branches.*')->from('users_x_branches')->where('branches.delete_status',0);
                $this->db->join('branches', "branches.guid=users_x_branches.branch_id AND user_id='".$this->session->userdata('guid')."'",'left');
            
                 $this->db->limit($end,$start); 
                $this->db->or_like($like);     
                $query=$this->db->get();
                return $query->result_array(); 
        
    }
    function edit_customer($guid){
                $this->db->select('customers.* ,customer_category.guid as c_guid,customer_category.category_name as c_name,customers_payment_type.guid as p_guid,customers_payment_type.type as type')->from('customers')->where('customers.guid',$guid);
                $this->db->join('customer_category', 'customers.category_id=customer_category.guid','left');
                $this->db->join('customers_payment_type', 'customers.payment=customers_payment_type.guid','left');
                   
                $query=$this->db->get();
                return $query->result_array(); 
    }
    function check_duplicate($where){
        $this->db->select('id')->from('branches')->where($where);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    function add_new_branch($value){
        $this->db->insert('branches',$value);
        
    }
}
?>
