<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;


class Home extends BaseController
{
	public function index()
	
	
	{
		$data['htmltoshow'] = "Welcome to myMisdiagnosis.com";
		$data['title'] = "The global medical 
		<span class='mis_blue'>mis</span>diagnosis database";
		$data['meta_title'] = "The global misdiagnosis database: myMisdiagnosis.com";
		$data['meta_description'] = "The global medical 
		misdiagnosis database";
		$data['post_image'] = "test";
		$data['post_body'] = "<p>Whilst most medical diagnoses are accurate, some are not. Medical diagnostic errors happen.
		
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
		echo view('auth_internetics/header', $data);
		echo view('home', $data);
		echo view('auth_internetics/footer');
		return;
	}









}