<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);



// if ($this->ionAuth->loggedIn()) {echo "logged in";}

?>

<div class="container">
    <?php foreach ($individualPost as $key => $post) : ?>
	   <h1 class="mb-3"><?= $post['post_title'] ?></h1>
	   
	   <div id="post_body">
		  <?php if ($post['post_image']) {
			  
			echo '<img src=" ' . $post['post_image']  .  '" class="post_image_alignment">';
			
		   }
		  
		  ?>
		  
		  <?= htmlspecialchars_decode($post['post_body'], ENT_HTML5) ?>
		  
		<?php if ($this->ionAuth->loggedIn()) { ?>
		  <?php if ($user->id == $post['post_user_id']) {
			  
			echo "<a href='../posteditor/posts/edit/" . $post['post_id'] . "'>Edit</a>";   
		  }
		  
		  ?>
		 <?php } ?>
	   </div>
    <?php endforeach; ?>
</div>