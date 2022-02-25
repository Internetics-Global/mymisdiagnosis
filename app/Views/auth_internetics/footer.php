
			</div>
			
		</div>
		
	</main>
</div>



        <script src="/mymisdiagnosis/public/assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
        
<script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/build/js/global-libs.min.js"></script>
<script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/bootstrap.min.js"></script>
<script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/bootbox.min.js"></script>
<script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/bootbox.locales.min.js"></script>
        
        
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/jquery-plugins/jquery.form.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/common/cache-library.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/common/common.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/jquery-plugins/gc-dropdown.min.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/jquery-plugins/gc-modal.min.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/jquery-plugins/bootstrap-growl.min.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/jquery-plugins/jquery.print-this.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/datagrid/gcrud.datagrid.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/datagrid/list.js"></script>
        <script src="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/js/lightbox.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

        
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>     




</div>


  
  <div class="please_note">
  <p>Important: Patients should not use information on this website for self-diagnosis. Always consult your doctor or specialist. Medical professionals have not checked data.</p>
    
  <p>Disclaimer: The information about health provided by this website is not intended to diagnose, treat, cure or prevent disease. Products, services, information and other content provided by this website, including information linking to third-party websites are provided for informational purposes only.</p>
  
  <p>Information offered by this website is not comprehensive and does not cover all diseases, ailments, physical conditions or their treatment.</p>
  
  <p><a href="<?php echo site_url();?>pages/disclaimer">Please read our full Disclaimer notice here</a>.</p>  
    
    
  </div>
  
  <center>
  
  <div class="final_footer">
  
 <a href="<?php echo site_url();?>pages/disclaimer">Disclaimer</a> | <a href="<?php echo site_url();?>pages/website-terms-and-conditions">Terms and Conditions<a/> | <a href="<?php echo site_url();?>pages/privacy-policy-for-mymisdiagnosis-com">Privacy Policy</a> | Copyright Internetics Pty Ltd / myMisdiagnosis.com 2022. All rights reserved.</div></center>

</div>



<script>

$('.autocomplete_search_button').click(function()
{
    if( !$('#search').val() ) {
      
       return false;
    }
});

</script>

 

<script>
  var BASE_URL = "<?php echo base_url(); ?>";
  

 
<?php 

$uri = current_url(true);

if ((strpos($uri, "records") !== false) || (strpos($uri, "/diagnosis") !== false) ||($type_of_page == 'home') ){ 
  ?>  




$( function() {
  

  $( "#search" ).autocomplete({
    minLength: 1,
    source: function(request, response) {
         $.ajax({
         url: BASE_URL + "/home/getTerm",
         data: {
              term : request.term
          },
         dataType: "json",
         success: function(data){
            response( $.map( data, function( item ) {
              return {
               url: BASE_URL +'/misdiagnosis/'+item.record_misdiagnosis.replace(/[^a-zA-Z0-9-_]/g, '-').toLowerCase()+'/'+item.record_id,
               value: item.record_misdiagnosis.charAt(0).toUpperCase()+item.record_misdiagnosis.slice(1),
               desc: item.record_correct_diagnosis,
               
              }
               
            
               

               
           }));
         },
         
     });
    },
    focus: function( event, ui ) {
   $( "#search" ).val( ui.item.label );
   return false;
    },
    select: function( event, ui ) {
   $( "#search" ).val( ui.item.label );
   window.location.href = ui.item.url;

   return false;
    }
  })
  .autocomplete( "instance" )._renderItem = function( ul, item ) {
    return $( "<li>" )
   .append( "<div class='autocomp-layout1'><i class='bi bi-exclamation-circle'></i> " + item.label + "</div><div class='autocomp-layout2'><i class='bi bi-check2-circle'> <i>" + item.desc + "</i></div>" )
   .appendTo( ul );
  };
} );



<?php } ?>

</script>

<!-- Default Statcounter code for myMisdiagnosis
https://www.mymisdiagnosis.com -->
<script type="text/javascript">
var sc_project=12695048; 
var sc_invisible=1; 
var sc_security="60cd7286"; 
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js"
async></script>
<noscript><div class="statcounter"><a title="Web Analytics"
href="https://statcounter.com/" target="_blank"><img
class="statcounter"
src="https://c.statcounter.com/12695048/0/60cd7286/1/"
alt="Web Analytics"
referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
<!-- End of Statcounter Code -->      
        
</body>
</html>


    
 