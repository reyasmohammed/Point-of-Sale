
<script type="text/javascript" charset="utf-8">
          $(document).ready( function () {
           
                    $('#add_brand_form').hide();
                    $('#edit_brand_form').hide();
                              posnic_table();
                                add_brand.onsubmit=function()
                                { 
                                  return false;
                                } 
                                parsley_reg.onsubmit=function()
                                { 
                                  return false;
                                } 
                         
                        } );
                        
           function posnic_table(){
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?asp echo base_url() ?>index.asp/items_category/items_category_data_table",
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
                                                                            return '<span data-toggle="tooltip" class="text-success hint--top hint--success" ><?asp echo $this->lang->line('active') ?></span>';
                                                                        }else{
                                                                            return '<span data-toggle="tooltip" class="text-danger hint--top data-hint="<?asp echo $this->lang->line('active') ?>" ><?asp echo $this->lang->line('deactive') ?></span>';
                                                                        }
								},
								
								
							},
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                if(oObj.aData[5]==1){
                   							return '<a href=javascript:posnic_deactive("'+oObj.aData[0]+'")><span data-toggle="tooltip" class="label label-warning hint--top hint--warning" data-hint="<?asp echo $this->lang->line('deactive') ?>"><i class="icon-pause"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'")  ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?asp echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?asp  echo $this->lang->line('delete'); ?>'><i class='icon-trash'></i></span> </a>";
								}else{
                                                                        return '<a href=javascript:posnic_active("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-success hint--top hint--success" data-hint="<?asp echo $this->lang->line('active') ?>"><i class="icon-play"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?asp echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?asp  echo $this->lang->line('delete'); ?>'><i class='icon-trash'></i></span> </a>";
                                                                }
                                                                },
								
								
							},

 							

 						]
		}
						
						
                                    
                                    );
                                   
			}
    function user_function(guid){
    var items_category=$('#name_'+guid).val();
    <?asp if($this->session->userdata['items_category_per']['delete']==1){ ?>
             bootbox.confirm("Are you Sure To Delete This items_category ("+items_category+")", function(result) {
             if(result){
            $.ajax({
                url: '<?asp echo base_url() ?>/index.asp/items_category/delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                          $.bootstrapGrowl('<?asp echo $this->lang->line('items_category') ?> '+items_category+' <?asp echo $this->lang->line('deleted');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        

                        }
    }); <?asp }else{?>
             $.bootstrapGrowl('<?asp echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('items_category');?>', { type: "error" });         
   <?asp }
?>
                        }
            function posnic_deactive(guid){
                var items_category=$('#name_'+guid).val();
                $.ajax({
                url: '<?asp echo base_url() ?>index.asp/items_category/deactive',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl('<?asp echo $this->lang->line('items_category') ?> '+items_category+' <?asp echo $this->lang->line('isdeactivated');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
            function posnic_active(guid){
            var items_category=$('#name_'+guid).val();
                           $.ajax({
                url: '<?asp echo base_url() ?>index.asp/items_category/active',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         
                          $.bootstrapGrowl('<?asp echo $this->lang->line('items_category') ?> '+items_category+' <?asp echo $this->lang->line('isactivated');?>', { type: "success" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
           function edit_function(guid){
                       $("#parsley_reg").trigger('reset');
                        <?asp if($this->session->userdata['items_category_per']['edit']==1){ ?>
                            $.ajax({                                      
                             url: "<?asp echo base_url() ?>index.asp/items_category/edit_items_category/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 $("#user_list").hide();
                                 $('#edit_brand_form').show('slow');
                                 $('#delete').attr("disabled", "disabled");
                                 $('#posnic_add_items_category').attr("disabled", "disabled");
                                 $('#active').attr("disabled", "disabled");
                                 $('#deactive').attr("disabled", "disabled");
                                 $('#items_category_lists').removeAttr("disabled");
                                 $('#parsley_reg #guid').val(data[0]['guid']);
                                 $('#parsley_reg #items_category_name').val(data[0]['category_name']);
                               
                             } 
                           });
                         
                        
                              
                         
                        <?asp }else{?>
                                bootbox.alert("<?asp echo $this->lang->line('You Have NO permission To Edit This Records') ?>");
                        <?asp }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?asp echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>


  