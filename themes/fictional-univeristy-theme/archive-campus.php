<?php get_header(); ?>
<?php
$args = array(
	'title'		=> 	'Our Campuses',
	'subtitle'	=>	'We have the best campuses',
	'pageBanner'=>	get_theme_file_uri('/images/ocean.jpg')
);
pageBanner($args);
?>
<div class="container container--narrow page-section">
    <div class="acf-map">
    <?php
        while(have_posts()):
            the_post();
            $location = get_field('map_location');
            
    ?>
    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    <?php
        endwhile;
    ?>
    </div>
</div>
<?php get_footer(); ?>