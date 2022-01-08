
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

<center><div class="final_footer"><a href="<?php echo site_url();?>pages/website-terms-and-conditions">Terms and Conditions<a/> | <a href="<?php echo site_url();?>pages/privacy-policy-for-mymisdiagnosis-com">Privacy Policy</a> | Copyright Internetics Pty Ltd / myMisdiagnosis.com 2021/2022. All rights reserved.</div></center>

</div> 

<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
         
         
         
    $( "#search" ).autocomplete({
            
            
            
            
 
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
                                 url: BASE_URL +'/record/'+item.record_id,
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


    
 