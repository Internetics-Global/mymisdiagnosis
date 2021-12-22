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
	
	
	
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand mx-auto" href="#">   </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item<?php if (endsWith($uri, "home") !== false){ echo ' active"'; }  ?>">
		 
        <a class="nav-link" href="<?php echo site_url();?>">Home</a>
	  
      </li>
	 <li class="nav-item">
	    <a class="nav-link" href="<?php echo site_url();?>pages">News</a>
	  </li>
	  
	 <?php
	 // if($this->ionAuth->inGroup('members')
	 if ($this->ionAuth->isAdmin()) {
	 ?>
	 <li class="nav-item<?php if (endsWith($uri, "pages") !== false){ echo ' active"'; }  ?>">
		<a class="nav-link" href="<?php echo site_url('posteditor/posts');?>">Post editor</a>
	   </li>
      <li class="nav-item<?php if (endsWith($uri, "packs") !== false){ echo ' active"'; }  ?>">
        <a class="nav-link" href="<?php echo site_url('product/packs');?>">View packs</a>
	 </li>
	 <li class="nav-item<?php if (endsWith($uri, "packs/add") !== false){ echo ' active"'; }  ?>">
        <a class="nav-link" href="<?php echo site_url('product/packs/add');?>">Add pack</a>
	 </li>
	 <li class="nav-item<?php if (endsWith($uri, "cards") !== false){ echo ' active"'; }  ?>">
      	<a class="nav-link" href="<?php echo site_url('product/cards');?>">View cards</a>
	 </li>
	 <li class="nav-item<?php if (endsWith($uri, "cards/add") !== false){ echo ' active"'; }  ?>">
        <a class="nav-link" href="<?php echo site_url('product/cards/add');?>">Add card</a>
	 </li>
	 
    <?php
    }
    ?>

	 <li class="nav-item<?php if (strpos($uri, "settings") !== false){ echo ' active"'; }  ?>">
	   <a class="nav-link" href="<?php echo site_url('auth/edit_user/'); echo $user->id; ?>">Settings</a>   
	 </li>
	   
	 <li class="nav-item<?php if (strpos($uri, "logout") !== false){ echo ' active"'; }  ?>">        
        <a class="nav-link" href="<?php echo site_url('auth/logout');?>">Logout</a>
	 </li>
      
    </ul>

  </div>
</nav>
  








    
		<?php echo $output; ?>
    
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    
    
    






    <script type="text/javascript">


			


    


    $(document).ready(function() {
        $('#prev_question_btn').css('display', 'none'); 
        $('#print_pdf_button').css('display', 'none');
        $('#q0').css('display', 'none');
        $('#q1').css('display', 'block');
        $('#summary_view').css('display', 'none');
		$('#display_mobility_level').css('display', 'none');  
		
		 
		

	   
	   
		   $("#button_question_image_1,#button_question_image_2,#button_pack_image").click(function(){
			   

		   //console.log( this.name )
			   
	
	        var fd = new FormData();
	        
	        if (this.name == 'button_question_image_1') {
	        var files = $('#file_question_image_1')[0].files;	 
	        }  
	        if (this.name == 'button_question_image_2') {
	        var files = $('#file_question_image_2')[0].files;	 
	        } 
	        
	        if (this.name == 'button_pack_image') {
	        var files = $('#file_pack_image')[0].files;	 
	        }  
	           
	        // Check file selected or not

			

	        if(files.length > 0 ){
		        
	        
		        
		           fd.append('file',files[0]);
		           
		           // add the new filename to be passed through to upload.php
		           
				   if (this.name == 'button_question_image_1') {
		           $change_this_id = id_question_image_1['value'];
		           $cancel_button = '#cancel_button_question_image_1';

		           $user_folder = userfolder_question_image_1['value'];
		           $card_folder = cardfolder_question_image_1['value'];
				   
				   
		           }
		           
		           if (this.name == 'button_question_image_2') {
		           $change_this_id = id_question_image_2['value'];
		           $user_folder = userfolder_question_image_2['value'];
		           $card_folder = cardfolder_question_image_2['value'];
		          
		           }
		           
		           
		           if (this.name == 'button_pack_image') {
		           $change_this_id = id_pack_image['value'];
		           $user_folder = userfolder_pack_image['value'];
		           $card_folder = cardfolder_pack_image['value'];
		          
		           }

		           
		           fd.append("rename_file", $change_this_id)
		           fd.append("user_folder_this", $user_folder)
		           fd.append("card_folder_this", $card_folder)
		           

		           
		           console.log($change_this_id);
	
		           $.ajax({
	           
		              url: '/mymisdiagnosis/upload.php',
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