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
         $('#add_new_user_groups').click(function() { 
             $('#loading').modal('show');
                <?php if($this->session->userdata['user_groups_per']['add']==1){ ?>
                var inputs = $('#add_user_groups').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/user_groups/add_user_groups')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                if(response['responseText']=='TRUE'){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('user_groups').' '.$this->lang->line('added');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#add_user_groups").trigger('reset');
                                       posnic_user_groups_lists();
                                    }else  if(response['responseText']=='ALREADY'){
                                           $.bootstrapGrowl($('#user_groups').val()+' <?php echo $this->lang->line('user_groups').' '.$this->lang->line('is_already_added');?>', { type: "warning" });                           
                                    }else  if(response['responseText']=='FALSE'){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('user_groups');?>', { type: "error" });                           
                                    }
                                    $('#loading').modal('hide');
                       }
                });<?php }else{ ?>
                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('user_groups');?>', { type: "error" });                       
                    <?php }?>
        });
         $('#update_user_groups').click(function() { 
             $('#loading').modal('show');
                <?php if($this->session->userdata['user_groups_per']['edit']==1){ ?>
                var inputs = $('#add_user_groups').serialize();
                      $.ajax ({
                            url: "<?php echo base_url('index.php/user_groups/update_user_groups')?>",
                            data: inputs,
                            type:'POST',
                            complete: function(response) {
                                  if(response['responseText']=='TRUE'){
                                      $.bootstrapGrowl('<?php echo $this->lang->line('user_groups').' '.$this->lang->line('updated');?>', { type: "success" });                                                                                  
                                       $("#dt_table_tools").dataTable().fnDraw();
                                       $("#parsley_reg").trigger('reset');
                                       posnic_user_groups_lists();
                                    }else  if(response['responseText']=='ALREADY'){
                                           $.bootstrapGrowl($('#user_groups').val()+' <?php echo $this->lang->line('user_groups').' '.$this->lang->line('is_already_added');?>', { type: "warning" });                           
                                    }else  if(response['responseText']=='FALSE'){
                                           $.bootstrapGrowl('<?php echo $this->lang->line('Please Enter All Required Fields');?>', { type: "warning" });                           
                                    }else{
                                          $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('user_groups');?>', { type: "error" });                           
                                    }
                                    $('#loading').modal('hide');
                       }
                 });
                 <?php }else{ ?>
                   $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Edit')." ".$this->lang->line('user_groups');?>', { type: "error" });                        
                    <?php }?>
        });
     });
