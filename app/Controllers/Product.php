<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;




class Product extends BaseController
{



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
			
			
		    return redirect()->to('/product/packs');
			
		}
		
		else {
			
			
			return redirect()->to('/product/packs');
			
		}
}








 public function packs()

    {
	    
	if (! $this->ionAuth->loggedIn()) { return redirect()->to('/auth/login'); } else {
		
	    
        
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
		


		$crud->callbackAddField('pack_image', (array($this, 'upload_images_packs')));
		$crud->callbackEditField('pack_image', (array($this, 'upload_images_packs')));
		
		$crud->callbackBeforeUpdate(array($this, 'image_temp_routines_packs'));
		$crud->callbackBeforeInsert(array($this, 'image_temp_routines_packs'));

		$crud->callbackAfterInsert(array($this, 'image_add_id'));
             
		                  

        $output = $crud->render();
	   ;
        
        

        return $this->_productOutput($output);

        
   	
   	} // end ionauth check
       
   
}
























		
public function cards()

    {
	    
	if (! $this->ionAuth->loggedIn()) { return redirect()->to('/auth/login'); } else {
		
	    
        
        $crud = new InterneticsLibrary();

		$crud->setModel(new InterneticsModel($db));


        
		$crud->setTheme('internetics');
        $crud->setTable('cards');
        $crud->setSubject('List of cards');             
//      $crud->fields(['title']);       


		$crud->fields(['card_id', 'media', 'related_pack', 'question_template', 'question_header', 'question_section_1_copy', 'question_section_2_copy', 'question_image_1', 'question_image_2', 'question_youtube_url', 'answer_template', 'answer_header', 'answer_section_1_copy', 'answer_section_2_copy', 'answer_image_1', 'answer_image_2', 'answer_youtube_url', 'background_image', 'select_color', 'logo', 'link', 'created_by', 'name_or_title', 'card_user_id']);


		
		
			if (! $this->ionAuth->isAdmin()) {		
	
				//	get the user id
				    
				$user = $this->ionAuth->user()->row();   			
						
				// only show records relating to that user id if not admin:
				
				$crud->where('card_user_id', $user->id);
				
				if (empty($_GET)) {
					
								
					
					
					
				} else {
				$pack = $_GET["pack"];				
				$crud->where('related_pack', $pack);
				
				}		
				
				
				$crud->fieldType('card_user_id', 'hidden', $user->id);
				
				$crud->setRelation('related_pack','packs','pack_name',array('pack_user_id' => $user->id));	
				
				$crud->unsetColumns(['card_id', 'media', 'related_pack', 'question_template', 'question_section_1_copy', 'question_section_2_copy', 'question_image_1', 'question_image_2', 'question_youtube_url', 'answer_template', 'answer_header', 'answer_section_1_copy', 'answer_section_2_copy', 'answer_image_1', 'answer_image_2', 'answer_youtube_url', 'background_image', 'select_color', 'logo', 'link', 'created_by', 'name_or_title', 'card_user_id']);

				$crud->setTexteditor(['question_section_1_copy','question_section_2_copy']);
				
				// check to see they are editing their own card
				if ($crud->getState() === 'edit' || $crud->getState() === 'delete') {
					
						$stateInfo = $crud->getStateInfo();				
						$db      = \Config\Database::connect();
						$builder = $db->table('cards');				
						$query = $builder->getWhere(['card_id' => $stateInfo->primary_key]);
		
						foreach ($query->getResult() as $row)
						{
							if ($row->card_user_id != $user->id) {$crud->unsetDelete(); }
					        if ($row->card_user_id != $user->id) {return redirect()->to('/product/cards');}
						}
				
				
		        		}

				
				
				
				}
			
			else
			
			{	 		 
				$crud->setRelation('card_user_id','users','{first_name} {last_name} - {email} - {id}');
				
				$crud->setRelation('related_pack','packs','pack_name');	  		 
		 	}	
		

		$crud->fieldType('question_template','dropdown',
			    array( 
			    "1"  => "Template 1",
			    "2"  => "Template 2",
			    "3"  => "Template 3"
			    ));
  
		$crud->fieldType('answer_template','dropdown',
			    array( 
			    "1"  => "Template 1",
			    "2"  => "Template 2",
			    "3"  => "Template 3"
			    ));

				
	
	
	
	$crud->setLangString('update_success_message',
		 'Your data has been successfully stored into the database.<br/>Please wait while you are refresh the page.
		 <script type="text/javascript">
		  location.reload(); 
		 </script>
		 <div style="display:none">
		 '
   );			
		
		
	

		

		$crud->callbackEditField('question_image_1', (array($this, 'upload_images_cards')));
		$crud->callbackAddField('question_image_1', (array($this, 'upload_images_cards')));
		$crud->callbackEditField('question_image_2', (array($this, 'upload_images_cards')));
		$crud->callbackAddField('question_image_2', (array($this, 'upload_images_cards')));

		

		$crud->callbackBeforeUpdate(array($this, 'image_temp_routines_cards'));
		$crud->callbackBeforeInsert(array($this, 'image_temp_routines_cards'));



		$crud->callbackAfterInsert(array($this, 'image_add_id'));
		

		                           

        $output = $crud->render();
        
        

        return $this->_productOutput($output);

        
   	
   	} // end ionauth check
       
   
}













