<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);


// if ($this->ionAuth->loggedIn()) {echo "logged in";}

?>

<div class="container">
	
	

	
	
    <?php foreach ($individualPost as $key => $post) : ?>
    
    
   
	   
	   <div id="record_body">
		  
	 	<div class="record_heading">
			 
			 <h1 class="mb-3"><?= $post['record_correct_diagnosis'] ?> is sometimes misdiagnosed as <?= $post['record_misdiagnosis'] ?></h1>
			 
		</div>
		
		
		
			<div class="row mb-2">	 
				<div class="col-md-6">	  
					
					
						<p>It has been reported that some patients have been misdiagnosed with <?= htmlspecialchars_decode($post['record_misdiagnosis'], ENT_HTML5) ?>, when in fact the correct diagnosis in their specific case was <?= htmlspecialchars_decode($post['record_correct_diagnosis'], ENT_HTML5) ?>.</p>
							
					  	<p>A contributor has suggested the list of symptoms specified here.</p> 
														   		
				  		<p>If the symptoms indicated align with any of your symptoms, it may be worth talking to your medical professional to check that <?= htmlspecialchars_decode($post['record_correct_diagnosis'], ENT_HTML5) ?> has been considered or ruled out as an outcome.</p>
														   		
				  		<p>Always consult your doctor or health professional, and do not self diagnose.</p>
							    
				</div>
				<div class="col-md-6">	    


				   <div class="record_symptoms">
	
					   
					   	<div class="record_symptoms_heading">		
		  				 	<p>Symptoms can include: <BR>
						</div>
						
	       			   	<?= htmlspecialchars_decode($post['record_symptoms'], ENT_HTML5) ?></p>
		  			
			 
		             </div>
				   
				   
		 		</div>
			</div>
			
			<div class="row mb-2">
				<div class="col-md-12">
					
						
					
						<i><?= htmlspecialchars_decode($post['record_notes'], ENT_HTML5) ?></i></p>
			  			<?php if ($post['record_image']) {
						    			
						  			echo '<img src=" ' . $post['record_image']  .  '" class="post_image_alignment">';
						  			
									}
					    			
					    			?>
					    			
						<?php if ($this->ionAuth->loggedIn()) { ?>
			  			<?php if ($user->id == $post['record_user_id']) {
				  			
							echo "<a href='../recordeditor/misdiagnosis/edit/" . $post['record_id'] . "'>Edit</a>";   
			  			}
			  			
			  			?>
			 			<?php } ?>
			
				</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	   </div>
    <?php endforeach; ?>
</div>