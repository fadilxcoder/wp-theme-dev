<?php 
    get_header(); 
    $args = array(
		'title'		=> 	'All Events',
		'subtitle'	=>	'See what is going on in our world.',
		'pageBanner'=>	get_theme_file_uri('/images/ocean.jpg')
	);
	pageBanner($args);
?>
<div class="container container--narrow page-section">
    <?php
        while(have_posts()):
            the_post();
            $eventDate = new DateTime(get_field('event_date'));
    ?>
    <?php /*
        <div class="event-summary">
            <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__month"><?php echo $eventDate->format('M'); ?></span>
                <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
            </a>
            <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words(get_the_content(), 28); ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
            </div>
        </div>
    */ ?>
    <?php get_template_part('template-parts/content', 'event'); ?>
    <?php
        endwhile;
        echo paginate_links();
    ?>
    <p class="t-center no-margin"><a href="<?php echo site_url('/past-events/'); ?>" class="btn btn--blue">View Past Events</a></p>
</div>
<?php get_footer(); ?>