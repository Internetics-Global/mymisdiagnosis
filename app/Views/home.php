<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);





	
?>	




<form method="get" action="<?= base_url()?>/records/">
<div class="search_box">
<div class="container">
    <div class="row">
	   
	   <div class="col-12" align="center">
		 
		  <div id="custom-search-input">
			 <div class="input-group d-flex justify-content-center">
				 
			
				 
			<input id="search" name="search" type="text" class="form-control" placeholder="Search" />
			<input type="image" class="autocomplete_search_button" src="data:image/svg+xml;base64,PHN2ZyBpZD0iaWNuX3NlYXJjaF9saWdodCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzMuMTMzIiBoZWlnaHQ9IjM1LjEyMSIgdmlld0JveD0iMCAwIDMzLjEzMyAzNS4xMjEiPgogIDxnIGlkPSJFbGxpcHNlXzgiIGRhdGEtbmFtZT0iRWxsaXBzZSA4IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDAuNDE0KSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjM2Q1MTYxIiBzdHJva2Utd2lkdGg9IjIiPgogICAgPGVsbGlwc2UgY3g9IjE1LjUiIGN5PSIxNSIgcng9IjE1LjUiIHJ5PSIxNSIgc3Ryb2tlPSJub25lIi8+CiAgICA8ZWxsaXBzZSBjeD0iMTUuNSIgY3k9IjE1IiByeD0iMTQuNSIgcnk9IjE0IiBmaWxsPSJub25lIi8+CiAgPC9nPgogIDxsaW5lIGlkPSJMaW5lXzE2IiBkYXRhLW5hbWU9IkxpbmUgMTYiIHgyPSI2LjU2NyIgeTI9IjYuNTY3IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyNS4xNTIgMjcuMTQpIiBmaWxsPSJub25lIiBzdHJva2U9IiMzZDUxNjEiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIi8+Cjwvc3ZnPgo=" alt="submit"/>
			
				 
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
		    <div class="row no-gutters rounded overflow-hidden flex-md-row" style="background-image: url(<?php if ($value['post_thumb']) { echo $value['post_thumb']; } ?>); background-size: 440px; background-repeat: no-repeat;">
			  <div class="card-body listpage">
			  
			    <h4 class="home card-title mb-0"><a href="pages/<?= $value['slug'] ?>"><?= $value['post_title'] ?></a></h4>
		    
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
    
