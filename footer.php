</div>
	
</body>


<script>
jQuery(function($) 
{
    var bgCounter = 0,
        backgrounds = [
		
	<?php
	
	//get the parameters for an out changing background
        $args = array( 
          'post_type' => 'backgroundimages'
        );
        $the_query = new WP_Query( $args );

      ?>
		
		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php echo '"';?><?php the_field( 'background_images' ); ?><?php echo '",';?>
		 <?php endwhile; endif; ?>
        ];
    function changeBackground()
    {
        bgCounter = (bgCounter+1) % backgrounds.length;
		$('body').css('background', '#000 url('+backgrounds[bgCounter]+') center center no-repeat fixed');
		$('#page').fadeIn(100);
		$("#splash").append("<img src='http://www.scottieproductions.co.nz/images/gallery_loading.gif?"+ Math.random() + "'/>");
        setTimeout(changeBackground,10000);

    }
    changeBackground();
});
</script>




<!-- footer -->

	<div class="navbar-fixed-bottom footer">
		
		<div class="container">
		<br>
		<p>&copy; Copyright <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
		<p><a href="http:www.facebook.com">FACEBOOK</a></p>
		<p><a href="http:www.facebook.com">TWITTER</a></p>

		</div>
				
	</div>

        </div>
<?php wp_footer(); ?>
	
  </body>
</html>
  