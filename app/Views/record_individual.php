<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);


// if ($this->ionAuth->loggedIn()) {echo "logged in";}

?>

<div class="container">
	
	

	
	
    <?php foreach ($individualPost as $key => $post) : ?>
    
    
    <form method="get" action="<?= base_url()?>/records/">
    <div class="search_box">
    <div class="container">
	   <div class="row">
		  
		  <div class="col-12" align="center">
			
			 <div id="custom-search-input">
				<div class="input-group d-flex justify-content-center">
					
			    
					
			    <input id="search" name="search" type="text" class="form-control" placeholder="<?= $post['record_misdiagnosis'] ?>" />
			    <input type="image" class="autocomplete_search_button" src="data:image/svg+xml;base64,PHN2ZyBpZD0iaWNuX3NlYXJjaF9saWdodCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzMuMTMzIiBoZWlnaHQ9IjM1LjEyMSIgdmlld0JveD0iMCAwIDMzLjEzMyAzNS4xMjEiPgogIDxnIGlkPSJFbGxpcHNlXzgiIGRhdGEtbmFtZT0iRWxsaXBzZSA4IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDAuNDE0KSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjM2Q1MTYxIiBzdHJva2Utd2lkdGg9IjIiPgogICAgPGVsbGlwc2UgY3g9IjE1LjUiIGN5PSIxNSIgcng9IjE1LjUiIHJ5PSIxNSIgc3Ryb2tlPSJub25lIi8+CiAgICA8ZWxsaXBzZSBjeD0iMTUuNSIgY3k9IjE1IiByeD0iMTQuNSIgcnk9IjE0IiBmaWxsPSJub25lIi8+CiAgPC9nPgogIDxsaW5lIGlkPSJMaW5lXzE2IiBkYXRhLW5hbWU9IkxpbmUgMTYiIHgyPSI2LjU2NyIgeTI9IjYuNTY3IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyNS4xNTIgMjcuMTQpIiBmaWxsPSJub25lIiBzdHJva2U9IiMzZDUxNjEiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIi8+Cjwvc3ZnPgo=" alt="submit"/>
			    
					
				</div>
			 </div>
			
		  </div>
		  
	   </div>
    </div>
    </div>
    </form>
    <BR>
    
	   <h1 class="mb-3"><?= $post['record_misdiagnosis'] ?> >> <?= $post['record_correct_diagnosis'] ?></h1>
	   
	   <div id="record_body">
		  
		  
		
		  <p>Original misdiagnosis: <?= htmlspecialchars_decode($post['record_misdiagnosis'], ENT_HTML5) ?></p>
		  <p>Eventually diagnosed as: <?= htmlspecialchars_decode($post['record_correct_diagnosis'], ENT_HTML5) ?></p>
		  <p><i><?= htmlspecialchars_decode($post['record_notes'], ENT_HTML5) ?></i></p>
		  <?php if ($post['record_image']) {
					    
					  echo '<img src=" ' . $post['record_image']  .  '" class="post_image_alignment">';
					  
					}
				    
				    ?>
		  <p>Symptoms include: <BR>
	       <?= htmlspecialchars_decode($post['record_symptoms'], ENT_HTML5) ?></p>
		  
		<?php if ($this->ionAuth->loggedIn()) { ?>
		  <?php if ($user->id == $post['record_user_id']) {
			  
			echo "<a href='../recordeditor/misdiagnosis/edit/" . $post['record_id'] . "'>Edit</a>";   
		  }
		  
		  ?>
		 <?php } ?>
	   </div>
    <?php endforeach; ?>
</div>