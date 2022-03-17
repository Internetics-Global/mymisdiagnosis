<html>
<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php 

if ($meta_title) {echo $meta_title;} else {echo $title;}


$uri = current_url(true);

$this->ionAuth    = new \IonAuth\Libraries\IonAuth();
   $user = $this->ionAuth->user()->row(); 
   
function endsWith( $haystack, $needle ) {
 $length = strlen( $needle );
 if( !$length ) {
  return true;
 }
 return substr( $haystack, -$length ) === $needle;
}	   



?></title>

	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/bootstrap/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/elusive-icons/css/elusive-icons.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/list.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/general.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/plugins/animate.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/main.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/internetics.css?v=461
    "/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/lightbox.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://use.typekit.net/tny7auv.css"> 
<?php if ((strpos($uri, "contact") !== false) || (strpos($uri, "emaillist") !== false) || (strpos($uri, "login") !== false) || (strpos($uri, "register") !== false) ){ ?>   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php } ?>

<?php if ((strpos($uri, "edit") !== false) || (strpos($uri, "add") !== false)){ ?>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/elusive-icons/css/elusive-icons.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/add-edit-form.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo site_url();?>public/assets/grocery_crud/themes/internetics/css/dropzone.css"/>
   
<?php } ?>
<meta name="description" content="<?php echo $meta_description; ?>">


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YZFJ0LPYW9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YZFJ0LPYW9');
</script>


   

</head>



<body>
  <div class="body_inner">
  <div class="body_inner_frame">

