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
        $this->get_langauge(); 
       redirect('edit_language/get/english');
       
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
      //  $lang=  $this->languages->edit_language($id);
      $mode= $this->languages->get_modules();
        $data=array();
        
        for($i=0;$i<count($mode);$i++){
          
            if($mode[$i]['module_name']!="" ){
           $second_array=array( Modules::run('brands/brands/language','english'));
           //  $data = array_merge((array)$data, (array)$second_array);
             print_r($second_array);
             echo $mode[$i]['module_name']."?/////////////////?";
            }
            break;
        }
        $result = array_unique($data);
     //  echo json_encode($result);
                
                
    }
   
}
?>
