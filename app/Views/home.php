<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);





	
?>	



<div class="container">
    
   <center><div class="homepageh1"><h1><?= $title ?></h1></div></center>
	   
	<div id="post_body">




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
		    <div class="row no-gutters rounded overflow-hidden flex-md-row" style="background-image: url(<?php if ($value['post_thumb']) { echo $value['post_thumb']; } ?>); background-size: 550px; background-repeat: no-repeat;">
			  <div class="card-body listpage">
			  
			    <h4 class="card-title mb-0"><a href="pages/<?= $value['slug'] ?>"><?= $value['post_title'] ?></a></h4>
		    
			  </div>
			</div>
			
			
		  </div><!-- end mb3 -->
			  
			  
		</div>
	   <?php endforeach; ?>




	
    <?php endforeach; ?>
    
    </div> <!-- end row mb2 -->
  <?php endif; ?>
		
			
















  
		  <?= htmlspecialchars_decode($post_body, ENT_HTML5) ?>
		  
		 
	</div>  <!-- end of post_body -->
    
</div>  <!-- end of main container -->