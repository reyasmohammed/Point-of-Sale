
<script type="text/javascript" charset="utf-8">
          $(document).ready( function () {
           
                    $('#add_language_form').hide();
                    $('#edit_language_form').hide();
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
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/language/language_data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' ><input type='hidden' id='name_"+oObj.aData[0]+"' value='"+oObj.aData[2]+"'>";
								},
								
								
							},
        
        null, 

 							
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                              
                                                                        return '&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php  echo $this->lang->line('delete'); ?>'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },
								
								
							},

 							

 						]
		}
						
						
                                    
                                    );
                                   
			}
    function user_function(guid){
    var language=$('#name_'+guid).val();
    <?php if($this->session->userdata['language_per']['delete']==1){ ?>
             bootbox.confirm("Are you Sure To Delete This language ("+language+")", function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>/index.php/language/delete',
                type: "POST",
                data: {
                    guid: guid,
                    name:$('#name_'+guid).val()
                },
                success: function(response)
                {
                    if(response){
                          $.bootstrapGrowl('<?php echo $this->lang->line('language') ?> '+language+' <?php echo $this->lang->line('deleted');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        

                        }
    }); <?php }else{?>
             $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('language');?>', { type: "error" });         
   <?php }
?>
                        }
            function posnic_deactive(guid){
                var language=$('#name_'+guid).val();
                $.ajax({
                url: '<?php echo base_url() ?>index.php/language/deactive',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl('<?php echo $this->lang->line('language') ?> '+language+' <?php echo $this->lang->line('isdeactivated');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
            function posnic_active(guid){
            var language=$('#name_'+guid).val();
                           $.ajax({
                url: '<?php echo base_url() ?>index.php/language/active',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         
                          $.bootstrapGrowl('<?php echo $this->lang->line('language') ?> '+language+' <?php echo $this->lang->line('isactivated');?>', { type: "success" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
           function edit_function(guid){
                       $("#parsley_reg").trigger('reset');
                       $("#update_button").show();
                       $("#add_button").hide();
                       $('#language_inputs').remove();
                       $('#parent_div').append('<div id="language_inputs"/>');
                        <?php if($this->session->userdata['language_per']['edit']==1){ ?>
                            $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/language/edit_language/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                
                                 $("#user_list").hide();
                                 $('#add_language_form').show('slow');
                                 $('#delete').attr("disabled", "disabled");
                                 $('#posnic_add_language').attr("disabled", "disabled");
                                 $('#active').attr("disabled", "disabled");
                                 $('#deactive').attr("disabled", "disabled");
                                 $('#language_name').attr("disabled", "disabled");
                                 $('#english_name').attr("disabled", "disabled");
                                 $('#language_lists').removeAttr("disabled");
                                  var row='lang_row_0';
                                 for(var i=0;i<data[0].length;i++){
                                  //console.log(data[i]['user_name'])
                                     if(i%3==0){
                                           $('#language_inputs').append('<div id="lang_row_'+i+'"/>');
                                           row='lang_row_'+i;
                                          
                                     }
                                   $('#language_inputs #'+row).append('<div class="col col-lg-6">'+data[0][i]+'</div><div class="col col-lg-6"><input type="hidden" value="'+data[2][i]+'" name="key_val[]"/><input type="text" name="lang_val[]" class="form-control required" value="'+data[1][i]+'"></div>');
                                 }
                                 
                              $('#language_name').val(data[3][0]['language_name']);
                              $('#language').val(data[3][0]['in_english']);
                              $('#english_name').val(data[3][0]['in_english']);
                             } 
                           });
                         
                        
                              
                         
                        <?php }else{?>
                                bootbox.alert("<?php echo $this->lang->line('You Have NO permission To Edit This Records') ?>");
                        <?php }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>
                <script type="text/javascript" src="<?php echo base_url('template/form_post/jquery.form.js') ?>"></script>

  