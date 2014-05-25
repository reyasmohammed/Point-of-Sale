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
    .ordered_items_table tr td{
        text-align: center;
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
    var grn_number;
    function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
          }
    }
    function delivered_quty(e,i){
        var unicode=e.charCode? e.charCode : e.keyCode
            if (unicode!=13 && unicode!=9){          
            }
            else{
                   delivered_quty_items(i);
                   $('#parsley_reg #r_free_id_'+i).focus();
            }
             if (unicode!=27){
            }
            else{  if(parseFloat(i)==0){ 
                     $('#parsley_reg #grn_date').focus();
                    window.setTimeout(function ()
                   { 
                       $('#parsley_reg #grn_date').focus();
                       document.getElementById('grn_date').focus();
                   }, 0);
                    delivered_quty_items(i);
            }else{
                 $('#parsley_reg #r_free_id_'+parseFloat(+i-1)).focus();
             }
            }
    }
    function receive_free_items(i)
    {
        if(isNaN($('#parsley_reg #r_free_id_'+i).val())){
           $('#parsley_reg #r_free_id_'+i).val("");
        }else{
            var good=  $('#parsley_reg #r_free_id_'+i).val();
            var res=  $('#parsley_reg #o_free_id_'+i).val();
            if(parseFloat(good)>parseFloat(res)){
                $('#parsley_reg #r_free_id_'+i).val(res);
                 
            }
        }
    }
      function receive_quty_items_update(i)
    {
        if(isNaN($('#parsley_reg #r_quty_id_'+i).val())){
           $('#parsley_reg #r_quty_id_'+i).val("");
        }else{
            var good=  $('#parsley_reg #r_quty_id_'+i).val();
            var res=  $('#parsley_reg #o_quty_id_'+i).val();
           
            if(parseFloat(good)>parseFloat(res)){
               
                $('#parsley_reg #r_quty_id_'+i).val(res);
                 
            }
        }
    }
    function delivered_quty_items(i)
    {
        if(isNaN($('#item_price_'+i).val())){
                          $('#item_price_'+i).val(0);   
        }
        if(isNaN($('#parsley_reg #delivered_item_quty'+i).val())){
           $('#parsley_reg #delivered_item_quty'+i).val(0);
        }else{
            var delivered=  $('#parsley_reg #delivered_item_quty'+i).val();
            var ordered=  $('#parsley_reg #item_quty_'+i).val();
            if(parseFloat(delivered)>parseFloat(ordered)){
                $('#parsley_reg #delivered_item_quty'+i).val(ordered);  
                var discount;
                if($('#discount_per_'+i).val()!=""){
                    discount=(parseFloat($('#item_price_'+i).val())*parseFloat($('#delivered_item_quty'+i).val()))*(parseFloat($('#discount_per_'+i).val())/100)
                }else{
                    discount=0;
                }
                if(isNaN(discount)){
                    discount=0;   
                }
                if(isNaN($('#item_price_'+i).val())){
                          $('#item_price_'+i).val(0);   
                }
                 
                var quty=$('#delivered_item_quty'+i).val();
                if(quty==""){
                   quty=0;
                }
                var total =parseFloat($('#item_price_'+i).val())*parseFloat(quty);
                 
                var tax;
                var type;
                if($('#tax_inclusive_'+i).val()==1){
                    tax=total*(parseFloat($('#tax_value_'+i).val())/100)  ;
                    var total =parseFloat(total)+tax;
                    type='Exc';
                }else{
                    type='Inc';
                     tax=total*(parseFloat($('#tax_value_'+i).val())/100)  ;
                  
                    var total =parseFloat($('#item_price_'+i).val())*parseFloat(quty);
                }
              
                var discount = parseFloat(discount);
                discount=discount.toFixed(point);
                total=total-discount;
                var total = parseFloat(total);
                total=total.toFixed(point);
                var tax = parseFloat(tax);
                tax=tax.toFixed(point);
                 
                $('#selected_item_table #new_item_row_id_'+i+' td:nth-child(6)').html(type+'('+$('#tax_value_'+i).val()+'%): '+tax);
                $('#selected_item_table #new_item_row_id_'+i+' td:nth-child(7)').html(discount);
                $('#selected_item_table #new_item_row_id_'+i+' td:nth-child(9)').html(total);
                $('#selected_item_table #item_total_'+i).val(total);
                
                total_amount();
            }else{
                 var discount;
                if($('#discount_per_'+i).val()!=""){
                    discount=(parseFloat($('#item_price_'+i).val())*parseFloat($('#delivered_item_quty'+i).val()))*(parseFloat($('#discount_per_'+i).val())/100)
                }else{
                    discount=0;
                }
                if(isNaN(discount)){
                    discount=0;   
                }
                if(isNaN($('#item_price_'+i).val())){
                          $('#item_price_'+i).val(0);   
                }
                 
                var quty=$('#delivered_item_quty'+i).val();
                if(quty==""){
                   quty=0;
                }
                var total =parseFloat($('#item_price_'+i).val())*parseFloat(quty);
               var  type;
                var tax;
                if($('#tax_inclusive_'+i).val()==1){
                    type='Exc';
                    tax=total*(parseFloat($('#tax_value_'+i).val())/100)  ;
                    var total =parseFloat(total)+tax;
                }else{
                    type='Inc';
                     tax=total*(parseFloat($('#tax_value_'+i).val())/100)  ;
                  
                    var total =parseFloat($('#item_price_'+i).val())*parseFloat(quty);
                }
              
                var discount = parseFloat(discount);
                discount=discount.toFixed(point);
                total=total-discount;
                var total = parseFloat(total);
                total=total.toFixed(point);
                var tax = parseFloat(tax);
                tax=tax.toFixed(point);
                 
                      
                $('#selected_item_table #new_item_row_id_'+i+' td:nth-child(6)').html(type+'('+$('#tax_value_'+i).val()+'%): '+tax);
                $('#selected_item_table #new_item_row_id_'+i+' td:nth-child(7)').html(discount);
                $('#selected_item_table #new_item_row_id_'+i+' td:nth-child(9)').html(total);
                $('#selected_item_table #item_total_'+i).val(total);
              total_amount();
            }
            
        }
    }
    function total_amount(){
        var length=$('#selected_item_table >tbody >tr').length
        var total=0;
        for(var i=0;i<length;i++){
            var item_total=parseFloat($('#item_total_'+i).val());
            if(isNaN(item_total)){
                       item_total=0;  
             }
             if(item_total==""){
                 item_total=0;
             }
            total=total+item_total;
        }
        var discount;
      
        
       
        
        if($('#id_discount').val()=="" && $('#id_discount').val()==0){
           discount=parseFloat(total)-parseFloat($('#discount_amount').val());
        }else{
            discount=(parseFloat(total)*parseFloat($('#id_discount').val()))/100;
            var discount = parseFloat(discount);
           
            discount=discount.toFixed(point);
            $('#discount_amount').val(discount);
        }
        var freight=parseFloat($('#freight').val());
        var round=parseFloat($('#round_off_amount').val());
        if(isNaN(freight))
            freight=0;
        
        if(isNaN(round))
           round=0;
        if(isNaN(discount))
           discount=0;
        $('#demo_total_amount').val(total);
        $('#total_amount').val(total);
       
        var total = parseFloat(total)+freight+round;
        total=total.toFixed(point);
     if($('#parsley_reg #customer_discount').val()==0 || isNaN($('#parsley_reg #customer_discount').val())){
        customer_dis=0;
    }else{
        customer_dis=parseFloat($('#parsley_reg #total_amount').val())*parseFloat($('#parsley_reg #customer_discount').val())/100;
         var customer_dis = parseFloat(customer_dis);
        $('#demo_customer_discount_amount').val(customer_dis.toFixed(point));
        $('#customer_discount_amount').val(customer_dis.toFixed(point));
    }
    
    
        $('#grand_total').val(total-discount);
        var total = parseFloat($('#grand_total').val()-parseFloat(customer_dis));
        $('#demo_grand_total').val(total.toFixed(point));
        $('#grand_total').val(total.toFixed(point));
        
        var total = parseFloat($('#demo_total_amount').val());
        $('#demo_total_amount').val(total.toFixed(point));
      
       
    }
    function receive_free_items_update(i)
    {
        if(isNaN($('#parsley_reg #r_free_id_'+i).val())){
           $('#parsley_reg #r_free_id_'+i).val("");
        }else{
            var good=  $('#parsley_reg #r_free_id_'+i).val();
            var res=  $('#parsley_reg #o_free_id_'+i).val();
             var old=  $('#parsley_reg #grn_old_free_'+i).val();
            if(parseFloat(good)>parseFloat(res)){
                $('#parsley_reg #r_free_id_'+i).val(res);
                
            }
        }
    }
  
    function new_order_date(e){
    if($('#parsley_reg #sales_delivery_note_guid').val()!=""){

     var unicode=e.charCode? e.charCode : e.keyCode
   if($('#parsley_reg #order_date').value!=""){
        
                  if (unicode!=13 && unicode!=9){
        }
       else{
           $('#parsley_reg #r_quty_id_0').focus();
              window.setTimeout(function ()
    {
         $('#parsley_reg #r_quty_id_0').focus();
            }, 0);
        }
         if (unicode!=27){
        }
       else{
        
          $('#parsley_reg #demo_order_number').select2('open');
        }
        }
        }else{
         $.bootstrapGrowl('<?php echo $this->lang->line('please_select')." ".$this->lang->line('sales_order');?>', { type: "warning" }); 
         $('#parsley_reg #demo_order_number').select2('open');

        }

    }
    function receive_free(e,i,n){
        var unicode=e.charCode? e.charCode : e.keyCode
            if (unicode!=13 && unicode!=9){          
            }
            else{
                if(parseFloat(n-1)==parseFloat(i)){
                    $('#parsley_reg #note').focus();
                }else{
                   $('#parsley_reg #r_quty_id_'+parseFloat(+i+1)).focus();
               }
               receive_free_items(i)
            }
             if (unicode!=27){
            }
            else{
                 $('#parsley_reg #r_quty_id_'+i).focus();
                 receive_free_items(i);
            }
    }
    function save_new_order(){
         <?php if($this->session->userdata['sales_delivery_note_per']['add']==1){ ?>
                   if($('#parsley_reg').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                       if(oTable.fnGetData().length>0){
                var inputs = $('#parsley_reg').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/sales_delivery_note/save')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']=='TRUE'){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('sales_delivery_note').' '.$this->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_sales_delivery_note_lists();
                                       refresh_items_table();
                                    }else  if(response['responseText']=='ALREADY'){
                                           $.bootstrapGrowl($('#parsley_reg #order_number').val()+' <?php echo $this->lang->line('supplier').' '.$this->lang->line('is_already_added');?>', { type: "warning" });                           
                                    }else  if(response['responseText']=='FALSE'){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                           
                                    }
                       }
                });
                    }else{
                  
                     $.bootstrapGrowl('<?php echo $this->lang->line('sales_order')?> '+$('#parsley_reg #demo_order_number').select2('data').text+' <?php echo $this->lang->line('all_items_was_received') ?>', { type: "success" });                         
                     $('#parsley_reg #demo_order_number').select2('open');
                     $("#parsley_reg").trigger('reset');
                      $('#selected_item_table .dataTables_empty').html('<?php echo $this->lang->line('please_select').' '.$this->lang->line('sales_order')." ".$this->lang->line('for')." ".$this->lang->line('sales_delivery_note') ?>');
                     $('#dn_no').val(grn_number);
                     $('#demo_dn_no').val(grn_number);
                    }
                    }else{
                   $.bootstrapGrowl('<?php echo $this->lang->line('please_enter')." ".$this->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?php }else{ ?>
                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier');?>', { type: "error" });                       
                    <?php }?>
    }
    function update_order(){
         <?php if($this->session->userdata['sales_delivery_note_per']['edit']==1){ ?>
                   if($('#parsley_reg').valid()){
                       var oTable = $('#selected_item_table').dataTable();
                       if(oTable.fnGetData().length>0){
                var inputs = $('#parsley_reg').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/sales_delivery_note/update')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']=='TRUE'){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('sales_delivery_note').' '.$this->lang->line('updated');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_sales_delivery_note_lists();
                                       refresh_items_table();
                                    }else  if(response['responseText']=='ALREADY'){
                                           $.bootstrapGrowl($('#parsley_reg #order_number').val()+' <?php echo $this->lang->line('supplier').' '.$this->lang->line('is_already_added');?>', { type: "warning" });                           
                                    }else  if(response['responseText']=='FALSE'){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                           
                                    }
                       }
                });
                    }else{
                  
                   $.bootstrapGrowl('<?php echo $this->lang->line('Please_Select_An_Item');?>', { type: "warning" }); 
                     $('#parsley_reg #items').select2('open');
                    }
                    }else{
                   $.bootstrapGrowl('<?php echo $this->lang->line('please_enter')." ".$this->lang->line('all_require_elements');?>', { type: "error" });                        
                    }<?php }else{ ?>
                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('supplier');?>', { type: "error" });                       
                    <?php }?>
    }
    
     $(document).ready( function () {
         
         function format_sales_order(sup) {
            if (!sup.id) return sup.text;
    return  "<p >"+sup.text+"    <br>"+sup.date+" "+sup.company+"   "+sup.customer+"</p> ";
            }
        $('#parsley_reg #demo_order_number').change(function() {
            if($('#parsley_reg #demo_order_number').select2('data').received_status==0){
               refresh_items_table();
             $('#loading').modal('show');
                   var guid = $('#parsley_reg #demo_order_number').select2('data').id;

               
                            $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/sales_delivery_note/get_sales_order/"+guid,                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             { 
                           
                                 
                                $('#parsley_reg #sales_delivery_note_guid').val($('#parsley_reg #demo_order_number').select2('data').id);
                                $('#parsley_reg #demo_order_number').val($('#parsley_reg #demo_order_number').select2('data').text);
                                $('#parsley_reg #company').val($('#parsley_reg #demo_order_number').select2('data').company);
                                $('#parsley_reg #first_name').val($('#parsley_reg #demo_order_number').select2('data').supplier);
                                $('#parsley_reg #order_date').val($('#parsley_reg #demo_order_number').select2('data').order_date);
                                $('#parsley_reg #expiry_date').val($('#parsley_reg #demo_order_number').select2('data').expiry);
                                $('#parsley_reg #id_discount').val($('#parsley_reg #demo_order_number').select2('data').discount);
                                $('#parsley_reg #discount_amount').val($('#parsley_reg #demo_order_number').select2('data').dis_amount);
                                $('#parsley_reg #freight').val($('#parsley_reg #demo_order_number').select2('data').freight);
                                $('#parsley_reg #round_off_amount').val($('#parsley_reg #demo_order_number').select2('data').round);
                                $('#parsley_reg #supplier_guid').val(guid);
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
                                $("#parsley_reg #sales_delivery_note_guid").val(guid);
                                $("#parsley_reg #demo_order_number").val(data[0]['po_no']);
                                $("#parsley_reg #order_number").val(data[0]['po_no']);
                                $("#parsley_reg #order_date").val(data[0]['po_date']);
                                $("#parsley_reg #expiry_date").val(data[0]['exp_date']);
                                $("#parsley_reg #id_discount").val(data[0]['discount']);
                                $("#parsley_reg #freight").val(data[0]['freight']);
                                $("#parsley_reg #round_off_amount").val(data[0]['round_amt']);
                                $("#parsley_reg #demo_customer_discount").val(data[0]['customer_discount']);
                                $("#parsley_reg #customer_discount").val(data[0]['customer_discount']);
                                $("#parsley_reg #customer_discount_amount").val(data[0]['customer_discount_amount']);
                                $("#parsley_reg #demo_customer_discount_amount").val(data[0]['customer_discount_amount']);
                                var tax;
                                var receive=0;
                                var total_discount=0;
                                var total_tax=0;
                                var total_amount=0;
                                for(i=0;i<data.length;i++){
                                      receive=1;
                                    var  name=data[i]['items_name'];
                                    var  sku=data[i]['i_code'];
                                    var  quty=data[i]['quty'];
                                    var  tax_type=data[i]['tax_type_name'];
                                    var  tax_value=data[i]['tax_value'];
                                    var  tax_Inclusive=data[i]['tax_Inclusive'];
                                  
                                    var  price=data[i]['price'];
                                    var uom=data[i]['uom']
                                    
                                    if(uom==1){
                                        var no_of_unit=data[i]['no_of_unit'];
                                        price=price/no_of_unit;
                                    }
                                    var  o_i_guid=data[i]['o_i_guid'];
                                    var  items_id=data[i]['item'];
                                    var discount=0;
                                     var per=0;
                                    if(data[i]['dis_per']!=0){
                                         per=data[i]['dis_per'];
                                        discount=(parseFloat(quty)*parseFloat(price))*per/100;
                                         
                                    }
                                    
                                     
                                    total_discount=parseFloat(total_discount)+parseFloat(discount);
                                   if(data[i]['tax_Inclusive']==1){
                                      var tax_val=data[i]['tax_value'];
                                      var tax=(parseFloat(quty)*parseFloat(price))*tax_val/100;
                                      total_tax=parseFloat(total_tax)+parseFloat(tax);
                                      var total=+tax+ +(parseFloat(quty)*parseFloat(price))-discount;
                                      var type='Exc';
                                      var num = parseFloat(total);
                                      total=num.toFixed(point);
                                  }else{
                                      var type="Inc";
                                      var tax_val=data[i]['tax_value'];
                                      var tax=(parseFloat(quty)*parseFloat(price))*tax_val/100;
                                  
                                      var total=(parseFloat(quty)*parseFloat(price))-discount;
                                      var num = parseFloat(total);
                                      total=num.toFixed(point);
                                  }
                                    var num = parseFloat(tax);
                                      tax=num.toFixed(point);
                                    var num = parseFloat(discount);
                                      discount=num.toFixed(point);
                                    var num = parseFloat(price);
                                      price=num.toFixed(point);
                                      
                                  total_amount=parseFloat(total_amount)+parseFloat(total)
                                    var addId = $('#selected_item_table').dataTable().fnAddData( [
                                    null,
                                    name,
                                    sku,
                                    quty,
                                  price,
                                 
                                 type+'('+tax_val+'%): '+tax,
                                  discount,
                                   "<input type='hidden' id='item_total_"+i+"' value='"+total+"'><input type='hidden' id='item_quty_"+i+"' value='"+quty+"'><input type='hidden' id='tax_inclusive_"+i+"' value='"+data[i]['tax_Inclusive']+"' ><input type='hidden' id='tax_value_"+i+"' value='"+data[i]['tax_value']+"' ><input type='hidden' id='discount_per_"+i+"' value='"+per+"' ><input type='hidden' name='items[]' value='"+data[i]['item']+"' ><input type='hidden' id='item_price_"+i+"' value='"+price+"' ><input type='text' id='delivered_item_quty"+i+"' value='"+quty+"' name='delivered_quty[]' onkeyup='delivered_quty_items("+i+")' onKeyPress='delivered_quty(event,"+i+");return numbersonly(event)' class='form-control' style='width:100px'>",
                                 total
                                 ] );
                                 if(data[0]['discount']==0){
                                      var so_discount=0;
                                   $("#parsley_reg #discount_amount").val(data[0]['discount_amt']);
                                   so_discount=data[0]['discount_amt'];
                                 }else{
                                    var so_discount=parseFloat(total_amount)*parseFloat(data[0]['discount'])/100;
                                    $("#parsley_reg #discount_amount").val(so_discount);
                                    $("#parsley_reg #id_discount").val(data[0]['discount']);
                                 }
                                 var freight=data[0]['freight']
                                 if(isNaN(freight) || freight==""){freight=0;}
                                 var round_amt=data[0]['round_amt']
                                 if(isNaN(round_amt) || round_amt==""){round_amt=0;}
                                 
                                 var grand=parseFloat(total_amount)-parseFloat(so_discount)+parseFloat(freight)+parseFloat(round_amt);
                                  var num = parseFloat(total_amount);
                                  total_amount=num.toFixed(point);

                                $('#demo_total_amount').val(total_amount);
                                  $('#total_amount').val(total_amount);
                                  
                                  
                                  $('#grand_total').val(grand-data[0]['customer_discount_amount']);
                                  $('#demo_grand_total').val(grand-data[0]['customer_discount_amount']);
                                   var num = parseFloat($('#grand_total').val());
                                  $('#grand_total').val(num.toFixed(point));
                                  $('#demo_grand_total').val(num.toFixed(point));
                                  
                                  $('#total_item_discount_amount').val(total_discount);
                                  $('#total_tax').val(total_tax);
                              var theNode = $('#selected_item_table').dataTable().fnSettings().aoData[addId[0]].nTr;
                              theNode.setAttribute('id','new_item_row_id_'+i)
                                
                                }if(receive==0){
                                  $.bootstrapGrowl('<?php echo $this->lang->line('sales_order')?> '+$('#parsley_reg #demo_order_number').select2('data').text+' <?php echo $this->lang->line('all_items_was_received') ?>', { type: "success" });                         
                                  $('#selected_item_table .dataTables_empty').html('<?php echo $this->lang->line('sales_order')?> '+$('#parsley_reg #demo_order_number').select2('data').text+' <?php echo $this->lang->line('all_items_was_received') ?>');
                                  }
                             
                             }
                           });
                    
                      window.setTimeout(function ()
                    {
                       //$('#parsley_reg #delivery_date').focus();
                       document.getElementById('delivery_date').focus();
                       $('#loading').modal('hide');
                    }, 0);  
                    }else{
                     $('#parsley_reg #demo_order_number').select2('open');
                     $("#parsley_reg").trigger('reset');
                     $.bootstrapGrowl('<?php echo $this->lang->line('sales_order')?> '+$('#parsley_reg #demo_order_number').select2('data').text+' <?php echo $this->lang->line('was')." ". $this->lang->line('delivered');?>', { type: "warning" });                         
                     $('#dn_no').val(grn_number);
                     $('#demo_dn_no').val(grn_number);
                     
                    }
          });
          $('#parsley_reg #demo_order_number').select2({
              dropdownCssClass : 'supplier_select',
               formatResult: format_sales_order,
                formatSelection: format_sales_order,
                
                escapeMarkup: function(m) { return m; },
                placeholder: "<?php echo $this->lang->line('search').' '.$this->lang->line('sales_order') ?>",
                ajax: {
                     url: '<?php echo base_url() ?>index.php/sales_delivery_note/search_sales_order',
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
                          company: item.c_name,
                          customer: item.s_name,
                          order_date: item.po_date,
                          expiry: item.exp_date,
                          discount: item.discount,
                          dis_amount: item.discount_amt,
                          freight: item.freight,
                          round: item.round_amt,
                          expired: item.expired,
                          received_status: item.received_status,
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
refresh_items_table();
   $("#parsley_reg").trigger('reset');
    <?php if($this->session->userdata['sales_delivery_note_per']['add']==1){ ?>
            $('#update_button').hide();
            $(".supplier_select_2").show();
            $(".porchase_order_for_grn").hide();
            $('#save_button').show();
            $('#update_clear').hide();
            $('#save_clear').show();
            $('#total_amount').val('');
            $('#items_id').val('');
            $('#supplier_guid').val('');
            $("#parsley_reg").trigger('reset');
            $('#deleted').remove();
            $('#parent_items').append('<div id="deleted"></div>');
            $('#newly_added').remove();
            $('#parent_items').append('<div id="newly_added"></div>');
            $("#parsley_reg #demo_order_number").select2('data', {id:'',text: 'Search PO'});
             $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/sales_delivery_note/order_number/",                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 
                                
                                 $('#parsley_reg #demo_dn_no').val(data[0][0]['prefix']+data[0][0]['max']);
                                 $('#parsley_reg #dn_no').val(data[0][0]['prefix']+data[0][0]['max']);
                                 grn_number=data[0][0]['prefix']+data[0][0]['max'];
                             }
                             });
            
            
            
                  $("#user_list").hide();
                  $('#add_new_order').show('slow');
                  $('#delete').attr("disabled", "disabled");
                  $('#posnic_add_sales_delivery_note').attr("disabled", "disabled");
                  $('#active').attr("disabled", "disabled");
                  $('#deactive').attr("disabled", "disabled");
                  $('#sales_delivery_note_lists').removeAttr("disabled");
       
                     window.setTimeout(function ()
                    {
                       $('#parsley_reg #demo_order_number').select2('open');
                    }, 1000);
      <?php }else{ ?>
                    $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                         
                    <?php }?>
}
function posnic_sales_delivery_note_lists(){
      $('#edit_brand_form').hide('hide');
      $('#add_new_order').hide('hide');      
      $("#user_list").show('slow');
      $('#delete').removeAttr("disabled");
      $('#active').removeAttr("disabled");
      $('#deactive').removeAttr("disabled");
      $('#posnic_add_sales_delivery_note').removeAttr("disabled");
      $('#sales_delivery_note_lists').attr("disabled",'disabled');
}
function clear_add_sales_delivery_note(){
      $("#parsley_reg").trigger('reset');
      refresh_items_table();
}
function clear_update_sales_delivery_note(){
      $("#parsley_reg").trigger('reset');
      refresh_items_table();
      edit_function($('#sales_delivery_note_guid').val());
}
function reload_update_user(){
    var id=$('#guid').val();
    supplier_function(id);
}
</script>
<nav id="top_navigation">
    <div class="container">
            <div class="row">
                <div class="col col-lg-7">
                        <a href="javascript:posnic_add_new()" id="posnic_add_sales_delivery_note" class="btn btn-default" ><i class="icon icon-user"></i> <?php echo $this->lang->line('addnew') ?></a>  
                      
                        <a href="javascript:posnic_group_approve()" class="btn btn-default" id="deactive"  ><i class="icon icon-play"></i> <?php echo $this->lang->line('approve') ?></a>
                        <a href="javascript:grn_group_delete()" class="btn btn-default" id="delete"><i class="icon icon-trash"></i> <?php echo $this->lang->line('delete') ?></a>
                        <a href="javascript:posnic_sales_delivery_note_lists()" class="btn btn-default" id="sales_delivery_note_lists"><i class="icon icon-list"></i> <?php echo $this->lang->line('sales_delivery_note') ?></a>
                        
                </div>
            </div>
    </div>
