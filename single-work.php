<?php get_header(); ?>
 <script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
<div class="container work">
<div class="row">
<div class="col-md-12 contents-portfolio">
<div class="row">
<?php while(the_repeater_field('images')): 
 $image[] = wp_get_attachment_url(get_sub_field('image'), 'small');
 $thumb[] = wp_get_attachment_thumb_url(get_sub_field('image'), 'thumbnail'); ?>


<?php endwhile; ?>   
  
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php $vimvideoid = get_field('vimeo_video_id'); ?>
		<?php $vimeooryoutube = get_field('video_or_youtube');?>
        <?php $videourl = get_field('portfolio_video'); ?>
		
<?php if($videourl != "" || $vimvideoid != "" ){ ?>

<div class="col-md-8 work-images">
<div class="container">
<h3>Images</h3>

<!-- main slider carousel -->
<div class="row maindiv">
<div class="col-md-12" id="slider">


<!-- Top part of the slider -->
<div class="row">
<div class="col-md-8 resize-slider" id="carousel-bounding-box">
<div class="carousel slide" id="myCarousel">
<!-- Carousel items -->
<div class="carousel-inner">

<div class="item active" data-slide-number="0">

<?php if ($vimeooryoutube == "YouTube"){ ?>
 
<iframe id="player" width="<?php the_field(video_width); ?>px" height="<?php the_field(video_height); ?>px" src="https://www.youtube.com/embed/<?php the_field('portfolio_video'); ?>?version=3&enablejsapi=1" frameborder="0" allowfullscreen=""></iframe>
 <script>//YouTube
   
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
	//end YouTubeAPI
</script>	

<?php } elseif($vimeooryoutube == "Vimeo") { ?>
<iframe id="player_1" src="//player.vimeo.com/video/<?php the_field('vimeo_video_id'); ?>?api=1&amp;player_id=player_1" width="<?php the_field(video_width); ?>px" height="<?php the_field(video_height); ?>px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
<script>
jQuery(document).ready(function($) {
            // Listen for the ready event for any vimeo video players on the page
            var player = $('#player_1')[0];
            $f(player).addEvent('ready', ready);

            function addEvent(element, eventName, callback) {
                if (element.addEventListener) {
                    element.addEventListener(eventName, callback, false);
                }
                else {
                    element.attachEvent(eventName, callback, false);
                }
            }

            function ready(player_id) {
                console.log('ready!');
                var froogaloop = $f(player_id);

                function onPlay() {
                        froogaloop.addEvent('play', function(data) {
                            console.log('play');
							jQuery('#myCarousel').carousel('pause');
                        });
                }


                function onFinish() {
                        froogaloop.addEvent('finish', function(data) {
                            console.log('finish');
							jQuery('#myCarousel').carousel('cycle');
                        });
                }

                onPlay();
                onFinish();
            }
        });

 </script>  


<?php }
?>
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

<ul class="thumbnails-home-ul">

<?php if($vimeooryoutube == "YouTube"){ //get the thumbnail from youtube?>
<a id="carousel-selector-0" class="thumbnail">
<img src="http://img.youtube.com/vi/<?php the_field('portfolio_video'); ?>/default.jpg"></a>
<?php } else { //get the vimeo?>
<?php
function getVimeoThumb($id)
{
$vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));

?>
<a id="carousel-selector-0" class="thumbnail">
<img src="<?php echo $small = $vimeo[0]['thumbnail_small']; ?>"></a>
<?php 
}

echo getVimeoThumb($vimvideoid);
?>


<?php } ?>

<?php $thumbindex = 0;?>
<?php foreach($thumb as $thumbs) {
$thumbindex++;?>


<a class="thumbnail" id="carousel-selector-<?php echo $thumbindex; ?>"><img src="<?php echo $thumbs; ?>"></a>




<?php } ?>



</ul>



</div>

</div>
<div class="col-md-4 word-description jspDrag" data-bind="jScrollPane: {}">
<h3><?php the_title(); ?></h3>
<?php the_field('short_description'); ?>

<?php the_field('long_description'); ?>

</div>
</div>
</div><!--/Slider-->


<!--/main slider carousel-->


	   

<?php }else{ ?>

<div class="col-md-8 work-images"><h3>Images</h3>
<div class="container">


<!-- main slider carousel -->
<div class="row maindiv">
<div class="col-md-12" id="slider">


<!-- Top part of the slider -->
<div class="row">
<div class="col-md-8 resize-slider" id="carousel-bounding-box">
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

<div class="item <?php echo $active; ?> list-slider-images" data-slide-number="<?php echo $i; ?>">
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

<ul class="thumbnails-home">


<?php $thumbindex = -1;?>
<?php foreach($thumb as $thumbs) {
$thumbindex++;?>

<a class="thumbnail" id="carousel-selector-<?php echo $thumbindex; ?>"><img src="<?php echo $thumbs; ?>"></a>

<?php } ?>

</ul>



</div>

</div>
<div class="col-md-4 word-description">
<h3><?php the_title(); ?></h3>
<?php the_field('short_description'); ?>

<?php the_field('long_description'); ?>
		
</div>
</div>
</div><!--/Slider-->


<!--/main slider carousel-->




<?php }?>

            

      <?php endwhile; else: ?>
        
        <div class="container work">
			<div class="row">
				<div class="col-md-12 contents-portfolio">
		<div class="row">
          <h3>Oh no!</h3>
			</div>
				</div>
			</div>
		</div>

        <p>No content is appearing for this page!</p>

      <?php endif; ?>

      
</div>
</div>
</div>
</div>

 

<script>
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