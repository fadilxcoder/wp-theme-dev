<?php
function pageBanner($args = NULL)
{
    if(!empty(get_the_title())):
        $args['title'] = get_the_title();
    endif;
    
    if(!empty(get_field('page_banner_subtitle'))):
        $args['subtitle'] = get_field('page_banner_subtitle');
    endif;
    
    if(!empty(get_field('page_banner_background_image'))):
        $pageBannerimage = get_field('page_banner_background_image');
        $args['pageBanner'] = $pageBannerimage['sizes']['pageBanner'];
    endif;
    
?>
<div class="page-banner">
  	<div class="page-banner__bg-image" style="background-image: url(<?php echo $args['pageBanner'] ?>);"></div>
  	<div class="page-banner__content container container--narrow">
		<h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
  		<div class="page-banner__intro">
			<p><?php echo $args['subtitle']; ?></p>
	  	</div>
  	</div>
</div>
<?php
}
?>
