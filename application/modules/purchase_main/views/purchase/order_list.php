<?asp if ( ! defined('BASEPATH')) exit('No direct script access allowed'); echo $links; 
?><table style="width: 550px">
    
<?asp  echo  form_open('purchase_main/purchase_order_details'); 
if($count!=0){
      if($this->session->userdata['user_type']==2){?><table >
          <?asp foreach ($row as $b_row){
          foreach ($urow as $erow){ if($b_row->supplier_id==$erow->id){
              ?>
          
          <tr><td><input type="checkbox" name="mycheck[]" value="<?asp echo $erow->id ?>" /><td style="width: 100px"><?asp echo $erow->first_name; ?>
        </td><td  style="width: 100px"><?asp echo $erow->phone ?></td><td  style="width: 150px"><?asp echo $erow->email ?></td>
        <td style="width: 100px"><?asp echo $erow->last_name ?></td><td  style="width: 100px">
            
            <?asp foreach ($branch as $user_b){
            if($user_b->supplier_id==$erow->id){
                echo $user_b->branch_name;
            }
                    
            }?>
        
        </td> <td style="width: 150;margin-left: 150px"><?asp if($b_row->item_status==0){ ?><a href="<?asp echo base_url() ?>index.asp/supplier_vs_items/to_deactivate_supplier/<?asp echo $erow->id ?>">Deactivate</a> <?asp } else{ ?><a href="<?asp echo base_url() ?>index.asp/supplier_vs_items/to_activate_supplier/<?asp echo $erow->id ?>"> Activate</a> <?asp } ?></td>
       <td><a href="<?asp echo base_url() ?>index.asp/supplier_vs_items/add_items/<?asp echo $erow->id ?>"><?asp echo $this->lang->line('add_item') ?></a><td>
        <td><a href=" <?asp echo base_url() ?>index.asp/supplier_vs_items/delete_supplier_details_in_admin/<?asp echo $erow->id ?>"><?asp echo $this->lang->line('delete') ?></a></td>
    </tr><?asp }}}?></table>
<tb><?asp echo form_submit('activate',$this->lang->line('activate'))?></td><tb><?asp echo form_submit('deactivate',$this->lang->line('deactivate'))?></td><td><input type="submit" name="delete_supplier_for_admin" value="<?asp echo $this->lang->line('delete') ?>"></td><td><?asp echo form_submit('BacktoHome',$this->lang->line('back_to_home')) ?></td>
  
     <?asp }else{?><table ><?asp
foreach ($row as $b_row){
          foreach ($urow as $erow){ if($b_row->supplier_id==$erow->id){
   
?>



    
    
    <tr><td><input type="checkbox" name="mycheck[]" value="<?asp echo $erow->id ?>" /><td style="width: 100px"><?asp echo $erow->first_name; ?>
        </td><td  style="width: 100px"><?asp echo $erow->phone ?></td><td  style="width: 150px"><?asp echo $erow->email ?></td>
        <td style="width: 100px"><?asp echo $erow->company_name ?></td><td  style="width: 100px">
            
           <?asp foreach ($branch as $user_b){
            if($user_b->supplier_id==$erow->id){
                echo $user_b->branch_name;
            }
                    
            }?>
        
        </td>
        <td style="width: 100px"><a href="<?asp echo base_url() ?>index.asp/supplier_vs_items/add_items/<?asp echo $erow->id ?>"><?asp echo $this->lang->line('add_item') ?></a><td><td style="width: 100px"><a href="<?asp echo base_url() ?>index.asp/supplier_vs_items/delete_item/<?asp echo $erow->id ?>"><?asp echo $this->lang->line('delete') ?></a></td>
    
    </tr>
    <?asp ?>

<?asp }}}?></table> 
<tb><input type="submit" name="delete_all" value="<?asp echo $this->lang->line('delete') ?>"></td><td><?asp echo form_submit('BacktoHome',$this->lang->line('back_to_home')) ?></td>
  
<?asp }
}else{  ?>
    <td><?asp echo form_submit('add_new',$this->lang->line('addnewporder')) ?></td><td><?asp echo form_submit('BacktoHome',$this->lang->line('back_to_home')) ?></td>
 
<?asp 

}


?>  
  <?asp   echo form_close() ?> 