</nav>
<div class="modal fade" id="loading">
    <div class="modal-dialog" style="width: 146px;margin-top: 20%">
                
        <img src="<?php echo base_url('loader.gif') ?>" style="margin: auto">
                    
        </div>
</div>
<nav id="mobile_navigation"></nav>
              
<section class="container clearfix main_section">
        <div id="main_content_outer" class="clearfix">
            <div id="main_content">
                        <?php $form =array('name'=>'posnic'); 
                    echo form_open('sales_delivery_note/sales_delivery_note_manage',$form) ?>
                        <div class="row">
                            <div class="col-sm-12" id="user_list"><br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title"><?php echo $this->lang->line('sales_delivery_note') ?></h4>                                                                               
                                    </div>
                                    <table id="dt_table_tools" class="table-striped table-condensed" style="width: 100%"><thead>
                                        <tr>
                                         <th>Id</th>
                                          <th ><?php echo $this->lang->line('select') ?></th>
                                          <th ><?php echo $this->lang->line('sales_order') ?></th>
                                           <th style="width: 170px !important"><?php echo $this->lang->line('grn_number') ?></th>
                                          
                                          <th><?php echo $this->lang->line('company') ?></th>
                                           <th><?php echo $this->lang->line('name') ?></th>
                                          <th><?php echo $this->lang->line('order_date') ?></th>
                                          <th><?php echo $this->lang->line('number_of_items') ?></th>
                                          <th><?php echo $this->lang->line('total_amount') ?></th>
                                         
                                      
                                          <th><?php echo $this->lang->line('status') ?></th>
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

               
       

  
<section id="add_new_order" class="container clearfix main_section">
     <?php   $form =array('id'=>'parsley_reg',
                          'runat'=>'server',
                          'name'=>'items_form',
                          'class'=>'form-horizontal');
       echo form_open_multipart('sales_delivery_note/upadate_pos_sales_delivery_note_details/',$form);?>
        
    <div id="main_content" style="padding: 0 14px !important;">
                     
        <input type="hidden" name="dummy_discount" id="dummy_discount" >
        <input type="hidden" name="dummy_discount_amount" id="dummy_discount_amount" >
        <input type="hidden" name="sales_delivery_note_guid" id="sales_delivery_note_guid" >
        <input type="hidden" name="guid" id="guid" >
                         <div class="row">
                          <div class="panel panel-default">
                              <div class="panel-heading" >
                                     <h4 class="panel-title"><?php echo $this->lang->line('sales_delivery_note')." ".$this->lang->line('details') ?></h4>                                                                               
                               </div>
                            
                                 
                                       <div id="" class="col col-sm-12" style="padding-right: 25px;padding-left: 25px">
                                           <div class="row">
                                               <div class="col col-sm-2" >
                                                   <div class="form_sep supplier_select_2">
                                                        <label for="demo_order_number" ><?php echo $this->lang->line('order_number') ?></label>													
                                                                  <?php $demo_order_number=array('name'=>'demo_order_number',
                                                                                    'class'=>'  form-control',
                                                                                    'id'=>'demo_order_number',
                                                                                   
                                                                                    'value'=>set_value('demo_order_number'));
                                                                     echo form_input($demo_order_number)?>
                                                        <input type="hidden" id="sales_delivery_note_guid" name="sales_delivery_note_guid">
                                                       
                                                  </div> 
                                                   <div class="form_sep porchase_order_for_grn" style="margin-top:0px">
                                                         <label for="demo_order_number" ><?php echo $this->lang->line('order_number') ?></label>	
                                                         <input type="text" disabled="disabled" id="edit_dn_node" class='form-control'>
                                                   </div>
                                               </div>
                                                <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="name" ><?php echo $this->lang->line('name') ?></label>													
                                                                     <?php $name=array('name'=>'name',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'first_name',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('name'));
                                                                         echo form_input($name)?>
                                                            <input type="hidden" name="order_number" id="order_number">
                                                       </div>
                                                    </div>
                                               <div class="col col-sm-2" >
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
                                              
                                               <div class="col col-sm-2" >
                                                    <div class="form_sep">
                                                            <label for="address" ><?php echo $this->lang->line('address') ?></label>													
                                                                     <?php $address=array('name'=>'address',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'address',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('address'));
                                                                         echo form_input($address)?>
                                                       </div>
                                               </div>
                                              
                                               <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="customer_discount" ><?php echo $this->lang->line('customer').' '.$this->lang->line('discount') ?> %</label>													
                                                                     <?php $customer_discount=array('name'=>'customer_discount',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'demo_customer_discount',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('customer_discount'));
                                                                         echo form_input($customer_discount)?>
                                                            <input type="hidden" name="customer_discount" id="customer_discount">
                                                       </div>
                                                    </div>
                                                 <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="customer_discount_amount" ><?php echo $this->lang->line('customer').' '.$this->lang->line('disc').' '.$this->lang->line('amt') ?></label>													
                                                                     <?php $customer_discount_amount=array('name'=>'customer_discount_amount',
                                                                                        'class'=>'required  form-control',
                                                                                        'id'=>'demo_customer_discount_amount',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('customer_discount'));
                                                                         echo form_input($customer_discount_amount)?>
                                                            <input type="hidden" name="customer_discount_amount" id="customer_discount_amount">
                                                       </div>
                                                    </div>
                                              
                                              
                                               </div>
                                           <div class="row">
                                                <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="discount" ><?php echo $this->lang->line('discount') ?>%</label>													
                                                                     <?php $discount=array('name'=>'discount',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'id_discount',
                                                                                        'maxlength'=>5,
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('discount'));
                                                                         echo form_input($discount)?>
                                                       </div>
                                                    </div>
                                          
                                                
                                                <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="discount_amount" ><?php echo $this->lang->line('discount_amount') ?></label>													
                                                                     <?php $discount_amount=array('name'=>'discount_amount',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'discount_amount',
                                                                                     
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('discount_amount'));
                                                                         echo form_input($discount_amount)?>
                                                       </div>
                                                    </div>
                                                <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="freight" ><?php echo $this->lang->line('freight') ?></label>													
                                                                     <?php $freight=array('name'=>'freight',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'freight',
                                                                                     
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('freight'));
                                                                         echo form_input($freight)?>
                                                       </div>
                                                    </div>
                                                <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="round_off_amount" ><?php echo $this->lang->line('round_off_amount') ?></label>													
                                                                     <?php $round_off_amount=array('name'=>'round_off_amount',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'round_off_amount',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('round_off_amount'));
                                                                         echo form_input($round_off_amount)?>
                                                       </div>
                                                    </div>
                                                <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="dn_no" ><?php echo $this->lang->line('dn_no') ?></label>													
                                                                     <?php $round_off_amount=array('name'=>'demo_dn_no',
                                                                                        'class'=>'  form-control',
                                                                                        'id'=>'demo_dn_no',
                                                                                        'disabled'=>'disabled',
                                                                                        'value'=>set_value('demo_dn_no'));
                                                                         echo form_input($round_off_amount)?>
                                                            <input type="hidden" name="dn_no" id="dn_no">
                                                       </div>
                                                    </div>
                                                <div class="col col-sm-2" >
                                                   <div class="form_sep">
                                                            <label for="delivery_date" ><?php echo $this->lang->line('delivery_date') ?></label>													
                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                           <?php $delivery_date=array('name'=>'delivery_date',
                                                                                            'class'=>'required form-control',
                                                                                            'id'=>'delivery_date',
                                                                                            'onKeyPress'=>"new_order_date(event)", 
                                                                                            'value'=>set_value('delivery_date'));
                                                                             echo form_input($delivery_date)?>
                                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                </div>
                                                       </div>
                                                   </div>
                                           </div>
                                     <br>
                                        </div>                              
                             
                          </div>
                          </div>
                         
                         
         
                     
                    <div class="row small_inputs" >
                    <div class="col col-lg-9">
                      
                         
                             
                              
                          
                          
                        <div class="row" ><input type="hidden" value="0" id='sl_number'>
             
                            <div class="image_items">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title"><?php echo $this->lang->line('order_items') ?></h4>                                                                               
                                    </div>
                                <table id='selected_item_table' class="table table-striped dataTable ">
                                    <thead>
                                        <tr>
                                            
                                     <th><?php echo $this->lang->line('no') ?></th>
                                    <th><?php echo $this->lang->line('name') ?></th>
                                        <th><?php echo $this->lang->line('sku') ?></th>
                                    <th><?php echo $this->lang->line('quantity') ?></th>                                  
                                    <th><?php echo $this->lang->line('price') ?></th>
                                    <th><?php echo $this->lang->line('tax') ?></th>
                                    <th><?php echo $this->lang->line('discount') ?></th>
                                    <th><?php echo $this->lang->line('delivered_quty') ?></th>
                                    <th><?php echo $this->lang->line('total') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody id="new_order_items" >
                                       
                                    </tbody >
                                </table>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col col-lg-12" id="parent_items">
                            <div class="row">
                         
                             
                                 
                                       <div id="" class="col col-lg-12" style="padding-right: 0px;padding-left: 0px">
                                           <div class="panel panel-default">
                              <div class="panel-heading" >
                                     <h4 class="panel-title"><?php echo $this->lang->line('note')." ".$this->lang->line('and')." ".$this->lang->line('remark') ?></h4>                                                                               
                              </div> <div class="row" style="padding-left:25px;padding-right:25px;padding-bottom:  25px">
                                               <div class="col col-sm-6" >
                                                   <div class="form_sep ">
                                                        <label for="note" ><?php echo $this->lang->line('note') ?></label>													
                                                                  <?php $note=array('name'=>'note',
                                                                                    'class'=>' form-control',
                                                                                    'id'=>'note',
                                                                                   'rows'=>3,
                                                                                    'value'=>set_value('note'));
                                                                     echo form_textarea($note)?>
                                                        
                                                  </div>
                                               </div>
                                               <div class="col col-sm-6" >
                                                   <div class="form_sep ">
                                                         <label for="remark" ><?php echo $this->lang->line('remark') ?></label>													
                                                                  <?php $remark=array('name'=>'remark',
                                                                                    'class'=>' form-control',
                                                                                    'id'=>'remark',
                                                                                   'rows'=>3,
                                                                                    'value'=>set_value('remark'));
                                                                     echo form_textarea($remark)?>
                                                        
                                                  </div>
                                               </div>
                                               
                                               
                                               
                                              
                                           </div>
                                           </div>
                                     <br>
                                        </div> 
                               
                             
                          
                          </div>
                                <div id="deleted">
                                    
                                </div>
                                <div id="newly_added">
                                    
                                </div>
                            </div>
                        </div>
                    
                    </div><div class="col col-sm-3" >
                       
                        <div class="row" style="margin-left: 5px">
                                                     <div class="panel panel-default">
                                                    <div class="panel-heading" >
                                     <h4 class="panel-title"><?php echo $this->lang->line('amount') ?></h4>                                                                               
                              </div>
                                                         <div class="form_sep " style="padding: 0 25px">
                                                        <label for="total_item_discount_amount" ><?php echo $this->lang->line('total_item_discount_amount') ?></label>													
                                                                  <?php $total_item_discount_amount=array('name'=>'total_item_discount_amount',
                                                                                    'class'=>' form-control',
                                                                                    'id'=>'total_item_discount_amount',
                                                                                    'disabled'=>'disabled',
                                                                                    'value'=>set_value('total_item_discount_amount'));
                                                                     echo form_input($total_item_discount_amount)?>
                                                        
                                                  </div>
                                                         <div class="form_sep " style="padding: 0 25px">
                                                        <label for="total_tax" ><?php echo $this->lang->line('total_tax') ?></label>													
                                                                  <?php $total_item_discount_amount=array('name'=>'total_tax',
                                                                                    'class'=>' form-control',
                                                                                    'id'=>'total_tax',
                                                                                    'disabled'=>'disabled',
                                                                                    'value'=>set_value('total_tax'));
                                                                     echo form_input($total_item_discount_amount)?>
                                                        
                                                  </div>
                                                         <div class="form_sep " style="padding: 0 25px">
                                                        <label for="total_amount" ><?php echo $this->lang->line('total_amount') ?></label>													
                                                                  <?php $total_amount=array('name'=>'demo_total_amount',
                                                                                    'class'=>'required  form-control',
                                                                                    'id'=>'demo_total_amount',
                                                                                    'disabled'=>'disabled',
                                                                                    'value'=>set_value('total_amount'));
                                                                     echo form_input($total_amount)?>
                                                        <input type="hidden" name="total_amount" id="total_amount">
                                                        
                                                  </div>
                                                         <div class="form_sep " style="padding: 0 25px">
                                                        <label for="grand_total" ><?php echo $this->lang->line('grand_total') ?></label>													
                                                                  <?php $grand_total=array('name'=>'demo_grand_total',
                                                                                    'class'=>'required  form-control',
                                                                                    'id'=>'demo_grand_total',
                                                                                    'disabled'=>'disabled',
                                                                                    'value'=>set_value('grand_total'));
                                                                     echo form_input($grand_total)?>
                                                        <input type="hidden" name="grand_total" id="grand_total">
                                                        
                                                  </div><br>
                                                  </div>
                                               </div>
                        <div class="row" style="margin-left: 5px">
                                          <div class="col col-sm-6"  >
                                              <div class="form_sep " id="save_button" style="padding-left:0px">
                                                       <label for="" >&nbsp;</label>	
                                                       <a href="javascript:save_new_order()" class="btn btn-default"  ><i class="icon icon-save"></i> <?php echo " ".$this->lang->line('save') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_button" style=" margin-top: 0 !important;">
                                                       <label for="" >&nbsp;</label>	
                                                       <a href="javascript:update_order()" class="btn btn-default"  ><i class="icon icon-edit"></i> <?php echo " ".$this->lang->line('update') ?></a>
                                                  </div>
                                               </div>
                                          <div class="col col-sm-6"  >
                                                   <div class="form_sep " id="save_clear">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_add_sales_order()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?php echo " ".$this->lang->line('clear') ?></a>
                                                  </div>
                                              <div class="form_sep " id="update_clear" style="margin-top:0 !important">
                                                       <label for="remark" >&nbsp;</label>	
                                                        <a href="javascript:clear_update_sales_order()" class="btn btn-default"  ><i class="icon icon-refresh"></i> <?php echo " ".$this->lang->line('clear') ?></a>
                                                  </div>
                                               </div>
                                         
                                               
                                              
                                      </div>
                    </div>  </div> 
                      </div> 
    <?php echo form_close();?>
