<?php

// front end post viewer - files used:

// Controllers/Post.php (this file)
// app/config/routes

// Views/post_list.php
// Views/post_individual.php
// Views/auth_internetics etc (template wrapper)

// Models/PostModel.php (database model)

// Controllers/PostEditor.php (GC back end manager)



// Detailed explanation:

// This is the controller for the posts (blog). 

// It talks to the views/post_list.php view page for the list of views, 
// and views/post_individual.php for the individual post.
// And it uses the auth_internetics templates in the views folder to wrap around the view output above.

// There is also Models/PostModel.php which runs the database queries

// GC handles the back end - see the PostEditor.php controller

// don't forget app/config/routes:
//	$routes->add('posts/','Post::index/$1');
//	$routes->add('posts/(:alphanum)','Post::display/$1');
// which make the right calls to the functions below


namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class Post extends BaseController
{

    public function __construct()
    {
	   $helpers = array('phpjwt', 'form', 'text');
	   helper($helpers);
	 
    }
    
    
    // display the list of posts
    
 
   
   
   public function index()
	  {
		  $request = service('request');
		  $searchData = $request->getGet(); // OR $this->request->getGet();
	  
		  $search = "";
		  if (isset($searchData) && isset($searchData['search'])) {
			  $search = $searchData['search'];
		  }
		  
   
	  
		  // Get data 
		  $posts = new PostModel();
	  
		  if ($search == '') {
			  
			  $paginateData = $posts->orderBy('post_title', 'ASC') 		    
			  ->paginate(10);
			 
			  
		  } else {
			  $paginateData = $posts->select('*')
				  ->orLike('post_title', $search)
				  ->orLike('post_snippet', $search)
				  ->orderBy('post_title', 'ASC')  			
				  ->paginate(10);
		  }
	  
		  $data = [
			  'posts' => $paginateData,
			  'pager' => $posts->pager,
			  'search' => $search
		  ];
		  
		  $data['title'] = 'Search results'; 
			 $data['meta_title'] = 'Search results';
			 $data['meta_description'] = 'Misdiagnosis search results';
			 $data['type_of_page'] = '';
	  
		  echo view('auth_internetics/header_open_with_scripts', $data);
			 echo view('auth_internetics/header_with_nav', $data);
			 echo view('auth_internetics/header', $data);
			 echo view('post_list', $data);
			 echo view('auth_internetics/footer');
	  }
   
   
   
   
   
   
   
   
    // display an individual post

    public function display($post_id = 'default')
    {
	 $sess = session();
	 $sess->start();
	 

	 
	 if(empty($post_id) || is_null($post_id) || $post_id == 'default')
	 {
	   return redirect()->route('');
	 }
	 else
	 {
		 
	   $post_model = new PostModel();
	   list($individualPost,) = $post_model->getIndividualPost($post_id);
	   if(is_null($individualPost))
	   {
		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
	   }
	   else
	   {
		   
		foreach ($individualPost as $key => $post) : 
		 
		 $data['title'] = $post['post_title'];
		 $data['post_user_id'] = $post['post_user_id']; 
		 $data['post_id'] = $post['post_id'];
		 $data['post_snippet'] = $post['post_snippet'];
		 $data['post_category'] = $post['post_snippet'];
		 $data['post_thumb'] = $post['post_thumb'];
		 $data['post_image'] = $post['post_image'];
		 $data['meta_title'] = $post['meta_title'];
		 $data['meta_description'] = $post['meta_description'];
		 $data['slug'] = $post['slug'];
		 $data['type_of_page'] = "";
		endforeach;     
		   
		   
		  
		$data['individualPost'] = $individualPost;
		echo view('auth_internetics/header_open_with_scripts', $data);
		echo view('auth_internetics/header_with_nav', $data);
		echo view('auth_internetics/header', $data);
		echo view('post_individual', $data);
		echo view('auth_internetics/footer');
	   }
	 }
   
   
   
   
    }





}


//return view('auth_internetics/template', $this->data);