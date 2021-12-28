<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;


class Emaillist extends BaseController


{
	
public function __construct()
    {
	   $helpers = array('phpjwt', 'form');
	   helper($helpers);
    }
	    
	
	
    public function index()
    {    
	    	$data['title'] = 'Email list2';
				  $data['meta_title'] = 'Get in touch with myMisdiagnosis.com';
				  $data['meta_description'] = 'Get in touch with myMisdiagnosis.com'; 
				  echo view('auth_internetics/header_open_with_scripts', $data);
			//   echo view('auth_internetics/header_with_nav', $data);
			
			   echo view('auth_internetics/header', $data);
			   echo view('emaillist', $data);
			   echo view('auth_internetics/footer');
		   $data['title'] = 'Email list'; 

		   
		   
		   

    }
 
    public function create()
    {  
	   helper(['form', 'url']);
	 
	 
	 
		  $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));
	   
		  // form data
	   
		  $secret = '6Lc5qcMdAAAAAPl82run23EgjaTc-dwJuV-ajjpa';
	   
		  $credential = array(
		    'secret' => $secret,
		    'response' => $recaptchaResponse
		  );
	   
		  $verify = curl_init();
		  curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		  curl_setopt($verify, CURLOPT_POST, true);
		  curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
		  curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		  $response = curl_exec($verify);
	   
		  $status = json_decode($response, true);
	   
		  $session = session();
	   
		  if ($status['success']) {
	   
		    $session->setFlashdata('msg', 'Form has been successfully submitted');
		    
		    
		    
		    
		   $db      = \Config\Database::connect();
			    $builder = $db->table('emaillist');
		    
			    $data = [	    
				 'email'  => $this->request->getVar('email')
				 ];
		   
		   
		   
		   
		   $this->sendit($data);
		    
				$save = $builder->insert($data);
		    
			   $data = [
			    'success' => true,
			    'data' => $save,
			    'msg' => "Your email has been added."
			   ]; 
		    
		    
	
		    
		    
		  } else {
	   
		    $data = [
		    'success' => false,
			'msg' => "Please complete the reCAPTCHA below.",
			
		    ]; 

		    
		  }  
	 
	 
	 
	 
	 
	 
	 
	    

 

//	  echo view('auth_internetics/header', $data);
//	  echo view('contact', $data);
	  return $this->response->setJSON($data);
//	  echo view('auth_internetics/footer');
    }
    
    
    
    
    
  
 
    
	 
    
    
    
    
    
    
   public function sendit($data)
   
   {
	   
	$email = \Config\Services::email();
	
	$email->setFrom('comms@mymisdiagnosis.com', $data['email']);
	$email->setTo('clive.france@gmail.com');
	$email->setReplyTo($data['email']);
//	$email->setCC('another@another-example.com');
//	$email->setBCC('them@their-example.com');
	
	$email->setSubject('This email has been added: '. $data['email']);
	$email->setMessage($data['email']);
	
	$email->send();
	
   
		   
	
    
    }
    
    
    
    
    
    
    
    
		  
    
		  
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}