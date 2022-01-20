<html>

<body style = "background:#e3edf3;padding:20px;font-family: Helvetica, Arial, sans-serif;font-size:15px;color:#3D5161; ">


	<h1 style = "font-size: 15px;">myMisdiagnosis</h1>
	<p>
	The global medical misdiagnosis database
	</p>
	<p>

	<?=sprintf(lang('IonAuth.emailForgotPassword_heading'), $identity)?>
	</p>
	<p>
		<?=sprintf(lang('IonAuth.emailForgotPassword_subheading'), anchor('auth/reset_password/' . $forgottenPasswordCode, lang('IonAuth.emailForgotPassword_link')))?>
	</p>
	<p></p>
	This is an email from myMisdiagnosis.com
</body>
</html>
