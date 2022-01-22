<?php namespace App\Libraries;


class RecordLibrary extends GroceryCrud
{
  
            
                
                
                
                
                



 protected function get_relation_n_n_input($field_info_type, $selected_values)
    {



        $this->_inline_js("var ajax_relation_url = '".$this->getAjaxRelationUrl()."';\n");
        

        $field_info 		= $this->relation_n_n[$field_info_type->name]; //As we use this function the relation_n_n exists, so don't need to check  
        
       
        $unselected_values 	= $this->get_relation_n_n_unselected_array($field_info, $selected_values);       
//echo "<pre>";        
//        print_r($selected_values);
//        print_r($unselected_values);
//echo "</pre>"; 
        
//        $options_array = $field_info->extras;
//        $selected_values 	= !empty($value) ? explode(",",$value) : array();





        

        if(empty($unselected_values) && empty($selected_values))
        {
            $input = "Please add {$field_info_type->display_as} first";
            

        }
        else
        {
            $select_title = str_replace('{field_display_as}',$field_info_type->display_as,$this->l('set_relation_title'));
            
            $input = "<div class='row py-2'>";
            
             if(!empty($selected_values))
            
                foreach($selected_values as $id => $name)
                
                {                    
					

                   $input .= "<div class='col-9'>$name ";
                    
                    
                                        
                    $input .= "</div>
                    
                    			<div class='col-3 text-right'><label class='checkbox'><input type=checkbox id='$id' name='{$field_info_type->name}[]' value='$id' onclick='displayMobilityLevel()' checked=on /></label>";
                    				                 				
                    $input .= "</div>";
          
                }

            

            if(!empty($unselected_values))
             
             
                foreach($unselected_values as $id => $name)
                {
					

                   $input .= "<div class='col-9'>$name ";
                    
                   	
                                        
                    $input .= "</div>
                    
                    			<div class='col-3 text-right'><label class='checkbox'><input type=checkbox id='$id' name='{$field_info_type->name}[]' value='$id' onclick='displayMobilityLevel()' /></label>";
                    				                 				
                    $input .= "</div>";
                    
                }

                           
                
//            echo "List: <BR>";
//            echo "field name - field_info_type->name: " . $field_info_type->name . "<BR>";
//            echo "field name - select_title: " . $select_title . "<BR>";
//            echo "field name - name: " . $name . "<BR>";
//            echo "field name - id: " . $id . "<BR>";






            

           			 $input .= "</div>";
            

            
        }

        return $input;
    }






















  protected function get_add_input_fields($field_values = null)
    {
        $fields = $this->get_add_fields();
        $types 	= $this->get_field_types();

        $input_fields = array();

        foreach($fields as $field_num => $field)
        {
            $field_info = $types[$field->field_name];

            $field_value = !empty($field_values) && isset($field_values->{$field->field_name}) ? $field_values->{$field->field_name} : null;

            if(!isset($this->callback_add_field[$field->field_name]))
            {
                $field_input = $this->get_field_input($field_info, $field_value);
            }
            else
            {
                $field_input = $field_info;
                $field_input->input = call_user_func($this->callback_add_field[$field->field_name], $field_value, null, $field_info);
            }

            switch ($field_info->crud_type) {
                case 'invisible':
                    unset($this->add_fields[$field_num]);
                    $input_fields[$field->field_name] = $field_input;
                    break;
                case 'hidden':
                    $this->add_hidden_fields[] = $field_input;
                    unset($this->add_fields[$field_num]);
                    unset($fields[$field_num]);
                    break;
                default:
                    $input_fields[$field->field_name] = $field_input;
                    break;
            }


        }

        return $input_fields;
    }

    protected function get_edit_input_fields($field_values = null)
    {
        $fields = $this->get_edit_fields();
        $types 	= $this->get_field_types();

        $input_fields = array();

        foreach($fields as $field_num => $field)
        {
            $field_info = $types[$field->field_name];

            $field_value = !empty($field_values) && isset($field_values->{$field->field_name}) ? $field_values->{$field->field_name} : null;
            if(!isset($this->callback_edit_field[$field->field_name]))
            {
                $field_input = $this->get_field_input($field_info, $field_value);
            }
            else
            {
                $primary_key = $this->getStateInfo()->primary_key;
                $field_input = $field_info;
                $field_input->input = call_user_func($this->callback_edit_field[$field->field_name], $field_value, $primary_key, $field_info, $field_values);
            }

            switch ($field_info->crud_type) {
                case 'invisible':
                    unset($this->edit_fields[$field_num]);
                    $input_fields[$field->field_name] = $field_input;
                    break;
                case 'hidden':
                    $this->edit_hidden_fields[] = $field_input;
                    unset($this->edit_fields[$field_num]);
                    unset($fields[$field_num]);
                    break;
                default:
                    $input_fields[$field->field_name] = $field_input;
                    break;
            }


        }

        return $input_fields;
    }

    protected function get_clone_input_fields($field_values = null)
    {
        $fields = $this->get_clone_fields();
        $types 	= $this->get_field_types();

        $input_fields = array();

        foreach($fields as $field_num => $field)
        {
            $field_info = $types[$field->field_name];

            $field_value = !empty($field_values) && isset($field_values->{$field->field_name}) ? $field_values->{$field->field_name} : null;
            if(!isset($this->callback_clone_field[$field->field_name]))
            {
                $field_input = $this->get_field_input($field_info, $field_value);
            }
            else
            {
                $primary_key = $this->getStateInfo()->primary_key;
                $field_input = $field_info;
                $field_input->input = call_user_func($this->callback_clone_field[$field->field_name], $field_value, $primary_key, $field_info, $field_values);
            }

            switch ($field_info->crud_type) {
                case 'invisible':
                    unset($this->clone_fields[$field_num]);
                    unset($fields[$field_num]);
                    break;
                case 'hidden':
                    $this->edit_hidden_fields[] = $field_input;
                    unset($this->clone_fields[$field_num]);
                    unset($fields[$field_num]);
                    break;
                default:
                    $input_fields[$field->field_name] = $field_input;
                    break;
            }


        }

        return $input_fields;
    }







protected $default_language_path	= 'public/assets/grocery_crud/languages';
protected $default_config_path		= 'public/assets/grocery_crud/config';
protected $default_assets_path		= 'public/assets/grocery_crud';












	
}

