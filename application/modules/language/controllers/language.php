<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends MX_Controller
{
    function __construct() {
        parent::__construct();
          $this->load->library('posnic');              
    }
    function index(){
       // print_r(Modules::load('brands/language','cfd8b485f99e561408192c594f8c2e92'));
     //   print_r(Modules::load('brands/language','english'));
   // $lang= $this->lang->load("english");
   // print_r($lang);
        //  $this->load->module('brands/brands');
         // echo  $this->brands->language();
        $data= Modules::run('brands/brands/language','english');
        print_r($data);
     
    }
     
   
   
}
?>
