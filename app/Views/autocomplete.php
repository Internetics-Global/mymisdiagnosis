<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>jQuery UI Autocomplete  Search in Codeigniter 4 with Database - LaraTutorials.com</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <style>
    .container{
    padding: 10%;
    text-align: center;
   } 
 </style>
</head>
<body>
 
<div class="search_box">
<div class="container">
    <div class="row">
	   
	   <div class="col-12" align="center">
		 
		  <div id="custom-search-input">
			 <div class="input-group d-flex justify-content-center">
				 
			<form method="get" action="<?= base_url()?>/diagnosis/">
				 
			<input id="search" name="search" type="text" class="form-control" placeholder="Search" />
			<input type="image" class="autocomplete_search_button" src="data:image/svg+xml;base64,PHN2ZyBpZD0iaWNuX3NlYXJjaF9saWdodCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzMuMTMzIiBoZWlnaHQ9IjM1LjEyMSIgdmlld0JveD0iMCAwIDMzLjEzMyAzNS4xMjEiPgogIDxnIGlkPSJFbGxpcHNlXzgiIGRhdGEtbmFtZT0iRWxsaXBzZSA4IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDAuNDE0KSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjM2Q1MTYxIiBzdHJva2Utd2lkdGg9IjIiPgogICAgPGVsbGlwc2UgY3g9IjE1LjUiIGN5PSIxNSIgcng9IjE1LjUiIHJ5PSIxNSIgc3Ryb2tlPSJub25lIi8+CiAgICA8ZWxsaXBzZSBjeD0iMTUuNSIgY3k9IjE1IiByeD0iMTQuNSIgcnk9IjE0IiBmaWxsPSJub25lIi8+CiAgPC9nPgogIDxsaW5lIGlkPSJMaW5lXzE2IiBkYXRhLW5hbWU9IkxpbmUgMTYiIHgyPSI2LjU2NyIgeTI9IjYuNTY3IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyNS4xNTIgMjcuMTQpIiBmaWxsPSJub25lIiBzdHJva2U9IiMzZDUxNjEiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLXdpZHRoPSIyIi8+Cjwvc3ZnPgo=" alt="submit"/>
			</form>
				 
			 </div>
		  </div>
		 
	   </div>
    </div>
</div>
</div>
<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
	 
	 
	 
    $( "#search" ).autocomplete({
	    
	    
	    
	    
 
	   source: function(request, response) {
		  $.ajax({
		  url: BASE_URL + "/AutocompleteSearch/getTerm",
		  data: {
				term : request.term
		   },
		  dataType: "json",
		  success: function(data){
			response( $.map( data, function( item ) {
				return {
				 url: 'record/'+item.record_id,
				 value: item.record_misdiagnosis
				   }
				 
			
				    
				    
				    
			  }));
		  },
		  
	   });
    },
    select: function( event, ui ) {
		window.location.href = ui.item.url;
	   },
    minLength: 1
 
 
   });
 
 
 
 
}); //ends document ready
 
</script>   
</body>
</html>