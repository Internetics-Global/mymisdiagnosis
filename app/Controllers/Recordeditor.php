<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;




class Recordeditor extends BaseController
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
//		else if (! $this->ionAuth->isAdmin()) // remove this elseif if you want to enable this for non-admins
//		{
			// redirect them to the home page because they must be an administrator to view this
			//show_error('You must be an administrator to view this page.');
			
			
		    return redirect()->to('/');
//			
//		}
		
//		else {
			
			
//			return redirect()->to('/');
			
//		}
}






	
	
	
public function misdiagnosis()

    {
	    
	if (! $this->ionAuth->loggedIn()) { return redirect()->to('/auth/login'); } 
		
		
	
		
	    
	   
	  	$crud = new InterneticsLibrary();

		$crud->setModel(new InterneticsModel($db));

		
	   
		$crud->setTheme('internetics');
	     $crud->setTable('record_database');
	     $crud->setSubject('Misdiagnosis data');             
     

		$crud->fields(['record_id', 'record_misdiagnosis', 'record_correct_diagnosis', 'record_symptoms', 'record_category', 'record_notes','record_image', 'record_approved', 'record_user_id']);
		

		
		$user = $this->ionAuth->user()->row();   			
							
		if (! $this->ionAuth->isAdmin()) {
		$crud->where('record_user_id', $user->id);
	}
		$crud->fieldType('record_user_id', 'hidden');
		
		if (! $this->ionAuth->isAdmin()) 
		{ $crud->unsetColumns(['record_user_id', 'last_update', 'record_approved','record_image','record_category','record_notes']);
		  $crud->fieldType('record_approved', 'hidden');
		  
		} 
		else 
		{ $crud->unsetColumns(['record_user_id', 'last_update']);
	       $crud->fieldType('record_approved', 'dropdown', [
			 'yes' => 'Yes',
			 'no' => 'No'
		  ]);
	     }
		
		
				
		
//		$crud->setTexteditor(['record_notes']);

		$crud->displayAs('record_misdiagnosis', 'Your original misdiagnosis');
		$crud->displayAs('record_correct_diagnosis', 'The correct diagnosis');
		$crud->displayAs('record_symptoms', 'Symptom list (comma separated)');
		$crud->displayAs('record_category', 'Category');
		$crud->displayAs('record_notes', 'Additional notes');
		$crud->displayAs('record_image', 'Associated image');
		
//		$crud->displayAs('post_orderby', 'Order by (homepage and footer only)');
		$crud->fieldType('record_category', 'multiselect', [
		    'cat1' => 'Category 1',
		    'cat2' => 'Category 2',
		    'cat3' => 'Category 3'
		]);
		
		if (! $this->ionAuth->isAdmin()) {
			$crud->fieldType('record_category', 'hidden');
		}
			
		
		
		// $crud->callbackEditField('record_user_id', (array($this, 'record_user_id_callback')));
		$crud->callbackAddField('record_user_id', (array($this, 'record_user_id_callback')));
		
		if (! $this->ionAuth->isAdmin()) {
		$crud->callbackEditField('record_approved', (array($this, 'default_record_approved')));
		$crud->callbackAddField('record_approved', (array($this, 'default_record_approved')));
	}
		
				
		$crud->callbackEditField('record_image', (array($this, 'upload_images_posts')));
		$crud->callbackAddField('record_image', (array($this, 'upload_images_posts')));
		

		$crud->callbackBeforeUpdate(array($this, 'rename_temp_filenames'));				 		 
		$crud->callbackBeforeInsert(array($this, 'rename_temp_filenames'));


		
		$crud->callbackAfterInsert(array($this, 'rename_temp_folder'));
		$crud->callbackAfterUpdate(array($this, 'after_edit'));		
	 
			 

$crud->callbackBeforeDelete(array($this, 'delete_files'));


		   
					   

	   $output = $crud->render();
	   
	   
	   

	   return $this->_articlesOutput($output);

	   
	   
	   
	  
    
}






