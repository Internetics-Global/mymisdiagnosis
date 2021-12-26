<h1>Forgot your password?</h1>
<p>Please enter your registered email address and we will email you a link to reset your password.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/forgot_password');?>

      <p>
      	<label for="identity"><?php echo (($type === 'email') ? sprintf(lang('Auth.forgot_password_email_label'), $identity_label) : sprintf(lang('Auth.forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity);?>
      </p>

      <p><?php echo form_submit('submit', lang('Auth.forgot_password_submit_btn'));?></p>

<?php echo form_close();?>
