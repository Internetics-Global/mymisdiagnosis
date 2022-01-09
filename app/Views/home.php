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
 


    






<!--<div class="search_box"><center><a href="#myModal" data-toggle="modal" data-target="#myModal"><img src="data:image/svg+xml;base64,PCEtLSBSZXBsYWNlIHRoZSBjb250ZW50cyBvZiB0aGlzIGVkaXRvciB3aXRoIHlvdXIgU1ZHIGNvZGUgLS0+Cgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI4NDMuMzk4IiBoZWlnaHQ9IjE3OS44ODIiIHZpZXdCb3g9IjAgMCA4NDMuMzk4IDE3OS44ODIiPgogIDxkZWZzPgogICAgPGZpbHRlciBpZD0iYmciIHg9IjAiIHk9IjAiIHdpZHRoPSI4NDMuMzk4IiBoZWlnaHQ9IjE3OS44ODIiIGZpbHRlclVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+CiAgICAgIDxmZU9mZnNldCBkeT0iMjAiIGlucHV0PSJTb3VyY2VBbHBoYSIvPgogICAgICA8ZmVHYXVzc2lhbkJsdXIgc3RkRGV2aWF0aW9uPSIxNSIgcmVzdWx0PSJibHVyIi8+CiAgICAgIDxmZUZsb29kIGZsb29kLWNvbG9yPSIjMWIxYzIwIiBmbG9vZC1vcGFjaXR5PSIwLjMwMiIvPgogICAgICA8ZmVDb21wb3NpdGUgb3BlcmF0b3I9ImluIiBpbjI9ImJsdXIiLz4KICAgICAgPGZlQ29tcG9zaXRlIGluPSJTb3VyY2VHcmFwaGljIi8+CiAgICA8L2ZpbHRlcj4KICA8L2RlZnM+CiAgPGcgaWQ9InNlYXJjaF9iYXIiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI5LjY2NCAtMjE5KSI+CiAgICA8ZyB0cmFuc2Zvcm09Im1hdHJpeCgxLCAwLCAwLCAxLCAtMjkuNjYsIDIxOSkiIGZpbHRlcj0idXJsKCNiZykiPgogICAgICA8cGF0aCBpZD0iYmctMiIgZGF0YS1uYW1lPSJiZyIgZD0iTTQuMDkyLDBINzM5Ljk3OGM0LjgzNiwwLDguNzU2LDIuODc0LDguNzU2LDYuNDJWODMuNDYyYzAsMy41NDYtMy45Miw2LjQyLTguNzU2LDYuNDJINC4wOTJjLTQuODM2LDAtOC43NTYtMi44NzQtOC43NTYtNi40MlY2LjQyQy00LjY2NCwyLjg3NC0uNzQ0LDAsNC4wOTIsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQ5LjY2IDI1KSIgZmlsbD0iI2ZmZiIvPgogICAgPC9nPgogICAgPHRleHQgaWQ9IlNlYXJjaCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTE2IDMwMS4zMDIpIiBmaWxsPSIjNmU4Y2EwIiBmb250LXNpemU9IjMyIiBmb250LWZhbWlseT0iSGVsdmV0aWNhTmV1ZS1MaWdodCwgSGVsdmV0aWNhIE5ldWUiIGZvbnQtd2VpZ2h0PSIzMDAiPjx0c3BhbiB4PSItNDguMzM2IiB5PSIwIj5TZWFyY2g8L3RzcGFuPjwvdGV4dD4KICAgIDxwYXRoIGlkPSJiZy0zIiBkYXRhLW5hbWU9ImJnIiBkPSJNMCwwSDExOGE1LDUsMCwwLDEsNSw1Vjg1YTUsNSwwLDAsMS01LDVIMGEwLDAsMCwwLDEsMCwwVjBBMCwwLDAsMCwxLDAsMFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDY0OSAyNDQuMzAyKSIgZmlsbD0iIzk2YzNjNiIvPgogICAgPGcgaWQ9Imljbl9zZWFyY2hfbGlnaHQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDY5MSAyNzEuODg4KSI+CiAgICAgIDxnIGlkPSJFbGxpcHNlXzgiIGRhdGEtbmFtZT0iRWxsaXBzZSA4IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDAuNDE0KSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjM2Q1MTYxIiBzdHJva2Utd2lkdGg9IjIiPgogICAgICAgIDxlbGxpcHNlIGN4PSIxNS41IiBjeT0iMTUiIHJ4PSIxNS41IiByeT0iMTUiIHN0cm9rZT0ibm9uZSIvPgogICAgICAgIDxlbGxpcHNlIGN4PSIxNS41IiBjeT0iMTUiIHJ4PSIxNC41IiByeT0iMTQiIGZpbGw9Im5vbmUiLz4KICAgICAgPC9nPgogICAgICA8bGluZSBpZD0iTGluZV8xNiIgZGF0YS1uYW1lPSJMaW5lIDE2IiB4Mj0iNi41NjciIHkyPSI2LjU2NyIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMjUuMTUyIDI3LjE0KSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjM2Q1MTYxIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS13aWR0aD0iMiIvPgogICAgPC9nPgogIDwvZz4KPC9zdmc+Cg=="/;></a></center></div> -->


    
   <center><div class="homepageh1"><h1><?= $title ?></h1></div></center>
	   
	<div id="post_body">


<!-- Trigger the modal with a button -->



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	
	
  <div class="modal-dialog">
	  
	 
    <!-- Modal content-->
    <div class="modal-content">
	 <div class="modal-header">
	    <h5 class="modal-title"></h5>
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		 <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	 
	 <div class="modal-body">
	   <?php 
	   $data['title'] = 'Email list'; 
		 $data['meta_title'] = 'Get in touch with myMisdiagnosis.com';
		 $data['meta_description'] = 'Get in touch with myMisdiagnosis.com';
	   
	   echo view('emaillist', $data);
	   ?>
	 </div>
	 <div class="modal-footer">
	   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	 </div>
    </div>

  </div>
</div>



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
    
