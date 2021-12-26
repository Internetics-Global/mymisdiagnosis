<html>
<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php 

if ($meta_title) {echo $meta_title;} else {echo $title;}


$uri = current_url(true);
$this->ionAuth    = new \IonAuth\Libraries\IonAuth();
   $user = $this->ionAuth->user()->row(); 



?></title>

	<link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/bootstrap/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/elusive-icons/css/elusive-icons.min.css"/>
    <link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/list.css"/>
    <link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/general.css"/>
    <link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/plugins/animate.min.css"/>
    <link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/main.css"/>
    <link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/internetics.css?v=103"/>
    <link type="text/css" rel="stylesheet" href="/mymisdiagnosis/public/assets/grocery_crud/themes/internetics/css/lightbox.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://use.typekit.net/tny7auv.css">
    
    
<?php if (strpos($uri, "contact") !== false){ ?>  
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

<?php } ?>

<meta name="description" content="<?php echo $meta_description; ?>">





</head>



<body>
  
  <div class="body_inner">
  <div class="body_inner_frame">
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

  <a class="navbar-brand mx-auto" href="#">   </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url();?>">Home</a>
      </li>

      <li class="nav-item<?php if (strpos($uri, "pages") !== false){ echo ' active"'; }  ?>">
        <a class="nav-link" href="<?php echo site_url();?>pages">News</a>
      </li>
      
      <li class="nav-item<?php if (strpos($uri, "register_user") !== false){ echo ' active"'; }  ?>">
              
              <?php if ( $this->ionAuth->loggedIn()) {} else { ?>          
                <a class="nav-link" href="<?php echo site_url('auth/register_user/'); ?>">Register</a>
              <?php }	?>
              
            </li>
      
      <li class="nav-item<?php if (strpos($uri, "edit_user") !== false){ echo ' active"'; }  ?>">
        
        <?php if ( $this->ionAuth->loggedIn()) { ?>          
          <a class="nav-link" href="<?php echo site_url('auth/edit_user/'); echo $user->id; ?>">Settings</a>
        <?php }	?>
        
      </li>
      
      <li class="nav-item<?php if (strpos($uri, "login") !== false){ echo ' active"'; }  ?>"> 
         
        <?php if (! $this->ionAuth->loggedIn()) {?>
          <a class="nav-link" href="<?php echo site_url('auth/login');?>">Login</a>
        <?php }
         
       else { ?>
          <a class="nav-link" href="<?php echo site_url('auth/logout');?>">Logout</a>
         <?php };?> 
                          
      </li>
      
      <li class="nav-item<?php if (strpos($uri, "contact") !== false){ echo ' active"'; }  ?>">
        <a class="nav-link" href="<?php echo site_url();?>contact">Contact us</a>
      </li>
    </ul>

  </div>
</nav>




















<main class="bd-content p-5" role="main">
	
	 <div class="row">
		 
      	<div class="col-12">
          <?php
//          if (!$this->ionAuth->loggedIn())
//          {
//          echo "Not logged in";
//          }
//          elseif ($this->ionAuth->isAdmin())
//          {
//          echo "Admin is logged in";
//          }
//          elseif($this->ionAuth->inGroup('members'))
//          {
//          echo "User is logged in";
//          }
//          else
//          {
//          echo "n/a";
//          }
//         ?>