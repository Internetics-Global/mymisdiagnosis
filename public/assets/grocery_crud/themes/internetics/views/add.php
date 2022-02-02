<?php
    $this->set_css($this->default_theme_path.'/internetics/css/bootstrap/bootstrap.min.css');
    $this->set_css($this->default_theme_path.'/internetics/css/elusive-icons/css/elusive-icons.min.css');
    $this->set_css($this->default_theme_path.'/internetics/css/common.css');
    $this->set_css($this->default_theme_path.'/internetics/css/general.css');
    $this->set_css($this->default_theme_path.'/internetics/css/add-edit-form.css');
    $this->set_css($this->default_theme_path.'/internetics/css/main.css');
    $this->set_css($this->default_theme_path.'/internetics/css/internetics.css?v=367');
    $this->set_css($this->default_theme_path.'/internetics/css/lightbox.css');
    $this->set_css($this->default_theme_path.'/internetics/css/print.min.css');

    $jquery_js = isset($jquery_js) ? $jquery_js : grocery_CRUD::JQUERY;

    if ($this->config->environment == 'production') {
        $this->set_js_lib($this->default_javascript_path . '/' . $jquery_js);
        $this->set_js_lib($this->default_theme_path.'/internetics/js/jquery-plugins/jquery.form.min.js');
        $this->set_js_lib($this->default_theme_path.'/internetics/build/js/global-libs.min.js');
        $this->set_js_config($this->default_theme_path.'/internetics/js/form/add.min.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/lightbox.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/bootstrap.min.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/popper.min.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/bootbox.min.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/bootbox.locales.min.js');
        $this->set_js_lib($this->default_theme_path.'/internetics/js/jquery-plugins/print.min.js');
    } else {
        $this->set_js_lib($this->default_javascript_path . '/' . $jquery_js);
        $this->set_js_lib($this->default_theme_path.'/internetics/js/jquery-plugins/jquery.form.min.js');
        $this->set_js_lib($this->default_theme_path.'/internetics/js/common/common.min.js');
        $this->set_js_config($this->default_theme_path.'/internetics/js/form/add.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/lightbox.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/bootstrap.min.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/popper.min.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/bootbox.min.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/bootbox.locales.min.js');
        $this->set_js_lib($this->default_theme_path.'/internetics/js/jquery-plugins/print.min.js');
        
    }



  

include(__DIR__ . '/common_javascript_vars.php');



$countfields = 0;

?>
<div class="crud-form" data-unique-hash="<?php echo $unique_hash; ?>">
    <div class="gc-container">
        <div class="row">
            <div class="col-md-12">
                
                
                
                <div class="form-container table-container">
	                
	              
                    <?php echo form_open( $insert_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>
                    
                
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
              
              
					<div id="questions">
						
					
						
						
						
					<?php 
						
					$total_panes = 0; foreach($fields as $field) {	$total_panes++;	
						

						 }	
						 
						 	
	                   	
					?>
				
                    





<?php	 
				
						 
                     
                     foreach($fields as $field) { 
	                    

	                    
	                    if ($countfields == '0') {echo '<div id="q' . $countfields . '" style="display: block;">';}
	                    else {echo '<div id="q_' . $field->field_name . '" style="display: block;">';}
	                    
	                    $countfields = $countfields + 1;
	                    
	                    
	                    
                    ?>
                    
                    
     
                    
                   <!-- start of the regular item entry panel -->
                   
                   	                   
                        <div class="entry-pane_no_colour form-group <?php echo $field->field_name; ?>_form_group row">
                            <label class="col-sm-12 control-label">
                                <?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?>
                            </label>
                        </div>
                        <div class="entry-pane form-group <?php echo $field->field_name; ?>_form_group row">
                            <div class="col-sm-12" control-label>
                                <?php echo $input_fields[$field->field_name]->input; ?>
                            </div>

                          


                        </div>
                                     
                        
                        
                      
                    <!-- end of the item entry panel -->
                    
                    
          
           
                      
           
           
           
           
           
           
           

                    
                    <?php	                 
	                    
	                    if ( $countfields == $total_panes ){ 
		                    
	                    
		                    
		                  if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
                    <div class="entry-pane_buttons form-group gcrud-form-group">
                        <div id='report-error' class='report-div error bg-danger' style="display:none"></div>
                        <div id='report-success' class='report-div success bg-success' style="display:none"></div>
                    </div>
                    <div class="form-group gcrud-form-group">
                        <div class="col-sm-offset-3 col-sm-12">
                            <button class="btn btn-secondary btn-success b10" type="submit" id="form-button-save">
                                <i class="el el-ok"></i>
                                <?php echo $this->l('form_update_changes'); ?>
                            </button>
                            <?php 	if(!$this->unset_back_to_list) { ?>
                                <button class="btn btn-info b10" type="button" id="save-and-go-back-button">
                                    <i class="el el-return-key"></i>
                                    <?php echo $this->l('form_update_and_go_back'); ?>
                                </button>
                                <button class="btn btn-secondary cancel-button b10" type="button" id="cancel-button">
                                    <i class="el el-warning-sign"></i>
                                    <?php echo $this->l('form_cancel'); ?>
                                </button> 
                                
                              
                                
                              
                                                                     
                           
                        </div>
                    </div>
  
		                   <?php 
		                    
		                    
	                    }
	                    
	                    echo '</div>';
	                    
	                    }
	                    
//	                    echo '<BR>Total number of records: ' . $countfields . '<BR>'; 
	   
                    ?>
       
                    
					</div>
					<!-- end of questions div -->
					
				
       

        
        <?php  } ?>
            
                    

                    <?php if(!empty($hidden_fields)){?>
                        <!-- Start of hidden inputs -->
                        <?php
                        foreach($hidden_fields as $hidden_field){
                            echo $hidden_field->input;
                        }
                        
                        	                   
                        ?>
                        <!-- End of hidden inputs -->
                    <?php 
	                    } 
                    ?>
                    
                    
                          

                    <?php echo form_close(); ?>
                    
                    
                    
              
                    
                    
                    
                    
                </div>
































            </div>
        </div>
    </div>
</div>


<script>
    var validation_url = '<?php echo $validation_url?>';
    var list_url = '<?php echo $list_url?>';

    var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
    var message_update_error = "<?php echo $this->l('update_error')?>";
</script>