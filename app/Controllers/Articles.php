<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;




class Articles extends BaseController
{
	






public function index()

    {
	
		
	
	    if (! $this->ionAuth->loggedIn())
		{
			// redirect them to the login page
			return redirect()->to('/auth/login');
		}
		else if (! $this->ionAuth->isAdmin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			//show_error('You must be an administrator to view this page.');
			
			
		    return redirect()->to('/article/posts');
			
		}
		
		else {
			
			
			return redirect()->to('/auth/login');
			
		}
}






	
	
	
public function posts()

    {
	    
	if (! $this->ionAuth->loggedIn()) { return redirect()->to('/auth/login'); } 
		
		
	else if (! $this->ionAuth->isAdmin()) {return redirect()->to('/product/packs');}
	
	// redirect if not an admin, otherwise show the following content:
	
	else 
	
	{
		
	    
	   
	   $crud = new InterneticsLibrary();

		$crud->setModel(new InterneticsModel($db));

		
	   
		$crud->setTheme('internetics');
	   $crud->setTable('packs');
	   $crud->setSubject('List of packs');             
//      $crud->fields(['title']);       

		$crud->fields(['pack_id', 'pack_name', 'side_bar_title', 'your_name', 'name_or_title', 'pack_password', 'reading_timer', 'pack_image', 'pack_user_id']);
		
	
		
			if (! $this->ionAuth->isAdmin()) {		
	
				//	get the user id
				    
				$user = $this->ionAuth->user()->row();   			
						
				// only show records relating to that user id if not admin:
				
				$crud->where('pack_user_id', $user->id);
				$crud->fieldType('pack_user_id', 'hidden', $user->id);
				$crud->unsetColumns(['side_bar_title', 'your_name', 'name_or_title', 'pack_password', 'reading_timer', 'pack_user_id', 'last_update']);
				
				// check to see they are editing their own pack
				if ($crud->getState() === 'edit' || $crud->getState() === 'delete' ) {
					
						$stateInfo = $crud->getStateInfo();				
						$db      = \Config\Database::connect();
						$builder = $db->table('packs');				
						$query = $builder->getWhere(['pack_id' => $stateInfo->primary_key]);
		
						foreach ($query->getResult() as $row)
						{
							if ($row->pack_user_id != $user->id) {$crud->unsetDelete(); }
						   if ($row->pack_user_id != $user->id) {return redirect()->to('/product/packs');}
						}
				
				
					   }
					   
					   
					   
				
				
				
				
					
					
					
					
			}
			
			else
			
			
			
			{	 		 
				$crud->setRelation('pack_user_id','users','{first_name} {last_name} - {email} - {id}');  		 
			 }	
		



		   
					   

	   $output = $crud->render();
	   ;
	   
	   

	   return $this->_productOutput($output);

	   
	   
	   } // end admin only content
	  
    
}
	
	



public function __construct()
	{
		$this->ionAuth    = new \IonAuth\Libraries\IonAuth();
		$this->validation = \Config\Services::validation();
		helper(['form', 'url']);
		$this->configIonAuth = config('IonAuth');
		$this->session       = \Config\Services::session();

		if (! empty($this->configIonAuth->templates['errors']['list']))
		{
			$this->validationListTemplate = $this->configIonAuth->templates['errors']['list'];
		}
	}





private function _productOutput($output = null) {
	   return view('product_view', (array)$output);
    }  
    
    
    



}