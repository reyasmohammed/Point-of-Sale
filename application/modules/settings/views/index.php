<style type="text/css">
    .my_select{
         -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #FFFFFF;
    border-color: #C0C0C0 #D9D9D9 #D9D9D9;
    border-image: none;
    border-radius: 1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-style: solid;
    border-width: 1px;
    box-shadow: none;
    font-size: 13px;
  
    line-height: 1.4;
    padding:1px 1px 1px 3px;
    transition: none 0s ease 0s;
    }
 
</style>	
<script type="text/javascript">
     $(document).ready( function () {
         $('#add_new_setting').click(function() { 
              if($('#parsley_reg').valid()){
                var inputs = $('#parsley_reg').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/settings/save_settings')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                 if(response['responseText']=='TRUE'){
                                       $.bootstrapGrowl('<?php echo $this->lang->line('settings').' '.$this->lang->line('saved');?>', { type: "success" });          
                                 }else {
                                      $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                            
                                 }
                                 
                       }
                });
                }else{
                $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                }
        });
       
     });



</script>

<nav id="mobile_navigation"></nav>
     
<section id="add_setting_form" class="container clearfix main_section">
     <?php   $form =array('id'=>'parsley_reg',
                          'runat'=>'server',
                          'class'=>'form-horizontal');
       echo form_open_multipart('settings/add_pos_settings_details/',$form);?>
        <div id="main_content_outer" class="clearfix">
           <div id="main_content">
                 <div class="row">
                     <div class="col-lg-1"></div>
                     <div class="col-lg-10">
                          <div class="panel panel-default">
                               <div class="panel-heading">
                                     <h4 class="panel-title"><?php echo $this->lang->line('settings') ?></h4>   
                                   
                               </div>
                              <br>
                              <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row" style="margin-left: 10px;margin-right: 10px">
                                              
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="purchase_order" class="req"><?php echo $this->lang->line('purchase_order') ?></label>                                                                                                       
                                                           <?php $purchase_order=array('name'=>'purchase_order',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'purchase_order',
                                                                                    'value'=>set_value('purchase_order'));
                                                           echo form_input($purchase_order)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="grn" class="req"><?php echo $this->lang->line('grn') ?></label>                                                                                                       
                                                           <?php $grn=array('name'=>'grn',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'grn',
                                                                                    'value'=>set_value('grn'));
                                                           echo form_input($grn)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="direct_grn" class="req"><?php echo $this->lang->line('direct_grn') ?></label>                                                                                                       
                                                           <?php $direct_grn=array('name'=>'direct_grn',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'direct_grn',
                                                                                    'value'=>set_value('direct_grn'));
                                                           echo form_input($direct_grn)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="purchase_invoice" class="req"><?php echo $this->lang->line('purchase_invoice') ?></label>                                                                                                       
                                                           <?php $purchase_invoice=array('name'=>'purchase_invoice',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'purchase_invoice',
                                                                                    'value'=>set_value('purchase_invoice'));
                                                           echo form_input($purchase_invoice)?> 
                                                    </div>
                                                   </div>
                                               
                                               </div>
                                        </div>                              
                              </div>
                              <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row" style="margin-left: 10px;margin-right: 10px">
                                              
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="direct_invoice" class="req"><?php echo $this->lang->line('direct_invoice') ?></label>                                                                                                       
                                                           <?php $direct_invoice=array('name'=>'direct_invoice',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'direct_invoice',
                                                                                    'value'=>set_value('direct_invoice'));
                                                           echo form_input($direct_invoice)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="purchase_return" class="req"><?php echo $this->lang->line('purchase_return') ?></label>                                                                                                       
                                                           <?php $purchase_return=array('name'=>'purchase_return',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'purchase_return',
                                                                                    'value'=>set_value('purchase_return'));
                                                           echo form_input($purchase_return)?> 
                                                    </div>
                                                   </div>
                                             
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="sales" class="req"><?php echo $this->lang->line('sales') ?></label>                                                                                                       
                                                           <?php $sales=array('name'=>'sales',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'sales',
                                                                                    'value'=>set_value('sales'));
                                                           echo form_input($sales)?> 
                                                    </div>
                                                   </div>
                                                 <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="sales_quotation" class="req"><?php echo $this->lang->line('sales_quotation') ?></label>                                                                                                       
                                                           <?php $sales_quotation=array('name'=>'sales_quotation',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'sales_quotation',
                                                                                    'value'=>set_value('sales_quotation'));
                                                           echo form_input($sales_quotation)?> 
                                                    </div>
                                                   </div>
                                               
                                               
                                               </div>
                                        </div>                              
                              </div>
                              <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row" style="margin-left: 10px;margin-right: 10px">
                                              <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="sales_order" class="req"><?php echo $this->lang->line('sales_order') ?></label>                                                                                                       
                                                           <?php $sales_order=array('name'=>'sales_order',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'sales_order',
                                                                                    'value'=>set_value('sales_order'));
                                                           echo form_input($sales_order)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="sales_delivery_note" class="req"><?php echo $this->lang->line('sales_delivery_note') ?></label>                                                                                                       
                                                           <?php $sales_delivery_note=array('name'=>'sales_delivery_note',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'sales_delivery_note',
                                                                                    'value'=>set_value('sales_delivery_note'));
                                                           echo form_input($sales_delivery_note)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="direct_sales_delivery" class="req"><?php echo $this->lang->line('direct_sales_delivery') ?></label>                                                                                                       
                                                           <?php $direct_sales_delivery=array('name'=>'direct_sales_delivery',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'direct_sales_delivery',
                                                                                    'value'=>set_value('direct_sales_delivery'));
                                                           echo form_input($direct_sales_delivery)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="direct_sales" class="req"><?php echo $this->lang->line('direct_sales') ?></label>                                                                                                       
                                                           <?php $direct_sales=array('name'=>'direct_sales',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'direct_sales',
                                                                                    'value'=>set_value('direct_sales'));
                                                           echo form_input($direct_sales)?> 
                                                    </div>
                                                   </div>
                                               
                                               
                                               </div>
                                        </div>                              
                              </div>
                              <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row" style="margin-left: 10px;margin-right: 10px">
                                              <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="sales_bill" class="req"><?php echo $this->lang->line('sales_bill') ?></label>                                                                                                       
                                                           <?php $sales_bill=array('name'=>'sales_bill',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'sales_bill',
                                                                                    'value'=>set_value('sales_bill'));
                                                           echo form_input($sales_bill)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="sales_return" class="req"><?php echo $this->lang->line('sales_return') ?></label>                                                                                                       
                                                           <?php $sales_return=array('name'=>'sales_return',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'sales_return',
                                                                                    'value'=>set_value('sales_return'));
                                                           echo form_input($sales_return)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="supplier_payment" class="req"><?php echo $this->lang->line('supplier_payment') ?></label>                                                                                                       
                                                           <?php $supplier_payment=array('name'=>'supplier_payment',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'supplier_payment',
                                                                                    'value'=>set_value('supplier_payment'));
                                                           echo form_input($supplier_payment)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="customer_payment" class="req"><?php echo $this->lang->line('customer_payment') ?></label>                                                                                                       
                                                           <?php $customer_payment=array('name'=>'customer_payment',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'customer_payment',
                                                                                    'value'=>set_value('customer_payment'));
                                                           echo form_input($customer_payment)?> 
                                                    </div>
                                                   </div>
                                               
                                               
                                               </div>
                                        </div>                              
                              </div>
                              <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row" style="margin-left: 10px;margin-right: 10px">
                                              <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="opening_stock" class="req"><?php echo $this->lang->line('opening_stock') ?></label>                                                                                                       
                                                           <?php $opening_stock=array('name'=>'opening_stock',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'opening_stock',
                                                                                    'value'=>set_value('opening_stock'));
                                                           echo form_input($opening_stock)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="damage_stock" class="req"><?php echo $this->lang->line('damage_stock') ?></label>                                                                                                       
                                                           <?php $damage_stock=array('name'=>'damage_stock',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'damage_stock',
                                                                                    'value'=>set_value('damage_stock'));
                                                           echo form_input($damage_stock)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                         <label for="stock_transfer" class="req"><?php echo $this->lang->line('stock_transfer') ?></label>                                                                                                       
                                                           <?php $stock_transfer=array('name'=>'stock_transfer',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'stock_transfer',
                                                                                    'value'=>set_value('stock_transfer'));
                                                           echo form_input($stock_transfer)?> 
                                                    </div>
                                                   </div>
                                              
                                              
                                               
                                               
                                               </div>
                                        </div>                              
                              </div>
                              <br><br>
                          </div>
                     </div>
                </div>
                    <div class="row">
                                <div class="col-lg-4"></div>
                                  <div class="col col-lg-4 text-center"><br><br>
                                      <button id="add_new_setting"  type="submit" name="save" class="btn btn-default"><i class="icon icon-save"> </i> <?php echo $this->lang->line('save') ?></button>
                                      <a href="javascript:clear_add_settings()" name="clear" id="clear_user" class="btn btn-default"><i class="icon icon-list"> </i> <?php echo $this->lang->line('clear') ?></a>
                                  </div>
                              </div>
                </div>
          </div>
    <?php echo form_close();?>
</section>    
   
           <div id="footer_space">
              
           </div>
		</div>
	
                
        

      