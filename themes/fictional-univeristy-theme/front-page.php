<?php get_header(); ?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>);"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
            <?php
                $today = date('Ymd');
                $wpConfig =array(
                    'post_type'         => 'event',
                    'posts_per_page'    => 2,                  # (-1 : return all data)
                    'orderby'           => 'meta_value_num',    # (rand : sort in random order) / if set to meta_value_XXX , use another argument meta_key
                    'meta_key'          => 'event_date',        # The another argument used, -> meta_key <- assign the custom field name with it.
                    'order'             => 'ASC',
                    'meta_query'        => array(               
                        array(
                            'key'       => 'event_date',        # WHERE key {'event_date'}
                            'compare'   => '>=',                # compare {IS '>=' (greater or equal to)}
                            'value'     => $today,              # value {today's date} 
                            'type'      => 'numeric'            # type of value to compare {'numeric'}
                        )    
                    )
                );
                $homePageEvents = new WP_Query($wpConfig);
                while($homePageEvents->have_posts()):
                    $homePageEvents->the_post();
                    # $eventDate = new DateTime(get_field('event_date')); //Pass the date into php function DateTime so that we can format it in our way.
                    # get_template_part('template-parts/content', get_post_type());  => content-event.php / content-program.php / content-any_post_type_name.php
                    get_template_part('template-parts/content', 'event');
                endwhile; 
                wp_reset_postdata(); // Just like a smoking habit, use it...
            ?>
            <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>

        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
            <?php
                $wpConfig =array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 2
                );
                $homePagePosts = new WP_Query($wpConfig);
                
                while($homePagePosts->have_posts()):
                    $homePagePosts->the_post();
            ?>
            <div class="event-summary">
                <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink() ?>">
                    <span class="event-summary__month"><?php the_time('M'); ?></span>
                    <span class="event-summary__day"><?php the_time('d'); ?></span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                    <p><?php echo (has_excerpt()) ? get_the_excerpt() : wp_trim_words(get_the_content(), 28); ?> <a href="<?php the_permalink() ?>" class="nu gray">Read more</a></p>
                </div>
            </div>
            <?php 
                endwhile; 
                wp_reset_postdata(); // Just like a smoking habit, use it...
            ?>
            <p class="t-center no-margin"><a href="<?php echo site_url('/blog/') ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
    </div>
</div>

<div class="hero-slider">
    
    <?php 
        $ms = get_field('mini_slider');
        //var_dump($ms);
        //die;
    ?>
    <?php foreach( $ms as $key=>$value): ?>
    <?php //var_dump($value).'<br>'?>
    <div class="hero-slider__slide" style="background-image: url(<?php echo $value['image']['url'] ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center"><?php echo $value['title'] ?></h2>
                <p class="t-center"><?php echo $value['subtitle'] ?></p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php get_footer(); ?>