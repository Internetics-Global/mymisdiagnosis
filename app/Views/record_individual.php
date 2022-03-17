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
			 
			 <h1 class="mb-3"><?= ucwords($post['record_correct_diagnosis']); ?> is sometimes misdiagnosed as <?= ucwords($post['record_misdiagnosis']); ?></h1>
			 
		</div>
		
		
		
			<div class="row mb-2">	 
				<div class="col-md-6">
					
					<article>
					
						<p>It has been reported that some patients have been misdiagnosed with <?= ucwords(htmlspecialchars_decode($post['record_misdiagnosis'], ENT_HTML5)); ?>, when in fact the correct diagnosis in their specific case was <?= ucwords(htmlspecialchars_decode($post['record_correct_diagnosis'], ENT_HTML5)); ?>.</p>	
						
						<div class="record_main_body">
						
						<p><?= ucfirst(htmlspecialchars_decode($post['record_notes'], ENT_HTML5)); ?></i></p>
						
						</div>
					     <?php if ($post['record_image']) {
								    
								  echo '<img src=" ' . $post['record_image']  .  '" class="post_image_alignment"><BR>';
								  
								}
							    
						?>  								   		
													   		
				  		<i>Always consult your doctor or health professional, and do not self diagnose.</i>
						  
					</article>	
							    
				</div>
				<div class="col-md-6">	    


				   <div class="record_symptoms">
	
					   
					   	<div class="record_symptoms_heading">		
		  				 	<p>Symptoms can include: </p>
						</div>
						
						<div class="record_symptoms_body">
							
							<p><?= ucfirst(strtolower(htmlspecialchars_decode($post['record_symptoms'], ENT_HTML5))) ?></p>
							
						</div>
						
		  			
			 		 	<small><i>Symptoms are a guideline only and may apply to either the diagnosis or the reported misdiagnosis, or both. Consult your specialist for further information.</i></small>
						 
						
						 
							 
							 
		             </div>
				   
				   
				   <?php if ($post['record_url_ref_1']) { ?>
				   
				   <div class="record_reference">
					   
										 
					   <div class="record_reference_heading">		
							 <p>Further reference:</p>
					   </div>
					   
					   <div class="record_reference_body">
						   
						 
					    
					   <?php if ($post['record_url_ref_1']) { echo '<a href=" ' . $post['record_url_ref_1']  .  '" rel="nofollow" target="_new" >' .parse_url($post['record_url_ref_1'], PHP_URL_HOST) . '</a><BR>';}
					   
						    // if ($post['record_url_ref_2']) { echo '<a href=" ' . $post['record_url_ref_2']  .  '" rel="nofollow" target="_new" >' . parse_url($post['record_url_ref_2'], PHP_URL_HOST) . '</a><BR>';}
						    
						    // if ($post['record_url_ref_3']) { echo '<a href=" ' . $post['record_url_ref_3']  .  '" rel="nofollow" target="_new" >' . parse_url($post['record_url_ref_3'], PHP_URL_HOST) . '</a><BR>';}
						    
						    // if ($post['record_url_ref_4']) { echo '<a href=" ' . $post['record_url_ref_4']  .  '" rel="nofollow" target="_new" >' . parse_url($post['record_url_ref_4'], PHP_URL_HOST) . '</a><BR>';}
					   ?>  
											    
					</div>
											    
				   </div>
					
					<?php }  ?>
				   
				   
		 		</div>
			</div>
			
			<div class="row mb-2">
				<div class="col-md-12">
					
						
					
						
					    			
						<?php if ($this->ionAuth->loggedIn()) { ?>
			  			<?php if ($user->id == $post['record_user_id']) {
				  			
							echo "<a href=" . site_url() . "recordeditor/misdiagnosis/edit/" . $post['record_id'] . ">Edit</a>";   
			  			}
			  			
			  			?>
			 			<?php } ?>
			
				</div>
			</div>
			
			
			
			
			<div class="record_footer"><p><center>Click <a href='<?php echo site_url();?>records'>here</a> to go to the <a href='<?php echo site_url();?>records'>A-Z list of diagnoses and misdiagnoses</a>.</center></p></div>
			
			
			
			
			
			
			
			
			
	   </div>
    <?php endforeach; ?>
</div>