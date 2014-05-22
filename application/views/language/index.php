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
         $('#add_new_language').click(function() { 
                <?php if($this->session->userdata['language_per']['add']==1){ ?>
                var inputs = $('#add_language').serialize();
                if($('#parsley_reg').valid()){
                      $.ajax ({
                            url: "<?php echo base_url('index.php/language/add_language')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']=='TRUE'){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('language').' '.$this->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#add_language").trigger('reset');
                                       posnic_language_lists();
                                    }else  if(response['responseText']=='ALREADY'){
                                           $.bootstrapGrowl($('#language_name').val()+' <?php echo $this->lang->line('language').' '.$this->lang->line('is_already_added')." ".$this->lang->line('should_not_repeat_order_number');?>', { type: "warning" });                           
                                    }else  if(response['responseText']=='FALSE'){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('language');?>', { type: "error" });                           
                                    }
                       }
                       
                });
                }
                    <?php }else{ ?>
                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('language');?>', { type: "error" });         
                    <?php }?>
        });
         $('#update_language').click(function() { 
                <?php if($this->session->userdata['language_per']['edit']==1){ ?>
                var inputs = $('#parsley_reg').serialize();
                if($('#parsley_reg').valid()){
                      $.ajax ({
                            url: "<?php echo base_url('index.php/language/update_language')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                  if(response['responseText']=='TRUE'){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('language').' '.$this->lang->line('updated');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_language_lists();
                                    }else  if(response['responseText']=='ALREADY'){
                                           $.bootstrapGrowl($('#language_name').val()+' <?php echo $this->lang->line('language').' '.$this->lang->line('is_already_added')." ".$this->lang->line('should_not_repeat_order_number');?>', { type: "warning" });                           
                                    }else  if(response['responseText']=='FALSE'){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('please_enter_non_repeated_correct_order');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('language');?>', { type: "error" });                           
                                    }
                       }
                 });
                 }
                 <?php }else{ ?>
                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('language');?>', { type: "error" });         
                    <?php }?>
        });
     });
function posnic_add_new(){
    <?php if($this->session->userdata['language_per']['add']==1){ ?>
      $("#user_list").hide();
      $("#update_button").hide();
      $("#add_button").show();
      $('#add_language_form').show('slow');
      $('#delete').attr("disabled", "disabled");
      $('#posnic_add_language').attr("disabled", "disabled");
  
      $('#language_lists').removeAttr("disabled");
      <?php }else{ ?>
                 $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('language');?>', { type: "error" });         
                    <?php }?>
}
function posnic_language_lists(){
     
      $('#add_language_form').hide('hide');      
      $("#user_list").show('slow');
      $('#delete').removeAttr("disabled");
     
      $('#posnic_add_language').removeAttr("disabled");
      $('#language_lists').attr("disabled",'disabled');
}
function clear_add_language(){
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
                        <a href="javascript:posnic_add_new()" id="posnic_add_language" class="btn btn-default" ><i class="icon icon-user"></i> <?php echo $this->lang->line('addnew') ?></a>  
                       
                        <a href="javascript:posnic_delete()" class="btn btn-default" id="delete"><i class="icon icon-trash"></i> <?php echo $this->lang->line('delete') ?></a>
                        <a href="javascript:posnic_language_lists()" class="btn btn-default" id="language_lists"><i class="icon icon-list"></i> <?php echo $this->lang->line('language') ?></a>
                </div>
            </div>
    </div>
</nav>
<nav id="mobile_navigation"></nav>
              
<section class="container clearfix main_section">
        <div id="main_content_outer" class="clearfix">
            <div id="main_content">
                        <?php $form =array('name'=>'posnic'); 
                    echo form_open('language/language_manage',$form) ?>
                        <div class="row">
                            <div class="col-sm-12" id="user_list"><br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title"><?php echo $this->lang->line('language') ?></h4>                                                                               
                                    </div>
                                    <table id="dt_table_tools" class="table-striped table-condensed" style="width: 100%"><thead>
                                        <tr>
                                          <th>Id</th>
                                          <th ><?php echo $this->lang->line('select') ?></th>
                                          <th ><?php echo $this->lang->line('language') ?></th>
                                          
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
<section id="add_language_form" class="container clearfix main_section">
     <?php   $form =array('id'=>'parsley_reg',
                          'runat'=>'server',
                          'class'=>'form-horizontal');
       echo form_open_multipart('language/add_pos_language_details/',$form);?>
        <div id="main_content_outer" class="clearfix">
           <div id="main_content">
                 <div class="row">
                     <div class="col-lg-4"></div>
                     <div class="col-lg-4">
                          <div class="panel panel-default">
                               <div class="panel-heading">
                                     <h4 class="panel-title"><?php echo $this->lang->line('language') ?></h4>  
                                   
                               </div>
                              <br>
                              <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row">
                                               <div class="col col-lg-1"></div>
                                               <div class="col col-lg-10">
                                                    <div class="form_sep">
                                                         <label for="language_name" class="req"><?php echo $this->lang->line('language_name') ?></label>                                                                                                       
                                                           <?php $language_name=array('name'=>'language_name',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'language_name',
                                                                                    'value'=>set_value('language_name'));
                                                           echo form_input($language_name)?> 
                                                         <input type="hidden" name="guid" id="guid">
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
               <div id="parent_div">
                  
                   
               </div>
                    <div class="row" id="add_button">
                                <div class="col-lg-4"></div>
                                  <div class="col col-lg-4 text-center"><br><br>
                                      <button id="add_new_language"  type="submit" name="save" class="btn btn-default"><i class="icon icon-save"> </i> <?php echo $this->lang->line('save') ?></button>
                                      <a href="javascript:clear_add_language()" name="clear" id="clear_user" class="btn btn-default"><i class="icon icon-list"> </i> <?php echo $this->lang->line('clear') ?></a>
                                  </div>
                              </div>
                <div class="row" id="update_button">
                        <div class="col-lg-4"></div>
                      <div class="col col-lg-4 text-center"><br><br>
                          <button id="update_language"  type="submit" name="save" class="btn btn-default"><i class="icon icon-save"> </i> <?php echo $this->lang->line('update') ?></button>
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
                        
                          $.bootstrapGrowl('<?php echo $this->lang->line('Select Atleast One')."".$this->lang->line('language');?>', { type: "warning" });
                      }else{
                            bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete')."".$this->lang->line('language') ?>", function(result) {
             if(result){
              
             
                        var posnic=document.forms.posnic;
                        for (i = 0; i < posnic.length; i++){
                          if(posnic[i].checked==true){                             
                              $.ajax({
                                url: '<?php echo base_url() ?>/index.php/language/delete',
                                type: "POST",
                                data: {
                                    guid:posnic[i].value

                                },
                                success: function(response)
                                {
                                    if(response){
                                         $.bootstrapGrowl('<?php echo $this->lang->line('language').' '. $this->lang->line('deleted');?>', { type: "success" });
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
        

      