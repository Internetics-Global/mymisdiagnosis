<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;


class Contact extends BaseController


{
	
	public function __construct()
	    {
		   $helpers = array('phpjwt', 'form');
		   helper($helpers);
	    }
	    
	
	
    public function index()
    {    
	    
		   $data['title'] = 'Contact us'; 
		   $data['meta_title'] = 'Get in touch with myMisdiagnosis.com';
		   $data['meta_description'] = 'Get in touch with myMisdiagnosis.com';
         $data['type_of_page'] = "";
		   echo view('auth_internetics/header_open_with_scripts', $data);
         echo view('auth_internetics/header_with_nav', $data);
         echo view('auth_internetics/header', $data);
         echo view('contact', $data);
         echo view('auth_internetics/footer');
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
                   $builder = $db->table('contacts');
              
                   $data = [
              
                     'name' => $this->request->getVar('name'),
                     'email'  => $this->request->getVar('email'),
                     'message'  => $this->request->getVar('message')
                     ];
             
             
             
             
             $this->sendit($data);
              
                    $save = $builder->insert($data);
              
                  $data = [
                   'success' => true,
                   'data' => $save,
                   'msg' => "Thank you for contacting us. We will get back to you."
                  ]; 
              
              
     
              
              
            } else {
        
              $data = [
              'success' => false,
               'msg' => "Please complete the reCAPTCHA below. Thank you.",
               
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
	
	$email->setFrom('comms@mymisdiagnosis.com', $data['name']);
	$email->setTo('clive.france@gmail.com');
	$email->setReplyTo($data['email']);
//	$email->setCC('another@another-example.com');
//	$email->setBCC('them@their-example.com');
	
	$email->setSubject('This is a message from: '. $data['name']);
	$email->setMessage($data['message']);
	
	$email->send();
	
   
             
	
    
    }
    
    
    
    
    
    
    
    
		  
    
		  
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}