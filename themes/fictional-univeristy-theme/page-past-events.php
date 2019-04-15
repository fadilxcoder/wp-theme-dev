<?php get_header(); ?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
	  <h1 class="page-banner__title">Past Events</h1>
	  <div class="page-banner__intro">
		  <p>A Recap of our previous events</p>
	  </div>
  </div>
</div>
<div class="container container--narrow page-section">
    <?php
        $today = date('Ymd');
        $wpConfig =array(
            'paged'             => get_query_var('paged', 1), # This function can be used to get all sorts of information about the current URL, we are interested in page page result, so we passed in "paged"
            'post_type'         => 'event',
            'orderby'           => 'meta_value_num',    # (rand : sort in random order) / if set to meta_value_XXX , use another argument meta_key
            'meta_key'          => 'event_date',        # The another argument used, -> meta_key <- assign the custom field name with it.
            'order'             => 'DESC',
            'meta_query'        => array(               
                array(
                    'key'       => 'event_date',        # WHERE key {'event_date'}
                    'compare'   => '<',                 # compare {IS '>=' (greater or equal to)}
                    'value'     => $today,              # value {today's date} 
                    'type'      => 'numeric'            # type of value to compare {'numeric'}
                )    
            )
        );
        $pastPageEvents = new WP_Query($wpConfig);
        while($pastPageEvents->have_posts()):
            $pastPageEvents->the_post();
            $eventDate = new DateTime(get_field('event_date'));
    ?>
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
    <?php
        endwhile;
        wp_reset_postdata(); // Just like a smoking habit, use it...
        $wpConfig =array(
            'total'     => $pastPageEvents->max_num_pages,
        );
        echo paginate_links($wpConfig);
    ?>
</div>
<?php get_footer(); ?>