<?php namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\UserModel;
 
 
class GoogleReCaptcha extends Controller
{
 
    public function index(){
	 return view('home');
    }
 
    public function googleCaptachStore() {
 
	 $model = new UserModel();
	 $data = array('name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'), 
				'contact_no' => $this->request->getVar('mobile_number'), 
			    );
	  
	 $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));
	  
	 $userIp=$this->request->ip_address();
	    
	 $secret='6Lc5qcMdAAAAAPl82run23EgjaTc-dwJuV-ajjpa';
	  
	 $credential = array(
		  'secret' => $secret,
		  'response' => $this->request->getVar('g-recaptcha-response')
	   );
 
	 $verify = curl_init();
	 curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	 curl_setopt($verify, CURLOPT_POST, true);
	 curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
	 curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
	 curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
	 $response = curl_exec($verify);
 
	 $status= json_decode($response, true);
	  
	 if($status['success']){ 
	  $model->save($data);
	  $session->setFlashdata('msg', 'Form has been successfully submitted');
	 }else{
	  $session->setFlashdata('msg', 'Something goes to wrong');
	 }
	    
	 return redirect()->to('/');
    }
 
}