
<script type="text/javascript" charset="utf-8">
          $(document).ready( function () {
               parsley_reg.onsubmit=function()
                                { 
                                  return false;
                                } 
             window.setTimeout(function ()
                    {
                      
                        $('#parsley_reg #quantity').focus();
                   
                    $.ajax({                                      
                             url: "<?php echo base_url() ?>index.php/settings/get_settings/",                      
                             data: "", 
                             dataType: 'json',               
                             success: function(data)        
                             { 
                                for(var i=0;i<data.length;i++){
                                    $('#'+data[i]['key']).val(data[i]['prefix']);
                                }
                                
                             }
                         });
                             
                          }, 1000);      
                               
                         
                        } );
                        
         
           
           
		</script>
                <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>template/data_table/js/DT_bootstrap.js"></script>


  