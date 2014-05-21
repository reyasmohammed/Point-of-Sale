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
         $('#add_new_module').click(function() { 
                <?php if($this->session->userdata['module_per']['add']==1){ ?>
                var inputs = $('#add_module').serialize();
                if($('#parsley_reg').valid()){
                      $.ajax ({
                            url: "<?php echo base_url('index.php/module/add_module')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']=='TRUE'){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('module').' '.$this->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#add_module").trigger('reset');
                                       posnic_module_lists();
                                    }else  if(response['responseText']=='ALREADY'){
                                           $.bootstrapGrowl($('#module_name').val()+' <?php echo $this->lang->line('module').' '.$this->lang->line('is_already_added')." ".$this->lang->line('should_not_repeat_order_number');?>', { type: "warning" });                           
                                    }else  if(response['responseText']=='FALSE'){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('module');?>', { type: "error" });                           
                                    }
                       }
                       
                });
                }
                    <?php }else{ ?>
                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('module');?>', { type: "error" });         
                    <?php }?>
        });
         $('#update_module').click(function() { 
                <?php if($this->session->userdata['module_per']['edit']==1){ ?>
                var inputs = $('#parsley_reg').serialize();
                if($('#parsley_reg').valid()){
                      $.ajax ({
                            url: "<?php echo base_url('index.php/module/update_module')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                  if(response['responseText']=='TRUE'){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('module').' '.$this->lang->line('updated');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_module_lists();
                                    }else  if(response['responseText']=='ALREADY'){
                                           $.bootstrapGrowl($('#module_name').val()+' <?php echo $this->lang->line('module').' '.$this->lang->line('is_already_added')." ".$this->lang->line('should_not_repeat_order_number');?>', { type: "warning" });                           
                                    }else  if(response['responseText']=='FALSE'){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('please_enter_non_repeated_correct_order');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('module');?>', { type: "error" });                           
                                    }
                       }
                 });
                 }
                 <?php }else{ ?>
                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('module');?>', { type: "error" });         
                    <?php }?>
        });
     });
