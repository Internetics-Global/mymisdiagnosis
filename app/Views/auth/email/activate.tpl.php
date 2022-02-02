<html>

<body style = "background:#e3edf3;padding:20px;font-family: Helvetica, Arial, sans-serif;font-size:15px;color:#3D5161; ">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	   <td align="center">
		  <img alt="myMisdiagnosis logo" src="https://www.mymisdiagnosis.com/images/mymisdiagnosis-logo-symb-3.png" width="100px" align="middle">
	   </td>
</tr>
<tr>
	   <td align="left">
		  <h1 style = "font-size: 15px;">This is an email from myMisdiagnosis.com</h1>
		  <p>
		  The myMisdiagnosis.com project is a global medical misdiagnosis database resource, with information supplied by patients and their carers, who may have been subject to an incorrect diagnosis.
		  </p>
		  <h1 style = "font-size: 15px;">Activate your account</h1>
		  
		 <?php
		 echo sprintf(lang('IonAuth.emailActivate_subheading'),
						   anchor('auth/activate/' . $id . '/' . $activation, lang('IonAuth.emailActivate_link')));
		 ?>
		  <p>
		 <p>You have received this email as you or someone using your email address has tried to register on myMisdiagnosis.com. </p>
		 
		 <p>If this is not you, please disregard this email, or report it to us at <a href="mailto:spam@mymisdiagnosis.com">spam@mymisdiagnosis.com</a>. Thank you.</p>
		 
		 <p>For our terms and conditions and conditions please click <a href="https://www.mymisdiagnosis.com/pages/website-terms-and-conditions">here</a>. For our privacy policy please click <a href="https://www.mymisdiagnosis.com/pages/privacy-policy-for-mymisdiagnosis-com">here</a>.</p>
		 
		 <p>Kind regards, </p>
		 <p></p>
		 <p>The team at myMisdiagnosis.com</p>
		  </p>
	   </td>
</tr>
<tr>
	   <td align="center">
		  <p>
		  <img alt="myMisdiagnosis full logo" src="https://www.mymisdiagnosis.com/images/mymisdiagnosis-logo-email-2.png" width="400px" align="middle">
		  </p>
	   </td>
</tr>
</table>
</body>
</html>