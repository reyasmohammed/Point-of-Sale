<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_language extends MX_Controller
{
    function __construct() {
        parent::__construct();
                  
    }
    function index(){
          $this->config->set_item('language','malayalam');
        $english=$this->lang->load('malayalam');
    }
//        $data= Modules::run('brands/brands/language','english');
//        print_r($data);
     
    
    function get($lang){
        $this->load->model('languages');
      //  $lang=  $this->languages->edit_language($id);
      $mode= $this->languages->get_modules();
        $data=array();
        
        for($i=0;$i<count($mode);$i++){
          
            if($mode[$i]['module_name']!="" ){
            $data=array( Modules::run('brands/brands/language',$lang));
            $second_array=array( Modules::run('users/users/language',$lang));
             $data = array_merge((array)$data, (array)$second_array);
             echo '<pre>';
             print_r($data);
             echo $mode[$i]['module_name'].',mmmmmmmmmmmmmmmmm';
             exit();
            }
            
        }
       
     //   print_r($result);
      // echo json_encode($data);
                
    }
   
}
?>