function posnic_add_new(){
    <?php if($this->session->userdata['module_per']['add']==1){ ?>
      $("#user_list").hide();
      $("#update_button").hide();
      $("#add_button").show();
      $('#add_module_form').show('slow');
      $('#delete').attr("disabled", "disabled");
      $('#posnic_add_module').attr("disabled", "disabled");
  
      $('#module_lists').removeAttr("disabled");
 
      
      
      
      
      <?php }else{ ?>
                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('module');?>', { type: "error" });         
                    <?php }?>
}
function posnic_assign(){
    <?php if($this->session->userdata['module_per']['add']==1){ ?>
      $("#user_list").hide();
      $("#update_button").hide();
      $("#add_button").show();
      $('#add_module_form').show('slow');
      $('#delete').attr("disabled", "disabled");
      $('#posnic_add_module').attr("disabled", "disabled");
  
      $('#module_lists').removeAttr("disabled");
      $('#modules').remove();
      $('#parent_modules').append('<div id="modules"/>');
        $('#loading').modal('show');
      
       $.ajax({                                      
                             url: "<?php echo base_url('index.php/module/get_modules_list') ?>",                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 
                             
                                   var len=data.length-2;
                    for(var i=0;i<data[len].length;i++){
                                   var module_row;
            
            if(i%4==0){
                module_row='mod_row_'+data[len][i]['guid'];
              $('#modules').append('<div class="row" id="'+module_row+'" />');
            }
           
             $('#'+module_row).append('<div class="col col-lg-3" id="mod_col_'+data[len][i]['guid']+'" >\n\
                        <div class="row text-center" style="border-bottom:solid 3px #48AC2E;margin:10px -3px">\n\
                            <lablel  >'+data[len][i]['Category_name']+'</lablel>\n\
                        </div><input type="hidden" name="category_name[]" value="'+data[len][i]['Category_name']+'"><input type="hidden" name="category_id[]" value="'+data[len][i]['guid']+'"></div>');
            for(var j=0;j<data.length-2;j++){
                if(data[j]['cate_id']==data[len][i]['guid']){
                    if(data[j]['core']==1){
                         $('#'+module_row+' #mod_col_'+data[len][i]['guid']).append('<div class="row" style="margin:5px">\n\
                            <div class="col col-lg-9">\n\
                                <lablel>'+data[j]['module_name']+'</lablel>\n\
                            </div>\n\
                            <div class="col col-lg-3">\n\
                               <input type="checkbox" disabled="disabled" checked name="'+data[j]['module_name']+'_'+data[j]['guid']+'"  id="permission_'+j+data[j]['guid']+'"> \n\
                            </div>\n\
                        </div>');
                    }else{
                          $('#'+module_row+' #mod_col_'+data[len][i]['guid']).append('<div class="row" style="margin:5px">\n\
                            <div class="col col-lg-9">\n\
                                <lablel>'+data[j]['module_name']+'</lablel>\n\
                            </div>\n\
                            <div class="col col-lg-3">\n\
                               <input type="checkbox" name="'+data[j]['module_name']+'_'+data[j]['guid']+'"  id="permission_'+j+data[j]['guid']+'"> \n\
                            </div>\n\
                        </div>');
            
                               }
             
                            $('#permission_'+j+data[j]['guid']).wrap('<div class="make-switch  switch-mini" data-on-label="'+"<i class='icon icon-ok'></i>"+'" data-off-label="'+"<i class='icon icon-off'></i>"+'" />').parent().bootstrapSwitch(); 
                        }
                            } 
                             }
                             $('#loading').modal('hide');
                             }
                           });
      
      
      
      <?php }else{ ?>
                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('module');?>', { type: "error" });         
                    <?php }?>
}
function posnic_module_lists(){
     
      $('#add_module_form').hide('hide');      
      $("#user_list").show('slow');
      $('#delete').removeAttr("disabled");
     
      $('#posnic_add_module').removeAttr("disabled");
      $('#module_lists').attr("disabled",'disabled');
}
function clear_add_module(){
      $("#posnic_user_2").trigger('reset');
}
function reload_update_user(){
    var id=$('#guid').val();
    edit_function(id);
}
</script>
<nav id="top_navigation">
    <div class="container">
            <div class="row">
                <div class="col col-lg-7">
                        <a href="javascript:posnic_add_new()" id="posnic_add_new" class="btn btn-default" ><i class="icon icon-user"></i> <?php echo $this->lang->line('new_module') ?></a>  
                        <a href="javascript:posnic_assign()" id="posnic_assign_module" class="btn btn-default" ><i class="icon icon-user"></i> <?php echo $this->lang->line('assign_module') ?></a>  
                       
                        <a href="javascript:posnic_delete()" class="btn btn-default" id="delete"><i class="icon icon-trash"></i> <?php echo $this->lang->line('delete') ?></a>
                        <a href="javascript:posnic_module_lists()" class="btn btn-default" id="module_lists"><i class="icon icon-list"></i> <?php echo $this->lang->line('module') ?></a>
                </div>
            </div>
    </div>
</nav>
<nav id="mobile_navigation"></nav>
  <div class="modal fade" id="loading">
    <div class="modal-dialog" style="width: 146px;margin-top: 20%">
                
        <img src="<?php echo base_url('loader.gif') ?>" style="margin: auto">
                    
        </div>
