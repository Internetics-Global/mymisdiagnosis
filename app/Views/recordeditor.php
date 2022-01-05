<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; 
	
	$totalpanes = 2;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

<link rel="stylesheet" href="https://use.typekit.net/tny7auv.css">

</head>
<body>
	
	
<div class="body_inner">
<div class="body_inner_frame">
	
	
<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);


$db      = \Config\Database::connect();
$builder = $db->table('user_settings');
// $query = $builder->get();
$query = $builder->getWhere(['settings_user_id' => $user->id]);

	foreach ($query->getResult() as $row)
	{
//        echo $row->user_settings_id;
	}

//if ($query->getNumRows()) {
//        echo "we have one";
//    } else {
//        echo "we need to add one";
//    }
	
function endsWith( $haystack, $needle ) {
	   $length = strlen( $needle );
	   if( !$length ) {
		  return true;
	   }
	   return substr( $haystack, -$length ) === $needle;
    }	
	
?>	
	
	<?php
	
	echo view('auth_internetics/header_with_nav')
	
	?>
	

  









    
		<?php echo $output; ?>
    
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    
    
    






    <script type="text/javascript">


			


    


    $(document).ready(function() {
        $('#prev_question_btn').css('display', 'none'); 
	   $('#form-button-save').css('display', 'none')
        $('#print_pdf_button').css('display', 'none');
        $('#q0').css('display', 'none');
        $('#q1').css('display', 'block');
        $('#summary_view').css('display', 'none');
		$('#display_mobility_level').css('display', 'none');  
		
		 
		

	   
	   
		   $("#button_record_image,#button_post_thumb,#button_pack_image").click(function(){
			   

		   //console.log( this.name )
			   
	
	        var fd = new FormData();
	        
	        if (this.name == 'button_record_image') {
	        var files = $('#file_record_image')[0].files;	 
	        }  
	        if (this.name == 'button_post_thumb') {
	        var files = $('#file_post_thumb')[0].files;	 
	        } 
	        
	        if (this.name == 'button_pack_image') {
	        var files = $('#file_pack_image')[0].files;	 
	        }  
	           
	        // Check file selected or not

		

	        if(files.length > 0 ){
		        
	        
		        
		           fd.append('file',files[0]);
		           
		           // add the new filename to be passed through to upload.php
		           
				   if (this.name == 'button_record_image') {
		           $change_this_id = id_record_image['value'];
		           $cancel_button = '#cancel_button_record_image';

		           $user_folder = userfolder_record_image['value'];
		           $card_folder = cardfolder_record_image['value'];
				   
	console.log($card_folder);			   
		           }
		           
		           if (this.name == 'button_post_thumb') {
		           $change_this_id = id_post_thumb['value'];
		           $user_folder = userfolder_post_thumb['value'];
		           $card_folder = cardfolder_post_thumb['value'];
		          
		           }
		           
		           
		           if (this.name == 'button_pack_image') {
		           $change_this_id = id_pack_image['value'];
		           $user_folder = userfolder_pack_image['value'];
		           $card_folder = cardfolder_pack_image['value'];
				 
		          
		           }

		           
		           fd.append("rename_file", $change_this_id)
		           fd.append("user_folder_this", $user_folder)
		           fd.append("card_folder_this", $card_folder)
		           

//		           console.log($card_folder)
//		           console.log($change_this_id);
	
		           $.ajax({
	           
		              url: '<?php echo site_url('/')?>upload.php',
		              type: 'post',
		              data: fd,
		              contentType: false,
		              processData: false,	             
					  success: function(response){
	
					  console.log(response);
					  
					  if (response == 'file exists'){						  
						  bootbox.alert('File is already on the server');					  
					  } 
					  
					  else if (response == 'file exists - g'){						  
						  bootbox.alert('File is already on the server (error code 1020)');						  
					  }
					  
					  else if (response == 'file too big'){						  
						  bootbox.alert('Your file is too big, please reduce it to less than 100k');						  
					  }
					  
					  else if (response == 'wrong extension'){						  
						  bootbox.alert('Please check your file. We only allow jpg, jpeg and png files.');						  
					  }					 					  
					  
					  else {
	
		                 if(response != 0){
			                var unique = $.now();
		                    $("#img-" + $change_this_id).attr("src",response + '?' + unique); 
		                    $(".preview img-" + $change_this_id).show(); // Display image element
		                    
		                    document.getElementById($change_this_id).setAttribute('value',response);
		                    } 
		               } 
		                 			                 
			                 
			                 
			              }, /** end of success function **/
			              
			             
			           }); /** end of ajax wrapper **/
			             
	
	
				} /** end of if files.length etc **/
				
				else 
				{ 
						bootbox.alert("Please select a file."); 
				} /** end of else if files.length etc **/
	


			}); /** end of button response **/
			
			

	   
	   
	   

	   
	   
/**    $("#questions").fadeIn();  **/
    $("body").fadeIn(1500);
    
    });
    






     
    
    





  
    
    
    
    
    
    
    
    
    
    

    
    
    
 
    
    
  
    </script>
    

</div>
</div>


</body>

</body>
</html>