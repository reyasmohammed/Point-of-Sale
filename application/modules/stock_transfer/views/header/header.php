
<script type="text/javascript" charset="utf-8">
    var point=3; 
          $(document).ready( function () {
              //$(document).fullScreen(true);
        	 refresh_items_table();
                 $('#selected_item_table .dataTables_empty').html('<?php echo $this->lang->line('please_select').' '.$this->lang->line('items')." ".$this->lang->line('for')." ".$this->lang->line('stock_transfer') ?>');
                     $('#add_new_order').hide();
                              posnic_table();
                                
                                parsley_reg.onsubmit=function()
                                { 
                                  return false;
                                } 
                         
                        } );
                function refresh_items_table(){
                    $('#selected_item_table').dataTable().fnClearTable();
                     if($('#selected_item_table').length) {
                   
                $('#selected_item_table').dataTable({
                     "bProcessing": true,
                                      "bDestroy": true ,
				    
                    "sPaginationType": "bootstrap_full",
                    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
                $("#index", nRow).val(iDisplayIndex +1);
               return nRow;
            },
                });
            }
              $('#selected_item_table .dataTables_empty').html('<?php echo $this->lang->line('please_select').' '.$this->lang->line('items')." ".$this->lang->line('for')." ".$this->lang->line('stock_transfer') ?>');
                }        
           function posnic_table(){
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/stock_transfer/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                    if(oObj.aData[7]==1){
                                                                        return "<input type=checkbox value='"+oObj.aData[0]+"' disabled='disabled' ><input type='hidden' id='order__number_"+oObj.aData[0]+"' value='"+oObj.aData[1]+"'>";
                                                                    }else{
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' ><input type='hidden' id='order__number_"+oObj.aData[0]+"' value='"+oObj.aData[1]+"'>";
                                                                    }
								},
								
								
							},
        
        null, , null,  null, 

 							{	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							if(oObj.aData[7]==1){
                                                                             return '<span data-toggle="tooltip" class="text-success" ><?php echo $this->lang->line('approved') ?></span>'
                                                                        }else{
                                                                            return '<span data-toggle="tooltip"  class=" text-warning" ><?php echo $this->lang->line('waiting') ?></span>';
                                                                        }
								},
								
								
							},
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                if(oObj.aData[7]==1){
                                                                         	 return '<a  ><span data-toggle="tooltip" class="label label-success hint--top hint--success"  ><i class="icon-play"></i></span></a>&nbsp<a  ><span data-toggle="tooltip" class="label label-info hint--top hint--info" ><i class="icon-edit"></i></span></a>'+"&nbsp;<a><span data-toggle='tooltip' class='label label-danger hint--top hint--error' ><i class='icon-trash'></i></span> </a>"
								}else{
                                                                        return '<a href=javascript:stock_transfer_approve("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-success hint--top hint--success" data-hint="<?php echo $this->lang->line('approve') ?>"><i class="icon-play"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php echo $this->lang->line('delete') ?>'><i class='icon-trash'></i></span> </a>";
                                                                }
                                                                },
								
								
							},

 							

 						]
		}
						
						
                                    
                                    );
                                   
			}

           function posnic_item_table(guid){
           var supplier=$('#edit_brand_form #supplier_guid').val();
           if($('#edit_brand_form #supplier_guid').val()==""){
               supplier=guid;
           }
           
         		 if($('#selected_item_table').length) {
                $('#selected_item_table').dataTable({
                    "sPaginationType": "bootstrap_full"
                });
            }	
                                   
			}
 function user_function(guid){
    <?php if($this->session->userdata['stock_transfer_per']['delete']==1){ ?>
             bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete')." ".$this->lang->line('items') ?> "+$('#order__number_'+guid).val(), function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>/index.php/stock_transfer/delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                 complete: function(response) {
                    if(response['responseText']=='TRUE'){
                           $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('stock_transfer') ?>  <?php echo $this->lang->line('deleted');?>', { type: "error" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }else{
                         $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('approve')." ".$this->lang->line('stock_transfer');?>', { type: "error" });                       
                    }
                    }
            });
        

                        }
    }); <?php }else{?>
           $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('stock_transfer');?>', { type: "error" });                       
   <?php }
?>
                        }
           
          
        