function upload_images_cards ($fieldValue, $primaryKeyValue, $rowData) {
	
$user = $this->ionAuth->user()->row();

	    $code_block = '
	    
	    <input class="form-control" id="field-' .$rowData->name.'" name="' .$rowData->name.'" type="text" value="' . $fieldValue . '" >
	  
		
	   
		<div class="preview">
	
            <img src="' . $fieldValue . '?' . rand() . '" id="img-field-' . $rowData->name . '" width="100%" height="*">
        </div>
        
            
         <div class="row">
         <div class="col-9">
         <input type="file"  id="file_' . $rowData->name . '" />   
            <input type="hidden" name="id to change_1"  id="id_' . $rowData->name . '" value ="field-' .$rowData->name.'" />
         </div>   
         <div class="col-3 text-right">
            <input type="hidden" name="media"  id="userfolder_' . $rowData->name . '" value ="' . $user->user_id . '-' .$user->user_folder .'" />
            ';
            
            if ($primaryKeyValue =='') {$code_block .= '
            
            <input type="hidden" name="cardfolder_' . $rowData->name . '"  id="cardfolder_' . $rowData->name . '" value ="temp_card_folder" />
            
            ';}
            
            else
            
            {$code_block .= '
            
            <input type="hidden" name="cardfolder_' . $rowData->name . '"  id="cardfolder_' . $rowData->name . '" value ="card_folder_' . $primaryKeyValue . '" />
            
            ';}

            
            $code_block .= '
            
            <input type="button" class="button" name="button_' . $rowData->name . '" value="Upload" id="button_' . $rowData->name . '">
            
        
	   </div>
	   </div>
	   
	   
	  
		';
	    
    
   
	return $code_block;
	
	}




function upload_images_packs ($fieldValue, $primaryKeyValue, $rowData) {
	
$user = $this->ionAuth->user()->row();

	    $code_block = '
	    
	    <input class="form-control" id="field-' .$rowData->name.'" name="' .$rowData->name.'" type="text" value="' . $fieldValue . '" >
	  
		
	   
		<div class="preview">
	
            <img src="' . $fieldValue . '?' . rand() . '" id="img-field-' . $rowData->name . '" width="100%" height="*">
        </div>
        
            
         <div class="row">
         <div class="col-9">
         <input type="file"  id="file_' . $rowData->name . '" />   
            <input type="hidden" name="id to change_1"  id="id_' . $rowData->name . '" value ="field-' .$rowData->name.'" />
         </div>   
         <div class="col-3 text-right">
            <input type="hidden" name="media"  id="userfolder_' . $rowData->name . '" value ="' . $user->user_id . '-' .$user->user_folder .'" />
            ';
            
            if ($primaryKeyValue =='') {$code_block .= '
            
            <input type="hidden" name="cardfolder_' . $rowData->name . '"  id="cardfolder_' . $rowData->name . '" value ="temp_card_folder" />
            
            ';}
            
            else
            
            {$code_block .= '
            
            <input type="hidden" name="cardfolder_' . $rowData->name . '"  id="cardfolder_' . $rowData->name . '" value ="pack_folder_' . $primaryKeyValue . '" />
            
            ';}

            
            $code_block .= '
            
            <input type="button" class="button" name="button_' . $rowData->name . '" value="Upload" id="button_' . $rowData->name . '">
            
        
	   </div>
	   </div>
	   
	   
	  
		';
	    
    
   
	return $code_block;
	
	}







function image_temp_routines_cards($post_array) {

	



// echo $test;
	
//	$post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];

$user = $this->ionAuth->user()->row();

// $card_folder = '5';


	// only execute the below if we have a new temp file waiting in the wings:	
	if (strpos($post_array->data['question_image_1'], '_temp') !== false) {
		
		$card_folder = $post_array->data['cardfolder_question_image_1'];
				
		// this is the file with the _temp extension
		$file_to_work_on = $post_array->data['question_image_1'];
		
		// use the line below to echo out results into the box
		// $post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];	
			
		// these routines take our temp file and replace the current main file with it:
		$replacement_filename = str_replace('_temp', '', $file_to_work_on);
		
		// replace the database entry with the new filename (with temp removed as above):
		$post_array->data['question_image_1'] = $replacement_filename;
				
		//replace the actual file on the server with the new file with _temp removed
		rename('../..' . $file_to_work_on, '../..' . $replacement_filename);
	   			
		// these routines clean up any files with extensions different to our temp file:	
	    $path_parts = pathinfo('../..' . $replacement_filename);
		// echo $path_parts['dirname'], "\n";
		// echo $path_parts['basename'], "\n";
		// echo $path_parts['extension'], "\n";
		// echo $path_parts['filename'], "\n"; // since PHP 5.2.0
		
		
	
		$path_to_file = '../../mymisdiagnosis/upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder . '/' . $path_parts['filename'];
		
//		$post_array->data['question_header'] = $path_to_file;
		
		if ($path_parts['extension'] == 'png') {	
			
			if (file_exists($path_to_file . ".jpg")) {    unlink($path_to_file . ".jpg");    }
			if (file_exists($path_to_file . ".jpeg")) {    unlink($path_to_file . ".jpeg");    } 		
		}
		
		if ($path_parts['extension'] == 'jpg') {	
			if (file_exists($path_to_file . ".png")) {    unlink($path_to_file . ".png");    }
			if (file_exists($path_to_file . ".jpeg")) {    unlink($path_to_file . ".jpeg");    } 	
		}
		
		if ($path_parts['extension'] == 'jpeg') {	
			if (file_exists($path_to_file . ".png")) {    unlink($path_to_file . ".png");    }
			if (file_exists($path_to_file . ".jpg")) {    unlink($path_to_file . ".jpg");    } 		
		}
		
	} // end if 
	
	
	
	if (strpos($post_array->data['question_image_2'], '_temp') !== false) {
		
		$card_folder = $post_array->data['cardfolder_question_image_2'];
				
		// this is the file with the _temp extension
		$file_to_work_on = $post_array->data['question_image_2'];
		
		// use the line below to echo out results into the box
		// $post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];	
			
		// these routines take our temp file and replace the current main file with it:
		$replacement_filename = str_replace('_temp', '', $file_to_work_on);
		
		// replace the database entry with the new filename (with temp removed as above):
		$post_array->data['question_image_2'] = $replacement_filename;
				
		//replace the actual file on the server with the new file with _temp removed
		rename('../..' . $file_to_work_on, '../..' . $replacement_filename);
	   			
		// these routines clean up any files with extensions different to our temp file:	
	    $path_parts = pathinfo('../..' . $replacement_filename);
		// echo $path_parts['dirname'], "\n";
		// echo $path_parts['basename'], "\n";
		// echo $path_parts['extension'], "\n";
		// echo $path_parts['filename'], "\n"; // since PHP 5.2.0
	
		$path_to_file = '../../mymisdiagnosis/upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder . '/' . $path_parts['filename'];
		
		if ($path_parts['extension'] == 'png') {	
			if (file_exists($path_to_file . ".jpg")) {    unlink($path_to_file . ".jpg");    }
			if (file_exists($path_to_file . ".jpeg")) {    unlink($path_to_file . ".jpeg");    } 		
		}
		
		if ($path_parts['extension'] == 'jpg') {	
			if (file_exists($path_to_file . ".png")) {    unlink($path_to_file . ".png");    }
			if (file_exists($path_to_file . ".jpeg")) {    unlink($path_to_file . ".jpeg");    } 	
		}
		
		if ($path_parts['extension'] == 'jpeg') {	
			if (file_exists($path_to_file . ".png")) {    unlink($path_to_file . ".png");    }
			if (file_exists($path_to_file . ".jpg")) {    unlink($path_to_file . ".jpg");    } 		
		}
		
	} // end if 
	
		
		
		
	
		
		
		
	
    return $post_array;
	
	}





function image_temp_routines_packs($post_array) {

	



// echo $test;
	
//	$post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];

$user = $this->ionAuth->user()->row();

// $card_folder = '5';


		
		
	if (strpos($post_array->data['pack_image'], '_temp') !== false) {
		
		$card_folder = $post_array->data['cardfolder_pack_image'];
				
		// this is the file with the _temp extension
		$file_to_work_on = $post_array->data['pack_image'];
		
		// use the line below to echo out results into the box
		// $post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];	
			
		// these routines take our temp file and replace the current main file with it:
		$replacement_filename = str_replace('_temp', '', $file_to_work_on);
		
		// replace the database entry with the new filename (with temp removed as above):
		$post_array->data['pack_image'] = $replacement_filename;
				
		//replace the actual file on the server with the new file with _temp removed
		rename('../..' . $file_to_work_on, '../..' . $replacement_filename);
	   			
		// these routines clean up any files with extensions different to our temp file:	
	    $path_parts = pathinfo('../..' . $replacement_filename);
		// echo $path_parts['dirname'], "\n";
		// echo $path_parts['basename'], "\n";
		// echo $path_parts['extension'], "\n";
		// echo $path_parts['filename'], "\n"; // since PHP 5.2.0
	
		$path_to_file = '../../mymisdiagnosis/upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder . '/' . $path_parts['filename'];
		
		if ($path_parts['extension'] == 'png') {	
			if (file_exists($path_to_file . ".jpg")) {    unlink($path_to_file . ".jpg");    }
			if (file_exists($path_to_file . ".jpeg")) {    unlink($path_to_file . ".jpeg");    } 		
		}
		
		if ($path_parts['extension'] == 'jpg') {	
			if (file_exists($path_to_file . ".png")) {    unlink($path_to_file . ".png");    }
			if (file_exists($path_to_file . ".jpeg")) {    unlink($path_to_file . ".jpeg");    } 	
		}
		
		if ($path_parts['extension'] == 'jpeg') {	
			if (file_exists($path_to_file . ".png")) {    unlink($path_to_file . ".png");    }
			if (file_exists($path_to_file . ".jpg")) {    unlink($path_to_file . ".jpg");    } 		
		}
		
	} // end if 
	
		
		
		
		
		
		
		
		
		
	
    return $post_array;
	
	}










function image_add_id($stateParameters) {
	

	$user = $this->ionAuth->user()->row();

	$card_folder = $stateParameters->insertId;
	
	if (file_exists('../../mymisdiagnosis/upload/' . $user->id . '-'  .$user->user_folder . '/temp_card_folder')) {
    
    rename('../../mymisdiagnosis/upload/' . $user->id . '-'  .$user->user_folder . '/temp_card_folder','../../mymisdiagnosis/upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder);
    
    
    }
	
	
    return;
	
	}











public function user_settings()

    {
	    
	if (! $this->ionAuth->loggedIn()) { return redirect()->to('/auth/login'); } else {
		
	    
        
        $crud = new InterneticsLibrary();

		$crud->setModel(new InterneticsModel($db));


        
		$crud->setTheme('internetics');
        $crud->setTable('user_settings');
        $crud->setSubject('User settings'); 
        
                    
//      $crud->fields(['title']);       


		$crud->fields(['user_settings_id', 'manual_autoplay', 'random_play', 'play_personal_recordings', 'about', 'text_to_speech', 'function_prompts', 'auto_show_question_only', 'select_speech_language', 'countdown', 'storage', 'settings_user_id', 'last_update']);


			if (! $this->ionAuth->isAdmin()) {		
	
				//	get the user id:
				$user = $this->ionAuth->user()->row();   			
						
				// ONLY show records relating to that user id if not admin:				
				$crud->where('settings_user_id', $user->id);
				
				// assign the userid, and hide it:				
				$crud->fieldType('settings_user_id', 'hidden', $user->id);
				
				// remove these columns:				
				$crud->unsetColumns(['manual_autoplay', 'random_play', 'play_personal_recordings', 'about', 'text_to_speech', 'function_prompts', 'auto_show_question_only', 'select_speech_language', 'countdown', 'storage']);
				
				// check to see they are editing their own user settings
				if ($crud->getState() === 'edit') {
					
						$stateInfo = $crud->getStateInfo();				
						$db      = \Config\Database::connect();
						$builder = $db->table('user_settings');				
						$query = $builder->getWhere(['user_settings_id' => $stateInfo->primary_key]);
		
						foreach ($query->getResult() as $row)
						{
					        if ($row->settings_user_id != $user->id) {return redirect()->to('/product/user_settings');}
						}
				
				
		        		}

				// and if there is a record, remove any further add function and send user back to pack list
				

						$db      = \Config\Database::connect();
						$builder = $db->table('user_settings');
						// $query = $builder->get();
						$query = $builder->getWhere(['settings_user_id' => $user->id]);
						
							foreach ($query->getResult() as $row)
							{
						        // echo $row->user_settings_id;
							}
							 if ($query->getNumRows()) {  $crud->unsetAdd(); $crud->unsetBackToDatagrid(); }
							 
							 
						
							 $crud->setLangString('insert_success_message',
							 'Your data has been successfully stored into the database.<br/>Please wait while you are redirecting to the list page.
							 <script type="text/javascript">
							 window.location = "'.site_url('product/packs') . '";
							 </script>
							 <div style="display:none">
		 '
   );
							 
						

						
						
							 
					
		 
			
			}
			
			else
			
			{	 		 
				//	get the user id:
				$user = $this->ionAuth->user()->row();	
				
				// assign the userid, and hide it:
				$crud->fieldType('settings_user_id', 'hidden', $user->id);		 
			
		 	}	


		




		                             

        $output = $crud->render();       

        return $this->_productOutput($output);   
   	
   	} // end ionauth check
       
   
}























	public function items_available_equipment_1() {
        $crud = new GroceryCrud();
        $crud = new InterneticsLibrary();       
		$crud->setTheme('internetics');
        $crud->setTable('items_available_equipment_1');
        $crud->setSubject('Available Equipment #1');
//      $crud->unsetAdd();
//      $crud->unsetDelete();
        $output = $crud->render();
        return $this->_productOutput($output);
    }


	
    
        
   

    
    
    
    


    private function _productOutput($output = null) {
        return view('product_view', (array)$output);
    }  
    
    
    



}

 