</div>            
<section class="container clearfix main_section">
        <div id="main_content_outer" class="clearfix">
            <div id="main_content">
                        <?php $form =array('name'=>'posnic'); 
                    echo form_open('module/module_manage',$form) ?>
                        <div class="row">
                            <div class="col-sm-12" id="user_list"><br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title"><?php echo $this->lang->line('module') ?></h4>                                                                               
                                    </div>
                                    <table id="dt_table_tools" class="table-striped table-condensed" style="width: 100%"><thead>
                                        <tr>
                                          <th>Id</th>
                                          <th ><?php echo $this->lang->line('select') ?></th>
                                          <th ><?php echo $this->lang->line('module') ?></th>
                                          
                                          <th><?php echo $this->lang->line('status') ?></th>
                                          <th><?php echo $this->lang->line('action') ?></th>
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
<section id="add_module_form" class="container clearfix main_section">
     <?php   $form =array('id'=>'parsley_reg',
                          'runat'=>'server',
                          'class'=>'form-horizontal');
       echo form_open_multipart('module/add_pos_module_details/',$form);?>
        <div id="main_content_outer" class="clearfix">
           <div id="main_content">
                 <div class="row">
                     <div class="col-lg-4"></div>
                     <div class="col-lg-4">
                          <div class="panel panel-default">
                               <div class="panel-heading">
                                     <h4 class="panel-title"><?php echo $this->lang->line('module') ?></h4>  
                                   
                               </div>
                              <br>
                              <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row">
                                               <div class="col col-lg-1"></div>
                                               <div class="col col-lg-10">
                                                    <div class="form_sep">
                                                         <label for="module_name" class="req"><?php echo $this->lang->line('module_name') ?></label>                                                                                                       
                                                           <?php $module_name=array('name'=>'module_name',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'module_name',
                                                                                    'value'=>set_value('module_name'));
                                                           echo form_input($module_name)?> 
                                                         <input type="hidden" name="guid" id="guid">
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-1"></div>
                                               </div>
                                        </div>                              
                              </div>
                               <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row">
                                               <div class="col col-lg-1"></div>
                                               <div class="col col-lg-10">
                                                    <div class="form_sep">
                                                         <label for="module_name" ><?php echo $this->lang->line('icon_class') ?></label>                                                                                                       
                                                           <?php $icon_class=array('name'=>'icon_class',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'icon_class',
                                                                                    'value'=>set_value('icon_class'));
                                                           echo form_input($icon_class)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-1"></div>
                                               </div>
                                        </div>                              
                              </div>
                               <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row">
                                               <div class="col col-lg-1"></div>
                                               <div class="col col-lg-10">
                                                    <div class="form_sep">
                                                         <label for="order" ><?php echo $this->lang->line('order') ?></label>                                                                                                       
                                                           <?php $order=array('name'=>'order',
                                                                                    'class'=>'required form-control number',
                                                                                    'id'=>'order',
                                                                                    'value'=>set_value('module_name'));
                                                           echo form_input($order)?> 
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-1"></div>
                                               </div>
                                        </div>                              
                              </div>
                              <br><br>
                          </div>
                     </div>
                </div>
               <div  id="parent_modules">
                <div  id="modules">
                    
                </div>
                </div>
                    <div class="row" id="add_button">
                                <div class="col-lg-4"></div>
                                  <div class="col col-lg-4 text-center"><br><br>
                                      <button id="add_new_module"  type="submit" name="save" class="btn btn-default"><i class="icon icon-save"> </i> <?php echo $this->lang->line('save') ?></button>
                                      <a href="javascript:clear_add_module()" name="clear" id="clear_user" class="btn btn-default"><i class="icon icon-list"> </i> <?php echo $this->lang->line('clear') ?></a>
                                  </div>
                              </div>
                <div class="row" id="update_button">
                        <div class="col-lg-4"></div>
                      <div class="col col-lg-4 text-center"><br><br>
                          <button id="update_module"  type="submit" name="save" class="btn btn-default"><i class="icon icon-save"> </i> <?php echo $this->lang->line('update') ?></button>
                          <a href="javascript:reload_update_user()" name="clear" id="clear_user" class="btn btn-default"><i class="icon icon-list"> </i> <?php echo $this->lang->line('reload') ?></a>
                      </div>
                  </div>
                </div>
          </div>
    <?php echo form_close();?>
</section>    
    
           <div id="footer_space">
              
           </div>
		</div>
	
                <script type="text/javascript">
                 
                    function posnic_delete(){
                     var flag=0;
                     var field=document.forms.posnic;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                        
                          $.bootstrapGrowl('<?php echo $this->lang->line('Select Atleast One')."".$this->lang->line('module');?>', { type: "warning" });
                      }else{
                            bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete')."".$this->lang->line('module') ?>", function(result) {
             if(result){
              
             
                        var posnic=document.forms.posnic;
                        for (i = 0; i < posnic.length; i++){
                          if(posnic[i].checked==true){                             
                              $.ajax({
                                url: '<?php echo base_url() ?>/index.php/module/delete',
                                type: "POST",
                                data: {
                                    guid:posnic[i].value

                                },
                                success: function(response)
                                {
                                    if(response){
                                         $.bootstrapGrowl('<?php echo $this->lang->line('module').' '. $this->lang->line('deleted');?>', { type: "success" });
                                        $("#dt_table_tools").dataTable().fnDraw();
                                    }
                                }
                            });

                          }

                      }    
                      }
                      });
                      }    
                      }
                    
                    
                </script>
        

      