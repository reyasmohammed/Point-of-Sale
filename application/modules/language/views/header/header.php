
<script type="text/javascript" charset="utf-8">
          $(document).ready( function () {
           
                    $('#add_module_category_form').hide();
                    $('#edit_module_category_form').hide();
                              posnic_table();
                               
                                parsley_reg.onsubmit=function()
                                { 
                                  return false;
                                } 
                         
                        } );
                        
           function posnic_table(){
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/module_category/module_category_data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' ><input type='hidden' id='name_"+oObj.aData[0]+"' value='"+oObj.aData[2]+"'>";
								},
								
								
							},
        
        null, 

 							{	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							if(oObj.aData[5]==1){
                                                                            return 'Core';
                                                                        }else{
                                                                            return 'No Core';
                                                                        }
								},
								
								
							},
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                if(oObj.aData[5]==1){
                   							return '&nbsp<a ><span data-toggle="tooltip" class="label label-info hint--top hint--info" ><i class="icon-edit"></i></span></a>'+"&nbsp;<a  ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' ><i class='icon-trash'></i></span> </a>";
								}else{
                                                                        return '&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php  echo $this->lang->line('delete'); ?>'><i class='icon-trash'></i></span> </a>";
                                                                }
                                                                },
								
								
							},

 							

 						]
		}
						
						
                                    
                                    );
                                   
			}
    function user_function(guid){
    var module_category=$('#name_'+guid).val();
    <?php if($this->session->userdata['module_category_per']['delete']==1){ ?>
             bootbox.confirm("Are you Sure To Delete This module_category ("+module_category+")", function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>/index.php/module_category/delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                          $.bootstrapGrowl('<?php echo $this->lang->line('module_category') ?> '+module_category+' <?php echo $this->lang->line('deleted');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        

                        }
    }); <?php }else{?>
             $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('module_category');?>', { type: "error" });         
   <?php }
?>
                        }
            function posnic_deactive(guid){
                var module_category=$('#name_'+guid).val();
                $.ajax({
                url: '<?php echo base_url() ?>index.php/module_category/deactive',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl('<?php echo $this->lang->line('module_category') ?> '+module_category+' <?php echo $this->lang->line('isdeactivated');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
            function posnic_active(guid){
            var module_category=$('#name_'+guid).val();
                           $.ajax({
                url: '<?php echo base_url() ?>index.php/module_category/active',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         
                          $.bootstrapGrowl('<?php echo $this->lang->line('module_category') ?> '+module_category+' <?php echo $this->lang->line('isactivated');?>', { type: "success" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
           function edit_function(guid){
                       $("#parsley_reg").trigger('reset');
                       $("#update_button").show();
                       $("#add_button").hide();
                        <?php if($this->session->userdata['module_category_per']['edit']==1){ ?>
                            $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/module_category/edit_module_category/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 $("#user_list").hide();
                                 $('#add_module_category_form').show('slow');
                                 $('#delete').attr("disabled", "disabled");
                                 $('#posnic_add_module_category').attr("disabled", "disabled");
                                 $('#active').attr("disabled", "disabled");
                                 $('#deactive').attr("disabled", "disabled");
                                 $('#module_category_lists').removeAttr("disabled");
                                 $('#parsley_reg #guid').val(data[0]['guid']);
                                 $('#parsley_reg #module_category_name').val(data[0]['Category_name']);
                                 $('#parsley_reg #icon_class').val(data[0]['icon_class']);
                                 $('#parsley_reg #order').val(data[0]['order']);
                               
                             } 
                           });
                         
                        
                              
                         
                        <?php }else{?>
                                bootbox.alert("<?php echo $this->lang->line('You Have NO permission To Edit This Records') ?>");
                        <?php }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>


  