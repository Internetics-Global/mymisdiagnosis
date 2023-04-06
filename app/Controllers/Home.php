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
		$data['meta_title'] = "myMisdiagnosis - The Global Misdiagnosis Database";
		$data['meta_description'] = "Search for the possibility of misdiagnosis at the world's largest database of publicly accessible, freely available medical misdiagnoses data.";
		$data['type_of_page'] = "home";
		$data['post_body'] = "
		
		<p>The myMisdiagnosis.com project is a global medical <a href='https://www.mymisdiagnosis.com/diagnosis'>misdiagnosis database</a> resource, designed to help patients and carers explore the possibilities for misdiagnosis, and to increase awareness about the issue of medical diagnostic error in general.
		
		<p>Search using the search box above, or head over to the <a href='https://www.mymisdiagnosis.com/diagnosis'>A-Z list of diagnoses</a>, and search for possible misdiagnoses. </p>
		
		<p>Reports indicate that up to <a href='https://www.mymisdiagnosis.com/pages/up-to-1-in-7-medical-diagnoses-could-be-wrong'>1 in 7 medical diagnoses are incorrect</a>. Additionally it is reported that up to <a href='https://www.mymisdiagnosis.com/pages/1-in-3-incorrect-diagnoses-could-result-in-serious-injury-or-death'>1 in 3 of incorrect diagnoses</a> 
		could result in serious injury or death.</p>
		
		<p>So we can conclude that whilst most medical diagnoses are accurate, a significant number are not. Medical diagnostic errors happen.</p>
		
		<p>Reviewing the <a href='https://www.mymisdiagnosis.com/diagnosis'>incorrect diagnosis</a>, the symptoms that led the practitioner to that conclusion, and the <a href='https://www.mymisdiagnosis.com/diagnosis'>correct eventual diagnosis</a> - patients or their carers can evaluate their situation and raise suggestions or foster discussion with their doctors or specialists.</p>
		
		<p><div class=h2><i>Check your diagnosis</i></div> </p>
		
		<p>Common diagnoses that are sometimes misdiagnosed are listed below. Alternatively use our search box to find your own diagnosis, or the <a href='https://www.mymisdiagnosis.com/diagnosis'>A-Z list of diagnoses</a> directory.</p>
		
		
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
	   $builder->select('record_id, record_misdiagnosis, record_correct_diagnosis','record_symptoms','record_approved');
	   $builder->where('record_approved','yes');
	   $query = $builder->GroupStart()
	   			->like('record_misdiagnosis', $this->request->getVar('term'))
	   			->orLike('record_misdiagnosis', $this->request->getVar('term'))
		 		->orLike('record_correct_diagnosis', $this->request->getVar('term'))
		 		->orLike('record_symptoms', $this->request->getVar('term'))
				->GroupEnd()					    
				->limit(10)->get();
	   $data = $query->getResult();
 
	   echo json_encode($data);
    }





}