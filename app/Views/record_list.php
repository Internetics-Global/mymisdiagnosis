

	
<h1>The latest news</h1>
	
	
	
	
  <?php
  $blog = $posts;
  $blogs_chunk = array_chunk($blog, 2);
  $badge_class = ["badge-primary", "badge-secondary", "badge-success", "badge-danger", "badge-warning", "badge-info", "badge-dark"];
  ?>
  <?php if ($blog === null) : ?>
    <div class="row mb-2">
	 <h2>No posts are present </h2>
    </div>
  <?php else : ?>
  
  <div class="row mb-2">
    <?php foreach ($blogs_chunk as $key => $items) : ?>



	
		 
		 
		 
	   <?php foreach ($items as $key => $value) : ?>
		<div class="col-md-4">
		  <div class="card mb-3">
		    <div class="row no-gutters rounded overflow-hidden flex-md-row">
			  <div class="card-body listpage">
			  
			    <h4 class="card-title mb-0"><a href="record/<?= $value['record_id'] ?>"><?= $value['record_id'] ?></a></h4>
		    
			  </div>
			</div>
			
			
		  </div><!-- end mb3 -->
			  
			  <p><?= strip_tags(htmlspecialchars_decode(word_limiter($value['record_misdiagnosis'], 19)), ENT_HTML5)?></p> 
				 
						  
				 <p><a href="record/<?= $value['record_id'] ?>" class="stretched-link">Continue reading</a></p>
		</div>
	   <?php endforeach; ?>




	
    <?php endforeach; ?>
    
    </div> <!-- end row mb2 -->
  <?php endif; ?>
  
  
  
  
  
  
  
  
  
  
  
  






		  


		  

			
			
