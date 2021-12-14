<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;


class Home extends BaseController
{
	public function index()
	
	
	{
		$this->data['htmltoshow'] = "Welcome to myMisdiagnosis.com";
		$this->data['title'] = "myMisdiagnosis.com";
		
		return view('auth_internetics/template', $this->data);
		return;
	}
}




