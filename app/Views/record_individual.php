<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);


// if ($this->ionAuth->loggedIn()) {echo "logged in";}

?>

<div class="container">
    <?php foreach ($individualPost as $key => $post) : ?>
	   <h1 class="mb-3"><?= $post['record_misdiagnosis'] ?></h1>
	   
	   <div id="post_body">
		  <?php if ($post['record_image']) {
			  
			echo '<img src=" ' . $post['record_image']  .  '" class="post_image_alignment">';
			
		   }
		  
		  ?>
		  
		  <?= htmlspecialchars_decode($post['record_correct_diagnosis'], ENT_HTML5) ?>
		  
		<?php if ($this->ionAuth->loggedIn()) { ?>
		  <?php if ($user->id == $post['record_user_id']) {
			  
			echo "<a href='../recordeditor/misdiagnosis/edit/" . $post['record_id'] . "'>Edit</a>";   
		  }
		  
		  ?>
		 <?php } ?>
	   </div>
    <?php endforeach; ?>
</div>