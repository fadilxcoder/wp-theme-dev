<?php
	get_header(); 
	while( have_posts() ):
		the_post();
?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
	  <h1 class="page-banner__title"><?php the_title() ?></h1>
  </div>
</div>

<div class="container container--narrow page-section">
	<div class="generic-content">
	    <div class="row group">
	        <div class="one-third">
	            <?php the_post_thumbnail(); ?>
	        </div>
	        <div class="two-thirds">
	            <?php  the_content(); ?>
	        </div>
	    </div>
  	</div>
  	<?php 
  		$relatedPrograms = get_field('related_program');
  		if(!empty($relatedPrograms)):
  	?>
	  	<hr class="section-break">
	  	<h2 class="headline headline--medium">Subject(s) </h2>
	  	<ul class="link-list min-list">
		<?php 
			//var_dump($relatedPrograms);
			foreach($relatedPrograms as $_relatedPrograms):
		?>
			<li>
				<a href="<?php echo get_permalink($_relatedPrograms) ?>"><?php echo get_the_title($_relatedPrograms) ?></a>
			</li>
		<?php
			endforeach;
		?>
		</ul>
	<?php endif; ?>
</div>
<?php
	endwhile;
	get_footer();
?>