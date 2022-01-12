<h1>Login</h1>
<p>Please login with your email and password below. Need to register? You can do so by clicking <a href="register_user">here</a>. </p>

<div id="infoMessage"><?php echo $message;?></div>

<form action="login" id="ajax_form" method="post" accept-charset="utf-8">

  <p>
    <?php echo form_label(lang('Auth.login_identity_label'), 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo form_label(lang('Auth.login_password_label'), 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo form_label(lang('Auth.login_remember_label'), 'remember');?>
    <?php echo form_checkbox('remember', '1', false, 'id="remember"');?>
  </p>
  
  <div class="c_form">
    <div class="g-recaptcha" id="recaptcha" data-sitekey="6Lc5qcMdAAAAAGfF4AIF4_9KwXu1_fg9XRfM307q" data-callback="recaptchaCallback"></div>
    <div class="recaptcha-validation" id="recaptcha-validation"></div>
  </div>


  <p><?php echo form_submit('submit', lang('Auth.login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('Auth.login_forgot_password');?></a></p>





<script>




if ($("#ajax_form").length > 0) {
  
  
  $("#ajax_form").validate({
    rules: {
      identity: {
        required: true,
        maxlength: 50,
        email: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      identity: {
        required: "Please enter valid email",
        email: "Please enter valid email",
        maxlength: "The email name should less than or equal to 50 characters",
      },
      password: {
        required: "Please enter password",
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







  