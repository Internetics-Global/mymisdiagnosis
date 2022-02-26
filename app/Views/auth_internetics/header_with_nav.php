<?php


$uri = current_url(true);
$this->ionAuth    = new \IonAuth\Libraries\IonAuth();
   $user = $this->ionAuth->user()->row(); 
     

?>   


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

  <a class="navbar-brand mx-auto" href="<?php echo site_url();?>">   </a>

  <div class="collapse flex-md-column navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url();?>">Home</a>
      </li>
      
      <li class="nav-item<?php if ((strpos($uri, "records") !== false) || (strpos($uri, "record/") !== false) ){ echo ' active"'; }  ?>">
        <a class="nav-link" href="<?php echo site_url();?>records">Search</a>
      </li>

      <li class="nav-item<?php if (strpos($uri, "pages") !== false){ echo ' active"'; }  ?>">
        <a class="nav-link" href="<?php echo site_url();?>pages">News</a>
      </li>
    
      
      <li class="nav-item<?php if (strpos($uri, "contact") !== false){ echo ' active"'; }  ?>">
        <a class="nav-link" href="<?php echo site_url();?>contact">Contact us</a>
      </li>
                        
      <li class="nav-item<?php if (strpos($uri, "register_user") !== false){ echo ' active"'; }  ?>">                     
              <?php if ( $this->ionAuth->loggedIn()) {} else { ?>          
                <a class="nav-link" href="<?php echo site_url('auth/register_user'); ?>">Register</a>
              <?php }	?>                      
      </li> 
                                
      <li class="nav-item<?php if (strpos($uri, "login") !== false){ echo ' active"'; }  ?>">                  
              <?php if (! $this->ionAuth->loggedIn()) {?>
                <a class="nav-link" href="<?php echo site_url('auth/login');?>">Login</a>
              <?php } ?>
      </li>  
              
    </ul>
    
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0 sub-nav">    

      <li class="nav-item">
           <div class="row spacer"> </div>
      </li>                      
            
      <li class="nav-item<?php if (endsWith($uri, "auth") !== false){ echo ' active"'; }  ?>">              
             <?php if ( $this->ionAuth->loggedIn()) { ?>          
               <a class="nav-link" href="<?php echo site_url('auth'); ?>">Members</a>
             <?php }	?>               
      </li>
             
     <?php
       // if($this->ionAuth->inGroup('members')
       if ($this->ionAuth->isAdmin()) {
       ?>
       
      <li class="nav-item<?php if (endsWith($uri, "posts") !== false){ echo ' active"'; }  ?>">
         <a class="nav-link" href="<?php echo site_url('posteditor/posts');?>">Post editor</a>
      </li>
       
       <?php } ?>      
                
    <?php if ( $this->ionAuth->loggedIn()) { ?>
     
     <li class="nav-item<?php if (endsWith($uri, "misdiagnosis") !== false){ echo ' active"'; }  ?>">
       <a class="nav-link" href="<?php echo site_url('recordeditor/misdiagnosis/');?>">Misdiagnosis data</a>
     </li>
   
    <?php } ?>  
                
      <li class="nav-item<?php if (strpos($uri, "edit_user") !== false){ echo ' active"'; }  ?>">                    
            <?php if ( $this->ionAuth->loggedIn()) { ?>          
              <a class="nav-link" href="<?php echo site_url('auth/edit_user/'); echo $user->id; ?>">Settings</a>
            <?php }	?>                     
      </li>  
        
     <li class="nav-item<?php if (strpos($uri, "login") !== false){ echo ' active"'; }  ?>"> 
                      
           <?php if ($this->ionAuth->loggedIn()) {?>
             <a class="nav-link" href="<?php echo site_url('auth/logout');?>">Logout</a>
            <?php };?>                                       
     </li>          
    </ul>
  </div>  
</nav>





