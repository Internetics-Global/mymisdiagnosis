

	
<h1>The latest news</h1>
	
	
	
	

  
  <div class="row mb-2">

		 
	   <?php foreach ($posts as $post) {  ?>
		<div class="col-md-4">
		  <div class="card mb-3">
		    <div class="row no-gutters rounded overflow-hidden flex-md-row" style="background-image: url(<?php if ($post['post_thumb']) { echo $post['post_thumb']; } ?>); background-size: 440px; background-repeat: no-repeat;">
			  <div class="card-body listpage">
			  
			    <h4 class="card-title mb-0"><a href="pages/<?= $post['slug'] ?>"><?= $post['post_title'] ?></a></h4>
	    
			  </div>
			</div>
			
			
		  </div><!-- end mb3 -->
			  
			  <p><a href="pages/<?= $post['slug'] ?>"><img src="images/mymisdiagnosis-logo-symb-3-trans.png" class="post_button" width=50 height=50></a><?= strip_tags(htmlspecialchars_decode(word_limiter($post['post_snippet'], 19)), ENT_HTML5)?>
				 <!--<p class="card-text mb-1"><small class="text-muted"><?=$post['date_of_post'] ?></small></p> -->
					<BR><a href="pages/<?= $post['slug'] ?>">More...</a>
					 
				 </p>
						  
			
								    
						<!--<p><a href="pages/<?= $post['slug'] ?>"> More...</a></p>-->
									
	
	 <!--<p class="card-text mb-1"><small class="text-muted"><?=$post['date_of_post'] ?></small></p> -->								
									
									
		</div>
	   <?php } ?>


</div> <!-- end row mb2 -->

	

    
   <div style='margin-top: 10px;'>
	  <!--  <?= $pager->links() ?> -->
	</div>
	
	
	<?php
	    if (empty($posts)) { ?>
	    
	    
	    There are no results that match your search.
	    
	  <?php } 
	    
	    ?>
  
  
  
  
  
  
  
  
  
  
  






		  


		  

			
			