function delete_files ($primaryKeyValue) {


// $card_folder = '5';
$user = $this->ionAuth->user()->row();	  
	  
	  
		  // only execute the below if we have a new temp file waiting in the wings:	
		  
			  
			  $card_folder = 'record_image-' . $primaryKeyValue->primaryKeyValue;
			  $path_to_folder = FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder;	
			  
			  
// $card_folder = 'record_image-' . $post_array->record_id;
// $card_folder2 = $row->record_id;
			  
//			  $path_to_folder = FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder2;	
			  
			  if (file_exists($path_to_folder)) {		  
			 
			   array_map('unlink', glob("$path_to_folder/*.*"));
			   rmdir($path_to_folder);
			  			  
			  }
		 
		  
		  
		  

	return;
}
	

function record_user_id_callback ($fieldValue, $primaryKeyValue, $rowData) {


$user = $this->ionAuth->user()->row();


$code_block = '
	    
	<input id="field-record_user_id" type="hidden" name="record_user_id" value="'. $user->id . '">
	  
		';
  
   
	return $code_block;	
	
}





function default_record_approved ($fieldValue, $primaryKeyValue, $rowData) {
	
$user = $this->ionAuth->user()->row();

	    $code_block = '
	    
	    <input id="field-record_approved" type="hidden" name="record_approved" value="no">
	  
		';
	    
    
   
	return $code_block;
	
	}













// this sets up the image upload form component, used in conjunction with upload.php which is referenced from the articles_view.php view template

