
<script type="text/javascript" charset="utf-8">
          $(document).ready( function () {
           
                    $('#add_user_groups_form').hide();
                              posnic_table();
                                add_user_groups.onsubmit=function()
                                { 
                                  return false;
                                } 
                                
                         
                        } );
                        
           function posnic_table(){
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/user_groups/user_groups_data_table",
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
                   							if(oObj.aData[4]==1){
                                                                            return '<span data-toggle="tooltip" class="text-success" ><?php echo $this->lang->line('active') ?></span>';
                                                                        }else{
                                                                            return '<span data-toggle="tooltip" class="text-danger" ><?php echo $this->lang->line('deactive') ?></span>';
                                                                        }
								},
								
								
							},
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                if(oObj.aData[4]==1){
                   							return '<a href=javascript:posnic_deactive("'+oObj.aData[0]+'")><span data-toggle="tooltip" class="label label-warning hint--top hint--warning" data-hint="<?php echo $this->lang->line('deactive') ?>"><i class="icon-pause"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'")  ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="EDIT"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
								}else{
                                                                        return '<a href=javascript:posnic_active("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-success hint--top hint--success" data-hint="<?php echo $this->lang->line('active') ?>"><i class="icon-play"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="EDIT"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                }
                                                                },
								
								
							},

 							

 						]
		}
						
						
                                    
                                    );
                                   
			}
    function user_function(guid){
             var name=$('#name_'+guid).val();
    <?php if($this->session->userdata['user_groups_per']['delete']==1){ ?>
             bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete This')." ".$this->lang->line('user_groups') ?> "+$('#name_'+guid).val(), function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>/index.php/user_groups/delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                        $.bootstrapGrowl('<?php echo $this->lang->line('user_groups') ?> '+name+' <?php echo $this->lang->line('deleted');?>', { type: "error" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        

                        }
    }); <?php }else{?>
           $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('user_groups');?>', { type: "error" });                       
   <?php }
?>
                        }
            function posnic_deactive(guid){
                $.ajax({
                url: '<?php echo base_url() ?>index.php/user_groups/deactive',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl($('#name_'+guid).val()+' <?php echo $this->lang->line('isdeactivated');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
            function posnic_active(guid){
                           $.ajax({
                url: '<?php echo base_url() ?>index.php/user_groups/active',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl($('#name_'+guid).val()+' <?php echo $this->lang->line('isactivated');?>', { type: "success" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
           function edit_function(guid){
            $('#loading').modal('show');
                       $("#add_user_groups").trigger('reset');
                       $('#permissions').remove();
                       $('#new_buttons').hide();
                       $('#update_buttons').show();
      $('#parent_permission').append('<div id="permissions"/>');
                        <?php if($this->session->userdata['user_groups_per']['edit']==1){ ?>
                            $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/user_groups/edit_user_groups/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 $("#user_list").hide();
                                 $('#add_user_groups_form').show('slow');
                                 $('#delete').attr("disabled", "disabled");
                                 $('#posnic_add_user_groups').attr("disabled", "disabled");
                                 $('#active').attr("disabled", "disabled");
                                 $('#deactive').attr("disabled", "disabled");
                                 $('#user_groups_lists').removeAttr("disabled");
                                 $('#add_user_groups #guid').val(guid);
                                 $('#add_user_groups #user_groups').val(data[0][0]['group_name']);
                              
                                 for(var i=0;i<data.length;i++){
                                   var module_row;
            
            if(i%6==0){
                module_row='mod_row_'+data[i][0]['guid'];
              $('#permissions').append('<div class="row" id="'+module_row+'" />');
            }
            
             $('#'+module_row).append('<div class="col col-lg-2" id="mod_col_'+data[i][0]['guid']+'" >\n\
                        <div class="row text-center" style="border-bottom:solid 3px #48AC2E;margin:10px -3px">\n\
                            <lablel  >'+data[i][0]['module_name']+'</lablel>\n\
                        </div><input type="hidden" name="module_name[]" value="'+data[i][2]+'"><input type="hidden" name="module_id[]" value="'+data[i][0]['guid']+'"></div>');
            for(var j=0;j<data[i][1].length;j++){
                
                  if(data[i][4][data[i][3][j]]==1){
                          $('#'+module_row+' #mod_col_'+data[i][0]['guid']).append('<div class="row">\n\
                            <div class="col col-lg-6">\n\
                                <lablel>'+data[i][1][j]+'</lablel>\n\
                            </div>\n\
                            <div class="col col-lg-6">\n\
                               <input type="checkbox" name="'+data[i][2]+'_'+data[i][3][j]+'" checked id="permission_'+j+data[i][0]['guid']+'"> \n\
                            </div>\n\
                        </div>');
            
            
               // $('#permissions').append('<div class="col col-lg-4"><div  class="make-switch switch-mini " data-on-label='<i class="icon icon-ok"></i>' data-off-label='<i class="success icon icon-off"></i>'><input type="checkbox" checked></div></div>')
                         //    $('#permissions').append('<div class="col col-lg-4"><input type="checkbox" checked id="create-switch"></div>')
                            $('#permission_'+j+data[i][0]['guid']).wrap('<div class="make-switch  switch-mini" data-on-label="'+"<i class='icon icon-ok'></i>"+'" data-off-label="'+"<i class='icon icon-off'></i>"+'" />').parent().bootstrapSwitch(); 
                          
                               
                            }else{
                                  $('#'+module_row+' #mod_col_'+data[i][0]['guid']).append('<div class="row">\n\
                            <div class="col col-lg-6">\n\
                                <lablel>'+data[i][1][j]+'</lablel>\n\
                            </div>\n\
                            <div class="col col-lg-6">\n\
                               <input type="checkbox" name="'+data[i][2]+'_'+data[i][3][j]+'"  id="permission_'+j+data[i][0]['guid']+'"> \n\
                            </div>\n\
                        </div>');
            
            
               // $('#permissions').append('<div class="col col-lg-4"><div  class="make-switch switch-mini " data-on-label='<i class="icon icon-ok"></i>' data-off-label='<i class="success icon icon-off"></i>'><input type="checkbox" checked></div></div>')
                         //    $('#permissions').append('<div class="col col-lg-4"><input type="checkbox" checked id="create-switch"></div>')
                            $('#permission_'+j+data[i][0]['guid']).wrap('<div class="make-switch  switch-mini" data-on-label="'+"<i class='icon icon-ok'></i>"+'" data-off-label="'+"<i class='icon icon-off'></i>"+'" />').parent().bootstrapSwitch(); 
                          
                            }
                            
                             } 
                             }
                                
                                
                                $('#loading').modal('hide');
                             } 
                           });
                         
                        
                              
                         
                        <?php }else{?>
                                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('user_groups');?>', { type: "error" });                       
                        <?php }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>


  