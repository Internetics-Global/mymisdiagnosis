<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);





	
?>	




<form method="get" action="<?= base_url()?>/diagnosis/">
<div class="homesearchbox search_box">
<div class="container">
    <div class="row">
	   
	   <div class="col-12" align="center">
		 
		  <div id="custom-search-input">
			 <div class="input-group d-flex justify-content-center">
				 
			
				 
			<input id="search" name="search" type="text" class="form-control" placeholder="Type something..." />
			<input type="image" class="autocomplete_search_button" src="./images/logo-tra.png" alt="submit"/>
			
				 
			 </div>
		  </div>
	      
	   </div>
	   
    </div>
</div>
</div>

</form>



    
   <center><div class="homepageh1"><h1><?= $title ?></h1></div></center>
	   
	<div id="post_body">


<!-- Trigger the modal with a button -->



<!-- Modal -->
<div class="row mb-2">

	<div class="col-md-8">
	
	
		<?= htmlspecialchars_decode($post_body, ENT_HTML5) ?>

	</div>



	<div class="col-md-4">


		<?php
			$blog = $posts;
			$blogs_chunk = array_chunk($blog, 2);
			$badge_class = ["badge-primary", "badge-secondary", "badge-success", "badge-danger", "badge-warning", "badge-info", "badge-dark"];
			?>
			<?php if ($blog === null) : ?>
			
 			<h2>No posts are present </h2>
			</div>
			<?php else : ?>
			
			
			<?php foreach ($blogs_chunk as $key => $items) : ?>
		
		
	 			
   					<?php foreach ($items as $key => $value) : ?>
						
	  					<div class="card mb-3">
	    					<div class="row no-gutters rounded overflow-hidden flex-md-row" style="background-image: url(<?php if ($value['post_thumb']) { echo $value['post_thumb']; } ?>); background-size: 440px; background-repeat: no-repeat;">
		  					<div class="card-body listpage">
		  					
		    					<h4 class="home card-title mb-0"><a href="pages/<?= $value['slug'] ?>"><?= $value['post_title'] ?></a></h4>
	    					
		  					</div>
							</div>
							
							
	  					</div><!-- end mb3 -->
		  					
		  					
						
   					<?php endforeach; ?>
		

			<?php endforeach; ?>
			
			
			<?php endif; ?>
  
		 
	</div>
	
</div>		  
		 
	</div>  <!-- end of post_body -->
    
