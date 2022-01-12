<h1>Signup</h1>
<p>Please enter your information below. For privacy we recommend you think of a nickname that is unrelated to your real name. Once set, it cannot be changed.</p>

<div id="infoMessage"><?php echo $message;?></div>



<form action="register_user" id="ajax_form" method="post" accept-charset="utf-8">

	 <p>
		<?php echo form_label(lang('Auth.create_user_fname_label'), 'first_name');?> <br />
		  <?php echo form_input($first_name);?>
	 </p>

	 <p>
		  <?php echo form_label(lang('Auth.create_user_lname_label'), 'last_name');?> <br />
		  <?php echo form_input($last_name);?>
	 </p>

	 <?php
	 if ($identity_column !== 'email') {
		echo '<p>';
		echo form_label(lang('Auth.create_user_identity_label'), 'identity');
		echo '<br />';
		echo \Config\Services::validation()->getError('identity');
		echo form_input($identity);
		echo '</p>';
	 }
	 ?>

	 <p>
		   <?php echo form_label(lang('Auth.create_user_company_label'), 'company');?> <br />
		   <?php echo form_input($company);?>
	  </p>

	 <p>
		  <?php echo form_label(lang('Auth.create_user_email_label'), 'email');?> <br />
		  <?php echo form_input($email);?>
	 </p>


	 <p>
		  <?php echo form_label(lang('Auth.create_user_password_label'), 'password');?> <br />
		  <?php echo form_input($password);?>
	 </p>

	 <p>
		  <?php echo form_label(lang('Auth.create_user_password_confirm_label'), 'password_confirm');?> <br />
		  <?php echo form_input($password_confirm);?>
	 </p>
	 
	 <div class="c_form">
		<div class="g-recaptcha" id="recaptcha" data-sitekey="6Lc5qcMdAAAAAGfF4AIF4_9KwXu1_fg9XRfM307q" data-callback="recaptchaCallback"></div>
		<div class="recaptcha-validation" id="recaptcha-validation"></div>
	   </div>

	 <p>

		 <input type="hidden" name="user_folder" value="<?php echo rand(); ?>" id="user_folder">
	 </p>

<!--<div class="c_form">
    <div class="g-recaptcha" id="recaptcha" data-sitekey="6Lc5qcMdAAAAAGfF4AIF4_9KwXu1_fg9XRfM307q" data-callback="recaptchaCallback"></div>
  </div>-->

	 <p><?php echo form_submit('submit', lang('Auth.create_user_submit_btn'));?></p>

<?php echo form_close();?>




<script>




if ($("#ajax_form").length > 0) {
  
  
  $("#ajax_form").validate({
    rules: {
	 identity: {
	   required: true,
	   maxlength: 50,
	   email: true,
	 },
	 first_name: {
	    required: true,
	  },
	 last_name: {
		required: true,
	   },
	 company: {
		required: true,
	   },
	 email: {
		required: true,
		maxlength: 50,
		email: true,
	   },
	 password: {
	   required: true,
	 },
	 password_confirm: {
	    required: true,
	  },
    },
    messages: {
	 identity: {
	   required: "Please enter valid email",
	   email: "Please enter valid email",
	   maxlength: "The email name should less than or equal to 50 characters",
	 },
	 first_name: {
		required: "Please enter your first name",
	   },
	 last_name: {
		 required: "Please enter your last name",
	    },	    
	 company: {
		 required: "Please enter your nickname",
	    },
	 email: {
		  required: "Your email name should less than or equal to 50 characters",
		},
	 password: {
	   required: "Please enter password",
	 },
	 password_confirm: {
	    required: "Please confirm the password above",
	  },
    },
    
    
  
 
    
  })
}


$('form').on('submit', function(e) {
  if(grecaptcha.getResponse() == "") {
    e.preventDefault();
    document.getElementById("recaptcha-validation").innerHTML = 
		"Please complete the Recaptcha field above";
    
    
  } else {
    document.getElementById("recaptcha-validation").innerHTML = 
    " ";
  }
});
   



</script>