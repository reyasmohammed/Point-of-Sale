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
  
   .supplier_select{
        width: 200px !important;
    }
   .item_select{
        width: 600px !important;
    }
    table tr td {
/*        width: 120px !important;*/
    }
    .form-control{
         height: 24px;
   
    padding: 0 8px;
    }
    .input-group-addon{
         height: 24px;
   
    padding: 0 8px;
    }
    .select2-container .select2-choice{
        height: 24px;
      line-height: 1.7;
    }
    #dt_table_tools  tr:last-child td {
  width: 100px !important;
}
.editable-address {
    display: block;
    margin-bottom: 5px;  
}

.editable-address span {
    width: 70px;  
    display: inline-block;
}
.editable-buttons {
    text-align: center;
}
.popover-title {
    
    text-align: center;
}
.popover-content {
    padding: 6px 24px !important;
    width: 277px!important;
}
.small_inputs input{
    font-size: 11px;
    padding: 0 1px !important;
}
</style>	
<script type="text/javascript">
    function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
          }
    }
    function invoice_payment(){
        var balance=parseFloat($('#parsley_reg #balance_amount').val());
        var amount=parseFloat($('#parsley_reg #amount').val());
          if(isNaN(balance)){
              balance=0;
          }
          if(isNaN(amount)){
              amount=0;
          }
          if(amount > balance){
              $('#parsley_reg #amount').val(balance);
          }
          $('#parsley_reg #balance').val(balance-$('#parsley_reg #amount').val());
    }
    function purchase_return_payment(){
        var balance=parseFloat($('#parsley_ext #balance_amount').val());
        var amount=parseFloat($('#parsley_ext #amount').val());
          if(isNaN(balance)){
              balance=0;
          }
          if(isNaN(amount)){
              amount=0;
          }
          if(amount > balance){
              $('#parsley_ext #amount').val(balance);
          }
          $('#parsley_ext #balance').val(balance-$('#parsley_ext #amount').val());
    }
    function change_focus(e){
         var unicode=e.charCode? e.charCode : e.keyCode
            if (unicode!=13 && unicode!=9){          
            }
            else{
                 
                   $('#parsley_reg #memo').focus();
            }
             if (unicode!=27){
            }
            else{  
                document.getElementById('payment_date').focus();
            }
    }
    function save_new_payment(){
         <?php if($this->session->userdata['supplier_payment_per']['add']==1){ ?>
                   if($('#parsley_reg').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                     
                var inputs = $('#parsley_reg').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/supplier_payment/save')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']==1){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('supplier_payment').' '.$this->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_supplier_payment_lists();
                                       
                                    }else  if(response['responseText']==10){
                                           $.bootstrapGrowl(' <?php echo $this->lang->line('invalid_payment_entry'); ?>', { type: "error" });                           
                                    }else  if(response['responseText']==0){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                           
                                    }
                       }
                });
                    
                    }else{
                   $.bootstrapGrowl('<?php echo $this->lang->line('please_enter')." ".$this->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?php }else{ ?>
                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier');?>', { type: "error" });                       
                    <?php }?>
    }
    function save_purchase_return(){
         <?php if($this->session->userdata['supplier_payment_per']['add']==1){ ?>
                   if($('#parsley_ext').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                     
                var inputs = $('#parsley_ext').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/supplier_payment/save_purchase_return_payment')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']==1){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('supplier_payment').' '.$this->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_supplier_payment_lists();
                                       
                                    }else  if(response['responseText']==10){
                                           $.bootstrapGrowl(' <?php echo $this->lang->line('invalid_payment_entry'); ?>', { type: "error" });                           
                                    }else  if(response['responseText']==0){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                           
                                    }
                       }
                });
                    
                    }else{
                   $.bootstrapGrowl('<?php echo $this->lang->line('please_enter')." ".$this->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?php }else{ ?>
                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier');?>', { type: "error" });                       
                    <?php }?>
    }
    function update_order(){
         <?php if($this->session->userdata['supplier_payment_per']['edit']==1){ ?>
                   if($('#parsley_reg').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                    
                var inputs = $('#parsley_reg').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/supplier_payment/update')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                  if(response['responseText']==1){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('supplier_payment').' '.$this->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_supplier_payment_lists();
                                       
                                    }else  if(response['responseText']==10){
                                           $.bootstrapGrowl(' <?php echo $this->lang->line('invalid_payment_entry'); ?>', { type: "error" });                           
                                    }else  if(response['responseText']==0){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                           
                                    }
                       }
                });
                   
                    }else{
                   $.bootstrapGrowl('<?php echo $this->lang->line('please_enter')." ".$this->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?php }else{ ?>
                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier');?>', { type: "error" });                       
                    <?php }?>
    }
    function update_purchase_return(){
         <?php if($this->session->userdata['supplier_payment_per']['edit']==1){ ?>
                   if($('#parsley_ext').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                    
                var inputs = $('#parsley_ext').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/supplier_payment/update_purchase_return')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                  if(response['responseText']==1){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('supplier_payment').' '.$this->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_ext").trigger('reset');
                                       posnic_supplier_payment_lists();
                                       
                                    }else  if(response['responseText']==10){
                                           $.bootstrapGrowl(' <?php echo $this->lang->line('invalid_payment_entry'); ?>', { type: "error" });                           
                                    }else  if(response['responseText']==0){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                           
                                    }
                       }
                });
                   
                    }else{
                   $.bootstrapGrowl('<?php echo $this->lang->line('please_enter')." ".$this->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?php }else{ ?>
                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier');?>', { type: "error" });                       
                    <?php }?>
    }
    
     $(document).ready( function () {
          function format_invoice(sup) {
            if (!sup.id) return sup.text;
    return  "<p >"+sup.text+"    <br>"+sup.name+" "+sup.company+"</p> ";
            }
            $('#parsley_reg #purchase_invoice').change(function() {
           $('#parsley_reg #company').val($('#parsley_reg #purchase_invoice').select2('data').company);
           $('#parsley_reg #supplier').val($('#parsley_reg #purchase_invoice').select2('data').name);
           $('#parsley_reg #total').val($('#parsley_reg #purchase_invoice').select2('data').amount);
           $('#parsley_reg #paid_amount').val(parseFloat($('#parsley_reg #purchase_invoice').select2('data').paid_amount));
           $('#parsley_reg #balance_amount').val(parseFloat($('#parsley_reg #purchase_invoice').select2('data').amount-$('#parsley_reg #purchase_invoice').select2('data').paid_amount));
           
           $('#parsley_reg #invoice_id').val($('#parsley_reg #purchase_invoice').select2('data').id);
           $('#parsley_reg #payment_guid').val($('#parsley_reg #purchase_invoice').select2('data').payment);
            });
          $('#parsley_reg #purchase_invoice').select2({
              dropdownCssClass : 'supplier_select',
                formatResult: format_invoice,
                formatSelection: format_invoice,
                escapeMarkup: function(m) { return m; },
                placeholder: "<?php echo $this->lang->line('search').' '.$this->lang->line('purchase_order') ?>",
                ajax: {
                     url: '<?php echo base_url() ?>index.php/supplier_payment/search_purchase_invoice',
                     data: function(term, page) {
                            return {types: ["exercise"],
                                limit: -1,
                                term: term
                            };
                     },
                    type:'POST',
                    dataType: 'json',
                    quietMillis: 100,
                    data: function (term) {
                        return {
                            term: term
                        };
                    },
                    results: function (data) {
                      var results = [];
                      $.each(data, function(index, item){
                        results.push({
                          id: item.guid,
                          text: item.invoice,
                          supplier: item.supplier_id,
                          company: item.company,
                          name: item.name,
                          address: item.address,
                          amount: item.amount,
                          paid_amount: item.paid_amount,
                          payment: item.p_guid,
                        
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
            // sales return
          function format_return(sup) {
            if (!sup.id) return sup.text;
    return  "<p >"+sup.text+"    <br>"+sup.invoice+" "+sup.name+" "+sup.company+"</p> ";
            }
            $('#parsley_ext #purchase_return').change(function() {
           $('#parsley_ext #company').val($('#parsley_ext #purchase_return').select2('data').company);
           $('#parsley_ext #supplier').val($('#parsley_ext #purchase_return').select2('data').name);
           $('#parsley_ext #total').val($('#parsley_ext #purchase_return').select2('data').amount);
           $('#parsley_ext #paid_amount').val(parseFloat($('#parsley_ext #purchase_return').select2('data').paid_amount));
           $('#parsley_ext #balance_amount').val(parseFloat($('#parsley_ext #purchase_return').select2('data').amount-$('#parsley_ext #purchase_return').select2('data').paid_amount));
           
           $('#parsley_ext #purchase_return_guid').val($('#parsley_ext #purchase_return').select2('data').id);
           $('#parsley_ext #invoice_id').val($('#parsley_ext #purchase_return').select2('data').invoice_id);
           $('#parsley_ext #purchase_invoice').val($('#parsley_ext #purchase_return').select2('data').invoice);
           $('#parsley_ext #supplier_id').val($('#parsley_ext #purchase_return').select2('data').supplier);
            });
          $('#parsley_ext #purchase_return').select2({
              dropdownCssClass : 'supplier_select',
                formatResult: format_return,
                formatSelection: format_return,
                escapeMarkup: function(m) { return m; },
                placeholder: "<?php echo $this->lang->line('search').' '.$this->lang->line('purchase_order') ?>",
                ajax: {
                     url: '<?php echo base_url() ?>index.php/supplier_payment/search_purchase_return',
                     data: function(term, page) {
                            return {types: ["exercise"],
                                limit: -1,
                                term: term
                            };
                     },
                    type:'POST',
                    dataType: 'json',
                    quietMillis: 100,
                    data: function (term) {
                        return {
                            term: term
                        };
                    },
                    results: function (data) {
                      var results = [];
                      $.each(data, function(index, item){
                        results.push({
                          id: item.guid,
                          text: item.code,
                          supplier: item.supplier_id,
                          company: item.company,
                          name: item.name,
                          address: item.address,
                          amount: item.total_amount,
                          paid_amount: item.paid_amount,
                          invoice:item.invoice,
                          invoice_id:item.invoice_id,
                        
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
        
     });
    
function posnic_add_new(){
$("#supplier_payment_select_2").show('slow');
$('#supplier_payment_order').hide();
$("#parsley_reg #purchase_invoice").select2('enable');
$('#update_button').hide();
$('#save_button').show();
$('#update_clear').hide();
$('#save_clear').show();
$('#total_amount').val('');
$('#items_id').val('');
$("#parsley_reg").trigger('reset');
$('#deleted').remove();
$("#parsley_reg #first_name").select2('data', {id:'',text: 'Search Supplier'});
    <?php if($this->session->userdata['supplier_payment_per']['add']==1){ ?>
             $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/supplier_payment/payment_code/",                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 
                                
                                 $('#parsley_reg #payment_code').val(data[0][0]['prefix']+data[0][0]['max']);
                                 $('#parsley_reg #demo_payment_code').val(data[0][0]['prefix']+data[0][0]['max']);
                             }
                             });
            
            
            
      $("#user_list").hide();
      $("#credit_payament").hide();
      $('#credit_payment').show('slow');
    
      $('#delete').attr("disabled", "disabled");
      $('#posnic_add_supplier_payment').attr("disabled", "disabled");
     
      $('#posnic_supplier_credit_payment').removeAttr("disabled");
      $('#supplier_payment_lists').removeAttr("disabled");
     
         window.setTimeout(function ()
    {
       
        $('#parsley_reg #purchase_invoice').select2('open');
    }, 500);
      <?php }else{ ?>
                    $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('payment');?>', { type: "error" });                         
                    <?php }?>
}
function posnic_add_credit(){
$("#supplier_payment_select_2").show('slow');
$('#supplier_payment_order').hide();
$("#parsley_ext #purchase_return").select2('enable');
$('#parsley_ext #update_button').hide();
$('#parsley_ext #save_button').show();
$('#parsley_ext #update_clear').hide();
$('#parsley_ext #save_clear').show();
$('#parsley_ext #total_amount').val('');
$('#parsley_ext #items_id').val('');
$("#parsley_ext").trigger('reset');
$('#parsley_ext #deleted').remove();
$("#parsley_ext #first_name").select2('data', {id:'',text: 'Search Supplier'});
    <?php if($this->session->userdata['supplier_payment_per']['add']==1){ ?>
             $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/supplier_payment/payment_code/",                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 
                                
                                 $('#parsley_ext #payment_code').val(data[0][0]['prefix']+data[0][0]['max']);
                                 $('#parsley_ext #demo_payment_code').val(data[0][0]['prefix']+data[0][0]['max']);
                             }
                             });
            
            
            
      $("#user_list").hide();
      $('#credit_payment').hide();
      $('#credit_payament').show('slow');
     
      $('#delete').attr("disabled", "disabled");
      $('#posnic_supplier_credit_payment').attr("disabled", "disabled");
      $('#posnic_add_supplier_payment').removeAttr("disabled");
      $('#supplier_payment_lists').removeAttr("disabled");
     
         window.setTimeout(function ()
    {
       
        $('#parsley_ext #purchase_return').select2('open');
    }, 500);
      <?php }else{ ?>
                    $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('payment');?>', { type: "error" });                         
                    <?php }?>
}
function posnic_supplier_payment_lists(){
      $('#credit_payament').hide('hide');
      $('#credit_payment').hide('hide');      
      $("#user_list").show('slow');
      $('#delete').removeAttr("disabled");
      $('#posnic_add_supplier_payment').removeAttr("disabled");
      $('#posnic_supplier_credit_payment').removeAttr("disabled");
      $('#supplier_payment_lists').attr("disabled",'disabled');
}
function clear_add_payment(){
      $("#parsley_reg").trigger('reset');
      
}
function clear_update_payment(){
      $("#parsley_reg").trigger('reset');
      
      edit_function($('#parsley_reg #payment_id').val());
}
function clear_credit_payment(){
    var payment=$('#parsley_ext #payment_id').val();
    $("#parsley_ext").trigger('reset');
    edit_credit_function(payment);
}

</script>
<nav id="top_navigation">
    <div class="container">
            <div class="row">
                <div class="col col-lg-7">
                        <a href="javascript:posnic_add_new()" id="posnic_add_supplier_payment" class="btn btn-default" ><i class="icon icon-user"></i> <?php echo $this->lang->line('debit_payment') ?></a>  
                        <a href="javascript:posnic_add_credit()" id="posnic_supplier_credit_payment" class="btn btn-default" ><i class="icon icon-user"></i> <?php echo $this->lang->line('credit_payment') ?></a>  
                        <a href="javascript:posnic_delete()" class="btn btn-default" id="delete"><i class="icon icon-trash"></i> <?php echo $this->lang->line('delete') ?></a>
                        <a href="javascript:posnic_supplier_payment_lists()" class="btn btn-default" id="supplier_payment_lists"><i class="icon icon-list"></i> <?php echo $this->lang->line('supplier_payment') ?></a>
                        
                </div>
            </div>
    </div>
</nav>
<nav id="mobile_navigation"></nav>
              
<section class="container clearfix main_section">
        <div id="main_content_outer" class="clearfix">
            <div id="main_content">
                        <?php $form =array('name'=>'posnic'); 
                    echo form_open('supplier_payment/supplier_payment_manage',$form) ?>
                        <div class="row">
                            <div class="col-sm-12" id="user_list"><br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title"><?php echo $this->lang->line('supplier_payment') ?></h4>                                                                               
                                    </div>
                                    <table id="dt_table_tools" class="table-striped table-condensed" style="width: 100%"><thead>
                                        <tr>
                                         <th>Id</th>
                                          <th ><?php echo $this->lang->line('select') ?></th>
                                          <th ><?php echo $this->lang->line('payment_code') ?></th>
                                          <th ><?php echo $this->lang->line('invoice') ?></th>
                                          
                                        
                                           <th><?php echo $this->lang->line('supplier')." ".$this->lang->line('name') ?></th>
                                             <th><?php echo $this->lang->line('company') ?></th>
                                          <th><?php echo $this->lang->line('order_date') ?></th>
                                          <th><?php echo $this->lang->line('total_amount') ?></th>
                                          <th><?php echo $this->lang->line('type') ?></th>
                                          <th style="width: 120px"><?php echo $this->lang->line('action') ?></th>
                                         </tr>
                                      </thead>
                                      <tbody></tbody>
                                      </table>
                                  </div>
                             </div>
                          </div>
                <?php echo form_close(); ?>
             </div>
        </div>
</section>    

               
                
      


  
<section id="credit_payment" class="container clearfix main_section">
     <?php   $form =array('id'=>'parsley_reg',
                          'runat'=>'server',
                          'name'=>'items_form',
                          'class'=>'form-horizontal');
       echo form_open_multipart('supplier_payment/upadate_pos_supplier_payment_details/',$form);?>
        
    <div id="main_content" style="padding: 0 14px !important;">
                
        <div class="col col-sm-2"></div>
                         <div class="row col col-sm-8">
                          <div class="panel panel-default">
                              <div class="panel-heading" >
                                     <h4 class="panel-title"><?php echo $this->lang->line('supplier_payment')." ".$this->lang->line('details') ?></h4>                                                                               
                               </div>
                            
                                 
                                       <div id="" class="col col-sm-12" style="padding-right: 25px;padding-left: 25px">
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep " id="supplier_payment_select_2">
                                                        <label for="purchase_invoice" ><?php echo $this->lang->line('purchase_invoice') ?></label>													
                                                                  <?php $first_name=array('name'=>'purchase_invoice',
                                                                                    'class'=>'required  form-control',
                                                                                    'id'=>'purchase_invoice',
                                                                                   
                                                                                    'value'=>set_value('purchase_invoice'));
                                                                     echo form_input($first_name)?>
                                                        <input type="hidden" id="payment_guid" name="payment_guid">
                                                        <input type="hidden" id="invoice_id" name="invoice_id">
                                                  </div>
                                                  
                                               </div>
                                               <div class="col col-sm-4" >
                                                    <div class="form_sep">
                                                            <label for="company" ><?php echo $this->lang->line('company') ?></label>													
                                                                     <?php $last_name=array('name'=>'last_name',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'company',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('company'));
                                                                         echo form_input($last_name)?>
                                                    </div><input type="hidden" value="" name='supplier_guid' id='supplier_guid'>
                                               </div>
                                              
                                               <div class="col col-sm-4" >
                                                    <div class="form_sep">
                                                            <label for="supplier" ><?php echo $this->lang->line('supplier') ?></label>													
                                                                     <?php $supplier=array('name'=>'supplier',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'supplier',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('supplier'));
                                                                         echo form_input($supplier)?>
                                                       </div>
                                               </div>
                                                
                                               
                                               
                                             
                                              
                                              
                                               </div>
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="payment_code" ><?php echo $this->lang->line('payment_code') ?></label>													
                                                                     <?php $payment_code=array('name'=>'demo_payment_code',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'demo_payment_code',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('payment_code'));
                                                                         echo form_input($payment_code)?>
                                                            <input type="hidden" name="payment_code" id="payment_code">
                                                       </div>
                                                    </div>
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="total" ><?php echo $this->lang->line('total')." ".$this->lang->line('payment') ?></label>													
                                                                     <?php $total=array('name'=>'total',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'total',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('total'));
                                                                         echo form_input($total)?>
                                                       </div>
                                                    </div>
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="paid_amount" ><?php echo $this->lang->line('paid_amount') ?></label>													
                                                                     <?php $paid_amount=array('name'=>'paid_amount',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'paid_amount',                                                                                    
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('paid_amount'));
                                                                         echo form_input($paid_amount)?>
                                                       </div>
                                                    </div>
                                               
                                            
                                               
                                                
                                           </div>
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                     <div class="form_sep">
                                                            <label for="payment_date" ><?php echo $this->lang->line('payment_date') ?></label>													
                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                           <?php $payment_date=array('name'=>'payment_date',
                                                                                            'class'=>'required form-control',
                                                                                            'id'=>'payment_date',
                                                                                         //   'onKeyPress'=>"new_payment_date(event)", 
                                                                                            'value'=>set_value('payment_date'));
                                                                             echo form_input($payment_date)?>
                                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                </div>
                                                       </div>
                                                   </div>
                                                
                                                <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="amount" ><?php echo $this->lang->line('amount') ?></label>													
                                                                     <?php $amount=array('name'=>'amount',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'amount',
                                                                                       'onkeyup'=>"invoice_payment()",
                                                                                       'onKeyPress'=>"change_focus(event);return numbersonly(event)", 
                                                                                        'value'=>set_value('amount'));
                                                                         echo form_input($amount)?>
                                                       </div>
                                                    </div>
                                                <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="balance" ><?php echo $this->lang->line('balance') ?></label>													
                                                                     <?php $balance=array('name'=>'balance',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'balance',
                                                                                        'value'=>set_value('amount'));
                                                                         echo form_input($balance)?>
                                                       </div>
                                                    </div>
                                               
                                           </div>
                                           <div class="row">
                                               <div class="col col-lg-8">
                                                    <div class="form_sep ">
                                                        <label for="memo" ><?php echo $this->lang->line('memo') ?></label>													
                                                                  <?php $memo=array('name'=>'memo',
                                                                                    'class'=>' form-control',
                                                                                    'id'=>'memo',
                                                                                   'rows'=>3,
                                                                                    'value'=>set_value('memo'));
                                                                     echo form_textarea($memo)?>
                                                        
                                                  </div>
                                               </div>
                                               <div class="col col-lg-4">
                                                  
                                                   <div class="col col-sm-6"  >
                                                       
                                              <div class="form_sep " id="save_button" >
                                                       <label for="" >&nbsp;</label>	
                                                       <a href="javascript:save_new_payment()" class="btn btn-default  pull-right"  ><i class="icon icon-save"></i> <?php echo " ".$this->lang->line('save') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_button" >
                                                       <label for="" >&nbsp;</label>	
                                                       <a href="javascript:update_order()" class="btn btn-default" style="margin-top:-12px"  ><i class="icon icon-edit"></i> <?php echo " ".$this->lang->line('update') ?></a>
                                                  </div>
                                               </div>
                                          <div class="col col-sm-6"  >
                                                   <div class="form_sep " id="save_clear">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_add_payment()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?php echo " ".$this->lang->line('clear') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_clear" style="margin-top:0 !important">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_update_payment()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?php echo " ".$this->lang->line('clear') ?></a>
                                                  </div>
                                               </div>
                                               </div>
                                           </div>
                                     <br>
                                        </div>                              
                             
                          </div>
                          </div>
                         
                         
         
                     </div>
    <input type="hidden" id="balance_amount" name="balance_amount">
    <input type="hidden" id="payment" name="payment">
    <input type="hidden" id="payment_id" name="payment_id">
    <?php echo form_close();?>

</section>    
<section id="credit_payament" class="container clearfix main_section">
     <?php   $form =array('id'=>'parsley_ext',
                          'runat'=>'server',
                          'name'=>'items_form',
                          'class'=>'form-horizontal');
       echo form_open_multipart('supplier_payment/upadate_pos_supplier_payment_details/',$form);?>
        
    <div id="main_content" style="padding: 0 14px !important;">
                
        <div class="col col-sm-2"></div>
                         <div class="row col col-sm-8">
                          <div class="panel panel-default">
                              <div class="panel-heading" >
                                     <h4 class="panel-title"><?php echo $this->lang->line('supplier_payment')." ".$this->lang->line('details') ?></h4>                                                                               
                               </div>
                            
                                 
                                       <div id="" class="col col-sm-12" style="padding-right: 25px;padding-left: 25px">
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep " id="supplier_payment_select_2">
                                                        <label for="purchase_return" ><?php echo $this->lang->line('purchase_return') ?></label>													
                                                                  <?php $purchase_return=array('name'=>'purchase_return',
                                                                                    'class'=>'required  form-control',
                                                                                    'id'=>'purchase_return',
                                                                                   
                                                                                    'value'=>set_value('purchase_return'));
                                                                     echo form_input($purchase_return)?>
                                                        <input type="hidden" id="purchase_return_guid" name="purchase_return_guid">
                                                        <input type="hidden" id="invoice_id" name="invoice_id">
                                                        <input type="hidden" id="supplier_id" name="supplier_id">
                                                  </div>
                                                  
                                               </div>
                                               <div class="col col-sm-4" >
                                                    <div class="form_sep">
                                                            <label for="purchase_invoice" ><?php echo $this->lang->line('purchase_invoice') ?></label>													
                                                                     <?php $purchase_invoice=array('name'=>'purchase_invoice',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'purchase_invoice',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('purchase_invoice'));
                                                                         echo form_input($purchase_invoice)?>
                                                    </div>
                                               </div>
                                              
                                               <div class="col col-sm-4" >
                                                    <div class="form_sep">
                                                            <label for="supplier" ><?php echo $this->lang->line('supplier') ?></label>													
                                                                     <?php $supplier=array('name'=>'supplier',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'supplier',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('supplier'));
                                                                         echo form_input($supplier)?>
                                                       </div>
                                               </div>
                                                
                                               
                                               
                                             
                                              
                                              
                                               </div>
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="payment_code" ><?php echo $this->lang->line('payment_code') ?></label>													
                                                                     <?php $payment_code=array('name'=>'demo_payment_code',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'demo_payment_code',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('payment_code'));
                                                                         echo form_input($payment_code)?>
                                                            <input type="hidden" name="payment_code" id="payment_code">
                                                       </div>
                                                    </div>
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="total" ><?php echo $this->lang->line('total')." ".$this->lang->line('payment') ?></label>													
                                                                     <?php $total=array('name'=>'total',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'total',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('total'));
                                                                         echo form_input($total)?>
                                                       </div>
                                                    </div>
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="paid_amount" ><?php echo $this->lang->line('paid_amount') ?></label>													
                                                                     <?php $paid_amount=array('name'=>'paid_amount',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'paid_amount',                                                                                    
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('paid_amount'));
                                                                         echo form_input($paid_amount)?>
                                                       </div>
                                                    </div>
                                               
                                            
                                               
                                                
                                           </div>
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                     <div class="form_sep">
                                                            <label for="payment_date" ><?php echo $this->lang->line('payment_date') ?></label>													
                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                           <?php $payment_date=array('name'=>'payment_date',
                                                                                            'class'=>'required form-control',
                                                                                            'id'=>'payment_date',
                                                                                         //   'onKeyPress'=>"new_payment_date(event)", 
                                                                                            'value'=>set_value('payment_date'));
                                                                             echo form_input($payment_date)?>
                                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                </div>
                                                       </div>
                                                   </div>
                                                
                                                <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="amount" ><?php echo $this->lang->line('amount') ?></label>													
                                                                     <?php $amount=array('name'=>'amount',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'amount',
                                                                                       'onkeyup'=>"purchase_return_payment()",
                                                                                       'onKeyPress'=>"change_focus(event);return numbersonly(event)", 
                                                                                        'value'=>set_value('amount'));
                                                                         echo form_input($amount)?>
                                                       </div>
                                                    </div>
                                                <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="balance" ><?php echo $this->lang->line('balance') ?></label>													
                                                                     <?php $balance=array('name'=>'balance',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'balance',
                                                                                        'value'=>set_value('amount'));
                                                                         echo form_input($balance)?>
                                                       </div>
                                                    </div>
                                               
                                           </div>
                                           <div class="row">
                                               <div class="col col-lg-8">
                                                    <div class="form_sep ">
                                                        <label for="memo" ><?php echo $this->lang->line('memo') ?></label>													
                                                                  <?php $memo=array('name'=>'memo',
                                                                                    'class'=>' form-control',
                                                                                    'id'=>'memo',
                                                                                   'rows'=>3,
                                                                                    'value'=>set_value('memo'));
                                                                     echo form_textarea($memo)?>
                                                        
                                                  </div>
                                               </div>
                                               <div class="col col-lg-4">
                                                  
                                                   <div class="col col-sm-6"  >
                                                       
                                              <div class="form_sep " id="save_button" >
                                                       <label for="" >&nbsp;</label>	
                                                       <a href="javascript:save_purchase_return()" class="btn btn-default  pull-right"  ><i class="icon icon-save"></i> <?php echo " ".$this->lang->line('save') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_button" >
                                                       <label for="" >&nbsp;</label>	
                                                       <a href="javascript:update_purchase_return()" class="btn btn-default" style="margin-top:-12px"  ><i class="icon icon-edit"></i> <?php echo " ".$this->lang->line('update') ?></a>
                                                  </div>
                                               </div>
                                          <div class="col col-sm-6"  >
                                                   <div class="form_sep " id="save_clear">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_add_payment()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?php echo " ".$this->lang->line('clear') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_clear" style="margin-top:0 !important">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_credit_payment()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?php echo " ".$this->lang->line('clear') ?></a>
                                                  </div>
                                               </div>
                                               </div>
                                           </div>
                                     <br>
                                        </div>                              
                             
                          </div>
                          </div>
                         
                         
         
                     </div>
    <input type="hidden" id="balance_amount" name="balance_amount">
    <input type="hidden" id="payment" name="payment">
    <input type="hidden" id="payment_id" name="payment_id">
    <?php echo form_close();?>

</section>    
           <div id="footer_space">
              
           </div>
		</div>
	
                <script type="text/javascript">
                  
     function posnic_delete(){
            <?php if($this->session->userdata['supplier_payment_per']['delete']==1){ ?>
                     var flag=0;
                     var field=document.forms.posnic;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                        
                          $.bootstrapGrowl('<?php echo $this->lang->line('Select Atleast One')."".$this->lang->line('paruchase_order');?>', { type: "warning" });
                      }else{
                            bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete')."".$this->lang->line('Are you Sure To Delete') ?>", function(result) {
             if(result){
              
             
                        var posnic=document.forms.posnic;
                        for (i = 0; i < posnic.length; i++){
                           
                          if(posnic[i].checked==true){ 
                              var guid=posnic[i].value;
                              $.ajax({
                                url: '<?php echo base_url() ?>/index.php/supplier_payment/delete',
                                type: "POST",
                                data: {
                                    guid:posnic[i].value

                                },
                                  complete: function(response) {
                                    if(response['responseText']==1){
                                           $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?php echo $this->lang->line('supplier_payment') ?>  <?php echo $this->lang->line('deleted');?>', { type: "error" });
                                        $("#dt_table_tools").dataTable().fnDraw();
                                    }else{
                                         $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('delete')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                       
                                    }
                                    }
                            });

                          }

                      }    
                      }
                      });
                      }    
                      <?php }else{?>
                                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('supplier_payment');?>', { type: "error" });                       
                           <?php }
                        ?>
                      }
                    
                    
    
                    
                </script>
        

      