</section>    
           <div id="footer_space">
              
           </div>
		</div>
	
    <script type="text/javascript">
        function posnic_group_approve(){
              <?php if($this->session->userdata['sales_delivery_note_per']['approve']==1){ ?>
                     var flag=0;
                     var field=document.forms.posnic;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                              $.bootstrapGrowl('<?php echo $this->lang->line('Select Atleast One')."".$this->lang->line('sales_delivery_note');?>', { type: "warning" });
                      
                      }else{
                            var posnic=document.forms.posnic;
                      for (i = 0; i < posnic.length-1; i++){
                          var guid=posnic[i].value;
                            var po=$('#sales_order__number_'+guid).val();
                          if(posnic[i].checked==true){                             
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

                          }

                      }
                  

                      }  
               <?php }else{?>
                         $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission')." ".$this->lang->line('to')." ".$this->lang->line('approve')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                       
                <?php }?>
               }
                      
                   
    function grn_group_delete(){
                     <?php if($this->session->userdata['sales_delivery_note_per']['delete']==1){ ?>
                     var flag=0;
                     var field=document.forms.posnic;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                        
                          $.bootstrapGrowl('<?php echo $this->lang->line('Select Atleast One')."".$this->lang->line('sales_delivery_note');?>', { type: "warning" });
                      }else{
                            bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete')."".$this->lang->line('sales_delivery_note') ?>", function(result) {
             if(result){
              
             
                        var posnic=document.forms.posnic;
                        for (i = 0; i < posnic.length; i++){
                          if(posnic[i].checked==true){   
                              var guid=posnic[i].value;
                              $.ajax({
                                url: '<?php echo base_url() ?>/index.php/sales_delivery_note/delete',
                                type: "POST",
                                data: {
                                    guid:posnic[i].value

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

                      }    
                      }
                      });
                      }  
                      <?php }else{?>
                               $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Delete')." ".$this->lang->line('sales_delivery_note');?>', { type: "error" });                       
                       <?php }
                    ?>
                      }
                    
                    
                    
                 
                    
                </script>
              

      