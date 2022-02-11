
<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);

$page_number = str_replace('page=','', $uri->getQuery());

if(isset($_GET['search']))
{
   
   $placeholder = $_GET['search'];
   	if ($placeholder == "") 
	{
	   $placeholder = "Search";   
   	}
   
} else 
{ 
   $placeholder = "Search"; 
}

	
?>	

<form method="get" action="<?= base_url()?>/records/">
<div class="search_box">
<div class="container">
    <div class="row">
	   
	   <div class="col-12" align="center">
		 
		  <div id="custom-search-input">
			 <div class="input-group d-flex justify-content-center">
				 
			
				 
			<input id="search" name="search" type="text" class="form-control" placeholder="<?php echo $placeholder; ?>" />
			<input type="image" class="autocomplete_search_button" src="data:image/svg+xml;base64,PHN2ZyBpZD0iaWNuX3NlYXJjaF9saWdodCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzMuMTMzIiBoZWlnaHQ9IjM1LjEyMSIgdmlld0JveD0iMCAwIDMzLjEzMyAzNS4xMjEiPgogIDxnIGlkPSJFbGxpcHNlXzgiIGRhdGEtbmFtZT0iRWxsaXBzZSA4IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDAuNDE0KSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjM2Q1MTYxIiBzdHJva2Utd2lkdGg9IjIiPgogICAgPGVsbGlwc2UgY3g9IjE1LjUiIGN5PSIxNSIgcng9IjE1LjUiIHJ5PSIxNSIgc3Ryb2tlPSJub25lIi8+CiAgICA8ZWxsaXBzZSBjeD0iMTUuNSIgY3k9IjE1IiByeD0iMTQuNSIgcnk9IjE0IiBmaWxsPSJub25lIi8+CiAgPC9nPgogIDxsaW5lIGlkPSJMaW5lXzE2IiBkYXRhLW5hbWU9IkxpbmUgMTYiIHgyPSI2LjU2NyIgeTI9IjYuNTY3IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyNS4xNTIgMjcuMTQpIiBmaWxsPSJub25lIiBzdHJva2U9IiMzZDUxNjEiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIi8+Cjwvc3ZnPgo=" alt="submit"/>
			
				 
			 </div>
		  </div>
		 
	   </div>
	   
    </div>
</div>
</div>
</form>
<BR>

<?php if ((strpos($uri, "search") !== false)) { ?>

<h1><?php $title; ?></h1> 

<?php } else { 

if ($page_number == '') {$page_number = 1; }

?> 

<h1>Page <?php echo $page_number .' - ' . $title; ?></h1> 

<?php } ?>
	

	
	
	
 
		 
		 
	<!--<div class="row search_results_box_header"> 
	
		
			
			<div class="col-md-4">
				<h3 class="search_results_header">Initial misdiagnosis</h3>
			</div>
			<div class="col-md-2">
			<h3 class="search_results_header">>></h3>
			</div>
			<div class="col-md-6">
				<h3 class="search_results_header">Eventual diagnosis</h3>
			</div>
			
		</div> -->	
	
	   <?php foreach ($listings as $listing)  { ?>
		
		 <div class="row search_results_box"> 
			 
		   <div class="col-md-10">
								   
					   <h2><a href="record/<?= $listing['record_id'] ?>"><?= $listing['record_misdiagnosis'] ?></a></h2>
					   <p><?= $listing['record_correct_diagnosis'] ?> is sometimes misdiagnosed as <?= $listing['record_misdiagnosis'] ?></p>
					</div> 
			 
		   
		  
		  <div class="col-md-2">
			  
			
		    	<p>
				   
				    <div class="record_button"><a href="record/<?= $listing['record_id'] ?>">More...<img src="images/mymisdiagnosis-logo-symb-3-trans.png" width=50 height=50></a></div></p>
		  </div>
				
		
			  
	
		</div> <!-- end row mb2 -->		 
						  
		 
		
	
		<?php } ?>
	
   
 
 
    
    
 
  

  <div style='margin-top: 10px;'>
	 <?= $pager->links() ?>
  </div>
  
  
  <?php
	 if (empty($listings)) { ?>
	 
	 
	 There are no results that match your search.
	 
    <?php } 
	 
	 ?>
  
  
  
  
  
  






		  


		  

			
			
