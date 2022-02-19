<!DOCTYPE html>

<h1>Contact us</h1>
<p>Please complete the form below and we will endeavour to get back to you as quickly as we can..</p>


	<?= \Config\Services::validation()->listErrors(); ?>
	<span class="alert alert-success mb-3" id="res_message">Please complete all the fields below.</span>
	<div class="row">
		<div class="col-md-12">
			<form action="javascript:void(0)" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8">
				
				<div class="c_form">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" id="name" placeholder="Please enter your name.">
				</div>
				<div class="c_form">
					<label for="email">Email address</label>
					<input type="text" name="email" class="form-control" id="email" placeholder="Please enter your email address.">
				</div>
				<div class="c_form">
					<label for="message">Message</label>
					<textarea name="message" class="form-control" placeholder="Please type your message into this box."></textarea>
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



<script>




if ($("#ajax_form").length > 0) {
	$("#ajax_form").validate({
		rules: {
			name: {
				required: true,
			},
			email: {
				required: true,
				maxlength: 50,
				email: true,
			},
			message: {
				required: true,
			},
		},
		messages: {
			name: {
				required: "Please enter name",
			},
			email: {
				required: "Please enter valid email",
				email: "Please enter valid email",
				maxlength: "The email name should less than or equal to 50 characters",
			},
			message: {
				required: "Please enter message",
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
				url: "<?php echo base_url('contact/create') ?>",
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


