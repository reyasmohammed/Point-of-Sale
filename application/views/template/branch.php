<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); if($this->session->userdata['Setting']['Branch']==1){
?>

<script>
    function change_branch(){
        var posnic = document.getElementById("branch").value;
        
    
     var xmlhttp;
        if (window.XMLHttpRequest)
        {
        xmlhttp=new XMLHttpRequest();
        }
        else
        {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
       
        xmlhttp.open("GET","<?php echo base_url() ?>index.php/posmain/change_user_branch/"+posnic,false);
        xmlhttp.send();
          $.bootstrapGrowl('<?php echo $this->lang->line('branch') ?> '+' <?php echo $this->lang->line('changed');?>', { type: "success" });
         setTimeout("location.reload(true);");

        $.get('branch.php', function(ret){
            $('body').php(ret);
        });
     //   document.getElementById("branch").value=jibi;
        
        }
        function change_language(){
           var lang=$('#select_lang').val();
        
                     $.ajax({
                url: '<?php echo base_url() ?>index.php/posmain/change_lang',
                type: "POST",
                data: {
                    lang: lang
                    
                },
                success: function(response)
                {
                    if(response){
                         
                          $.bootstrapGrowl('<?php echo $this->lang->line('language') ?> <?php echo $this->lang->line('changed');?>', { type: "success" });
                         setTimeout("location.reload(true);");
                    }
                }
            });
        }
</script>
</head>
<body class=" sidebar_hidden side_fixed">
<div id="wrapper_all">
			<header id="top_header">
				<div class="container">
					<div class="row">
                                            <div class="col col-lg-3">
                                                <form class="main_search">
								<input type="text" id="search_query" name="search_query" class="typeahead form-control">
								<button type="submit" class="btn btn-primary btn-xs"><i class="icon-search icon-white"></i></button>
							</form> 
                                            </div>
                                            <div class="col col-lg-3" style="margin-top: 5px">
                                                												            <?php 
echo form_open('home/change_branch') ; ?>
                                                    <select id="branch" class="select form-control">
<?php
if($this->session->userdata['user_type']==2){
    foreach ($row as $brow){ ?>
                                                        <option onclick="change_branch()" value="<?php echo $brow->guid ?>" <?php if($this->session->userdata['branch_id']==$brow->guid) { ?> selected="selected"<?php  } ?> ><?php echo $brow->store_name  ?></option>
   <?php }
}else{
?>

<?php foreach ($row as $brow){ 
    
    ?><option onclick="change_branch()" value="<?php echo $brow->guid ?>" <?php if($this->session->userdata['branch_id']==$brow->guid){?> selected="selected" <?php } ?> ><?php echo $brow->store_name ?></option>
    
   <?php }} ?>
</select>
    <?php echo form_close(); 
}
   ?>
                                            </div>
                                            <div class="col col-lg-3" style="margin-top: 5px">
                                                <select class="form-control" name="select_lang" id="select_lang">
                                                    <?php foreach ($lang as $lrow){ 
    
                                                        ?><option onclick="change_language()" value="<?php echo $lrow->in_english ?>" <?php if($this->session->userdata('lang')==$lrow->in_english) { ?> selected="selected" <?php } ?> ><?php echo $lrow->language_name ?></option>
    
   <?php } ?>
                                                    
                                                    
                                                    
                                                </select>
                                            </div>
                                            <div class="col col-lg-3">
                                                <div class="pull-right dropdown">
								<a href="#" class="user_info dropdown-toggle" title="Jonathan Hay" data-toggle="dropdown">
									<img src="img/user_avatar.png" alt="">
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="user_profile"><?php echo $this->lang->line('profile') ?></a></li>									
									<li><a href="settings"><?php echo $this->lang->line('settings') ?></a></li>									
                                                                        <li><a href="<?php echo base_url() ?>index.php/home/logout"><?php echo $this->lang->line('logout') ?></a></li>
								</ul>
							</div>
                                            </div>
                                            
						
                                          
					
					</div>
				</div>
			</header>
