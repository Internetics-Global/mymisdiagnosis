

<h1>Get on the beta list!</h1>
<p>We are in beta, and opening up the site to users gradually. Enter your email address below and join the list for beta access as it becomes available. Thank you.</p>


	<?= \Config\Services::validation()->listErrors(); ?>
	<span class="alert alert-success mb-3" id="res_message">Early beta access registration form</span>
	<div class="row">
		<div class="col-md-12">
			<form action="javascript:void(0)" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8">
				
				<div class="c_form">
					<label for="email">Your email address:</label>
					<input type="text" name="email" class="form-control" id="email" placeholder="Please enter your email address.">
				</div>
				
				<div class="c_form">
					<div class="g-recaptcha" id="recaptcha" data-sitekey="6Lc5qcMdAAAAAGfF4AIF4_9KwXu1_fg9XRfM307q" data-callback="recaptchaCallback"></div>
				</div>	
					
								
				
				<div class="c_form">
					<button type="submit" id="send_form"class="btn btn-success">Submit</button>
					<input type="reset" value="Reset" onClick="window.location.reload()" class="btn">
				</div>
			</form>
		</div>
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

	   
	   









<script>




if ($("#ajax_form").length > 0) {
	$("#ajax_form").validate({
		rules: {
			email: {
				required: true,
				maxlength: 50,
				email: true,
			},
		},
		messages: {
			email: {
				required: "Please enter valid email",
				email: "Please enter valid email",
				maxlength: "The email name should less than or equal to 50 characters",
			},
		},
		submitHandler: function(form) {
			
			
		
			$('#res_message').html('Processing the form, please wait...');
			$('#res_message').show();
			$('#send_form').html('Sending..');
			$('#res_message').removeClass('alert-success');
		
			
			$("html, body").animate({ scrollTop: 0 }, "slow");
			console.log('validation completed.');
			
			
			$.ajax({
				url: "<?php echo base_url('emaillist/create') ?>",
				type: "POST",
				data: $('#ajax_form').serialize(),
				dataType: "json",
				success: function(response) {
					console.log(response);
					console.log(response.success);
					$('#send_form').html('Submit');
					$('#res_message').html(response.msg);
					$('#res_message').show();
					$('#res_message').removeClass('d-none');
					$('#res_message').removeClass('alert-success');


					
					if (response.success == true) {
						
						form.send_form.disabled = true

						$('#res_message').addClass('alert-success');
						
					}
					

					if (response.success == false) {
						
					
				
					setTimeout(function() {
						$('#res_message').hide();
						$('#res_message').html('');
						
						
					}, 100000);
				
				}
				
				}
			});



		}
		
		
		
		
		
		
		
		
	})
}
</script>


