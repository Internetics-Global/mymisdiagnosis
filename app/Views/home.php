<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);





	
?>	



<div class="container">
    
   <center><div class="homepageh1"><h1><?= $title ?></h1></div></center>
	   
	<div id="post_body">





		
			






<div class="col-12">
		
	<div class="container">

		 <div class="row mb-2">
			    
			    
			    
			<!--    <div class="col-md-4">
					 <div class="card mb-3">
					   <div class="row no-gutters border rounded overflow-hidden flex-md-row">
						  <div class="card-body">
						  <a href="posts/121"><img src=" /mymisdiagnosis/upload/1-1000101/121/field-post_thumb.png" class="post_image_alignment"></a>
						    <h2 class="card-title mb-0"><a href="posts/121">Here's a thing... Fixation Error</a></h2>
						    <p class="card-text mb-1"><small class="text-muted">2021-12-18 09:00:00</small></p>
						    <p class="card-text">
			    A conversation with a good friend in the medical profession led me to a concept that helps explain…</p>
						    <a href="posts/121" class="stretched-link">Continue reading</a>
						  </div>
						</div>
					 </div>
				    </div> -->


		<div class="col-md-4">
		  <div class="card mb-3">
		    <div class="row no-gutters rounded overflow-hidden flex-md-row">
			   <div class="card-body home_page_card_1">
				 
				   <h4 class="card-title mb-0"><a href="posts/123">How to use this site</a></h4>
				 
			   </div>
			 </div>
		  </div>
		</div>


		<div class="col-md-4">
		  <div class="card mb-3">
		    <div class="row no-gutters rounded overflow-hidden flex-md-row">
			   <div class="card-body home_page_card_2">
				   
			   		<h4 class="card-title mb-0"><a href="posts/124">About us</a></h4>
					   
			   </div>
			 </div>
		  </div>
		</div>
		   	    		    
		<div class="col-md-4">
		  <div class="card mb-3">
		    <div class="row no-gutters rounded overflow-hidden flex-md-row">
			   <div class="card-body home_page_card_3">
				   
			   		<h4 class="card-title mb-0"><a href="posts/125">Empowering patients</a></h4>
					   
			   </div>
			 </div>
		  </div>
		</div>   
		    
		    
		</div>  <!-- end of row mb-2-->
		
	</div> <!-- end of container -->
	  
</div>  <!-- end of col-12 -->













  
		  <?= htmlspecialchars_decode($post_body, ENT_HTML5) ?>
		  
		 
	</div>  <!-- end of post_body -->
    
</div>  <!-- end of main container -->