function stock_transfer_approve(guid){
        <?php if($this->session->userdata['stock_transfer_per']['approve']==1){ ?>
            $.ajax({
                url: '<?php echo base_url() ?>index.php/stock_transfer/stock_transfer_approve',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                complete: function(response) {
                    if(response['responseText']=='TRUE'){
                           $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('stock_transfer') ?>  <?php echo $this->lang->line('approved');?>', { type: "success" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }else if(response['responseText']=='Approved'){
                         $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('is') ?>   <?php echo $this->lang->line('already');?> <?php echo $this->lang->line('approved');?>', { type: "warning" });
                    }else{
                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('approve')." ".$this->lang->line('stock_transfer');?>', { type: "error" });                              
                    }
                    }
            });
            <?php }else{?>
                        $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('approve')." ".$this->lang->line('stock_transfer');?>', { type: "error" });                       
                <?php }
             ?>
}
          
           function edit_function(guid){
           
        
                        <?php if($this->session->userdata['stock_transfer_per']['edit']==1){ ?>
                                
                            $('#deleted').remove();
                            $('#parent_items').append('<div id="deleted"></div>');
                            $('#newly_added').remove();
                            $('#parent_items').append('<div id="newly_added"></div>');
                            refresh_items_table();
                            $('#update_button').show();
                            $('#save_button').hide();
                            $('#update_clear').show();
                            $('#save_clear').hide();
                            $('#loading').modal('show');
                            $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/stock_transfer/get_stock_transfer/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             { 
                                $("#user_list").hide();
                                $('#add_new_order').show('slow');
                                $('#delete').attr("disabled", "disabled");
                                $('#posnic_add_stock_transfer').attr("disabled", "disabled");
                                $('#active').attr("disabled", "disabled");
                                $('#deactive').attr("disabled", "disabled");
                                $('#stock_transfer_lists').removeAttr("disabled");
                                $('#loading').modal('hide');
                                $("#parsley_reg").trigger('reset');
                           
                                $("#parsley_reg #select_branch").select2('data', {id:data[0]['destination'],text: data[0]['store_name']});
                                $("#parsley_reg #destination_branch").val(data[0]['destination']);
                                $("#parsley_reg #branch_name").val(data[0]['store_name']);
                                $("#parsley_reg #select_branch").select2('disable');
                                $("#parsley_reg #stock_transfer_guid").val(guid);
                                $("#parsley_reg #demo_order_number").val(data[0]['code']);
                                $("#parsley_reg #order_number").val(data[0]['po_no']);
                                $("#parsley_reg #order_date").val(data[0]['date']);
                                
                                $("#parsley_reg #note").val(data[0]['note']);
                                $("#parsley_reg #remark").val(data[0]['remark']);
                                
                                $("#parsley_reg #demo_total_amount").val(data[0]['total_amount']);
                                $("#parsley_reg #total_amount").val(data[0]['total_amount']);
                                
                                  var num = parseFloat($('#demo_total_amount').val());
                                  $('#demo_total_amount').val(num.toFixed(point));
                                  
                                  var num = parseFloat($('#total_amount').val());
                                  $('#total_amount').val(num.toFixed(point));
                                  
                                  
                                $("#parsley_reg #supplier_guid").val(data[0]['s_guid']);
                                var tax;
                                for(i=0;i<data.length;i++){
                                      if(!$('#'+data[i]['o_i_guid']).length){
                                  
                                    var  name=data[i]['items_name'];
                                    var  sku=data[i]['i_code'];
                                    var  quty=data[i]['quty'];
                                    var  limit=data[i]['item_limit'];
                                    var  tax_type=data[i]['tax_type_name'];
                                    var  tax_value=data[i]['tax_value'];
                                    var  tax_Inclusive=data[i]['tax_Inclusive'];
                                   
                                    var  cost=data[i]['cost'];
                                    var  price=data[i]['sell'];
                                    var  o_i_guid=data[i]['o_i_guid'];
                                    var  items_id=data[i]['item'];
                                  
                                   if(data[i]['tax_Inclusive']==1){
                                     var tax=data[i]['order_tax'];
                                    
                                      var total=+tax+ +(parseFloat(quty)*parseFloat(cost));
                                      var type='Exc';
                                      var num = parseFloat(total);
                                      total=num.toFixed(point);
                                  }else{
                                      var type="Inc";
                                  
                                      var tax=data[i]['order_tax'];
                                      var total=(parseFloat(quty)*parseFloat(cost));
                                      var num = parseFloat(total);
                                      total=num.toFixed(point);
                                  }
                                    var addId = $('#selected_item_table').dataTable().fnAddData( [
                                    null,
                                    name,
                                    sku,
                                    quty,
                                    cost,
                                    price,
                                    tax+' : '+tax_type+'('+type+')',
                                    data[i]['s_name'],
                                   
                                    total,
                                    '<input type="hidden" name="index" id="index"><input type="hidden" id="'+o_i_guid+'">\n\
                                <input type="hidden" name="item_name" id="row_item_name" value="'+name+'">\n\
                                <input type="hidden" name="item_limit" id="item_limit" value="'+limit+'">\n\
                                <input type="hidden" name="items_id[]" id="items_id" value="'+items_id+'">\n\
                                <input type="hidden" name="items_sku[]" value="'+sku+'" id="items_sku">\n\
                                <input type="hidden" name="items_supplier[]" value="'+data[i]['s_guid']+'" id="items_supplier">\n\
                                <input type="hidden" name="items_stock[]" value="'+data[i]['stock_id']+'" id="items_stock">\n\
                                <input type="hidden" name="items_supplier_name[]" value="'+data[i]['s_name']+'" id="items_supplier_name">\n\
                                <input type="hidden" name="items_order_guid[]" value="'+o_i_guid+'" id="items_order_guid">\n\
                                <input type="hidden" name="items_quty[]" value="'+quty+'" id="items_quty"> \n\
                                <input type="hidden" name="items_cost[]" value="'+cost+'" id="items_cost"> \n\
                                <input type="hidden" name="items_price[]" value="'+price+'" id="items_price">\n\
                                <input type="hidden" name="items_tax[]" value="'+tax+'" id="items_tax">\n\
                                <input type="hidden" name="items_tax_type[]" value="'+tax_type+'" id="items_tax_type">\n\
                                <input type="hidden" name="items_tax_value[]" value="'+tax_value+'" id="items_tax_value">\n\
                                <input type="hidden" name="items_tax_inclusive[]" value="'+tax_Inclusive+'" id="items_tax_inclusive">\n\
                                <input type="hidden" name="items_total[]"  value="'+total+'" id="items_total">\n\
                                <a href=javascript:edit_order_item("'+items_id+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php echo $this->lang->line('edit')?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:delete_order_item('"+items_id+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php echo $this->lang->line('delete')?>'><i class='icon-trash'></i></span> </a>" ] );

                              var theNode = $('#selected_item_table').dataTable().fnSettings().aoData[addId[0]].nTr;
                              theNode.setAttribute('id','new_item_row_id_'+items_id)
                                }
                                }
                             } 
                           });
                      
                        
                         
                        <?php }else{?>
                                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('stock_transfer');?>', { type: "error" });                       
                        <?php }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>

            
              


  