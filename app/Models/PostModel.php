<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    public function __construct()
    {
	   $helpers = array('text');
	   helper($helpers);
    }

    

    public function getAllPosts(string $post_user_id)
    {
	    
	    
	   $db = db_connect();
	   $builder = $db->table('posts');
	   $builder->orderBy('date_of_post', 'DESC');
	   $post_ids = array();
	   if ($post_user_id === 'default') {
		  $query = $builder->select(['post_id', 'post_title', 'post_snippet', 'post_body', 'post_image','post_thumb', 'meta_title', 'meta_description', 'slug', 'post_user_id', 'date_of_post','last_update'])->get();
	   } else {
		  $query = $builder->select(['post_id', 'post_title', 'post_snippet', 'post_body', 'post_image', 'post_thumb', 'meta_title', 'meta_description', 'slug', 'post_user_id', 'date_of_post','last_update'])->where(['post_user_id' => $post_user_id])->get();
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
	   $query = $builder->select(['post_id', 'post_title', 'post_snippet', 'post_body', 'post_image', 'post_thumb', 'meta_title', 'meta_description', 'slug', 'post_user_id', 'date_of_post', 'last_update'])->where(["slug" => $post_id])->get();
	   $result = $builder->countAllResults();
	   if ($result === 0) {
		  return null;
	   } else {
		  $individualPost = $query->getResultArray();

		  return array($individualPost);
	   }
    }
}