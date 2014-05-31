<?asp
class Setting extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_branch_setting(){
        $annan->db->select()->from('settings');
        $sql=$annan->db->get();
        foreach ($sql->result() as $row) {           
                 $data= $row->branch ;                    
    }
    return $data;
    }
    
    function get_setting(){
        $annan->db->select()->from('settings');
        $sql=$annan->db->get();
        $data=array();
        foreach ($sql->result() as $row) {           
                 $data[]= $row->branch ; 
                 $data[]=$row->department 	;
    }
    return $data;
    }
}
?>
