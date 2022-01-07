<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
	
protected $table                = 'posts';	
	
	
   

    
// getAllPosts is no longer used, the work is done in the controller as LoadRecord, as we need to use pagination.
    public function getAllPosts(string $post_user_id, $category)
    {
	   
	    
	   $db = db_connect();
	   $builder = $db->table('posts');
	   $builder->like('post_category', $category);
	   if ($category == 'front_page'){
		   $builder->orderBy('post_orderby', 'ASC');		   
	   } else {
		   $builder->orderBy('date_of_post', 'DESC');
	   }
	  
	   $post_ids = array();
	   if ($post_user_id === 'default') {
		  $query = $builder->select(['post_id', 'post_title', 'post_snippet', 'post_category', 'post_orderby', 'post_body', 'post_image','post_thumb', 'meta_title', 'meta_description', 'slug', 'post_user_id', 'date_of_post','last_update'])->get();
	   } else {
		  $query = $builder->select(['post_id', 'post_title', 'post_snippet', 'post_category', 'post_orderby', 'post_body', 'post_image', 'post_thumb', 'meta_title', 'meta_description', 'slug', 'post_user_id', 'date_of_post','last_update'])->where(['post_user_id' => $post_user_id])->get();
	   }
	   $posts = $query->getResultArray();
	   if (is_null($posts)) {
		  return null;
	   } else {
		  foreach ($posts as $key => $value) {
			 array_push($post_ids, $posts[$key]['post_id']);
		  }
		  
		  return array($posts);
	   }
    }

    

    public function getIndividualPost($post_id)
    
    
    {
	    
	   
	   
	   $db = db_connect();
	   $builder = $db->table('posts');
	   $query = $builder->select(['post_id', 'post_title', 'post_snippet', 'post_category', 'post_body', 'post_image', 'post_thumb', 'meta_title', 'meta_description', 'slug', 'post_user_id', 'date_of_post', 'last_update'])->where(["slug" => $post_id])->get();
	   $result = $builder->countAllResults();
	   if ($result === 0) {
		  return null;
	   } else {
		  $individualPost = $query->getResultArray();

		  return array($individualPost);
	   }
    }
}