<?php
	




if(isset($_FILES['file']['name'])){
	

	
	/* Getting file name */
	$filename = $_FILES['file']['name'];
	
	// get the extension type
	$type = pathinfo($filename,PATHINFO_EXTENSION); 
	
	// rename the file with the relevent field name passed in of the record   
	$file_rename = $_POST['rename_file'] . '_temp.' . $type;
	
	//   echo 'this type: ' . $_POST['rename_file'] . '_temp.jpg<<<<'; 
	
	$user_folder = $_POST['user_folder_this'];
	
	$card_folder = $_POST['card_folder_this'];
	
	if (!file_exists('upload/' . $user_folder)) {
    mkdir('upload/' . $user_folder, 0777, true);
    }
	
	if (!file_exists('upload/' . $user_folder . '/' . $card_folder)) {
    mkdir('upload/' . $user_folder . '/' . $card_folder, 0777, true);
    }
	
	// set the location and filename:
	$location = "upload/" . $user_folder . '/' . $card_folder . "/" .$file_rename;


// perform checks

		// check the allowed extensions


		
		
		$allowed = array('gif', 'png', 'jpg');
		$filename = strtolower($filename);
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if (!in_array($ext, $allowed)) {
		exit("wrong extension");
		}
		
		
		// check to see if file exists regardless of its extension
		$result = glob('upload/' . $user_folder . '/' . $_POST['rename_file'] . '.*');
		
		if (empty($result)) {} else {

		
		unlink('upload/' . $user_folder . '/' . $card_folder . '/'  . $_POST['rename_file'] . '_temp.jpg');
		unlink('upload/' . $user_folder . '/' . $card_folder . '/'  . $_POST['rename_file'] . '_temp.png');
		unlink('upload/' . $user_folder . '/' . $card_folder . '/'  . $_POST['rename_file'] . '_temp.jpeg');
		
			  
		
		}
		
		
			// secondary check to see if file exists
		if (file_exists($location)) {   	
		
		
		// unlink() function to delete file 
		unlink($location); 
		
		 
		}
		
		
		
		// check to see if file is over 100k   
		if($_FILES['file']['size'] > 104857.6) { //100k (size is also in bytes)
		
		exit("file too big");
		
		} else {
		    // File within size restrictions
		}



	
	
	// then upload the file
	 	 
	
	
	  /* Upload file */
	  if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	     $response = $location;
	  }
	
	
	
	
	echo '/' . $response;
	
	exit;
}
	
	echo 0;
	
	
	