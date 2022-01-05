<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;

use App\Models\PostModel;

class Home extends BaseController
{
	

	
	public function index()
	
	
	{	helper(['form', 'url']);
		
		$sess = session();
		$sess->start();
		$post_model = new PostModel();
		list($posts) = $post_model->getAllPosts('default','front_page');
		$data['posts'] = $posts;
		
		
		$data['htmltoshow'] = "Welcome to myMisdiagnosis.com";
		$data['title'] = "The global medical 
		<span class='mis_blue'>mis</span>diagnosis database";
		$data['meta_title'] = "The global misdiagnosis database: myMisdiagnosis.com";
		$data['meta_description'] = "The global medical 
		misdiagnosis database";
		$data['type_of_page'] = "home";
		$data['post_body'] = "<p></p><p>Whilst most medical diagnoses are accurate, some are not. Medical diagnostic errors happen.
		
		<p>Reports suggest that up to 1 in 7 medical diagnoses are incorrect. 1 in 3 of incorrect diagnoses 
		could result in serious injury or death.</p>
		
		<p>myMisdiagnosis is creating a global medical misdiagnosis database resource, with information 
		supplied  by patients and their carers, who have been subject to an incorrect diagnosis. </p>
		
		<p>Reviewing the incorrect diagnosis, the symptoms the led the practitioner to that conclusion, 
		and the eventual correct diagnosis - patients or their carers can evaluate their own situation.</p>
		
		<p>myMisdiagnosis is currently in a beta phase as we collect data from around the globe, 
		and we invite patients and carers to contribute their own information to the system. </p>
		
		<p>Your experience and knowledge could potentially provide life changing information to those 
		who need it most. Thank you for your interest in myMisdiagnosis.com</p>
		
		";
		echo view('auth_internetics/header_open_with_scripts', $data);
		echo view('auth_internetics/header_with_nav', $data);
		echo view('auth_internetics/header', $data);
		echo view('home', $data);
		echo view('auth_internetics/footer');
		return;
	}




    public function getTerm() {
 
	   $data = [];
	   $db      = \Config\Database::connect();
	   $builder = $db->table('record_database');   
	   $query = $builder->like('record_misdiagnosis', $this->request->getVar('term'))
				->select('record_id, record_misdiagnosis')
				->limit(10)->get();
	   $data = $query->getResult();
 
	   echo json_encode($data);
    }





}