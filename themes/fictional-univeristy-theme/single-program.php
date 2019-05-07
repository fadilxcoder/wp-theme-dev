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
			<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>">
				<i class="fa fa-home" aria-hidden="true"></i> All programs
			</a> 
			<span class="metabox__main"><?php the_title(); ?></span>
		</p>
	</div>
    <div class="generic-content">
	  <?php the_content(); ?>
    </div>
    <?php
        $wpConfig =array(
            'post_type'         => 'professor',
            'posts_per_page'    => -1,                  # (-1 : return all data)
            'orderby'           => 'title',    # (rand : sort in random order) / if set to meta_value_XXX , use another argument meta_key
            'order'             => 'ASC',
            'meta_query'        => array(               
                array(
                    'key'       => 'related_program',   # WHERE key {'related_program'} - this is the custom field name
                    'compare'   => 'LIKE',              # compare LIKE
                    'value'     => '"'.get_the_ID().'"' # -> return the ID in between quotes : "125"
                )
            )
        );
        $relatedProfessors = new WP_Query($wpConfig);
        if($relatedProfessors->have_posts()):
    ?>
    
    <hr class="section-break">
    <h2 class="headline headline--medium">Professor(s)</h2>
    <ul class="link-list min-list">
    <?php
        while($relatedProfessors->have_posts()):
            $relatedProfessors->the_post();
    ?>
    <li class="professor-card__list-item">
        <a class="professor-card" href="<?php the_permalink(); ?>">
            <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>">
            <span class="professor-card__name"><?php the_title(); ?></span>
        </a>
    </li>
    <?php 
        endwhile; 
        wp_reset_postdata(); // Just like a smoking habit, use it...
    ?>
    </ul>
    <?php
        endif;
    ?>
    <?php
        $today = date('Ymd');
        $wpConfig =array(
            'post_type'         => 'event',
            'posts_per_page'    => -1,                  # (-1 : return all data)
            'orderby'           => 'meta_value_num',    # (rand : sort in random order) / if set to meta_value_XXX , use another argument meta_key
            'meta_key'          => 'event_date',        # The another argument used, -> meta_key <- assign the custom field name with it.
            'order'             => 'ASC',
            'meta_query'        => array(               
                array(
                    'key'       => 'event_date',        # WHERE key {'event_date'}
                    'compare'   => '>=',                # compare {IS '>=' (greater or equal to)}
                    'value'     => $today,              # value {today's date} 
                    'type'      => 'numeric'            # type of value to compare {'numeric'}
                ),
                array(
                    'key'       => 'related_program',   # WHERE key {'related_program'} - this is the custom field name
                    'compare'   => 'LIKE',              # compare LIKE
                    'value'     => '"'.get_the_ID().'"' # -> return the ID in between quotes : "125"
                )
            )
        );
        $programEvents = new WP_Query($wpConfig);
        if($programEvents->have_posts()):
    ?>
    
    <hr class="section-break">
    <h2 class="headline headline--medium">Upcoming <?php echo get_the_title(); ?> Events</h2>
    <?php
        while($programEvents->have_posts()):
            $programEvents->the_post();
            $eventDate = new DateTime(get_field('event_date')); //Pass the date into php function DateTime so that we can format it in our way.
    ?>
    <div class="event-summary">
        <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month"><?php echo $eventDate->format('M'); ?></span>
            <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
        </a>
        <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php echo (has_excerpt()) ? get_the_excerpt() : wp_trim_words(get_the_content(), 28); ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
        </div>
    </div>
    <?php 
        endwhile; 
        wp_reset_postdata(); // Just like a smoking habit, use it...
        endif;
    ?>
</div>
<?php
    endwhile;
    get_footer();
?>