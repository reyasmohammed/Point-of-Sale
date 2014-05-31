
<script type="text/javascript" charset="utf-8">
          $(document).ready( function () {
           
                    $('#add_item_form').hide();
                    $('#edit_item_form').hide();
                    $('#add_items_image').hide();
                              posnic_table();
                             
                             
                         
                        } );
                        
           function posnic_table(){
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?asp echo base_url() ?>index.asp/items/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' ><input type='hidden' id='name_"+oObj.aData[0]+"' value='"+oObj.aData[2]+"'>";
								},
								
								
							},
        
        null, null,  null, null,  null,null, 

 							{	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							if(oObj.aData[9]==1){
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
                                                                if(oObj.aData[9]==1){
                   							return '<a href=javascript:posnic_deactive("'+oObj.aData[0]+'")><span data-toggle="tooltip" class="label label-warning hint--top hint--warning" data-hint="<?asp echo $this->lang->line('deactive') ?>"><i class="icon-pause"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'")  ><span data-toggle="tooltip" class="label label-success hint--top hint--info" data-hint="<?asp echo $this->lang->line('edit')?>"><i class="icon-edit"></i></span></a>&nbsp'+"<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?asp echo $this->lang->line('delete')?>'><i class='icon-trash'></i></span> </a>";
								}else{
                                                                        return '<a href=javascript:posnic_active("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-success hint--top hint--success" data-hint="<?asp echo $this->lang->line('active') ?>"><i class="icon-play"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-success hint--top hint--info" data-hint="<?asp echo $this->lang->line('edit')?>"><i class="icon-edit"></i></span></a>&nbsp'+"<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?asp echo $this->lang->line('delete')?>'><i class='icon-trash'></i></span> </a>";
                                                                }
                                                                },
								
								
							},

 							

 						]
		}
						
						
                                    
                                    );
                                   
			}
    function user_function(guid){
     var items=$('#name_'+guid).val();
    <?asp if($this->session->userdata['items_per']['delete']==1){ ?>
             bootbox.confirm("Are you Sure To Delete This Items ("+items+")", function(result) {
             if(result){
            $.ajax({
                url: '<?asp echo base_url() ?>/index.asp/items/delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                          bootbox.alert('User '+items+' Is Deleted');
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        

                        }
    }); <?asp }else{?>
           bootbox.alert("<?asp echo $this->lang->line('You Have NO permission To Delete This Records') ?>");
   <?asp }
?>
                        }
            function posnic_deactive(guid){
                 var items=$('#name_'+guid).val();
                $.ajax({
                url: '<?asp echo base_url() ?>index.asp/items/deactive',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl(items+' <?asp echo $this->lang->line('isdeactivated');?>', { type: "danger" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
            function posnic_active(guid){
              var items=$('#name_'+guid).val();
                           $.ajax({
                url: '<?asp echo base_url() ?>index.asp/items/active',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                         $.bootstrapGrowl(items+' <?asp echo $this->lang->line('isactivated');?>', { type: "success" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }
                }
            });
            }
           function edit_function(guid){
                       $("#parsley_reg").trigger('reset');
                         $('#add_item_form').hide('hide');      
                          $('#edit_item_form').show('slow');
                        <?asp if($this->session->userdata['items_per']['edit']==1){ ?>
                            $.ajax({                                      
                             url: "<?asp echo base_url() ?>index.asp/items/edit_items/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 $("#user_list").hide();
                                 $('#edit_item_form').show('slow');
                                 $('#delete').attr("disabled", "disabled");
                                 $('#posnic_add_items').attr("disabled", "disabled");
                                 $('#active').attr("disabled", "disabled");
                                 $('#deactive').attr("disabled", "disabled");
                                 $('#items_lists').removeAttr("disabled");
                                 $('#parsley_reg #guid').val(data[0]['guid']);
                                 $('#parsley_reg #name').val(data[0]['name']);
                                 $('#parsley_reg #sku').val(data[0]['code']);
                                 $('#parsley_reg #barcode').val(data[0]['barcode']);
                                 $('#parsley_reg #description').val(data[0]['description']);
                                 $('#parsley_reg #cost').val(data[0]['cost_price']);
                                 $('#parsley_reg #selling_price').val(data[0]['selling_price']);
                                 $('#parsley_reg #mrp').val(data[0]['mrp']);
                                 $('#parsley_reg #discount_per').val(data[0]['discount_amount']);
                                 $('#parsley_reg #starting_date').val(data[0]['start_date']);
                                 $('#parsley_reg #ending_date').val(data[0]['end_date']);
                                 $('#parsley_reg #tax_Inclusive').val(data[0]['tax_Inclusive']);
                                 $('#parsley_reg #location').val(data[0]['location']);
                                 $('#parsley_reg #category').val(data[0]['category_id']);
                                 $('#parsley_reg #unit_of_mes').val(data[0]['uom']);
                                 $('#parsley_reg #no_of_unit').val(data[0]['no_of_unit']);
                                 $('#parsley_reg .fileupload-preview').empty();
                               $('#parsley_reg .fileupload-preview').append('<img src="<?asp echo base_url('uploads/items') ?>/'+data[0]['image']+'">');
    $("#parsley_reg .fileupload-preview").css('display' ,'block')  ;                       
    $("#parsley_reg .fileupload-new").css('display' ,'inline')                         ;
    if(data[0]['uom']==0){
                                     change_orm_to_unit_update();
                                 }
                                 //$('#parsley_reg #search_category').val(data[0]['c_guid']);
                                
                                $("#parsley_reg #search_category").select2('data', {id:data[0]['c_guid'],text: data[0]['c_name']});
                                $('#parsley_reg #category').val(data[0]['c_guid']);
                                
                                $("#parsley_reg #search_brand").select2('data', {id:data[0]['b_guid'],text: data[0]['b_name']});
                                $('#parsley_reg #brand').val(data[0]['b_guid']);
                                
                                $("#parsley_reg #search_department").select2('data', {id:data[0]['d_guid'],text: data[0]['department_name']});
                                $('#parsley_reg #item_department').val(data[0]['d_guid']);
                                
                                $("#parsley_reg #search_supplier").select2('data', {id:data[0]['supplier_id'],text: data[0]['company_name'],first: data[0]['s_first_name'],phone: data[0]['s_phone'],email: data[0]['s_email']});
                                $('#parsley_reg #supplier').val(data[0]['s_guid']);
                                
                                $("#parsley_reg #search_taxes_area").select2('data', {id:data[0]['tax_area_id'],text: data[0]['area_name']});
                                $('#parsley_reg #taxes_area').val(data[0]['tax_area_id']);
                                
                                $("#parsley_reg #search_taxes").select2('data', {id:data[0]['tax_id'],text: data[0]['type'],value:data[0]['value']});
                                $('#parsley_reg #taxes').val(data[0]['tax_id']);
                                
//                                 $('#parsley_reg #tax_Inclusive').val(data[0]['tax_Inclusive']);
//                                 $('#parsley_reg #tax_Inclusive').val(data[0]['tax_Inclusive']);
                                 
                               
                             } 
                           });
                         
                        
                              
                         
                        <?asp }else{?>
                                bootbox.alert("<?asp echo $this->lang->line('You Have NO permission To Edit This Records') ?>");
                        <?asp }?>
                       }
           function add_image_function(guid){
                       $("#add_image_form").trigger('reset');
                        <?asp if($this->session->userdata['items_per']['edit']==1){ ?>
                            $.ajax({                                      
                             url: "<?asp echo base_url() ?>index.asp/items/edit_items/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 $("#user_list").hide();
                                 $('#delete').attr("disabled", "disabled");
                                 $('#posnic_add_items').attr("disabled", "disabled");
                                 $('#active').attr("disabled", "disabled");
                                 $('#deactive').attr("disabled", "disabled");
                                 $('#add_items_image').show('slow');
                                 $('#items_lists').removeAttr("disabled");
                                 $('#add_image_form #guid').val(data[0]['guid']);
                                 $('#add_image_form #name').val(data[0]['name']);
                                 $('#add_image_form #sku').val(data[0]['code']);
                                  $('#add_image_form #preview_image #items_preview_image').remove();
                                  $('#add_image_form #preview_image #saved_image').remove();
                               if(data[0]['image']!=""){
                              $('#add_image_form #preview_image').append('<label id="saved_image"><?asp echo $this->lang->line('saved_image') ?></label><img id="items_preview_image" style="width:90%;height:90%" src="<?asp echo base_url('uploads/items') ?>/'+data[0]['image']+'"></img>');
                               }
                                 
                               
                             } 
                           });
                         
                        
                              
                         
                        <?asp }else{?>
                                bootbox.alert("<?asp echo $this->lang->line('You Have NO permission To Edit This Records') ?>");
                        <?asp }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?asp echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>

        <script type="text/javascript" src="<?asp echo base_url('template/form_post/jquery.form.js') ?>"></script>
  