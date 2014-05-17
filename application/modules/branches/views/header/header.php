
<script type="text/javascript" charset="utf-8">
          $(document).ready( function () {
           
                    $('#add_customer_details_form').hide();
                    $('#edit_customer_form').hide();
                  $('#add_customer_form').validate();
                  
                              posnic_table();
                                add_customer_form.onsubmit=function()
                                { 
                                  return false;
                                } 
                               
                         
                        } );
                        
           function posnic_table(){
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/branches/branches_data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' ><input type='hidden' id='name_"+oObj.aData[0]+"' value='"+oObj.aData[2]+"'>";
								},
								
								
							},
        
        null, null, null, null, null, null, 

 							{	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							if(oObj.aData[9]==1){
                                                                            return '<span data-toggle="tooltip" class="text-success hint--top hint--success" ><?php echo $this->lang->line('active') ?></span>';
                                                                        }else{
                                                                            return '<span data-toggle="tooltip" class="text-danger hint--top data-hint="<?php echo $this->lang->line('active') ?>" ><?php echo $this->lang->line('deactive') ?></span>';
                                                                        }
								},
								
								
							},
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                if(oObj.aData[9]==1){
                   							return '<a href=javascript:posnic_deactive("'+oObj.aData[0]+'")><span data-toggle="tooltip" class="label label-warning hint--top hint--warning" data-hint="<?php echo $this->lang->line('deactive') ?>"><i class="icon-pause"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'")  ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php echo $this->lang->line('delete') ?>'><i class='icon-trash'></i></span> </a>";
								}else{
                                                                        return '<a href=javascript:posnic_active("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-success hint--top hint--success" data-hint="<?php echo $this->lang->line('active') ?>"><i class="icon-play"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php  echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php echo $this->lang->line('delete') ?>'><i class='icon-trash'></i></span> </a>";
                                                                }
                                                                },
								
								
							},

 							

 						]
		}
						
						
                                    
                                    );
                                   
			}
    function user_function(guid){
         var name=$('#name_'+guid).val();
    <?php if($this->session->userdata['branches_per']['delete']==1){ ?>
             bootbox.confirm("Are you Sure To Delete This branches ", function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>/index.php/branches/delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                           $.bootstrapGrowl('<?php echo $this->lang->line('customer') ?> ' +name+ ' <?php echo $this->lang->line('deleted');?>', { type: "error" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        

                        }
    }); <?php }else{?>
           $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('customer');?>', { type: "error" });                       
   <?php }
?>
                        }
            function posnic_deactive(guid){
                var name=$('#name_'+guid).val();
                $.ajax({
                url: '<?php echo base_url() ?>index.php/branches/deactive',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl(name+' <?php echo $this->lang->line('isdeactivated');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
            function posnic_active(guid){
            var name=$('#name_'+guid).val();
                           $.ajax({
                url: '<?php echo base_url() ?>index.php/branches/active',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl(name+' <?php echo $this->lang->line('isactivated');?>', { type: "success" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
           function edit_function(guid){
           $('#loading').modal('show');
                       $("#parsley_reg").trigger('reset');
                        <?php if($this->session->userdata['branches_per']['edit']==1){ ?>
                            $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/branches/edit_branches/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 $("#user_list").hide();
                                 $('#add_customer_details_form').show('slow');
                                 $("#add_new_branch").hide();
                                 $('#update_branch').show('slow');
                                 $('#delete').attr("disabled", "disabled");
                                 $('#posnic_add_branches').attr("disabled", "disabled");
                                 $('#active').attr("disabled", "disabled");
                                 $('#deactive').attr("disabled", "disabled");
                                 $('#branches_lists').removeAttr("disabled");
                                 $('#guid').val(data[0]['guid']);
                                 $('#branch_id').val(data[0]['code']);
                                 $('#branch_name').val(data[0]['store_name']);
                              
                                 $('#address').val(data[0]['address']);
                                 $('#city').val(data[0]['city']);
                                 $('#state').val(data[0]['state']);
                                 $('#zip').val(data[0]['zip']);
                                 $('#country').val(data[0]['country']);
                                 $('#website').val(data[0]['website']);
                                 $('#bank_name').val(data[0]['bank_name']);
                                 $('#bank_location').val(data[0]['bank_location']);
                                 $('#account_no').val(data[0]['account_number']);
                                 $('#cst').val(data[0]['tax_cst']);
                                 $('#gst').val(data[0]['tax_gst']);
                                 $('#tax_no').val(data[0]['tax_reg']);
                                 $('#email').val(data[0]['email']);
                                 $('#phone').val(data[0]['phone']);
                                 $('#fax').val(data[0]['fax']);
                                 
                                
                                $('#loading').modal('hide');
                             } 
                           });
                         
                        
                              
                         
                        <?php }else{?>
                                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('customer');?>', { type: "error" });                       
                        <?php }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>


  