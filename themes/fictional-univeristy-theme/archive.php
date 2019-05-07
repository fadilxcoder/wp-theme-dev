<?php get_header(); ?>
<?php
$args = array(
	'title'		=> 	get_the_archive_title(),
	'subtitle'	=>	get_the_archive_description(),
	'pageBanner'=>	get_theme_file_uri('/images/ocean.jpg')
);
pageBanner($args);
?>
<?php /* ?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
	  <h1 class="page-banner__title">
	      <?php //( is_category() ) ? (single_cat_title()) : '' ?>
	      <?php //( (is_author() ) ? the_author() : '' ) ?>
	      <?php the_archive_title(); ?>
	  </h1>
	  <div class="page-banner__intro">
		  <p><?php the_archive_description(); ?></p>
	  </div>
  </div>
</div> <?php */ ?>
<div class="container container--narrow page-section">
    <?php
        while(have_posts()):
            the_post();
    ?>
        <div class="post-item">
            <h2 class="headline headline--medium headline--post-title" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="metabox">
                <p>Posted By <?php the_author_posts_link(); ?> on <?php the_time('j F y'); ?> in <?php echo get_the_category_list(',') ?></p>
            </div>
            <div class="generic-content">
                <?php the_excerpt(); ?>
                <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Read More</a></p>
            </div>
        </div>
    <?php
        endwhile;
        echo paginate_links();
    ?>
</div>
<?php get_footer(); ?>