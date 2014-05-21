<?php 
class Customers_payment_type extends MX_Controller{
        function __construct() {
                parent::__construct();
               $this->load->library('posnic_module'); 
    }
    function index(){  
          if(!isset($this->session->userdata['guid'])){
                redirect('home');
                }
                redirect('taxes_ci/taxes');
    }
   
    
}
?>
