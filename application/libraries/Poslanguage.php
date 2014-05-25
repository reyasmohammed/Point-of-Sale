<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poslanguage{
    function __construct() {
        
    }
    function set_language(){
        $CI=  get_instance();
        $CI->load->library('session');
          if($CI->session->userdata('lang')){                
             
        $lang= $CI->session->userdata('lang');
        $CI->config->set_item('language',$lang); 
        $CI->lang->load($lang);
        
             }
        else{
       $CI->config->set_item('language','english'); 
       $CI->lang->load('english');
        }
        
    }
}
?>
