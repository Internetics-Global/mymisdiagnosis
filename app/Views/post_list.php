<div class="container">
  <?php
  $blog = $posts;
  $blogs_chunk = array_chunk($blog, 2);
  $badge_class = ["badge-primary", "badge-secondary", "badge-success", "badge-danger", "badge-warning", "badge-info", "badge-dark"];
  ?>
  <?php if ($blog === null) : ?>
    <div class="row mb-2">
	 <h2>No posts are present </h2>
    </div>
  <?php else : ?>
    <?php foreach ($blogs_chunk as $key => $items) : ?>
	 <div class="row mb-2">
	   <?php foreach ($items as $key => $value) : ?>
		<div class="col-md-6">
		  <div class="card mb-3">
		    <div class="row no-gutters border rounded overflow-hidden flex-md-row">
			   <div class="card-body">
			   <a href="posts/<?= $value['post_id'] ?>"><?php if ($value['post_thumb']) {
							
						   echo '<img src=" ' . $value['post_thumb']  .  '" class="post_image_alignment">';
						   
						 }
						
						?></a>
				<h2 class="card-title mb-0"><a href="posts/<?= $value['post_id'] ?>"><?= $value['post_title'] ?></a></h2>
				<p class="card-text mb-1"><small class="text-muted"><?=$value['date_of_post'] ?></small></p>
				<p class="card-text"><?= strip_tags(htmlspecialchars_decode(word_limiter($value['post_snippet'], 19)), ENT_HTML5)?></p>
				<a href="posts/<?= $value['post_id'] ?>" class="stretched-link">Continue reading</a>
			   </div>
			 </div>
		  </div>
		</div>
	   <?php endforeach; ?>
	 </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>