<?php

/**
* Template Name: Work Gallery Page
*/


get_header(); ?>

<div class="container work">
<div class="row">
<div class="col-md-12 contents-portfolio">
<div class="row">
	
	<?php

//get the parameters for an out changing background
$args = array( 
'post_type' => 'work',
);
$the_query = new WP_Query( $args );

?>



<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php if(get_field('images')): ?>

<?php while(the_repeater_field('images')): 
 $image[] = wp_get_attachment_url(get_sub_field('image'), 'small');
 $thumb[] = wp_get_attachment_thumb_url(get_sub_field('image'), 'thumbnail');


endwhile; endif; ?>




<?php $videourl = get_field('portfolio_video'); ?>
<?php if($videourl != ""){ ?>

<div class="col-md-8 work-images"><h1>Images</h1>
<div class="container">


<!-- main slider carousel -->
<div class="row maindiv">
<div class="col-md-12" id="slider">


<!-- Top part of the slider -->
<div class="row">
<div class="col-md-8" id="carousel-bounding-box">
<div class="carousel slide" id="myCarousel">
<!-- Carousel items -->
<div class="carousel-inner">

<div class="item active" data-slide-number="0">
<iframe id="player" width="<?php the_field(video_width); ?>px" height="<?php the_field(video_height); ?>px" src="https://www.youtube.com/embed/<?php the_field('portfolio_video'); ?>?version=3&enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
</div>
				

<?php $i=0;?>
<?php foreach ($image as $images){ ?>
<?php $i++; ?>

<div class="item" data-slide-number="<?php echo $i; ?>">
<img src="<?php echo $images; ?>" >
</div>

<?php } ?>
</div>

</div><!-- Carousel nav -->

</div>
</div>

</div>
</div>
</div><!--/Slider-->

<div class="row hidden-phone" id="slider-thumbs">

<!-- Bottom switcher of slider -->

<ul class="thumbnails">


<a id="carousel-selector-0" class="thumbnail">
<img src="http://img.youtube.com/vi/<?php the_field('portfolio_video'); ?>/default.jpg"></a>

<?php $thumbindex = 0;?>
<?php foreach($thumb as $thumbs) {
$thumbindex++;?>

<a class="thumbnail" id="carousel-selector-<?php echo $thumbindex; ?>"><img src="<?php echo $thumbs; ?>"></a>

<?php } ?>



</ul>



</div>

</div>
<div class="col-md-4 word-description">
<h1><?php the_title(); ?></h1>
<p class="shortdesc"><?php the_field('short_description'); ?></p>
<br>
<p><?php the_field('long_description'); ?></p>

</div>
</div>
</div><!--/Slider-->


<!--/main slider carousel-->


	

<?php }else{ ?>

<div class="col-md-8 work-images"><h1>Images</h1>
<div class="container">


<!-- main slider carousel -->
<div class="row maindiv">
<div class="col-md-12" id="slider">


<!-- Top part of the slider -->
<div class="row">
<div class="col-md-8" id="carousel-bounding-box">
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
</div>

<?php } ?>
</div>

</div><!-- Carousel nav -->

</div>
</div>

</div>
</div>
</div><!--/Slider-->

<div class="row hidden-phone" id="slider-thumbs">

<!-- Bottom switcher of slider -->

<ul class="thumbnails">


<?php $thumbindex = -1;?>
<?php foreach($thumb as $thumbs) {
$thumbindex++;?>

<a class="thumbnail" id="carousel-selector-<?php echo $thumbindex; ?>"><img src="<?php echo $thumbs; ?>"></a>

<?php } ?>

</ul>



</div>

</div>
<div class="col-md-4 word-description" style="overflow-y: scroll;">
<h1><?php the_title(); ?></h1>
<p><?php the_field('short_description'); ?></p>
<br>
<p><?php the_field('long_description'); ?></p>
		
</div>
</div>
</div><!--/Slider-->


<!--/main slider carousel-->



<?php }?>   
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

