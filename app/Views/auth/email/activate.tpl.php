<html>
<body style = "background:#e3edf3;padding:20px;font-family: Helvetica, Arial, sans-serif;font-size:15px;color:#3D5161; ">

	<h1 style = "font-size: 15px;">myMisdiagnosis</h1>
	<p>
	The global medical misdiagnosis database
	</p>


	<p><?php echo sprintf(lang('IonAuth.emailActivate_heading'), $identity);?></p>
	<p>
		<?php
		echo sprintf(lang('IonAuth.emailActivate_subheading'),
						  anchor('auth/activate/' . $id . '/' . $activation, lang('IonAuth.emailActivate_link')));
		?>
	</p>
</body>
</html>


