

	
<h1><?php echo $title; ?></h1>
	
	
	
	

 


		 
		 
	<div class="row mb-2"> 
	   <?php foreach ($listings as $listing)  { ?>
		<div class="col-md-12">
		  
		   
			  
			<h3 class="mb-0"><a href="record/<?= $listing['record_id'] ?>"><?= $listing['record_misdiagnosis'] ?></a></h3>
		    	<p><?= strip_tags(htmlspecialchars_decode(word_limiter($listing['record_notes'], 19)), ENT_HTML5)?></p> 
			
			
				
		
			  
	
				 
						  
				<!-- <p><a href="record/<?= $listing['record_id'] ?>" class="stretched-link">Continue reading</a></p> -->
		</div>
	
		<?php } ?>
	
   
 
 
    
    </div> <!-- end row mb2 -->
 
  

  <div style='margin-top: 10px;'>
	 <?= $pager->links() ?>
  </div>
  
  
  <?php
	 if (empty($listings)) { ?>
	 
	 
	 There are no results that match your search.
	 
    <?php } 
	 
	 ?>
  
  
  
  
  
  






		  


		  

			
			
