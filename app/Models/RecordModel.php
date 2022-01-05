<?php

namespace App\Models;

use CodeIgniter\Model;

class RecordModel extends Model
{
    public function __construct()
    {
	   $helpers = array('text');
	   helper($helpers);
    }

    

    public function getAllPosts(string $record_user_id, $category)
    {
	    
	    
	   $db = db_connect();
	   $builder = $db->table('record_database');
	   $builder->like('record_category', $category);
	   if ($category == 'front_page'){
		   $builder->orderBy('post_orderby', 'ASC');		   
	   } else {
		   $builder->orderBy('record_misdiagnosis', 'DESC');
	   }
	  
	   $post_ids = array();
	   if ($record_user_id === 'default') {
		  $query = $builder->select(['record_id', 'record_misdiagnosis', 'record_correct_diagnosis', 'record_symptoms', 'record_category', 'record_notes', 'record_image', 'record_approved', 'record_user_id', 'last_update'])->get();
	   } else {
		  $query = $builder->select(['record_id', 'record_misdiagnosis', 'record_correct_diagnosis', 'record_symptoms', 'record_category', 'record_notes', 'record_image', 'record_approved', 'record_user_id', 'last_update'])->where(['record_user_id' => $record_user_id])->get();
	   }
	   $posts = $query->getResultArray();
	   if (is_null($posts)) {
		  return null;
	   } else {
		  foreach ($posts as $key => $value) {
			 array_push($post_ids, $posts[$key]['record_id']);
		  }
		  
		  return array($posts);
	   }
    }

    

    public function getIndividualPost($record_id)
    
    
    {
	    
	   
	   
	   $db = db_connect();
	   $builder = $db->table('record_database');
	   $query = $builder->select(['record_id', 'record_misdiagnosis', 'record_correct_diagnosis', 'record_symptoms', 'record_category', 'record_notes', 'record_image', 'record_approved', 'record_user_id', 'last_update'])->where(["record_id" => $record_id])->get();
	   $result = $builder->countAllResults();
	   if ($result === 0) {
		  return null;
	   } else {
		  $individualPost = $query->getResultArray();

		  return array($individualPost);
	   }
    }
}