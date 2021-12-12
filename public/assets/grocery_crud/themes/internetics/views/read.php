<?php
    $this->set_css($this->default_theme_path.'/internetics/css/bootstrap/bootstrap.min.css');
    $this->set_css($this->default_theme_path.'/internetics/css/elusive-icons/css/elusive-icons.min.css');
    $this->set_css($this->default_theme_path.'/internetics/css/common.css');
    $this->set_css($this->default_theme_path.'/internetics/css/general.css');
    $this->set_css($this->default_theme_path.'/internetics/css/add-edit-form.css');
    $this->set_css($this->default_theme_path.'/internetics/css/main.css');
    $this->set_css($this->default_theme_path.'/internetics/css/internetics.css');
    $this->set_css($this->default_theme_path.'/internetics/css/lightbox.css');
   

    $jquery_js = isset($jquery_js) ? $jquery_js : grocery_CRUD::JQUERY;

    if ($this->config->environment == 'production') {
        $this->set_js_lib($this->default_javascript_path . '/' . $jquery_js);
        $this->set_js_lib($this->default_theme_path.'/internetics/build/js/global-libs.min.js');
        $this->set_js_config($this->default_theme_path.'/internetics/js/form/edit.min.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/lightbox.js');
    } else {
        $this->set_js_lib($this->default_javascript_path . '/' . $jquery_js);
        $this->set_js_lib($this->default_theme_path.'/internetics/js/jquery-plugins/jquery.form.min.js');
        $this->set_js_lib($this->default_theme_path.'/internetics/js/common/common.min.js');
        $this->set_js_config($this->default_theme_path.'/internetics/js/form/edit.js');
        $this->set_js_lib($this->default_theme_path . '/internetics/js/lightbox.js');
        $this->set_js_lib($this->default_theme_path.'/internetics/js/jquery-plugins/jquery.print-this.js');
}

include(__DIR__ . '/common_javascript_vars.php');
?>
<div class="crud-form" data-unique-hash="<?php echo $unique_hash; ?>">
    <div class="gc-container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-label">
                    <div class="floatL l5">
                        <?php echo $this->l('list_view'); ?> <?php echo $subject?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-container table-container">
                    <?php echo form_open( $update_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>


                    <?php foreach($fields as $field) { 
	                    
	                    if  ($field->field_name == 'reason_for_the_screening') {
		                    
		                    echo $input_fields[$field->field_name]->input;
		                    
		                    
		                    
	                    } 
	                    
	                    
	                    $field_output = strip_tags($input_fields[$field->field_name]->input);
	                    
	                    
	                    $field_output = str_replace( ', ', '<br />', $field_output );
	                    

	                    
	                    
                    ?>
                    
                    
                    
                    
                    <?php
	                      
	                        if ( $field_output == '&nbsp;' || $field_output == '') {} else { ?>
                    
                    
                        <div class="form-group row">
	                        
	                            <div class="col-sm-12 control-label">
	                                <?php echo $input_fields[$field->field_name]->display_as?>:
	                                

	                            </div>
	                            <div class="col-sm-12 read-row">
		                            
	                                <?php 
		                                
		                               echo $field_output; 
		                                
		                                ?>
	                            </div>                            
                            
                        </div>
                        
                        <?php
	                            
	                            }
	                            
	                            
	                            ?>
                    <?php }?>

                    <?php if(!empty($hidden_fields)){?>
                        <!-- Start of hidden inputs -->
                        <?php
                        foreach($hidden_fields as $hidden_field){
                            echo $hidden_field->input;
                        }
                        ?>
                        <!-- End of hidden inputs -->
                    <?php } ?>
                    <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
                    <div class="form-group gcrud-form-group">
                        <div id='report-error' class='report-div error'></div>
                        <div id='report-success' class='report-div success'></div>
                    </div>

                    <div class="form-group gcrud-form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <?php 	if(!$this->unset_back_to_list) { ?>
                                <button class="btn btn-secondary cancel-button" type="button" onclick="window.location = '<?php echo $list_url; ?>'" >
                                    <i class="el el-return-key"></i>
                                    <?php echo $this->l('form_back_to_list'); ?>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
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