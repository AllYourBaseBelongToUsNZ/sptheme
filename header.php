<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">
  
    <title>
	<?php wp_title('|', true, 'right');?>
	<?php echo bloginfo('name');?>
	</title>

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	
	<?php wp_head(); ?>
	
  </head>
<div class="preload"><img src="<?php bloginfo('template_directory');?>/images/preloader.gif">
</div>
<script>
jQuery(document).ready(function($){
    $('#page').fadeIn(900);
});

jQuery(function($) {
    $(".preload").fadeOut(1000, function() {
        $(".content").fadeIn(900);        
    });
});

</script>
  <body <?php body_class(); ?>>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
		  <div id="row1">
		  <div class="columns logo"><a class="navbar-brand" href="#"><img class="img-responsive" src="<?php bloginfo('template_directory');?>/images/logo.png" height="150px" width="200px" alt="<?php the_title();?>"></a>
			</div>
		  <div class="columns"><p>Television & Film production</p></div>
		  </div>
		  

        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<?php $args=array(
				'menu' =>'header-menu',
				'menu_class' => 'nav navbar-nav', 
				'container' =>'false'
				);
				
				wp_nav_menu($args);
			?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	
	