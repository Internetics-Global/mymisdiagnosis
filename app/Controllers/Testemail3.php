<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;



class Testemail3 extends \CodeIgniter\Controller



{
	
	
	public function __construct()
	    {
$helpers = array('phpjwt', 'form', 'email');
   helper($helpers);		   
		   
	    }   
	


public function index() {
	
	
	

	   
	   
	        
$email = \Config\Services::email();

$email->setFrom('comms@mymisdiagnosis.com', 'Your Name');
$email->setTo('clive.france@gmail.com');
$email->setCC('another@another-example.com');
$email->setBCC('them@their-example.com');

$email->setSubject('Email Test');
$email->setMessage('Testing the email class.');

$email->send();


	  
	  
	  
	
   
   
   
   
   
   
   } //end index
   
   
   
   } // end test email