function posnic_add_new(){
    <?php if($this->session->userdata['user_groups_per']['add']==1){ ?>
      $("#user_list").hide();
      $('#loading').modal('show');
      $('#add_user_groups_form').show('slow');
      $('#delete').attr("disabled", "disabled");
      $('#posnic_add_user_groups').attr("disabled", "disabled");
      $('#active').attr("disabled", "disabled");
      $('#deactive').attr("disabled", "disabled");
      $('#user_groups_lists').removeAttr("disabled");
      $('#permissions').remove();
      $('#new_buttons').show();
      $('#update_buttons').hide();
      $('#parent_permission').append('<div id="permissions"/>');
     
        $.ajax({                                      
                             url: "<?php echo base_url('index.php/user_groups/get_permissions_list') ?>",                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             {    
                                 
                               for(var i=0;i<data.length;i++){
                                   var module_row;
            
            if(i%6==0){
                module_row='mod_row_'+data[i][0]['guid'];
              $('#permissions').append('<div class="row" id="'+module_row+'" />');
            }
            
             $('#'+module_row).append('<div class="col col-lg-2" id="mod_col_'+data[i][0]['guid']+'" >\n\
                        <div class="row text-center" style="border-bottom:solid 3px #48AC2E;margin:10px -3px">\n\
                            <lablel  >'+data[i][0]['module_name']+'</lablel>\n\
                        </div><input type="hidden" name="module_name[]" value="'+data[i][2]+'"><input type="hidden" name="module_id[]" value="'+data[i][0]['guid']+'"></div>');
            for(var j=0;j<data[i][1].length;j++){
                          $('#'+module_row+' #mod_col_'+data[i][0]['guid']).append('<div class="row">\n\
                            <div class="col col-lg-6">\n\
                                <lablel>'+data[i][1][j]+'</lablel>\n\
                            </div>\n\
                            <div class="col col-lg-6">\n\
                               <input type="checkbox" name="'+data[i][2]+'_'+data[i][3][j]+'"  id="permission_'+j+data[i][0]['guid']+'"> \n\
                            </div>\n\
                        </div>');
            
            
             
                            $('#permission_'+j+data[i][0]['guid']).wrap('<div class="make-switch  switch-mini" data-on-label="'+"<i class='icon icon-ok'></i>"+'" data-off-label="'+"<i class='icon icon-off'></i>"+'" />').parent().bootstrapSwitch(); 
                             } 
                             }
                             $('#loading').modal('hide');
                             }
                           });
      
      
      
      
      
      <?php }else{ ?>
                    $.bootstrapGrowl('<?php echo $this->lang->line('You Have NO Permission To Add')." ".$this->lang->line('user_groups');?>', { type: "error" });                         
                    <?php }?>
}
function posnic_user_groups_lists(){
  
      $('#add_user_groups_form').hide('hide');      
      $("#user_list").show('slow');
      $('#delete').removeAttr("disabled");
      $('#active').removeAttr("disabled");
      $('#deactive').removeAttr("disabled");
      $('#posnic_add_user_groups').removeAttr("disabled");
      $('#user_groups_lists').attr("disabled",'disabled');
}
function clear_add_user_groups(){
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
                        <a href="javascript:posnic_add_new()" id="posnic_add_user_groups" class="btn btn-default" ><i class="icon icon-user"></i> <?php echo $this->lang->line('addnew') ?></a>  
                        <a href="javascript:posnic_group_deactive()" id="active" class="btn btn-default" ><i class="icon icon-pause"></i> <?php echo $this->lang->line('deactive') ?></a>
                        <a href="javascript:posnic_group_active()" class="btn btn-default" id="deactive"  ><i class="icon icon-play"></i> <?php echo $this->lang->line('active') ?></a>
                        <a href="javascript:posnic_delete()" class="btn btn-default" id="delete"><i class="icon icon-trash"></i> <?php echo $this->lang->line('delete') ?></a>
                        <a href="javascript:posnic_user_groups_lists()" class="btn btn-default" id="user_groups_lists"><i class="icon icon-list"></i> <?php echo $this->lang->line('user_groups') ?></a>
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
                    echo form_open('user_groups/user_groups_manage',$form) ?>
                        <div class="row">
                            <div class="col-sm-12" id="user_list"><br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title"><?php echo $this->lang->line('user_groups') ?></h4>                                                                               
                                    </div>
                                    <table id="dt_table_tools" class="table-striped table-condensed" style="width: 100%"><thead>
                                        <tr>
                                          <th>Id</th>
                                          <th ><?php echo $this->lang->line('select') ?></th>
                                          <th ><?php echo $this->lang->line('user_groups') ?></th>
                                          
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
<section id="add_user_groups_form" class="container clearfix main_section">
     <?php   $form =array('id'=>'add_user_groups',
                          'runat'=>'server',
                          'class'=>'form-horizontal');
       echo form_open_multipart('user_groups/add_pos_user_groups_details/',$form);?>
        <div id="main_content_outer" class="clearfix">
           <div id="main_content">
                 <div class="row">
                     <div class="col-lg-4"></div>
                     <div class="col-lg-4">
                          <div class="panel panel-default">
                               <div class="panel-heading">
                                     <h4 class="panel-title"><?php echo $this->lang->line('user_groups') ?></h4>   
                                   
                               </div>
                              <br>
                              <div class="row">
                                       <div class="col col-lg-12" >
                                           <div class="row">
                                               <div class="col col-lg-1"></div>
                                               <div class="col col-lg-10">
                                                    <div class="form_sep">
                                                         <label for="user_groups" class="req"><?php echo $this->lang->line('user_groups') ?></label>                                                                                                       
                                                           <?php $user_groups=array('name'=>'user_groups',
                                                                                    'class'=>'required form-control',
                                                                                    'id'=>'user_groups',
                                                                                    'value'=>set_value('user_groups'));
                                                           echo form_input($user_groups)?>
                                                         <input type="hidden" name="guid" id="guid">
                                                    </div>
                                                   </div>
                                               <div class="col col-lg-1"></div>
                                               </div>
                                        </div>                              
                                                                     
                              </div><br><br>
                          </div>
                     </div>
                </div>
                <div  id="parent_permission">
                <div  id="permissions">
                    
                </div>
                </div>
               
                    <div class="row" id="new_buttons">
                                <div class="col-lg-4"></div>
                                  <div class="col col-lg-4 text-center"><br><br>
                                      <button id="add_new_user_groups"  type="submit" name="save" class="btn btn-default"><i class="icon icon-save"> </i> <?php echo $this->lang->line('save') ?></button>
                                      <a href="javascript:clear_add_user_groups()" name="clear" id="clear_user" class="btn btn-default"><i class="icon icon-list"> </i> <?php echo $this->lang->line('clear') ?></a>
                                  </div>
                              </div>
                <div class="row" id="update_buttons">
                        <div class="col-lg-4"></div>
                      <div class="col col-lg-4 text-center"><br><br>
                          <button id="update_user_groups"  type="submit" name="save" class="btn btn-default"><i class="icon icon-save"> </i> <?php echo $this->lang->line('update') ?></button>
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
                    function posnic_group_active(){
                     var flag=0;
                     var field=document.forms.posnic;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                        
                          $.bootstrapGrowl('<?php echo $this->lang->line('Select Atleast One')."".$this->lang->line('user_groups');?>', { type: "warning" });
                      
                      }else{
                            var posnic=document.forms.posnic;
                      for (i = 0; i < posnic.length; i++){
                          if(posnic[i].checked==true){                             
                              $.ajax({
                                url: '<?php echo base_url() ?>/index.php/user_groups/active',
                                type: "POST",
                                data: {
                                    guid:posnic[i].value

                                },
                                success: function(response)
                                {
                                    if(response){
                                         $.bootstrapGrowl('<?php echo $this->lang->line('activated');?>', { type: "success" });
                                        $("#dt_table_tools").dataTable().fnDraw();
                                    }
                                }
                            });

                          }

                      }
                  

                      }    
                      }
                    function posnic_delete(){
                     var flag=0;
                     var field=document.forms.posnic;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                        
                          $.bootstrapGrowl('<?php echo $this->lang->line('Select Atleast One')."".$this->lang->line('user_groups');?>', { type: "warning" });
                      }else{
                            bootbox.confirm("<?php echo $this->lang->line('Are you Sure To Delete')."".$this->lang->line('user_groups') ?>", function(result) {
             if(result){
              
             
                        var posnic=document.forms.posnic;
                        for (i = 0; i < posnic.length; i++){
                          if(posnic[i].checked==true){                             
                              $.ajax({
                                url: '<?php echo base_url() ?>/index.php/user_groups/delete',
                                type: "POST",
                                data: {
                                    guid:posnic[i].value

                                },
                                success: function(response)
                                {
                                    if(response){
                                         $.bootstrapGrowl('<?php echo $this->lang->line('deleted');?>', { type: "error" });
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
                    
                    
                    
                    function posnic_group_deactive(){
                     var flag=0;
                     var field=document.forms.posnic;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                        
                          $.bootstrapGrowl('<?php echo $this->lang->line('Select Atleast One')."".$this->lang->line('user_groups');?>', { type: "warning" });
                      
                      }else{
                            var posnic=document.forms.posnic;
                      for (i = 0; i < posnic.length; i++){
                          if(posnic[i].checked==true){                             
                                 $.ajax({
                                    url: '<?php echo base_url() ?>/index.php/user_groups/deactive',
                                    type: "POST",
                                    data: {
                                        guid: posnic[i].value

                                    },
                                    success: function(response)
                                    {
                                        if(response){
                                             $.bootstrapGrowl('<?php echo $this->lang->line('deactivated');?>', { type: "danger" });
                                            $("#dt_table_tools").dataTable().fnDraw();
                                        }
                                    }
                                });

                          }

                      }
                  

                      }    
                      }
                    
                </script>
                   
  
     
    
    

      