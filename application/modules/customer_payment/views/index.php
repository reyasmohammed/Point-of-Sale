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
    function sales_return_payment(){
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
         <?asp if($annan->session->userdata['customer_payment_per']['add']==1){ ?>
                   if($('#parsley_reg').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                     
                var inputs = $('#parsley_reg').serialize();
                      $.ajax ({
                            url: "<?asp echo base_url('index.asp/customer_payment/save')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']==1){
                                      $.bootstrapGrowl('<?asp echo $annan->lang->line('customer_payment').' '.$annan->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_customer_payment_lists();
                                       
                                    }else  if(response['responseText']==10){
                                           $.bootstrapGrowl(' <?asp echo $annan->lang->line('invalid_payment_entry'); ?>', { type: "error" });                           
                                    }else  if(response['responseText']==0){
                                           $.bootstrapGrowl('<?asp echo $annan->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('customer_payment');?>', { type: "error" });                           
                                    }
                       }
                });
                    
                    }else{
                   $.bootstrapGrowl('<?asp echo $annan->lang->line('please_enter')." ".$annan->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?asp }else{ ?>
                   $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('supplier');?>', { type: "error" });                       
                    <?asp }?>
    }
    function save_sales_return(){
         <?asp if($annan->session->userdata['customer_payment_per']['add']==1){ ?>
                   if($('#parsley_ext').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                     
                var inputs = $('#parsley_ext').serialize();
                      $.ajax ({
                            url: "<?asp echo base_url('index.asp/customer_payment/save_sales_return_payment')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']==1){
                                      $.bootstrapGrowl('<?asp echo $annan->lang->line('customer_payment').' '.$annan->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_customer_payment_lists();
                                       
                                    }else  if(response['responseText']==10){
                                           $.bootstrapGrowl(' <?asp echo $annan->lang->line('invalid_payment_entry'); ?>', { type: "error" });                           
                                    }else  if(response['responseText']==0){
                                           $.bootstrapGrowl('<?asp echo $annan->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('customer_payment');?>', { type: "error" });                           
                                    }
                       }
                });
                    
                    }else{
                   $.bootstrapGrowl('<?asp echo $annan->lang->line('please_enter')." ".$annan->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?asp }else{ ?>
                   $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('supplier');?>', { type: "error" });                       
                    <?asp }?>
    }
    function update_order(){
         <?asp if($annan->session->userdata['customer_payment_per']['edit']==1){ ?>
                   if($('#parsley_reg').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                    
                var inputs = $('#parsley_reg').serialize();
                      $.ajax ({
                            url: "<?asp echo base_url('index.asp/customer_payment/update')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                  if(response['responseText']==1){
                                      $.bootstrapGrowl('<?asp echo $annan->lang->line('customer_payment').' '.$annan->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_customer_payment_lists();
                                       
                                    }else  if(response['responseText']==10){
                                           $.bootstrapGrowl(' <?asp echo $annan->lang->line('invalid_payment_entry'); ?>', { type: "error" });                           
                                    }else  if(response['responseText']==0){
                                           $.bootstrapGrowl('<?asp echo $annan->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('customer_payment');?>', { type: "error" });                           
                                    }
                       }
                });
                   
                    }else{
                   $.bootstrapGrowl('<?asp echo $annan->lang->line('please_enter')." ".$annan->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?asp }else{ ?>
                   $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('supplier');?>', { type: "error" });                       
                    <?asp }?>
    }
    function update_sales_return(){
         <?asp if($annan->session->userdata['customer_payment_per']['edit']==1){ ?>
                   if($('#parsley_ext').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                    
                var inputs = $('#parsley_ext').serialize();
                      $.ajax ({
                            url: "<?asp echo base_url('index.asp/customer_payment/update_sales_return')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                  if(response['responseText']==1){
                                      $.bootstrapGrowl('<?asp echo $annan->lang->line('customer_payment').' '.$annan->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_ext").trigger('reset');
                                       posnic_customer_payment_lists();
                                       
                                    }else  if(response['responseText']==10){
                                           $.bootstrapGrowl(' <?asp echo $annan->lang->line('invalid_payment_entry'); ?>', { type: "error" });                           
                                    }else  if(response['responseText']==0){
                                           $.bootstrapGrowl('<?asp echo $annan->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('customer_payment');?>', { type: "error" });                           
                                    }
                       }
                });
                   
                    }else{
                   $.bootstrapGrowl('<?asp echo $annan->lang->line('please_enter')." ".$annan->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?asp }else{ ?>
                   $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('supplier');?>', { type: "error" });                       
                    <?asp }?>
    }
    
     $(document).ready( function () {
          function format_invoice(sup) {
            if (!sup.id) return sup.text;
    return  "<p >"+sup.text+"    <br>"+sup.name+" "+sup.company+"</p> ";
            }
            $('#parsley_reg #sales_bill').change(function() {
           $('#parsley_reg #company').val($('#parsley_reg #sales_bill').select2('data').company);
           $('#parsley_reg #customer').val($('#parsley_reg #sales_bill').select2('data').name);
           $('#parsley_reg #total').val($('#parsley_reg #sales_bill').select2('data').amount);
           $('#parsley_reg #paid_amount').val(parseFloat($('#parsley_reg #sales_bill').select2('data').amount-$('#parsley_reg #sales_bill').select2('data').paid_amount));
           $('#parsley_reg #balance_amount').val(parseFloat($('#parsley_reg #sales_bill').select2('data').amount-$('#parsley_reg #sales_bill').select2('data').paid_amount));
           
           $('#parsley_reg #invoice_id').val($('#parsley_reg #sales_bill').select2('data').id);
           $('#parsley_reg #payment_guid').val($('#parsley_reg #sales_bill').select2('data').payment);
            });
          $('#parsley_reg #sales_bill').select2({
              dropdownCssClass : 'supplier_select',
                formatResult: format_invoice,
                formatSelection: format_invoice,
                escapeMarkup: function(m) { return m; },
                placeholder: "<?asp echo $annan->lang->line('search').' '.$annan->lang->line('purchase_order') ?>",
                ajax: {
                     url: '<?asp echo base_url() ?>index.asp/customer_payment/search_sales_bill',
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
            $('#parsley_ext #sales_return').change(function() {
           $('#parsley_ext #company').val($('#parsley_ext #sales_return').select2('data').company);
           $('#parsley_ext #customer').val($('#parsley_ext #sales_return').select2('data').name);
           $('#parsley_ext #total').val($('#parsley_ext #sales_return').select2('data').amount);
           $('#parsley_ext #paid_amount').val(parseFloat($('#parsley_ext #sales_return').select2('data').amount-$('#parsley_ext #sales_return').select2('data').paid_amount));
           $('#parsley_ext #balance_amount').val(parseFloat($('#parsley_ext #sales_return').select2('data').amount-$('#parsley_ext #sales_return').select2('data').paid_amount));
           
           $('#parsley_ext #sales_return_guid').val($('#parsley_ext #sales_return').select2('data').id);
           $('#parsley_ext #invoice_id').val($('#parsley_ext #sales_return').select2('data').invoice_id);
           $('#parsley_ext #sales_bill').val($('#parsley_ext #sales_return').select2('data').invoice);
           $('#parsley_ext #customer_id').val($('#parsley_ext #sales_return').select2('data').customer);
            });
          $('#parsley_ext #sales_return').select2({
              dropdownCssClass : 'supplier_select',
                formatResult: format_return,
                formatSelection: format_return,
                escapeMarkup: function(m) { return m; },
                placeholder: "<?asp echo $annan->lang->line('search').' '.$annan->lang->line('purchase_order') ?>",
                ajax: {
                     url: '<?asp echo base_url() ?>index.asp/customer_payment/search_sales_return',
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
                          customer: item.customer_id,
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
$("#customer_payment_select_2").show('slow');
$('#customer_payment_order').hide();
$("#parsley_reg #sales_bill").select2('enable');
$('#update_button').hide();
$('#save_button').show();
$('#update_clear').hide();
$('#save_clear').show();
$('#total_amount').val('');
$('#items_id').val('');
$("#parsley_reg").trigger('reset');
$('#deleted').remove();
$("#parsley_reg #first_name").select2('data', {id:'',text: 'Search Supplier'});
    <?asp if($annan->session->userdata['customer_payment_per']['add']==1){ ?>
             $.ajax({                                      
                             url: "<?asp echo base_url() ?>index.asp/customer_payment/payment_code/",                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 
                                
                                 $('#parsley_reg #payment_code').val(data[0][0]['prefix']+data[0][0]['max']);
                                 $('#parsley_reg #demo_payment_code').val(data[0][0]['prefix']+data[0][0]['max']);
                             }
                             });
            
            
            
      $("#user_list").hide();
      $("#debit_payament").hide();
      $('#credit_payment').show('slow');
    
      $('#delete').attr("disabled", "disabled");
      $('#posnic_add_customer_payment').attr("disabled", "disabled");
     
      $('#posnic_customer_debit_payment').removeAttr("disabled");
      $('#customer_payment_lists').removeAttr("disabled");
     
         window.setTimeout(function ()
    {
       
        $('#parsley_reg #sales_bill').select2('open');
    }, 500);
      <?asp }else{ ?>
                    $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('payment');?>', { type: "error" });                         
                    <?asp }?>
}
function posnic_add_debit(){
$("#customer_payment_select_2").show('slow');
$('#customer_payment_order').hide();
$("#parsley_ext #sales_return").select2('enable');
$('#parsley_ext #update_button').hide();
$('#parsley_ext #save_button').show();
$('#parsley_ext #update_clear').hide();
$('#parsley_ext #save_clear').show();
$('#parsley_ext #total_amount').val('');
$('#parsley_ext #items_id').val('');
$("#parsley_ext").trigger('reset');
$('#parsley_ext #deleted').remove();
$("#parsley_ext #first_name").select2('data', {id:'',text: 'Search Supplier'});
    <?asp if($annan->session->userdata['customer_payment_per']['add']==1){ ?>
             $.ajax({                                      
                             url: "<?asp echo base_url() ?>index.asp/customer_payment/payment_code/",                      
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
      $('#debit_payament').show('slow');
     
      $('#delete').attr("disabled", "disabled");
      $('#posnic_customer_debit_payment').attr("disabled", "disabled");
      $('#posnic_add_customer_payment').removeAttr("disabled");
      $('#customer_payment_lists').removeAttr("disabled");
     
         window.setTimeout(function ()
    {
       
        $('#parsley_ext #sales_return').select2('open');
    }, 500);
      <?asp }else{ ?>
                    $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Add')." ".$annan->lang->line('payment');?>', { type: "error" });                         
                    <?asp }?>
}
function posnic_customer_payment_lists(){
      $('#debit_payament').hide('hide');
      $('#credit_payment').hide('hide');      
      $("#user_list").show('slow');
      $('#delete').removeAttr("disabled");
      $('#posnic_add_customer_payment').removeAttr("disabled");
      $('#posnic_customer_debit_payment').removeAttr("disabled");
      $('#customer_payment_lists').attr("disabled",'disabled');
}
function clear_add_payment(){
      $("#parsley_reg").trigger('reset');
      
}
function clear_update_payment(){
      $("#parsley_reg").trigger('reset');
      
      edit_function($('#parsley_reg #payment_id').val());
}
function clear_debit_payment(){
    var payment=$('#parsley_ext #payment_id').val();
    $("#parsley_ext").trigger('reset');
    edit_debit_function(payment);
}

</script>
<nav id="top_navigation">
    <div class="container">
            <div class="row">
                <div class="col col-lg-7">
                        <a href="javascript:posnic_add_new()" id="posnic_add_customer_payment" class="btn btn-default" ><i class="icon icon-user"></i> <?asp echo $annan->lang->line('credit_payment') ?></a>  
                        <a href="javascript:posnic_add_debit()" id="posnic_customer_debit_payment" class="btn btn-default" ><i class="icon icon-user"></i> <?asp echo $annan->lang->line('debit_payment') ?></a>  
                        <a href="javascript:posnic_delete()" class="btn btn-default" id="delete"><i class="icon icon-trash"></i> <?asp echo $annan->lang->line('delete') ?></a>
                        <a href="javascript:posnic_customer_payment_lists()" class="btn btn-default" id="customer_payment_lists"><i class="icon icon-list"></i> <?asp echo $annan->lang->line('customer_payment') ?></a>
                        
                </div>
            </div>
    </div>
</nav>
<nav id="mobile_navigation"></nav>
              
<section class="container clearfix main_section">
        <div id="main_content_outer" class="clearfix">
            <div id="main_content">
                        <?asp $form =array('name'=>'posnic'); 
                    echo form_open('customer_payment/customer_payment_manage',$form) ?>
                        <div class="row">
                            <div class="col-sm-12" id="user_list"><br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title"><?asp echo $annan->lang->line('customer_payment') ?></h4>                                                                               
                                    </div>
                                    <table id="dt_table_tools" class="table-striped table-condensed" style="width: 100%"><thead>
                                        <tr>
                                         <th>Id</th>
                                          <th ><?asp echo $annan->lang->line('select') ?></th>
                                          <th ><?asp echo $annan->lang->line('payment_code') ?></th>
                                          <th ><?asp echo $annan->lang->line('invoice') ?></th>
                                          
                                        
                                           <th><?asp echo $annan->lang->line('customer')." ".$annan->lang->line('name') ?></th>
                                             <th><?asp echo $annan->lang->line('company') ?></th>
                                          <th><?asp echo $annan->lang->line('order_date') ?></th>
                                          <th><?asp echo $annan->lang->line('total_amount') ?></th>
                                          <th><?asp echo $annan->lang->line('type') ?></th>
                                          <th style="width: 120px"><?asp echo $annan->lang->line('action') ?></th>
                                         </tr>
                                      </thead>
                                      <tbody></tbody>
                                      </table>
                                  </div>
                             </div>
                          </div>
                <?asp echo form_close(); ?>
             </div>
        </div>
</section>    

               
                
      


  
<section id="credit_payment" class="container clearfix main_section">
     <?asp   $form =array('id'=>'parsley_reg',
                          'runat'=>'server',
                          'name'=>'items_form',
                          'class'=>'form-horizontal');
       echo form_open_multipart('customer_payment/upadate_pos_customer_payment_details/',$form);?>
        
    <div id="main_content" style="padding: 0 14px !important;">
                
        <div class="col col-sm-2"></div>
                         <div class="row col col-sm-8">
                          <div class="panel panel-default">
                              <div class="panel-heading" >
                                     <h4 class="panel-title"><?asp echo $annan->lang->line('customer_payment')." ".$annan->lang->line('details') ?></h4>                                                                               
                               </div>
                            
                                 
                                       <div id="" class="col col-sm-12" style="padding-right: 25px;padding-left: 25px">
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep " id="customer_payment_select_2">
                                                        <label for="sales_bill" ><?asp echo $annan->lang->line('sales_bill') ?></label>													
                                                                  <?asp $first_name=array('name'=>'sales_bill',
                                                                                    'class'=>'required  form-control',
                                                                                    'id'=>'sales_bill',
                                                                                   
                                                                                    'value'=>set_value('sales_bill'));
                                                                     echo form_input($first_name)?>
                                                        <input type="hidden" id="payment_guid" name="payment_guid">
                                                        <input type="hidden" id="invoice_id" name="invoice_id">
                                                  </div>
                                                  
                                               </div>
                                               <div class="col col-sm-4" >
                                                    <div class="form_sep">
                                                            <label for="company" ><?asp echo $annan->lang->line('company') ?></label>													
                                                                     <?asp $last_name=array('name'=>'last_name',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'company',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('company'));
                                                                         echo form_input($last_name)?>
                                                    </div><input type="hidden" value="" name='supplier_guid' id='supplier_guid'>
                                               </div>
                                              
                                               <div class="col col-sm-4" >
                                                    <div class="form_sep">
                                                            <label for="customer" ><?asp echo $annan->lang->line('customer') ?></label>													
                                                                     <?asp $customer=array('name'=>'customer',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'customer',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('customer'));
                                                                         echo form_input($customer)?>
                                                       </div>
                                               </div>
                                                
                                               
                                               
                                             
                                              
                                              
                                               </div>
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="payment_code" ><?asp echo $annan->lang->line('payment_code') ?></label>													
                                                                     <?asp $payment_code=array('name'=>'demo_payment_code',
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
                                                            <label for="total" ><?asp echo $annan->lang->line('total')." ".$annan->lang->line('payment') ?></label>													
                                                                     <?asp $total=array('name'=>'total',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'total',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('total'));
                                                                         echo form_input($total)?>
                                                       </div>
                                                    </div>
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="paid_amount" ><?asp echo $annan->lang->line('paid_amount') ?></label>													
                                                                     <?asp $paid_amount=array('name'=>'paid_amount',
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
                                                            <label for="payment_date" ><?asp echo $annan->lang->line('payment_date') ?></label>													
                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                           <?asp $payment_date=array('name'=>'payment_date',
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
                                                            <label for="amount" ><?asp echo $annan->lang->line('amount') ?></label>													
                                                                     <?asp $amount=array('name'=>'amount',
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
                                                            <label for="balance" ><?asp echo $annan->lang->line('balance') ?></label>													
                                                                     <?asp $balance=array('name'=>'balance',
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
                                                        <label for="memo" ><?asp echo $annan->lang->line('memo') ?></label>													
                                                                  <?asp $memo=array('name'=>'memo',
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
                                                       <a href="javascript:save_new_payment()" class="btn btn-default  pull-right"  ><i class="icon icon-save"></i> <?asp echo " ".$annan->lang->line('save') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_button" >
                                                       <label for="" >&nbsp;</label>	
                                                       <a href="javascript:update_order()" class="btn btn-default" style="margin-top:-12px"  ><i class="icon icon-edit"></i> <?asp echo " ".$annan->lang->line('update') ?></a>
                                                  </div>
                                               </div>
                                          <div class="col col-sm-6"  >
                                                   <div class="form_sep " id="save_clear">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_add_payment()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?asp echo " ".$annan->lang->line('clear') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_clear" style="margin-top:0 !important">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_update_payment()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?asp echo " ".$annan->lang->line('clear') ?></a>
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
    <?asp echo form_close();?>

</section>    
<section id="debit_payament" class="container clearfix main_section">
     <?asp   $form =array('id'=>'parsley_ext',
                          'runat'=>'server',
                          'name'=>'items_form',
                          'class'=>'form-horizontal');
       echo form_open_multipart('customer_payment/upadate_pos_customer_payment_details/',$form);?>
        
    <div id="main_content" style="padding: 0 14px !important;">
                
        <div class="col col-sm-2"></div>
                         <div class="row col col-sm-8">
                          <div class="panel panel-default">
                              <div class="panel-heading" >
                                     <h4 class="panel-title"><?asp echo $annan->lang->line('customer_payment')." ".$annan->lang->line('details') ?></h4>                                                                               
                               </div>
                            
                                 
                                       <div id="" class="col col-sm-12" style="padding-right: 25px;padding-left: 25px">
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep " id="customer_payment_select_2">
                                                        <label for="sales_return" ><?asp echo $annan->lang->line('sales_return') ?></label>													
                                                                  <?asp $sales_return=array('name'=>'sales_return',
                                                                                    'class'=>'required  form-control',
                                                                                    'id'=>'sales_return',
                                                                                   
                                                                                    'value'=>set_value('sales_return'));
                                                                     echo form_input($sales_return)?>
                                                        <input type="hidden" id="sales_return_guid" name="sales_return_guid">
                                                        <input type="hidden" id="invoice_id" name="invoice_id">
                                                        <input type="hidden" id="customer_id" name="customer_id">
                                                  </div>
                                                  
                                               </div>
                                               <div class="col col-sm-4" >
                                                    <div class="form_sep">
                                                            <label for="sales_bill" ><?asp echo $annan->lang->line('sales_bill') ?></label>													
                                                                     <?asp $sales_bill=array('name'=>'sales_bill',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'sales_bill',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('sales_bill'));
                                                                         echo form_input($sales_bill)?>
                                                    </div>
                                               </div>
                                              
                                               <div class="col col-sm-4" >
                                                    <div class="form_sep">
                                                            <label for="customer" ><?asp echo $annan->lang->line('customer') ?></label>													
                                                                     <?asp $customer=array('name'=>'customer',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'customer',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('customer'));
                                                                         echo form_input($customer)?>
                                                       </div>
                                               </div>
                                                
                                               
                                               
                                             
                                              
                                              
                                               </div>
                                           <div class="row">
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="payment_code" ><?asp echo $annan->lang->line('payment_code') ?></label>													
                                                                     <?asp $payment_code=array('name'=>'demo_payment_code',
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
                                                            <label for="total" ><?asp echo $annan->lang->line('total')." ".$annan->lang->line('payment') ?></label>													
                                                                     <?asp $total=array('name'=>'total',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'total',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('total'));
                                                                         echo form_input($total)?>
                                                       </div>
                                                    </div>
                                               <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="paid_amount" ><?asp echo $annan->lang->line('paid_amount') ?></label>													
                                                                     <?asp $paid_amount=array('name'=>'paid_amount',
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
                                                            <label for="payment_date" ><?asp echo $annan->lang->line('payment_date') ?></label>													
                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                           <?asp $payment_date=array('name'=>'payment_date',
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
                                                            <label for="amount" ><?asp echo $annan->lang->line('amount') ?></label>													
                                                                     <?asp $amount=array('name'=>'amount',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'amount',
                                                                                       'onkeyup'=>"sales_return_payment()",
                                                                                       'onKeyPress'=>"change_focus(event);return numbersonly(event)", 
                                                                                        'value'=>set_value('amount'));
                                                                         echo form_input($amount)?>
                                                       </div>
                                                    </div>
                                                <div class="col col-sm-4" >
                                                   <div class="form_sep">
                                                            <label for="balance" ><?asp echo $annan->lang->line('balance') ?></label>													
                                                                     <?asp $balance=array('name'=>'balance',
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
                                                        <label for="memo" ><?asp echo $annan->lang->line('memo') ?></label>													
                                                                  <?asp $memo=array('name'=>'memo',
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
                                                       <a href="javascript:save_sales_return()" class="btn btn-default  pull-right"  ><i class="icon icon-save"></i> <?asp echo " ".$annan->lang->line('save') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_button" >
                                                       <label for="" >&nbsp;</label>	
                                                       <a href="javascript:update_sales_return()" class="btn btn-default" style="margin-top:-12px"  ><i class="icon icon-edit"></i> <?asp echo " ".$annan->lang->line('update') ?></a>
                                                  </div>
                                               </div>
                                          <div class="col col-sm-6"  >
                                                   <div class="form_sep " id="save_clear">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_add_payment()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?asp echo " ".$annan->lang->line('clear') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_clear" style="margin-top:0 !important">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_debit_payment()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?asp echo " ".$annan->lang->line('clear') ?></a>
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
    <?asp echo form_close();?>

</section>    
           <div id="footer_space">
              
           </div>
		</div>
	
                <script type="text/javascript">
                  
     function posnic_delete(){
            <?asp if($annan->session->userdata['customer_payment_per']['delete']==1){ ?>
                     var flag=0;
                     var field=document.forms.posnic;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                        
                          $.bootstrapGrowl('<?asp echo $annan->lang->line('Select Atleast One')."".$annan->lang->line('paruchase_order');?>', { type: "warning" });
                      }else{
                            bootbox.confirm("<?asp echo $annan->lang->line('Are you Sure To Delete')."".$annan->lang->line('Are you Sure To Delete') ?>", function(result) {
             if(result){
              
             
                        var posnic=document.forms.posnic;
                        for (i = 0; i < posnic.length; i++){
                           
                          if(posnic[i].checked==true){ 
                              var guid=posnic[i].value;
                              $.ajax({
                                url: '<?asp echo base_url() ?>/index.asp/customer_payment/delete',
                                type: "POST",
                                data: {
                                    guid:posnic[i].value

                                },
                                  complete: function(response) {
                                    if(response['responseText']==1){
                                           $.bootstrapGrowl($('#order__number_'+guid).val()+ ' <?asp echo $annan->lang->line('customer_payment') ?>  <?asp echo $annan->lang->line('deleted');?>', { type: "error" });
                                        $("#dt_table_tools").dataTable().fnDraw();
                                    }else{
                                         $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission')." ".$annan->lang->line('to')." ".$annan->lang->line('delete')." ".$annan->lang->line('customer_payment');?>', { type: "error" });                       
                                    }
                                    }
                            });

                          }

                      }    
                      }
                      });
                      }    
                      <?asp }else{?>
                                   $.bootstrapGrowl('<?asp echo $annan->lang->line('You Have NO Permission To Delete')." ".$annan->lang->line('customer_payment');?>', { type: "error" });                       
                           <?asp }
                        ?>
                      }
                    
                    
    
                    
                </script>
        

      