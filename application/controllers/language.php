<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends MX_Controller
{
    function __construct() {
        parent::__construct();
          $this->load->library('posnic');              
    }
   
//        $data= Modules::run('brands/brands/language','english');
//        print_r($data);
     
    function index(){
    //    $this->config->set_item('language','malayalam');
    //     $english=$this->lang->load('malayalam');
    $this->get_langauge(); 
    
          $this->load->helper('file');
//   if(read_file('application/language/english/english_lang.php','r+')){
//      $string=read_file('application/language/english/english_lang.php','r+');
//      print_r($string);
//      
//   }
     
       
    }
     function get_langauge(){
        $this->load->view('template/app/header'); 
        $this->load->view('language/header/header');         
        $this->load->view('template/branch',$this->posnic->branches());
        $data['active']='language';
        $this->load->view('language/index',$data);
        $this->load->view('template/app/navigation',$this->posnic->modules());
        $this->load->view('template/app/footer');
    }
    function language_data_table(){
        $aColumns = array( 'id','language_name','language_name','language_name','language_name','active_status' );	
	$start = "";
	$end="";
	if ( $this->input->get_post('iDisplayLength') != '-1' )	{
            $start = $this->input->get_post('iDisplayStart');
            $end=	 $this->input->get_post('iDisplayLength');              
        }	
        $order="";
        if ( isset( $_GET['iSortCol_0'] ) )
        {	
            for ( $i=0 ; $i<intval($this->input->get_post('iSortingCols') ) ; $i++ )
            {
                if ( $_GET[ 'bSortable_'.intval($this->input->get_post('iSortCol_'.$i)) ] == "true" )
                {
                        $order.= $aColumns[ intval( $this->input->get_post('iSortCol_'.$i) ) ]." ".$this->input->get_post('sSortDir_'.$i ) .",";
                }
            }
            $order = substr_replace( $order, "", -1 );
        }
	$like = array();
	if ( $_GET['sSearch'] != "" )
            {
                $like =array('category_name'=>  $this->input->get_post('sSearch'));
            }
            $this->load->model('languages');
            $rResult1 = $this->languages->get($end,$start,$like);
            $iFilteredTotal =$this->languages->count();
            $iTotal =$iFilteredTotal;
            $output1 = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
		foreach ($rResult1 as $aRow )
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if ( $aColumns[$i] == "id" )
				{
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
				}
				else if ($aColumns[$i]== 'language_name')
				{
					$row[] = $this->lang->line($aRow[$aColumns[$i]]);
				}				
				else if ( $aColumns[$i] != ' ' )
				{
					$row[] = $aRow[$aColumns[$i]];
				}				
			}				
		$output1['aaData'][] = $row;
		}
        
        echo json_encode($output1);
    }
    function edit_language($id){
        $this->load->model('languages');
        $lang=  $this->languages->edit_language($id);
        //$data=$this->lang->load('malayalam');
        $this->config->set_item('language','english');
         $english=$this->lang->load('english');
         
       $this->config->set_item('language',$lang); 
          $data= $this->lang->load($lang);
         
        $val=array();
        $key_val=array();
        $eng=array();
         foreach ($data as $key => $value){
             $key_val[]=$key;
             $val[]=$value;
           
         }
         foreach ($english as $key => $value){
             $eng[]=  $value;
           
         }
         
     $lag=array();
     $lag[0]=$eng;
     $lag[2]=$key_val;
     $lag[1]=$val;
    // $lag[3]=$lang;
     echo json_encode($lag);
    
                
    }
    function update_language(){
        $this->form_validation->set_rules("key_val",$this->lang->line('key_val'),'required'); 
      // $this->form_validation->set_rules("langauge",$this->lang->line('langauge'),'required'); 
        $this->form_validation->set_rules("lang_val",$this->lang->line('lang_val'),'required'); 
        if ( $this->form_validation->run() !== false ) { 
            $lang=  $this->input->post('language');
            $this->load->helper('file');
            $key=$this->input->post('key_val');
            $lang_val=$this->input->post('lang_val');
             $data = '';
            for($i=0;$i<count($lang_val);$i++){
                 $data =$data.'$lang["'.$key[$i].'"]="'.$lang_val[$i].'"'."\n";
            }
                  

         ///   if ( ! write_file('application/language/'.$lang.'/'.$lang.'_lang.php', $data))
                    if ( ! write_file('application/language/'.$lang.'/'.$lang.'_lang.php', $data))
            {
                 echo 'TRUE';
            }
            else
            {
                 echo 'FALSE';
            } 
        }
    }
   
}
?>
