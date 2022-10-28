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
use App\Models\RecordModel;


class Record extends BaseController
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
	    
	    $uri = current_url(true);
	    $page_number = str_replace('page=','', $uri->getQuery());
	    if ($page_number == '') {$page_number = 1; }
	    
	    
	    
	    
	    
	    
    
	    // Get data 
	    $listings = new RecordModel();
    
	    if ($search == '') {
		    
		   
				    
				    
			$query   = $listings->query('SELECT * FROM record_database WHERE record_id IN (SELECT MIN(record_id) FROM record_database GROUP BY record_correct_diagnosis) ORDER BY record_correct_diagnosis ASC');
			$paginateData = $query->getResultArray();		    
				    
		   

		    
	    } else {
		    $paginateData = $listings->select('*')
		         ->where('record_approved','yes')
			    ->like('record_misdiagnosis', $search)
			    ->orLike('record_correct_diagnosis', $search)
			    ->orLike('record_symptoms', $search)
			    ->orderBy('record_misdiagnosis', 'ASC')  			
			    ->paginate(10);
	    }
 
 
 
 
 
    
	    $data = [
		    'listings' => $paginateData,
		    'pager' => $listings->pager,
		    'search' => $search
	    ];
	    
	    $data['title'] = 'Misdiagnosis records'; 
	    
	    
	    if ((strpos($uri, "search") !== false)) { 
		   $data['meta_title'] = 'myMisdiagnosis search results';
	    } else { 
		   // $data['meta_title'] = 'myMisdiagnosis records page ' . $page_number . ': myMisdiagnosis.com';
		   $data['meta_title'] = 'Search all diagnoses and misdiagnoses: myMisdiagnosis.com';       
	    }
	    
	    
	    if ((strpos($uri, "search") !== false)) { 
			  $data['meta_description'] = 'myMisdiagnosis search results';
		   } else { 
			  // $data['meta_description'] = 'Page ' . $page_number . ' of misdiagnosis records - search the medical misdiagnosis database at myMisdiagnosis.com';
			  
			  $data['meta_description'] = 'All diagnoses and misdiagnoses - search the medical misdiagnosis database at myMisdiagnosis.com';      
		   }
	    
		   $data['type_of_page'] = '';
    
	    echo view('auth_internetics/header_open_with_scripts', $data);
		   echo view('auth_internetics/header_with_nav', $data);
		   echo view('auth_internetics/header', $data);
		   echo view('record_list', $data);
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
		 
	   $post_model = new RecordModel();
	   list($individualPost,) = $post_model->getIndividualPost($post_id);
	   if(is_null($individualPost))
	   {
		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
	   }
	   else
	   {
		   
		foreach ($individualPost as $key => $post) : 
		 
		 $data['record_id'] = $post['record_id'];
		  $data['record_misdiagnosis'] = $post['record_misdiagnosis'];
		  $data['record_correct_diagnosis'] = $post['record_correct_diagnosis'];
		  $data['record_symptoms'] = $post['record_symptoms'];
		  $data['record_category'] = $post['record_category'];
		  $data['record_notes'] = $post['record_notes'];
		  $data['record_image'] = $post['record_image'];

		  $data['record_approved'] = $post['record_approved'];
		  $data['record_user_id'] = $post['record_user_id'];
		  $data['last_update'] = $post['last_update'];
		  $data['type_of_page'] = "";
		  $data['meta_title'] = $post['record_correct_diagnosis'] . " diagnosis - " . $post['record_misdiagnosis'] . " misdiagnosis";
		  $data['meta_description'] = $post['record_correct_diagnosis'] . " is sometimes misdiagnosed as " . $post['record_misdiagnosis'] . ". Find out more at myMisdiagnosis.com";
		  $data['post_title'] = $post['record_correct_diagnosis'] . " diagnosis - " .  $post['record_misdiagnosis'] . " misdiagnosis" ;
		endforeach;     
		   
		   
		  
		$data['individualPost'] = $individualPost;
		echo view('auth_internetics/header_open_with_scripts', $data);
		echo view('auth_internetics/header_with_nav', $data);
		echo view('auth_internetics/header', $data);
		echo view('record_individual', $data);
		echo view('auth_internetics/footer');
	   }
	 }
   
   
   
   
    }










public function diagnosis($correct_diag)
    {
	    $request = service('request');
	    $searchData = $request->getGet(); // OR $this->request->getGet();
    
	    $search = "";
	    if (isset($searchData) && isset($searchData['search'])) {
		    $search = $searchData['search'];
	    }
	    
	    $uri = current_url(true);
	    $page_number = str_replace('page=','', $uri->getQuery());
	    if ($page_number == '') {$page_number = 1; }

    
	    // Get data 
	    $listings = new RecordModel();
    
	    
		    $paginateData = $listings->select('*')
			    ->where('record_approved','yes')
			    ->like('record_correct_diagnosis', $correct_diag)
			    ->orderBy('record_misdiagnosis', 'ASC') 			
			    ->paginate(1000000);
	    
 


    
	    $data = [
		    'listings' => $paginateData,
		    'pager' => $listings->pager,
		    'search' => $search
	    ];
	    
	  
	    
	   
	    
	 
	    
	    $data['title'] = 'Misdiagnosis records'; 
	    
	    $correct_diag_adj = preg_replace('/_/', ' ', strtolower(basename($correct_diag)));
	    $correct_diag_adj = ucwords($correct_diag_adj);
	    
	    if ((strpos($uri, "search") !== false)) { 
		   $data['meta_title'] = 'myMisdiagnosis search results';
	    } else { 
		   $data['meta_title'] = $correct_diag_adj. ' misdiagnosis: myMisdiagnosis.com';    
	    }
	    
	    
	    if ((strpos($uri, "search") !== false)) { 
			  $data['meta_description'] = 'myMisdiagnosis search results';
		   } else { 
			  $data['meta_description'] =  $correct_diag_adj. ' possible misdiagnosis records - search the medical misdiagnosis database at myMisdiagnosis.com';    
		   }
	    
		   $data['type_of_page'] = '';
		   
		   
// if (count($paginateData) == 1)
// {	
// 	$urlsegment_misdiagnosis = preg_replace('/[\p{P}\p{Zs}]+/u', '-', strtolower($data['listings'][0]['record_misdiagnosis']));
// 	// echo $urlsegment_misdiagnosis;
// 	// echo $data['listings'][0]['record_id'];
// 	return redirect()->to('/misdiagnosis/' .$urlsegment_misdiagnosis. '/' . $data['listings'][0]['record_id']);
// }		   
		   
		   
		   
    
	    echo view('auth_internetics/header_open_with_scripts', $data);
		   echo view('auth_internetics/header_with_nav', $data);
		   echo view('auth_internetics/header', $data);
		   echo view('record_list', $data);
		   echo view('auth_internetics/footer');
    }

   
   
   





















}


//return view('auth_internetics/template', $this->data);