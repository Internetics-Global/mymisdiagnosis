<?php namespace App\Models;
	

	
class InterneticsModel extends GroceryCrudModel
{


    function get_relation_n_n_selection_array($primary_key_value, $field_info)
    {
    	$select = '';
    	$related_field_title = $field_info->title_field_selection_table;
    	$use_template = strpos($related_field_title,'{') !== false;;
    	$field_name_hash = $this->_unique_field_name($related_field_title);
    	if($use_template)
    	{
    		$related_field_title = str_replace(" ", "&nbsp;", $related_field_title);
    		$select .= "CONCAT('".str_replace(array('{','}'),array("',COALESCE(",", ''),'"),str_replace("'","\\'",$related_field_title))."') as $field_name_hash";
    	}
    	else
    	{
    		$select .= "$related_field_title as $field_name_hash";
    	}
    	$this->builder = $this->db->table($field_info->relation_table);
        $this->builder = $this->builder->select('*, '.$select,false);

    	$selection_primary_key = $this->get_primary_key($field_info->selection_table);

        if(!$use_template){
            $this->builder = $this->builder->orderBy("{$field_info->selection_table}.{$field_info->title_field_selection_table}");
        }

        $this->builder = $this->builder->where($field_info->primary_key_alias_to_this_table, $primary_key_value)
            ->join(
    			$field_info->selection_table,
    			"{$field_info->relation_table}.{$field_info->primary_key_alias_to_selection_table} = {$field_info->selection_table}.{$selection_primary_key}"
    		);
    	$results = $this->builder->get()->getResult();

    	$this->builder = null;

    	$results_array = array();
    	foreach($results as $row)
    	{
    		$results_array[$row->{$field_info->primary_key_alias_to_selection_table}] = $row->{$field_name_hash};
    	}

    	return $results_array;
    }

    function get_relation_n_n_unselected_array($field_info, $selected_values)
    {
    	$use_where_clause = !empty($field_info->where_clause);

    	$select = "";
    	$related_field_title = $field_info->title_field_selection_table;
    	$use_template = strpos($related_field_title,'{') !== false;
    	$field_name_hash = $this->_unique_field_name($related_field_title);

    	if($use_template)
    	{
    		$related_field_title = str_replace(" ", "&nbsp;", $related_field_title);
    		$select .= "CONCAT('".str_replace(array('{','}'),array("',COALESCE(",", ''),'"),str_replace("'","\\'",$related_field_title))."') as $field_name_hash";
    	}
    	else
    	{
    		$select .= "$related_field_title as $field_name_hash";
    	}

        $this->builder = $this->db->table($field_info->selection_table);
    	$this->builder = $this->builder->select('*, ' . $select, false);

    	if($use_where_clause){
            $this->builder = $this->builder->where($field_info->where_clause);
    	}

    	$selection_primary_key = $this->get_primary_key($field_info->selection_table);
        if(!$use_template) {
            $this->builder = $this->builder->orderBy("{$field_info->selection_table}.{$field_info->title_field_selection_table}");
        }
        $results = $this->builder->get()->getResult();

        $this->builder = null;

        $results_array = array();
        foreach($results as $row)
        {
  
  
            if(!isset($selected_values[$row->$selection_primary_key]))
            
            
            
                $results_array[$row->$selection_primary_key] = $row->{$field_name_hash};
        }

 //echo "<pre>";
// print_r($results_array);
 //echo "</pre>";

        return $results_array;
       
    }
    
    
    
    
    
    

    function db_relation_n_n_update($field_info, $post_data ,$main_primary_key)
    {
        $this->builder = $this->db->table($field_info->relation_table);

        $this->builder->where($field_info->primary_key_alias_to_this_table, $main_primary_key);
    	if(!empty($post_data)) {
            $this->builder->whereNotIn($field_info->primary_key_alias_to_selection_table, $post_data);
        }

        $this->builder->delete();

        $this->builder = $this->db->table($field_info->relation_table);

    	if(!empty($post_data)) {
    		foreach($post_data as $primary_key_value) {
				$insertData = array(
	    			$field_info->primary_key_alias_to_this_table => $main_primary_key,
	    			$field_info->primary_key_alias_to_selection_table => $primary_key_value,
	    		);

                $this->builder->where($insertData);
				$count = $this->builder->countAllResults($field_info->relation_table);

				// Insert data only when they doesn't exist so we will not have duplicates
				if($count === 0) {
                    $this->builder = null;
                    $this->builder = $this->db->table($field_info->relation_table);
                    $this->builder->insert($insertData);
				}
	    	}
    	}
    }
    
    
    
    
    
    
    
    
    
 }   