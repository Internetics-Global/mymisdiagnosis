<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; 
	
	$totalpanes = 2;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">



</head>
<body>
	
	
 <nav class="navbar navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand mx-auto" href="#">Mobility Screening</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add">Add screening form</a>
      </li>
    </ul>

  </div>
</nav>
  
<div id="print_from_here">

    <div style="padding: 0px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    
    
    

</div>




    <script type="text/javascript">


			
function print_me() {	 
	
	
	printJS({
		
			printable: 'print_from_here',
            targetStyles: '*',
            css: ['/screening/public/assets/grocery_crud/themes/internetics/css/bootstrap/bootstrap.min.css', '/screening/public/assets/grocery_crud/themes/internetics/css/common.css', '/screening/public/assets/grocery_crud/themes/internetics/css/general.css', '/screening/public/assets/grocery_crud/themes/internetics/css/add-edit-form.css', '/screening/public/assets/grocery_crud/themes/internetics/css/main.css','/screening/public/assets/grocery_crud/themes/internetics/css/internetics.css', '/screening/public/assets/grocery_crud/themes/internetics/css/print22.css'],
            style: '.gcrud-form-group { display: none; }',
            header: 'Screening Form',
            headerStyle: 'font-weight: 600;',
            scanStyles: false,
            type: 'html'
            

						
		})
		
	
	
	}   

    


    $(document).ready(function() {
        $('#prev_question_btn').css('display', 'none');
        $('#print_pdf_button').css('display', 'none');
        $('#q0').css('display', 'none');
        $('#q1').css('display', 'block');
        $('#summary_view').css('display', 'none');
		$('#display_mobility_level').css('display', 'none');
				
	
   
/**    $("#questions").fadeIn();  **/
    $("body").fadeIn(1500);
    
    });
    






     
    
    
