<?php
get_header(); ?>

<div class="container work">
<div class="row">
<div class="col-md-12 contents-portfolio">
<div class="row">
	
	<?php

//get the parameters for an out changing background
$args = array( 
'post_type' => 'frontpage'
);
$the_query = new WP_Query( $args );

?>



<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php if(get_field('images')): ?>

<?php while(the_repeater_field('images')): 
 $image[] = wp_get_attachment_url(get_sub_field('image'), 'small');
 $thumb[] = wp_get_attachment_url(get_sub_field('image'), 'small');
 $caption[]= get_sub_field('caption');
 


endwhile; endif; ?>


<div class="col-md-8 work-images">
<div class="container">


<!-- main slider carousel -->
<div class="row maindiv">
<div class="col-md-8" id="slider">


<!-- Top part of the slider -->
<div class="row">
<div class="col-md-" id="carousel-bounding-box">
<div class="carousel slide" id="myCarousel">
<!-- Carousel items -->
<div class="carousel-inner">

<?php $i=-1;?>

<?php foreach ($image as $images){ ?>
<?php $i++; 
if ($i == 0) {
$active ="active";
}else{
$active="";
}

?>


<div class="item <?php echo $active; ?>" data-slide-number="<?php echo $i; ?>">
<img src="<?php echo $images; ?>" >
     <div class="carousel-caption">
	 
					<?php 
					 
					 if ($i == 0){
						 
						 $captiontext = $caption[0];
						 
					 }
					 elseif ($i == 1){
						  
						  $captiontext = $caption[1];
					 }
					 else{
						 
						 $captiontext = $caption[2];
					 }
				
	                ?>
                    <h4><?php echo $captiontext; ?></h4>
                    
                </div>

</div>

<?php } ?>
</div>

</div><!-- Carousel nav -->

</div>
</div>

</div>
</div>


<div class="row hidden-phone" id="slider-thumbs">

<!-- Bottom switcher of slider -->


		<div class="col-md-8 thumb-images">
			
		



<?php $thumbindex = -1;?>
<?php foreach($thumb as $thumbs) {
$thumbindex++;?>
<a id="carousel-selector-<?php echo $thumbindex; ?>"><img src="<?php echo $thumbs; ?>"></a>


<?php } ?>



</div>

</div>
</div><!--/Slider-->
</div>
<div class="col-md-4 word-front-right">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('front-right') ) : ?>
						  <?php endif; ?>
</div>
</div>
</div><!--/Slider-->


<!--/main slider carousel-->
  
<?php endwhile; endif; ?>



<script>
   var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    function onYouTubeIframeAPIReady() {

        player = new YT.Player('player', {         
            videoId: '<?php the_field('portfolio_video'); ?>',
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    var done = false;
    function onPlayerStateChange(event) {
        switch(event.data){
            case 1:
				 jQuery('#myCarousel').carousel('pause');
                break;
				
            default:
                jQuery('#myCarousel').carousel('cycle');
                break;
        }
    }
    function stopVideo() {
        player.stopVideo();
    }
	
jQuery(document).ready(function($) {

$('#myCarousel').carousel({
	interval: 5000
});

$('#carousel-text').html($('#slide-content-0').html());

//Handles the carousel thumbnails
$('[id^=carousel-selector-]').click( function(){
	var id_selector = $(this).attr("id");
	var id = id_selector.substr(id_selector.length -1);
	var id = parseInt(id);
	$('#myCarousel').carousel(id);
});


// When the carousel slides, auto update the text
$('#myCarousel').on('slid', function (e) {
	var id = $('.item.active').data('slide-number');
	$('#carousel-text').html($('#slide-content-'+id).html());
});
});
</script>
<?php get_footer(); ?>

