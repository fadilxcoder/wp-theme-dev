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
	<div class="generic-content">
	    <div class="row group">
	        <div class="one-third">
	            <?php the_post_thumbnail('professorPortrait'); ?>
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