function remove_brackets() {

    
	
	   $("#questions>div").children().each(function() {
	
	
	        $(this).html($(this).html().replace('[]',''));


	        
	      
	      
	    });
	

}




    function next_question() {

 

        var questionElements = document.querySelectorAll('#questions>div');
        
        var mobility_levels = document.getElementById("display_mobility_level"); 
        
        
        
        
        

        /* Get the Mobility Level and placeit in the final pane, both invisible as form field (see controller callbacK) and visible*/
        
		var x = document.getElementById("display_mobility_level");

		document.getElementById("mobility_result").value= x.innerHTML;
		
		var mobility_level2cal = document.getElementById("mobility_message2");
        
        mobility_level2cal.innerHTML = x.innerHTML;
		

        
        
        

        for (var i = 0; i < questionElements.length; i++) {
        

        

        /* bootbox.alert ('Mobility levels message: ' + mobility_levels.innerHTML); */
        

   

            /* start the whole if statement - if the block IS visible.... */
            if (questionElements[i].style.display != 'none') {
                /* ... then make the current i block invisible */
                
                

                /* ... work out how many windows to skip depending on mobility level and default it to 4 */
                if ($('#q0').css('display') == 'block') {
                    var jump = 1; mobility_levels.innerHTML = 'Level 4';

                    
                }
                
  
                
                else if ($('#q2').css('display') == 'block' && (mobility_levels.innerHTML == 'Level 1'  )) {
                    jump = 1; 
                     bootbox.alert ('Your client\'s mobility level is determined to be Level 1 at this stage. Please continue with the screening.');
                } 
                
                else if ($('#q2').css('display') == 'block' && (mobility_levels.innerHTML == 'Level 2' ))   {
                    jump = 2;
                    bootbox.alert ('Your client\'s mobility level is determined to be Level 2 at this stage. Please continue with the screening.');
                } 
                
                else if ($('#q2').css('display') == 'block' && (mobility_levels.innerHTML == 'Level 3' ))   {
                    jump = 3;
                    bootbox.alert ('Your client\'s mobility level is determined to be Level 3 at this stage. Please continue with the screening.');
                } 
                
                else if ($('#q2').css('display') == 'block' && (mobility_levels.innerHTML == 'Level 4' ))   {
                    jump = 4;
                    bootbox.alert ('Your client\'s mobility level is determined to be Level 4 at this stage. Please continue with the screening.');
                } 
                
                else if ($('#q2').css('display') == 'block' && (mobility_levels.innerHTML == 'Level X' ))   {
						
					jump = 11;
					mobility_levels.innerHTML = 'Remain in Bed'; 
					bootbox.alert ('You have not ticked any boxes, your client should remain in bed.');

					questionElements[12].style.display = 'block';
					
				}
					
            

                
                else if ((  ($('#q3').css('display') == 'block') && (mobility_levels.innerHTML == 'Level 1 Equipment Success') )) {
                    jump = 4; 
                }
                else if ((  ($('#q4').css('display') == 'block') && (mobility_levels.innerHTML == 'Level 2 Equipment Success') )) {
                    jump = 4; 
                                          
                }
                else if ((  ($('#q5').css('display') == 'block') && (mobility_levels.innerHTML == 'Level 3 Equipment Success') )) {
                    jump = 4;
                                        
                }
                else if ((  ($('#q6').css('display') == 'block') && (mobility_levels.innerHTML == 'Level 4 Equipment Success') )) {
                    jump = 4;
                }
                
                else if ($('#q6').css('display') == 'block' && (mobility_levels.innerHTML == 'Need all Level 4 Equipment' ))   {
						
					jump = 4;
					mobility_levels.innerHTML = 'No equipment - remain in bed'; 
					bootbox.alert ('You have not ticked any equipment boxes, your client should remain in bed.');
					questionElements[12].style.display = 'block';
					
				}	
                


                else if (( ($('#q7').css('display') == 'block' ) && (mobility_levels.innerHTML == 'Level 1 Equipment Success') )) {
                    jump = 4;
                    mobility_levels.innerHTML = 'You are at Level 1';
                }
                
                else if (( ($('#q8').css('display') == 'block' ) && (mobility_levels.innerHTML == 'Level 2 Equipment Success') )) {
                    jump = 3;
                    mobility_levels.innerHTML = 'You are at Level 2';
                }
                
                else if (( ($('#q9').css('display') == 'block' ) && (mobility_levels.innerHTML == 'Level 3 Equipment Success') )) {
                    jump = 2;
                    mobility_levels.innerHTML = 'You are at Level 3';
                }
                
                else if (( ($('#q10').css('display') == 'block' ) && (mobility_levels.innerHTML == 'Level 4 Equipment Success') )) {
                    jump = 1;
                    mobility_levels.innerHTML = 'You are at Level 4';
                                        
                }
                
                else if (( ($('#q11').css('display') == 'block' ) && (mobility_levels.innerHTML == 'You are at Level 1' || mobility_levels.innerHTML == 'You are at Level 2' || mobility_levels.innerHTML == 'You are at Level 3' || mobility_levels.innerHTML == 'You are at Level 4'  )  )) {
                    jump = 1;
                    
                }
                
                else if (( ($('#q12').css('display') == 'block' ) && (mobility_levels.innerHTML == 'You are at Level 1' || mobility_levels.innerHTML == 'You are at Level 2' || mobility_levels.innerHTML == 'You are at Level 3' || mobility_levels.innerHTML == 'You are at Level 4'  )  )) {
                    jump = 1;
                    
                }
                
                else if (( ($('#q13').css('display') == 'block' ) && (mobility_levels.innerHTML == 'You are at Level 1' || mobility_levels.innerHTML == 'You are at Level 2' || mobility_levels.innerHTML == 'You are at Level 3' || mobility_levels.innerHTML == 'You are at Level 4'  )  )) {
                    jump = 1;
                    
                }

				else {
 
                    jump = 1;

                
                }
                
                
                
                
                if ((  ($('#q3').css('display') == 'block') && (mobility_levels.innerHTML != 'Level 1 Equipment Success') )) { bootbox.alert('Due to lack of suitable equipment your client\'s mobility level has been revised to Level 2'); }
               
                if ((  ($('#q4').css('display') == 'block') && (mobility_levels.innerHTML != 'Level 2 Equipment Success') )) { bootbox.alert('Due to lack of suitable equipment your client\'s mobility level has been revised to Level 3'); }
                
                if ((  ($('#q5').css('display') == 'block') && (mobility_levels.innerHTML != 'Level 3 Equipment Success') )) { bootbox.alert('Due to lack of suitable equipment your client\'s mobility level has been revised to Level 4'); }
               
                
                
                
                
				if ( $('#q12').css('display') == 'block' )  {
					

                    
                    
                    
                    
                    
                    questionElements[0].style.display = 'none';
                    
                    questionElements[1].style.display = 'block';
                    questionElements[2].style.display = 'block';                 
                    questionElements[11].style.display = 'block';
                    questionElements[12].style.display = 'block';
                    questionElements[13].style.display = 'block';
                    
                    if ((  (mobility_levels.innerHTML == 'You are at Level 1') )) {
                    questionElements[3].style.display = 'block';
                    questionElements[7].style.display = 'block';
                	}
                	
                	if ((  (mobility_levels.innerHTML == 'You are at Level 2') )) {
                    questionElements[4].style.display = 'block';
                    questionElements[8].style.display = 'block';
                	}                   
                    
                    if ((  (mobility_levels.innerHTML == 'You are at Level 3') )) {
                    questionElements[5].style.display = 'block';
                    questionElements[9].style.display = 'block';
                	}
                    
                    if ((  (mobility_levels.innerHTML == 'You are at Level 4') )) {
                    questionElements[6].style.display = 'block';
                    questionElements[10].style.display = 'block';
                	}
                    
                    if ((  (mobility_levels.innerHTML == 'Remain in Bed') )) {
	                    
	                questionElements[10].style.display = 'none';
	                questionElements[11].style.display = 'none';
                    questionElements[12].style.display = 'none';

                    $('#summary_view').css('display', 'block');
                    $('#print_pdf_button').css('display', 'inline-block');
	                    
	                    }                   
                   
                   if ((  (mobility_levels.innerHTML == 'No equipment - remain in bed') )) {
	                

	                questionElements[10].style.display = 'none';
	                questionElements[11].style.display = 'none';
                    questionElements[12].style.display = 'none';


                    $('#summary_view').css('display', 'block');
                    $('#print_pdf_button').css('display', 'inline-block');
	                    
	                    } 
                   
                   
                                   
                    
                    			
                  checkboxes = document.querySelectorAll('#questions input[type="checkbox"]'); //select all checkboxes
		
					for (c = 0; c < checkboxes.length; c++) {
					 
					  checkboxes[c].readOnly = true;
	//				  checkboxes[c].disabled = true;
					  
				 $('input[type="checkbox"][readonly]').on("click.readonly", function(event){event.preventDefault();}).css("opacity", "0.5");
					  
					 }
				
					  
					textboxes = document.querySelectorAll('#questions input[type="text"]'); //select all textboxes
					textboxes = document.querySelectorAll('#questions textarea'); //select all textareas
		
					for (d = 0; d < textboxes.length; d++) {
					 
					  if (d == 6) {} else {
					  
					  textboxes[d].readOnly = true;
					 
					  
					  }
					  
					 }
				   
					  
					  
					 
					  
					  
					  
					  
					  
					  
					}
                    

                
                  
               
               
                if  (mobility_levels.innerHTML == 'Remain in Bed'  )  	  { final_mobility_level.innerHTML = 'X'; conclusion_mobility_level.innerHTML = 'Remain in Bed'; $('#summary_view').css('display', 'block');}
                if  (mobility_levels.innerHTML == 'No equipment - remain in bed'  ) 	  { final_mobility_level.innerHTML = 'X'; conclusion_mobility_level.innerHTML = 'No equipment - remain in bed'; $('#summary_view').css('display', 'block');}
 





                /* alert (mobility_level); */

                questionElements[i].style.display = 'none';

                /* now work out which block to make visible*/
                if (i == questionElements.length - 1) {
                    questionElements[0].style.display = 'block';
                } else {
	                
	              if ((  (mobility_levels.innerHTML == 'No equipment - remain in bed') || (mobility_levels.innerHTML == 'Remain in Bed') )) {} else {  
 
                    questionElements[i + jump].style.display = 'block'; }
                    
                    
                }

                /* var x = '2'; */
                /* bootbox.alert(" var mob level: " + mob_level + "\r var i (counter): " + i + "\r [i+1]: " + [i+1] + "\r questionElements.length (num of records): " + questionElements.length   );
                						*/

                /* button logic */
                
                
                
				if ((  (mobility_levels.innerHTML == 'No equipment - remain in bed') || (mobility_levels.innerHTML == 'Remain in Bed') )) {
					
					$('#next_question_btn').css('display', 'none');
                    $('#print_pdf_button').css('display', 'inline-block');
					
				}

                /* remove NEXT button at last record */
                if (i == questionElements.length - 2) {
                    
                    $('#next_question_btn').css('display', 'none');
                    $('#print_pdf_button').css('display', 'inline-block');
                    
                    /* we are at the report, so switch the last block back on */
                    
                    questionElements[12].style.display = 'block';
                    
                    
                    
                    
        /*            $('#final_mobility_level').css('display', 'block');    */
                    
                    
              
                    
                    if (( ($('#q13').css('display') == 'block' ) && (mobility_levels.innerHTML == 'You are at Level 1'  )  )) {  final_mobility_level.innerHTML = '1'; conclusion_mobility_level.innerHTML = 'Low Assist'; $('#summary_view').css('display', 'block');}
                    if (( ($('#q13').css('display') == 'block' ) && (mobility_levels.innerHTML == 'You are at Level 2'  )  )) {  final_mobility_level.innerHTML = '2'; conclusion_mobility_level.innerHTML = 'Medium Assist'; $('#summary_view').css('display', 'block');}
                    if (( ($('#q13').css('display') == 'block' ) && (mobility_levels.innerHTML == 'You are at Level 3'  )  )) {  final_mobility_level.innerHTML = '3'; conclusion_mobility_level.innerHTML = 'High Assist'; $('#summary_view').css('display', 'block');}
                    if (( ($('#q13').css('display') == 'block' ) && (mobility_levels.innerHTML == 'You are at Level 4'  )  )) {  final_mobility_level.innerHTML = '4'; conclusion_mobility_level.innerHTML = 'Max Assist'; $('#summary_view').css('display', 'block');}
                    
                   
                    
                
                    
                    
                    
                }

                /* add PREV button after first record */
                if (i >= 0) {
                    
                  // $('#prev_question_btn').css('display', 'inline-block');
                }

                /* remove PREV button at first record */
                if (i == questionElements.length - 2) {
                    
                    //$('#prev_question_btn').css('display', 'inline-block');
                }

                break; /* end the current, and switch back to the for loop*/

            } /* ends section if the block IS visible*/



        } /* ends the for*/


    } /* end of next_question function */


    
    </script>
    
    
    
    
    
    
    
    
    
    
    <script>
    
    function prev_question() {

        var mobility_levels = document.getElementById("display_mobility_level");

        
            var jump_back = 1;
        

        var questionElements = document.querySelectorAll('#questions>div');
        for (var i = questionElements.length - 1; i > 0; i--) {


            if (questionElements[i].style.display != 'none') {
                if ($('#q1').css('display') == 'block') {
                    var jump = jump_back;
                } else {
                    var jump = 1;
                }
                questionElements[i].style.display = 'none';
                if (i == questionElements.length) {
                    questionElements[0].style.display = 'block'

                } else {
                    questionElements[i - jump].style.display = 'block';
                }

                /* button logic */

                /*            bootbox.alert('The i variable is at: ' + i);    */

                if (i >= 0) {
                    
                    $('#next_question_btn').css('display', 'inline-block');
                }

                if ((i - 1) < 1) {
                    
                    $('#prev_question_btn').css('display', 'none');
                    $('#print_pdf_button').css('display', 'none');
                    
                }

                /*            if (i == questionElements.length - 2) { prev_question_btn.style.visibility = 'visible'; } */

                break;
            }
        }

    }
    </script>
    
    
    
    
    
    
 

    <script>
    
    /* When a checkbox is clicked this routine is called to see if we need to change the Level messages  */
    
    function displayMobilityLevel() {
       
		var questionElements = document.querySelectorAll('#questions>div');

		var mobility_level_calc = document.getElementById("display_mobility_level");
		
		
		/* the following routine checks q2 and works out what level we need to set */
		

		
		if (($('#q2').css('display') == 'block')  && ($('#summary_view').css('display') == 'none') ) {  
			
		/* 	bootbox.alert('we are at the spot again');   */

			var checkbox = 0; var checkbox_array = []; var cbTotal = document.querySelectorAll('#q2 input[type=checkbox]'); 

				for (var i = 0; i < cbTotal.length; i++) {

					var question = i; checkbox = cbTotal[i].checked; checkbox_array.push(checkbox); /* alert(checkbox_array[i]); */					
					
						if (checkbox_array[0] == true && checkbox_array[1] == true && checkbox_array[2] == true && checkbox_array[3] == true && checkbox_array[4] == true && checkbox_array[5] == true && checkbox_array[6] == true) 
						{ display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level 1'; }
						
						else if (checkbox_array[0] == true && checkbox_array[1] == true && checkbox_array[2] == true && checkbox_array[3] == true && checkbox_array[4] == true && checkbox_array[5] == true ) 
						{ display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level 2'; }
						
						else if (checkbox_array[0] == true && checkbox_array[1] == true && checkbox_array[2] == true ) 
						{ display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level 3'; }
						
						else if (checkbox_array[0] == true) 
						{ display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level 4'; }
						
						else 
						{ display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level X'; }		

				}
		    
		}
       		        		 
/* The following routines determine whether the available equipment checkboxes have all been clicked  at questions 2, 3, 4 and 5 */    

		/* Limit logic to this block only */ 		
		if (($('#q3').css('display') == 'block') && ($('#q13').css('display') == 'none')) {

			var checkbox = 0; var checkbox_array = []; var cbTotal = document.querySelectorAll('#q3 input[type=checkbox]'); 
		    var all_checkboxes = true;
				for (var i = 0; i < cbTotal.length; i++) {

					var question = i;checkbox = cbTotal[i].checked; checkbox_array.push(checkbox);   /* alert(checkbox_array[i]); */
			
						if (mobility_level_calc.innerHTML == 'Level 1' || mobility_level_calc.innerHTML == 'Level 1 Equipment Success' || mobility_level_calc.innerHTML == 'Need all Level 1 Equipment') {            	

						if (cbTotal[i].checked == false){ all_checkboxes = false; }	
				
							if(!all_checkboxes) { display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Need all Level 1 Equipment'; }	
							else { display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level 1 Equipment Success'; }
							
						/*	alert (isValid); */
						
				
						}
																
				} 
				

       	 	
       	}
       	
       	 /* Limit logic to this block only */ 
       	 if (($('#q4').css('display') == 'block') && ($('#q13').css('display') == 'none')){
       	 
       	 if (mobility_level_calc.innerHTML == 'Need all Level 1 Equipment') {mobility_level_calc.innerHTML = 'Level 2';} 
       	
			 var checkbox = 0; var checkbox_array = []; var cbTotal = document.querySelectorAll('#q4 input[type=checkbox]');
			 var all_checkboxes = true; 
		
				for (var i = 0; i < cbTotal.length; i++) {

					var question = i;checkbox = cbTotal[i].checked; checkbox_array.push(checkbox);  /* alert(checkbox_array[i]); */
			
						if (mobility_level_calc.innerHTML == 'Level 1' || mobility_level_calc.innerHTML == 'Level 2' || mobility_level_calc.innerHTML == 'Level 2 Equipment Success' || mobility_level_calc.innerHTML == 'Need all Level 2 Equipment') {            	

						if (cbTotal[i].checked == false){ all_checkboxes = false; }	
							
							if (!all_checkboxes) { display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Need all Level 2 Equipment'; }	
							else { display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level 2 Equipment Success'; }
				
						}
										
				}
       	 	
       	} 	
       	
       	/* Limit logic to this block only */ 
       	if (($('#q5').css('display') == 'block') && ($('#q13').css('display') == 'none')) {
       	
       	if (mobility_level_calc.innerHTML == 'Need all Level 1 Equipment' || mobility_level_calc.innerHTML == 'Need all Level 2 Equipment' ) {mobility_level_calc.innerHTML = 'Level 3';} 
       	
       	 	var checkbox = 0; var checkbox_array = []; var cbTotal = document.querySelectorAll('#q5 input[type=checkbox]');
       	 	var all_checkboxes = true; 			 
		
				for (var i = 0; i < cbTotal.length; i++) {

					var question = i;checkbox = cbTotal[i].checked; checkbox_array.push(checkbox);  /* alert(checkbox_array[i]); */
													
						if (mobility_level_calc.innerHTML == 'Level 1' ||mobility_level_calc.innerHTML == 'Level 2' || mobility_level_calc.innerHTML == 'Level 3' || mobility_level_calc.innerHTML == 'Level 3 Equipment Success' || mobility_level_calc.innerHTML == 'Need all Level 3 Equipment') {            	

						if (cbTotal[i].checked == false){ all_checkboxes = false; }	

							if (!all_checkboxes) { display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Need all Level 3 Equipment'; }	
							else { display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level 3 Equipment Success'; }
				
						}
						
				}
       	 	
       	} 	
       	
       	/* Limit logic to this block only */ 
       	if (($('#q6').css('display') == 'block') && ($('#q13').css('display') == 'none')) {
       	
       	if (mobility_level_calc.innerHTML == 'Need all Level 1 Equipment' || mobility_level_calc.innerHTML == 'Need all Level 2 Equipment' || mobility_level_calc.innerHTML == 'Need all Level 3 Equipment') {mobility_level_calc.innerHTML = 'Level 4';}
       	
			 var checkbox = 0; var checkbox_array = []; var cbTotal = document.querySelectorAll('#q6 input[type=checkbox]');
			 var all_checkboxes = true;
		
				for (var i = 0; i < cbTotal.length; i++) {

					var question = i;checkbox = cbTotal[i].checked; checkbox_array.push(checkbox);  /* alert(checkbox_array[i]); */
								
						if (mobility_level_calc.innerHTML == 'Level 1' ||mobility_level_calc.innerHTML == 'Level 2' ||mobility_level_calc.innerHTML == 'Level 3' || mobility_level_calc.innerHTML == 'Level 4' || mobility_level_calc.innerHTML == 'Level 4 Equipment Success' || mobility_level_calc.innerHTML == 'Need all Level 4 Equipment') {            	

						if (cbTotal[i].checked == false){ all_checkboxes = false; }	

							if (!all_checkboxes) { display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Need all Level 4 Equipment'; /** $('#next_question_btn').css('display', 'none'); **/ }	
							else { display_mobility_level.style.display = "none"; mobility_level_calc.innerHTML = 'Level 4 Equipment Success'; }
				
						}	
					  				
			 }
			 
		
			 
		}
		
								
		
		
		
    }
    
    
  
    </script>
    

</div>


</body>
</html>