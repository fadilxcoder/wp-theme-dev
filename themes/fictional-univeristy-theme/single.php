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
			<a class="metabox__blog-home-link" href="<?php echo site_url('/blog/'); ?>">
				<i class="fa fa-home" aria-hidden="true"></i> Blog Home
			</a> 
			<span class="metabox__main">Posted By <?php the_author_posts_link(); ?> on <?php the_time('j F y'); ?> in <?php echo get_the_category_list(',') ?></span>
		</p>
	</div>
    <div class="generic-content">
	  <?php the_content(); ?>
  </div>
</div>
<?php
    endwhile;
    get_footer();
?>