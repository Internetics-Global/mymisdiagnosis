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
	   $helpers = array('phpjwt', 'form');
	   helper($helpers);
    }
    
    
    // display the list of posts
    
    public function index()
    {
	    $sess = session();
	    $sess->start();
	    $post_model = new PostModel();
	    list($posts) = $post_model->getAllPosts('default');
	    $data['posts'] = $posts;
	    $data['title'] = 'List of articles'; 
	    $data['meta_title'] = 'List of articles';
	    $data['meta_description'] = 'List of articles'; 
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
		 $data['post_thumb'] = $post['post_thumb'];
		 $data['post_image'] = $post['post_image'];
		 $data['meta_title'] = $post['meta_title'];
		 $data['meta_description'] = $post['meta_description'];
		endforeach;     
		   
		   
		   
		$data['individualPost'] = $individualPost;
		echo view('auth_internetics/header', $data);
		echo view('post_individual', $data);
		echo view('auth_internetics/footer');
	   }
	 }
   
   
   
   
    }





}


//return view('auth_internetics/template', $this->data);