function upload_images_posts ($fieldValue, $primaryKeyValue, $rowData) {
	
$user = $this->ionAuth->user()->row();

	    $code_block = '
	    
	    <input class="form-control" id="field-' .$rowData->name.'" name="' .$rowData->name.'" type="text" value="' . $fieldValue . '" >
	  
		';
		
		if ($fieldValue == "") {
		
		$code_block .= '
		
		<div class="preview">
			
		<img src="" id="img-field-' . $rowData->name . '"  height="50%" width="*">
		</div>';	
			
		} else 
		
		{$code_block .= '
	   
		<div class="preview">
	
		  <img src="' . $fieldValue . '?' . rand() . '" id="img-field-' . $rowData->name . '"  height="50%" width="*">
	     </div>';
   
   		};
	   
	   $code_block .= '
		  
	    <div class="row">
	    <div class="col-9">
	    <input type="file"  id="file_' . $rowData->name . '" />   
		  <input type="hidden" name="id to change_1"  id="id_' . $rowData->name . '" value ="field-' .$rowData->name.'" />
	    </div>   
	    <div class="col-3 text-right">
		  <input type="hidden" name="media"  id="userfolder_' . $rowData->name . '" value ="' . $user->user_id . '-' .$user->user_folder .'" />
		  ';
		  
		  if ($primaryKeyValue =='') {$code_block .= '
		  
		  <input type="hidden" name="cardfolder_' . $rowData->name . '"  id="cardfolder_' . $rowData->name . '" value ="record_image-temp_card_folder" />
		  
		  ';}
		  
		  else
		  
		  {$code_block .= '
		  
		  <input type="hidden" name="cardfolder_' . $rowData->name . '"  id="cardfolder_' . $rowData->name . '" value ="record_image-' . $primaryKeyValue . '" />
		  
		  ';}

		  
		  $code_block .= '
		  
		  <input type="button" class="button" name="button_' . $rowData->name . '" value="Upload" id="button_' . $rowData->name . '">
		  
	   
	   </div>
	   </div>
	   
	   
	  
		';
	    
    
   
	return $code_block;
	
	}









// physical file naming: pre insert or update, this removes the temp from the file name

function rename_temp_filenames($post_array) {



$user = $this->ionAuth->user()->row();

// $card_folder = '5';



	// only execute the below if we have a new temp file waiting in the wings:	
	if (strpos($post_array->data['record_image'], '_temp') !== false) {
		
		$card_folder = $post_array->data['cardfolder_record_image'];
				
		// this is the file with the _temp extension
		$file_to_work_on = $post_array->data['record_image'];
		
		// use the line below to echo out results into the box
		// $post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];	
			
		// these routines take our temp file and replace the current main file with it:
		$replacement_filename = str_replace('_temp', '', $file_to_work_on);
		
		// replace the database entry with the new filename (with temp removed as above):
		$post_array->data['record_image'] = $replacement_filename;
		
				
		//replace the actual file on the server with the new file with _temp removed
		
		$uri = current_url(true);
		if (strpos($uri, "localhost/")) {
		
		rename('../' . $file_to_work_on, '../' . $replacement_filename);	
			
		} else {
			
		rename('.' . $file_to_work_on, '.' . $replacement_filename);	
			
		}
				   
		// these routines clean up any files with extensions different to our temp file:	
	     $path_parts = pathinfo('../..' . $replacement_filename);
		// echo $path_parts['dirname'], "\n";
		// echo $path_parts['basename'], "\n";
		// echo $path_parts['extension'], "\n";
		// echo $path_parts['filename'], "\n"; // since PHP 5.2.0
		
		
	
		$path_to_file = FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder . '/' . $path_parts['filename'];
		
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
	
	
	
		

		
		
		
	
    return $post_array;
	
	}



// physical folder naming: after insert, this renames the temp folder name to the id of the post

function rename_temp_folder($post_array) {
	


	$user = $this->ionAuth->user()->row();

	$card_folder = 'record_image-' . $post_array->insertId;
	

	

    
    if (file_exists(FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/record_image-temp_card_folder')) {
		  
		  rename(FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/record_image-temp_card_folder', FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder);
	   
	   
	   }
	   
	  
   



   	$db = \Config\Database::connect();

   	$db->query("UPDATE record_database SET record_image = REPLACE(record_image, '-temp_card_folder', $card_folder) WHERE record_id = $post_array->insertId");	
		
		$record_image_url_for_emailing = str_replace('record_image-temp_card_folder', $card_folder, $post_array->data['record_image']);
		
		
		

		$data = [	
		 'the_id' => $post_array->insertId,
		 'added_or_updated' => 'added',
		 'email'  => $this->request->getVar('email'),
		 'record_misdiagnosis'  => $post_array->data['record_misdiagnosis'],
		 'record_correct_diagnosis'  => $post_array->data['record_correct_diagnosis'],
		 'record_symptoms'  => $post_array->data['record_symptoms'],
		 'record_category'  => $post_array->data['record_category'],
		 'record_notes'  => $post_array->data['record_notes'],
		 'record_image'  => 'http://' . $_SERVER['SERVER_NAME'] . $record_image_url_for_emailing,
		 'link'  => site_url() . 'misdiagnosisdata/misdiagnosis/edit/' . $post_array->insertId
		 ];
		 if (! $this->ionAuth->isAdmin()) {
   		$this->sendit($data);	
	   }
	

    return true;
	
	}







function after_edit($post_array) {
	
	

	$user = $this->ionAuth->user()->row();


	   

		$data = [	
		 'the_id' => $post_array->data['record_id'],
		 'added_or_updated' => 'edited',
		 'email'  => $this->request->getVar('email'),
		 'record_misdiagnosis'  => $post_array->data['record_misdiagnosis'],
		 'record_correct_diagnosis'  => $post_array->data['record_correct_diagnosis'],
		 'record_symptoms'  => $post_array->data['record_symptoms'],
		 'record_category'  => $post_array->data['record_category'],
		 'record_notes'  => $post_array->data['record_notes'],
		 'record_image'  => 'http://' . $_SERVER['SERVER_NAME'] . $post_array->data['record_image'],
		 'link'  => site_url() . 'misdiagnosisdata/misdiagnosis/edit/' . $post_array->data['record_id']
		 ];
		   
		   if (! $this->ionAuth->isAdmin()) {
		   $this->sendit($data);	
	   }

    return true;
	
	}










public function sendit($data)
   
   {
	   
	$email = \Config\Services::email();
	
	$email->setFrom('comms@mymisdiagnosis.com', $data['email']);
	$email->setTo('clive.france@gmail.com');
	$email->setReplyTo($data['email']);
//	$email->setCC('another@another-example.com');
//	$email->setBCC('them@their-example.com');
	
	$email->setSubject('This record has been ' . $data['added_or_updated'] . ': ' . $data['the_id']);
	$email->setMessage($data['link'] . '<BR><BR> Misdiagnosis: ' . $data['record_misdiagnosis'] . '<BR><BR> Correct diagnosis: ' . $data['record_correct_diagnosis'] . '<BR><BR> Symptoms: ' . $data['record_symptoms']  . '<BR><BR> Notes: ' . $data['record_notes'] . '<BR><BR> Image url: ' . $data['record_image'] . '<BR><BR> Image: <img src="' . $data['record_image'] . '">');
	
	$email->send();
	
   

				   
	
    
    }





private function _articlesOutput($output = null) {
	   return view('recordeditor', (array)$output);
    }  
    
    
    



}