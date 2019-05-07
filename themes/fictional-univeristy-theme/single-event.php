<?php
	get_header(); 
	while( have_posts() ):
		the_post();
		$args = array(
			'title'		=> 	get_the_title(),
			'subtitle'	=>	'',
			'pageBanner'=>	get_theme_file_uri('/images/ocean.jpg')
		);
		pageBanner($args);
?>

<div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p>
			<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
				<i class="fa fa-home" aria-hidden="true"></i> Event Home
			</a> 
			<span class="metabox__main"><?php the_title(); ?></span>
		</p>
	</div>
	<div class="generic-content">
	  <?php the_content(); ?>
  	</div>
  	<?php 
  		$relatedPrograms = get_field('related_program');
  		if(!empty($relatedPrograms)):
  	?>
	  	<hr class="section-break">
	  	<h2 class="headline headline--medium">Related Program(s)</h2>
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