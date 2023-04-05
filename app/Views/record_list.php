
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

<form method="get" action="<?= base_url()?>/search/">
<div class="search_box">
<div class="container">
    <div class="row">
	   
	   <div class="col-12" align="center">
		 
		  <div id="custom-search-input">
			 <div class="input-group d-flex justify-content-center">
				 
			
				 
			<input id="search" name="search" type="text" class="form-control" placeholder="<?php echo $placeholder; ?>" />
			<input type="image" class="autocomplete_search_button" src=" <?php site_url(); ?>/images/logo-tra.png" alt="submit"/>
			
				 
			 </div>
		  </div>
		 
	   </div>
	   
    </div>
</div>
</div>
</form>
<BR>

<?php if ((strpos($uri, "search") !== false)) { 



?>


	<!-- we will show cats, else we will show results -->

	<h1><?php $title; ?></h1> 

	<?php foreach ($listings as $listing)  { ?>
	
	
	<?php
						
	$urlsegment_misdiagnosis = preg_replace('/[\p{P}\p{Zs}]+/u', '-', strtolower($listing['record_misdiagnosis']));
	?>	
			
			 <div class="row search_results_box"> 
				 
			   <div class="col-md-10">
									   
						   <h2><a href="misdiagnosis/<?= $urlsegment_misdiagnosis ?>/<?= $listing['record_id'] ?>"><?= ucwords($listing['record_misdiagnosis']); ?></a></h2>
						   <p><?= ucwords($listing['record_correct_diagnosis']); ?> is sometimes misdiagnosed as <?= ucwords($listing['record_misdiagnosis']); ?></p>
						</div> 
				 
			   
			  
			  <div class="col-md-2">
				  
			
				    <p>
					   
					    <div class="record_button">
						    <a href="misdiagnosis/<?= $urlsegment_misdiagnosis ?>/<?= $listing['record_id'] ?>"><img src="images/mymisdiagnosis-logo-symb-3-trans.png" width=50 height=50></a></div></p>
			  </div>
				  
		
			</div> <!-- end row mb2 -->		 
							  
			
			
			
		
	<?php 



} ?>
	

	
<div style='margin-top: 10px;'>
	 <?= $pager->links() ?>
 </div>
 	

	
	
	
	

<?php } 




elseif (strpos($uri, "/diagnosis/") !== false)   { 



?>

<?php
						
	$url_adj_diagnosis = preg_replace('/_/', ' ', strtolower(basename($uri)));
	// echo $url_end_segment_diagnosis;

?>


	<!-- we will show cats, else we will show results -->


	<h1><?php echo ucwords(urldecode($url_adj_diagnosis)); ?></h1>
	<p>The following is a list of potential misdiagnoses for <?php echo ucwords(urldecode($url_adj_diagnosis)); ?>.
	</p>
	
	<BR>
		
		
	

	<?php foreach ($listings as $listing)  { ?>
	
	
	<?php					
	$urlsegment_misdiagnosis = preg_replace('/[\p{P}\p{Zs}]+/u', '-', strtolower($listing['record_misdiagnosis']));
	?>	
			
			 <div class="row search_results_box"> 
				 
			   <div class="col-md-10">
									   
						   <h2><a href="../misdiagnosis/<?= $urlsegment_misdiagnosis ?>/<?= $listing['record_id'] ?>"><?= ucwords($listing['record_misdiagnosis']); ?></a></h2>
						   <p><?= ucwords($listing['record_correct_diagnosis']); ?> is sometimes misdiagnosed as <?= ucwords($listing['record_misdiagnosis']); ?></p>
						</div> 
				 
			   
			  
			  <div class="col-md-2">
				  
			
				    <p>
					   
					    <div class="record_button">
						    <a href="../misdiagnosis/<?= $urlsegment_misdiagnosis ?>/<?= $listing['record_id'] ?>"><img src="../images/mymisdiagnosis-logo-symb-3-trans.png" width=50 height=50></a></div></p>
			  </div>
				  
		
			</div> <!-- end row mb2 -->		 
							  
			
			
		
		
	<?php 



} ?>
	

<BR>	
<div class="record_footer">
<p><center>Click <a href='<?php echo site_url();?>diagnosis'>here</a> to return to the <a href='<?php echo site_url();?>diagnosis'>A-Z list of diagnoses and misdiagnoses</a>.</center>
</p>	
</div>	 

	



<?php } 







else { 

	if ($page_number == '') {$page_number = 1; }

	?> 

	<!-- <h1>Page <?php echo $page_number .' - ' . $title; ?></h1>  -->
		
	<h1>A-Z Diagnosis Category List</h1>
	<p>You can look through this A-Z list of eventual diagnoses, to search for possible misdiagnoses. Or use the search box above to 
		filter through all the data of misdiagnoses, diagnoses and symptoms.
	</p>

	<div class="category_listing">
	
	<?php foreach ($listings as $listing)  { ?>
	
	<?php
							
		$url_end_segment_diagnosis = preg_replace('/ /', '_', strtolower(basename($listing['record_correct_diagnosis'])));
		// echo $url_end_segment_diagnosis;
	
	?>
	
	
				
				 <div class="row search_results_box"> 
					 
				   <div class="col-md-12">
										   
							   <p><a href="diagnosis/<?= strtolower($url_end_segment_diagnosis); ?>"><?= ucwords($listing['record_correct_diagnosis']); ?></a>
							  <!-- <p><?= ucwords($listing['record_correct_diagnosis']); ?> is sometimes misdiagnosed as <?= ucwords($listing['record_misdiagnosis']); ?></p>-->
								  
								  <a href="diagnosis/<?= strtolower($url_end_segment_diagnosis); ?>">
								  
								  <div class="record_button">
								  <img src="images/mymisdiagnosis-logo-symb-3-trans.png" width=50 height=50></a></p>
				   			    	  </div>
				   </div> 
					 
				   
				  
				  
						
				
					  
			
				</div> <!-- end row mb2 -->		 
								  
				
				
				
			
		<?php } ?>
		
	</div>
	
	
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
	
	  
	
   
 
 
    
    
 
  

 
  
  
  <?php
	 if (empty($listings)) { ?>
	 
	<div class="record_footer"> 
	 <h1>There are no results that match your search.</h1>
	<p>You can use the search bar to search for diagnoses, misdiagnoses or symptoms. As you type the system will make suggestions for you.</p>
	<p>You can also search the <a href='<?php echo site_url();?>diagnosis'>A-Z of diagnoses</a>, by clicking <a href='<?php echo site_url();?>diagnosis'>here</a>.</p>	
	</div> 
	 
    <?php } 
	 
	 ?>
  
  
  
  
  
  






		  


		  

			
			
