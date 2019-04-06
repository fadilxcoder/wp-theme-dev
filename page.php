<?php
	get_header();
	while( have_posts() ):
		the_post();
?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
	  <h1 class="page-banner__title"><?php the_title() ?></h1>
	  <div class="page-banner__intro">
		  <p>DON'T FORGET TO REPLACE ME LATER</p>
	  </div>
  </div>
</div>

<div class="container container--narrow page-section">
	<?php
		/*
		*	get_the_ID()							-> Get the page ID 
		*	wp_get_post_parent_id() 	-> Get the post parent ID by taking as parameter the page id
		*	
		*	If there is no parent ID, it display 0, meaning FALSE, so this piece of code does not run.
		*	If there is a parent ID, it display it as an integer larger than 0, meaning TRUE, the piece of code run.
		*
		*/
		$theParent = wp_get_post_parent_id(get_the_ID());
		if($theParent): 
	?>
	<div class="metabox metabox--position-up metabox--with-home-link">
		<p>
			<a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent) ?>">
				<i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?>
			</a> 
			<span class="metabox__main"><?php the_title(); ?></span>
		</p>
	</div>
  <?php endif; ?>
  
  <?php
	/*
	*	
	*	
	*	$theParent	-> if the current page has a parent
	*	$getPages		-> if it is a parent
	*
	*/
	$config = array(
		'child_of'	=> get_the_ID()
	);
	$getPages = get_pages($config);
	if($theParent or $getPages) :
  ?>
  <div class="page-links">
	  <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent) ?>"><?php echo get_the_title($theParent); ?></a></h2>
	  <ul class="min-list">
		  <?php
			$findChildrenOf = ($theParent) ? $theParent : get_the_ID() ;
			$config = array(
				'title_li'		=> NULL,
				'child_of'		=> $findChildrenOf,
				'sort_column'	=> 'menu_order'
			);
			wp_list_pages($config);
		  ?>
	  </ul>
  </div>
  <?php endif; ?>
  <div class="generic-content">
	  <?php the_content(); ?>
  </div>
</div>
<?php
	endwhile;
	get_footer();
?>