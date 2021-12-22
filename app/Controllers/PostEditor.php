<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;




class Posteditor extends BaseController
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
			
			
		    return redirect()->to('/posteditor/posts');
			
		}
		
		else {
			
			
			return redirect()->to('/posteditor/posts');
			
		}
}






	
	
	
public function posts()

    {
	    
	if (! $this->ionAuth->loggedIn()) { return redirect()->to('/auth/login'); } 
		
		
	else if (! $this->ionAuth->isAdmin()) {return redirect()->to('/');}
	
	// redirect if not an admin, otherwise show the following content:
	
	else 
	
	{
		
	    
	   
	  	$crud = new InterneticsLibrary();

		$crud->setModel(new InterneticsModel($db));

		
	   
		$crud->setTheme('internetics');
	     $crud->setTable('posts');
	     $crud->setSubject('Posts');             
     

		$crud->fields(['post_id', 'post_title', 'post_snippet', 'post_body', 'post_thumb', 'post_image', 'date_of_post', 'meta_title', 'meta_description', 'slug', 'post_user_id']);
		
		$user = $this->ionAuth->user()->row();   			
							

		$crud->where('post_user_id', $user->id);
		$crud->fieldType('post_user_id', 'hidden', $user->id);
		$crud->unsetColumns(['post_user_id', 'last_update']);
				
		
		$crud->setTexteditor(['post_body','post_snippet']);
		
				
		$crud->callbackEditField('post_image', (array($this, 'upload_images_posts')));
		$crud->callbackAddField('post_image', (array($this, 'upload_images_posts')));
		$crud->callbackEditField('post_thumb', (array($this, 'upload_images_posts')));
		$crud->callbackAddField('post_thumb', (array($this, 'upload_images_posts')));	
		

				 		 
$crud->callbackBeforeUpdate(array($this, 'rename_temp_filenames'));
$crud->callbackBeforeInsert(array($this, 'rename_temp_filenames'));


		
		$crud->callbackAfterInsert(array($this, 'rename_temp_folder'));	
	 
			 
		



		   
					   

	   $output = $crud->render();
	   
	   
	   

	   return $this->_articlesOutput($output);

	   
	   
	   } // end admin only content
	  
    
}
	



function format_slug ($post_array) {
	






	$replacement_slug = str_replace('_', '-', $post_array->data['slug']);
	$post_array->data['slug'] = $replacement_slug;
		
		
	
    return $post_array;







	
	}











// this sets up the image upload form component, used in conjunction with upload.php which is referenced from the articles_view.php view template

function upload_images_posts ($fieldValue, $primaryKeyValue, $rowData) {
	
$user = $this->ionAuth->user()->row();

	    $code_block = '
	    
	    <input class="form-control" id="field-' .$rowData->name.'" name="' .$rowData->name.'" type="text" value="' . $fieldValue . '" >
	  
		
	   
		<div class="preview">
	
		  <img src="' . $fieldValue . '?' . rand() . '" id="img-field-' . $rowData->name . '"  height="50%" width="*">
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
		  
		  <input type="hidden" name="cardfolder_' . $rowData->name . '"  id="cardfolder_' . $rowData->name . '" value ="' . $primaryKeyValue . '" />
		  
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


// format the slug url

$replacement_slug = preg_replace('/[\p{P}\p{Zs}]+/u', '-', $post_array->data['slug']);
$replacement_slug = strtolower($replacement_slug);
$post_array->data['slug'] = $replacement_slug;



// echo $test;
	
//	$post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];

$user = $this->ionAuth->user()->row();

// $card_folder = '5';



	// only execute the below if we have a new temp file waiting in the wings:	
	if (strpos($post_array->data['post_image'], '_temp') !== false) {
		
		$card_folder = $post_array->data['cardfolder_post_image'];
				
		// this is the file with the _temp extension
		$file_to_work_on = $post_array->data['post_image'];
		
		// use the line below to echo out results into the box
		// $post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];	
			
		// these routines take our temp file and replace the current main file with it:
		$replacement_filename = str_replace('_temp', '', $file_to_work_on);
		
		// replace the database entry with the new filename (with temp removed as above):
		$post_array->data['post_image'] = $replacement_filename;
		
		
	
				
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
	
	
	
	if (strpos($post_array->data['post_thumb'], '_temp') !== false) {
		
		$card_folder = $post_array->data['cardfolder_post_thumb'];
				
		// this is the file with the _temp extension
		$file_to_work_on = $post_array->data['post_thumb'];
		
		// use the line below to echo out results into the box
		// $post_array->data['question_image_1'] = '[BEFORE UPDATE] ' . $post_array->data['question_image_1'];	
			
		// these routines take our temp file and replace the current main file with it:
		$replacement_filename = str_replace('_temp', '', $file_to_work_on);
		
		// replace the database entry with the new filename (with temp removed as above):
		$post_array->data['post_thumb'] = $replacement_filename;
		
		$uri = current_url(true);
		if (strpos($uri, "localhost/")) {
		
		rename('../' . $file_to_work_on, '../' . $replacement_filename);	
			
		} else {
			
		rename('.' . $file_to_work_on, '.' . $replacement_filename);	
			
		}
				
		//replace the actual file on the server with the new file with _temp removed
		
				   
		// these routines clean up any files with extensions different to our temp file:	
	    $path_parts = pathinfo('../..' . $replacement_filename);
		// echo $path_parts['dirname'], "\n";
		// echo $path_parts['basename'], "\n";
		// echo $path_parts['extension'], "\n";
		// echo $path_parts['filename'], "\n"; // since PHP 5.2.0
	
		$path_to_file = FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder . '/' . $path_parts['filename'];
		
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

	$card_folder = $post_array->insertId;
	

	

    
    if (file_exists(FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/temp_card_folder')) {
		  
		  rename(FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/temp_card_folder', FCPATH . 'upload/' . $user->id . '-'  .$user->user_folder . '/' . $card_folder);
	   
	   
	   }
	   
	  
   



   	$db = \Config\Database::connect();

   	$db->query("UPDATE posts SET post_image = REPLACE(post_image, 'temp_card_folder', $card_folder) WHERE post_id = $card_folder");	
	
	$db->query("UPDATE posts SET post_thumb = REPLACE(post_thumb, 'temp_card_folder', $card_folder) WHERE post_id = $card_folder");		


	

    return true;
	
	}










private function _articlesOutput($output = null) {
	   return view('post_editor_view', (array)$output);
    }  
    
    
    



}