<?php

namespace App\Models;

use CodeIgniter\Model;

class RecordModel extends Model
{
	

protected $table = 'record_database';
	
    

// getAllPosts is no longer used, the work is done in the controller as LoadRecord, as we need to use pagination.
    public function getAllPosts(string $record_user_id, $sort)
    {
	    
	
    }

    

    public function getIndividualPost($record_id)
    
    
    {
	    
	   
	   
	   $db = db_connect();
	   $builder = $db->table('record_database');
	   $query = $builder->select(['record_id', 'record_misdiagnosis', 'record_correct_diagnosis', 'record_symptoms', 'record_category', 'record_notes', 'record_image', 'record_approved', 'record_user_id', 'last_update'])
	   ->where('record_approved', 'yes')
	   ->where(["record_id" => $record_id])
	   ->get();
	   $result = $builder->countAllResults();
	   if ($result === 0) {
		  return null;
	   } else {
		  $individualPost = $query->getResultArray();

		  return array($individualPost);
	   }
    }
}









