<?php get_header(); ?>
<?php
$args = array(
	'title'		=> 	'All Programs',
	'subtitle'	=>	'There is something for everyone have a look around.',
	'pageBanner'=>	get_theme_file_uri('/images/ocean.jpg')
);
pageBanner($args);
?>
<div class="container container--narrow page-section">
    <ul class="link-list min-list">
    <?php
        while(have_posts()):
            the_post();
    ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php
        endwhile;
        echo paginate_links();
    ?>
    </ul>
</div>
<?php get_footer(); ?>