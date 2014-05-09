
<script type="text/javascript" charset="utf-8">
    var point=3;
          $(document).ready( function () {
              
        	 refresh_items_table();
                 $('#selected_item_table .dataTables_empty').html('<?php echo $this->lang->line('please_select').' '.$this->lang->line('items')." ".$this->lang->line('for')." ".$this->lang->line('sales_delivery_note') ?>');
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
              $('#selected_item_table .dataTables_empty').html('<?php echo $this->lang->line('please_select').' '.$this->lang->line('sales_order')." ".$this->lang->line('for')." ".$this->lang->line('sales_delivery_note') ?>');
                }        
           function posnic_table(){
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/sales_delivery_note/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                    if(oObj.aData[10]==1){
                                                                        return "<input type=checkbox disabled='disabled' value='"+oObj.aData[0]+"' ><input type='hidden' id='order__number_"+oObj.aData[0]+"' value='"+oObj.aData[1]+"'>";
                                                                         }else{
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' ><input type='hidden' id='order__number_"+oObj.aData[0]+"' value='"+oObj.aData[1]+"'><input type='hidden' id='sales_order__number_"+oObj.aData[0]+"' value='"+oObj.aData[11]+"'>";
                                                                    }
                                                                },
								
								
							},
        
        null, null, null, null, {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							//if(oObj.aData[8]==0)
                                                                      return   oObj.aData[6];
								},
								
								
							}

, null,  null, 

 							{	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							if(oObj.aData[10]==1){
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
                                                                if(oObj.aData[10]==1){
                                                                        //return '<a ><span data-toggle="tooltip" class="label label-success hint--top hint--success" data-hint="<?php echo $this->lang->line('approved') ?>"><i class="icon-play"></i></span></a>&nbsp<a   ><span data-toggle="tooltip" class="label label-info hint--top hint--success" data-hint="<?php echo $this->lang->line('approved') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a  ><span data-toggle='tooltip' class='label label-danger hint--top hint--success' data-hint='<?php echo $this->lang->line('approved') ?>'><i class='icon-trash'></i></span> </a>";
                                                                       return '<a  ><span data-toggle="tooltip" class="label label-success hint--top hint--success"  ><i class="icon-play"></i></span></a>&nbsp<a  ><span data-toggle="tooltip" class="label label-info hint--top hint--info" ><i class="icon-edit"></i></span></a>'+"&nbsp;<a><span data-toggle='tooltip' class='label label-danger hint--top hint--error' ><i class='icon-trash'></i></span> </a>"
								}else{
                                                                        return '<a href=javascript:sdn_approve("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-success hint--top hint--success" data-hint="<?php echo $this->lang->line('approve') ?>"><i class="icon-play"></i></span></a>&nbsp<a href=javascript:edit_function("'+oObj.aData[0]+'")  ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php echo $this->lang->line('delete') ?>'><i class='icon-trash'></i></span> </a>";
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
    <?php if($this->session->userdata['sales_delivery_note_per']['delete']==1){ ?>
             bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete')." ".$this->lang->line('sales_delivery_note') ?> "+$('#order__number_'+guid).val(), function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>/index.php/sales_delivery_note/delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
               complete: function(response) {
                    if(response['responseText']=='TRUE'){
                           $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('sales_delivery_note') ?>  <?php echo $this->lang->line('deleted');?>', { type: "error" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }else if(response['responseText']=='Approved'){
                         $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('is') ?>  <?php echo $this->lang->line('is');?> <?php echo $this->lang->line('already');?> <?php echo $this->lang->line('approved');?>', { type: "warning" });
                    }else{
                         $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('approve')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                       
                    }
                    }
            });
        

                        }
    }); <?php }else{?>
           $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                       
   <?php }
