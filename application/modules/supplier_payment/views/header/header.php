
<script type="text/javascript" charset="utf-8">
    var point=3;
      $(document).ready( function () {
            parsley_ext.onsubmit=function()
                                { 
                                  return false;
                                } 
       $('#credit_payment').hide();
       $('#credit_payament').hide();
       posnic_table();
   });
           function posnic_table(){
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/supplier_payment/data_table",
                                       aoColumns: [   
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                    if(oObj.aData[9]==1){
                                                                        return "<input type=checkbox value='"+oObj.aData[0]+"' disabled='disabled' ><input type='hidden' id='order__number_"+oObj.aData[0]+"' value='"+oObj.aData[1]+"'>";
                                                                    }else{
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' ><input type='hidden' id='order__number_"+oObj.aData[0]+"' value='"+oObj.aData[1]+"'>";
                                                                    }
								},
								
								
							},
        
        null, null, null,  null,  null,  null,  {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							//if(oObj.aData[8]==0)
                                                                      if(oObj.aData[9]!=""){
                                                                          return "<?php echo $this->lang->line('credit') ?>";
                                                                      }else{
                                                                          return "<?php echo $this->lang->line('debit') ?>";
                                                                      }
								},
								
								
							},

 						{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                                 if(oObj.aData[9]==""){
                                                                        return '<a href=javascript:edit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php echo $this->lang->line('delete') ?>'><i class='icon-trash'></i></span> </a>";
                                                                    }else{
                                                                          return '<a href=javascript:edit_credit_function("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="<?php echo $this->lang->line('edit') ?>"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='<?php echo $this->lang->line('delete') ?>'><i class='icon-trash'></i></span> </a>";
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
    <?php if($this->session->userdata['supplier_payment_per']['delete']==1){ ?>
             bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete')." ".$this->lang->line('supplier_payment') ?> "+$('#order__number_'+guid).val(), function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>/index.php/supplier_payment/delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
               complete: function(response) {
                    if(response['responseText']==1){
                           $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('supplier_payment') ?>  <?php echo $this->lang->line('deleted');?>', { type: "error" });
                        $("#dt_table_tools").dataTable().fnDraw();
                    }else{
                         $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('approve')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                       
                    }
                    }
            });
        

                        }
                }); <?php }else{?>
                       $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                       
               <?php }
            ?>
                        }
       
        
    
          
        function edit_function(guid){
                        <?php if($this->session->userdata['supplier_payment_per']['edit']==1){ ?>
                                
                            $("#parsley_reg").trigger('reset');
                            $('#parsley_reg #update_button').show();
                            $('#parsley_reg #save_button').hide();
                            $('#parsley_reg #update_clear').show();
                            $('#parsley_reg #save_clear').hide();
                            $('#loading').modal('show');
                            $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/supplier_payment/get_supplier_payment/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             { 
                                $("#user_list").hide();
                                $('#credit_payment').show('slow');
                               
                                
                                $('#delete').attr("disabled", "disabled");
                                $('#posnic_add_supplier_payment').attr("disabled", "disabled");
                                $('#posnic_supplier_credit_payment').attr("disabled", "disabled");
                                $('#active').attr("disabled", "disabled");
                                $('#deactive').attr("disabled", "disabled");
                                $('#supplier_payment_lists').removeAttr("disabled");
                               
                             
                                
                                $("#parsley_reg #payment_id").val(data[0]['guid']);
                                $("#parsley_reg #invoice").val(data[0]['invoice']);
                                $("#parsley_reg #company").val(data[0]['company']);
                                $("#parsley_reg #supplier").val(data[0]['name']);
                                $("#parsley_reg #demo_payment_code").val(data[0]['code']);
                                $("#parsley_reg #purchase_invoice").select2('data', {id:'',text: data[0]['invoice']});
                                 $("#parsley_reg #purchase_invoice").select2('disable');
                                $("#parsley_reg #payment_code").val(data[0]['code']);
                                $("#parsley_reg #payment_date").val(data[0]['payment_date']);
                                $("#parsley_reg #amount").val(data[0]['amount']);
                                $("#parsley_reg #memo").val(data[0]['memo']);
                                $("#parsley_reg #payment").val(data[0]['payable_id']);
                                var balance=data[0]['paid_amount']-data[0]['amount'];
                                $("#parsley_reg #balance_amount").val(data[0]['total']-balance);
                                $("#parsley_reg #balance").val(data[0]['total']-balance-data[0]['amount']);
                                $("#parsley_reg #total").val(data[0]['total']);
                                $("#parsley_reg #paid_amount").val(balance);
                                var num = parseFloat( $("#parsley_reg #balance_amount").val());
                                $("#parsley_reg #balance_amount").val(num.toFixed(point));
                                var num = parseFloat( $("#parsley_reg #balance").val());
                                $("#parsley_reg #balance").val(num.toFixed(point));
                                var num = parseFloat( $("#parsley_reg #paid_amount").val());
                                $("#parsley_reg #paid_amount").val(num.toFixed(point));
                             
                               
                             } 
                           });
                      
                          window.setTimeout(function ()
                    {
                       //$('#parsley_reg #delivery_date').focus();
                       document.getElementById('amount').focus();
                       $('#loading').modal('hide');
                    }, 0);
                         
                        <?php }else{?>
                                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                       
                        <?php }?>
                       }
        function edit_credit_function(guid){
                        <?php if($this->session->userdata['supplier_payment_per']['edit']==1){ ?>
                                
                            $("#parsley_ext").trigger('reset');
                            $('#parsley_ext #update_button').show();
                            $('#parsley_ext #save_button').hide();
                            $('#parsley_ext #update_clear').show();
                            $('#parsley_ext #save_clear').hide();
                            $('#loading').modal('show');
                            $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/supplier_payment/get_supplier_credit_payment/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             { 
                                $("#user_list").hide();
                                $('#credit_payament').show('slow');
                               
                                
                                $('#delete').attr("disabled", "disabled");
                                $('#posnic_add_supplier_payment').attr("disabled", "disabled");
                                $('#posnic_supplier_credit_payment').attr("disabled", "disabled");
                                $('#active').attr("disabled", "disabled");
                                $('#deactive').attr("disabled", "disabled");
                                $('#supplier_payment_lists').removeAttr("disabled");
                               
                             
                                
                             
                                 
                                $("#parsley_ext #payment_id").val(data[0]['guid']);
                                $("#parsley_ext #purchase_return_guid").val(data[0]['return_id']);
                                //$("#parsley_ext #invoice").val(data[0]['invoice']);
                                $("#parsley_ext #purchase_invoice").val(data[0]['invoice']);
                                $("#parsley_ext #supplier").val(data[0]['name']);
                                $("#parsley_ext #demo_payment_code").val(data[0]['code']);
                                $("#parsley_ext #purchase_return").select2('data', {id:'',text: data[0]['purchase_return_code']});
                                 $("#parsley_ext #purchase_return").select2('disable');
                                $("#parsley_ext #payment_code").val(data[0]['code']);
                                $("#parsley_ext #payment_date").val(data[0]['payment_date']);
                                $("#parsley_ext #amount").val(data[0]['amount']);
                                $("#parsley_ext #memo").val(data[0]['memo']);
                                $("#parsley_ext #payment").val(data[0]['payable_id']);
                                var balance=data[0]['paid_amount']-data[0]['amount'];
                                $("#parsley_ext #balance_amount").val(data[0]['total']-balance);
                                $("#parsley_ext #balance").val(data[0]['total']-balance-data[0]['amount']);
                                $("#parsley_ext #total").val(data[0]['total']);
                                $("#parsley_ext #paid_amount").val(balance);
                                var num = parseFloat( $("#parsley_ext #balance_amount").val());
                                $("#parsley_ext #balance_amount").val(num.toFixed(point));
                                var num = parseFloat( $("#parsley_ext #balance").val());
                                $("#parsley_ext #balance").val(num.toFixed(point));
                                var num = parseFloat( $("#parsley_ext #paid_amount").val());
                                $("#parsley_ext #paid_amount").val(num.toFixed(point));
                             
                               
                             
                               
                             } 
                           });
                      
                          window.setTimeout(function ()
                    {
                  
                       document.getElementById('amount').focus();
                       $('#loading').modal('hide');
                    }, 0);
                         
                        <?php }else{?>
                                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                       
                        <?php }?>
                       }
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>

            
              


  