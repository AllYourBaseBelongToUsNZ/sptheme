 <hr>

    </div>
	
</body>
<script>
jQuery(function($) 
{
    var bgCounter = 0,
        backgrounds = [
		   "<?php bloginfo('template_url')?>/images/Optimized-8.jpg",
           "<?php bloginfo('template_url')?>/images/Optimized-MVI_0086-1.png",
        ];
    function changeBackground()
    {
        bgCounter = (bgCounter+1) % backgrounds.length;
		$('body').css('background', '#000 url('+backgrounds[bgCounter]+') center center no-repeat fixed');
		$('#page').fadeIn(900);
        setTimeout(changeBackground,9000);

    }
    changeBackground();
});
</script>
<!-- footer -->

	<div class="navbar-fixed-bottom footer">
		
		<div class="container">
		
		<p>&copy; Copyright <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>

		</div>
				
	</div>

        </div>
<?php wp_footer(); ?>
	
  </body>
</html>
  