?>
                        }
        function sdn_approve(guid){
            var po=$('#sales_order__number_'+guid).val();
            <?php if($this->session->userdata['sales_delivery_note_per']['approve']==1){ ?>
                $.ajax({
                url: '<?php echo base_url() ?>index.php/sales_delivery_note/sdn_approve',
                type: "POST",
                data: {
                    guid: guid,
                    so:po
                    
                },
                  complete: function(response) {
                     if(response['responseText']=='TRUE'){
                         $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('approved');?>', { type: "success" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }else if(response['responseText']=='approve'){
                         $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('is')." ".$this->lang->line('already')." ".$this->lang->line('approved');?>', { type: "warning" });
                    }else if(response['responseText']=='Noop'){
                           $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('approve')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                       
                    }
                }
            });
             <?php }else{?>
                         $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('approve')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                       
                <?php }?>
               }
        
          
        
       
        function edit_function(guid){
                        <?php if($this->session->userdata['sales_delivery_note_per']['edit']==1){ ?>
                                
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
                             url: "<?php echo base_url() ?>index.php/sales_delivery_note/get_sales_delivery_note/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             { 
                                $("#user_list").hide();
                                $('#add_new_order').show('slow');
                                $('#delete').attr("disabled", "disabled");
                                $('#posnic_add_sales_delivery_note').attr("disabled", "disabled");
                                $('#active').attr("disabled", "disabled");
                                $('#deactive').attr("disabled", "disabled");
                                $('#sales_delivery_note_lists').removeAttr("disabled");
                               
                             
                                $("#parsley_reg #first_name").val(data[0]['s_name']);
                                $("#parsley_reg #company").val(data[0]['c_name']);
                                $("#parsley_reg #address").val(data[0]['address']);
                                $("#parsley_reg #guid").val(guid);
                                $("#parsley_reg #sales_delivery_note_guid").val(data[0]['guid']);
                                $("#parsley_reg #edit_dn_node").val(data[0]['code']);
                                $("#parsley_reg #demo_dn_no").val(data[0]['sales_delivery_note_no']);
                                $("#parsley_reg #delivery_date").val(data[0]['sales_delivery_note_date']);
                                $("#parsley_reg #note").val(data[0]['grn_note']);
                                $("#parsley_reg #remark").val(data[0]['grn_remark']);
                                   $("#parsley_reg #demo_customer_discount").val(data[0]['sdn_customer_discount']);
                                $("#parsley_reg #customer_discount").val(data[0]['sdn_customer_discount']);
                                $("#parsley_reg #demo_customer_discount_amount").val(data[0]['sdn_customer_discount_amount']);
                                $("#parsley_reg #customer_discount_amount").val(data[0]['sdn_customer_discount_amount']);
                               // $("#parsley_reg #demo_order_number").select2('data', {id:'',text: data[0]['po_no']});
                                $(".supplier_select_2").hide();
                                $(".porchase_order_for_grn").show();
                                $("#edit_grn_node").val(data[0]['po_no']);
                                
                                $("#parsley_reg #id_discount").val(data[0]['discount']);
                              
                                $("#parsley_reg #discount_amount").val(data[0]['discount_amt']);
                                $("#parsley_reg #freight").val(data[0]['freight']);
                                $("#parsley_reg #round_off_amount").val(data[0]['round_amt']);
                         
                                  
                                $("#parsley_reg #supplier_guid").val(data[0]['s_guid']);
                                $("#parsley_reg #grn_guid").val(guid);
                                var tax;
                                var receive=0;
                                var total_tax=0;
                                var total_discount=0;
                                for(i=0;i<data.length;i++){
                               
                                      receive=1;
                                    var  name=data[i]['items_name'];
                                    var  sku=data[i]['i_code'];
                                    var  quty=parseFloat(data[i]['quty']);
                                    var  tax_type=data[i]['tax_type_name'];
                                    var  tax_value=data[i]['tax_value'];
                                    var  tax_Inclusive=data[i]['tax_Inclusive'];
                                  
                                    var  received_quty=data[i]['delivered_quty'];
                                     var  price=data[i]['price'];
                                    var uom=data[i]['uom']
                                    
                                    if(uom==1){
                                        var no_of_unit=data[i]['no_of_unit'];
                                        price=price/no_of_unit;
                                    }
                                    var  o_i_guid=data[i]['o_i_guid'];
                                    var  items_id=data[i]['item'];
                                    var discount;
                                    var per;
                                    if(data[i]['dis_per']!=0){
                                     discount=(parseFloat(quty)*parseFloat(price))*(data[i]['dis_per']/100);
                                     per=data[i]['dis_per'];
                                     var num = parseFloat(discount);
                                      discount=num.toFixed(point);
                                    }else{
                                     discount=0;
                                    
                                     per="";
                                  
                                    }
                                    
                                    if(data[i]['tax_Inclusive']==1){
                                        var tax=parseFloat(data[i]['tax_value']);                                    
                                        var tax_amount=(parseFloat(received_quty)*parseFloat(price)*tax)/100;
                                        var type='Exc';
                                        total_tax=parseFloat(total_tax)+parseFloat(tax_amount);
                                         var total=((parseFloat(received_quty)*parseFloat(price)))-parseFloat(discount)+parseFloat(tax_amount);
                                        var num = parseFloat(total);
                                        total=num.toFixed(point);
                                    }else{
                                        var type="Inc";
                                        var tax=parseFloat(data[i]['tax_value']);
                                        var tax_amount=(parseFloat(received_quty)*parseFloat(price)*tax)/100;
                                        var total=(parseFloat(received_quty)*parseFloat(price))-discount;
                                        var num = parseFloat(total);
                                        total=num.toFixed(point);
                                  }
                                  var num = parseFloat(tax_amount);
                                      tax_amount=num.toFixed(point);
                                    var num = parseFloat(discount);
                                      discount=num.toFixed(point);
                                    var num = parseFloat(price);
                                      price=num.toFixed(point);
                                  total_discount=parseFloat(total_discount)+parseFloat(discount);
                                 var grn_received_quty=parseFloat(quty)-parseFloat(received_quty);
                             
                                       var addId = $('#selected_item_table').dataTable().fnAddData( [
                                    null,
                                    name,
                                    sku,
                                    quty,
                                  price,
                                 
                                 type+'('+tax+'%): '+tax_amount,
                                  discount,
                                   "<input type='hidden' id='item_total_"+i+"' value='"+total+"'><input type='hidden' id='item_quty_"+i+"' value='"+quty+"'><input type='hidden' id='tax_inclusive_"+i+"' value='"+data[i]['tax_Inclusive']+"' ><input type='hidden' id='tax_value_"+i+"' value='"+data[i]['tax_value']+"' ><input type='hidden' id='discount_per_"+i+"' value='"+per+"' ><input type='hidden' name='items[]' value='"+data[i]['item']+"' ><input type='hidden' id='item_price_"+i+"' value='"+price+"' ><input type='text' id='delivered_item_quty"+i+"' value='"+received_quty+"' name='delivered_quty[]' onkeyup='delivered_quty_items("+i+")' onKeyPress='delivered_quty(event,"+i+");return numbersonly(event)' class='form-control' style='width:100px'>",
                                 total
                                 ] );

                              var theNode = $('#selected_item_table').dataTable().fnSettings().aoData[addId[0]].nTr;
                              theNode.setAttribute('id','new_item_row_id_'+i)
                                
                                }
                                  $('#total_item_discount_amount').val(total_discount);
                                  $('#total_tax').val(total_tax);
                                    total_amount();
                                     $("#parsley_reg #id_discount").val(data[0]['discount']);
                                     $("#parsley_reg #discount_amount").val(data[0]['discount_amt']);
                                     $("#parsley_reg #note").val(data[0]['sales_delivery_note_note']);
                                     $("#parsley_reg #remark").val(data[0]['sales_delivery_note_remark']);
                             } 
                           });
                  
                          window.setTimeout(function ()
                    {
                       //$('#parsley_reg #delivery_date').focus();
                       document.getElementById('delivery_date').focus();
                       $('#loading').modal('hide');
                    }, 0); 
                         
                        <?php }else{?>
                                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                       
                        <?php }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>

            
              


  