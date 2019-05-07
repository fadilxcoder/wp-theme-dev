<?php get_header(); ?>
<?php
$args = array(
	'title'		=> 	'Welcome to our blog !',
	'subtitle'	=>	'Keep up with our latest news.',
	'pageBanner'=>	get_theme_file_uri('/images/ocean.jpg')
);
pageBanner($args);
?>
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