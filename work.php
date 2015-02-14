<?php

/**
 * Template Name: Work Gallery Page
 */

 
 get_header(); ?>

    <div class="container work">
      <div class="row">
        <div class="col-md-12">
				<div class="row">
				
				<?php
	
	//get the parameters for an out changing background
        $args = array( 
          'post_type' => 'work'
        );
        $the_query = new WP_Query( $args );

      ?>
	  
	  
		
		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php if(get_field('images')): ?>

		<?php while(the_repeater_field('images')): 
			 $image[] = wp_get_attachment_url(get_sub_field('image'), 'small');
			 $thumb[] = wp_get_attachment_thumb_url(get_sub_field('image'), 'thumbnail');
			
			
			endwhile; endif; ?>
			
		
			
			<div class="col-md-8 work-images"><h1>Images</h1>
	       <div class="container">

  
    <!-- main slider carousel -->
    <div class="row">
        <div class="col-md-12" id="slider">
		
		<?php $videourl = get_field('portfolio_video'); ?>
		<?php if($videourl!=""){ ?>
		
		
		 <div class="col-md-8" id="carousel-bounding-box">
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
							<div class="item active" data-slide-number="0">
								<iframe width="<?php the_field(video_width); ?>px" height="<?php the_field(video_height); ?>px" src="<?php the_field('portfolio_video'); ?>" frameborder="0" allowfullscreen=""></iframe>
							</div>	
								<?php $i=0;?>
								<?php foreach ($image as $images){ ?>
								<?php $i++; ?>
					      
								<div class="item" data-slide-number="<?php echo $i; ?>">
									<img src="<?php echo $images; ?>" >
								</div>
                           
                            <?php } ?>
							</div>

                        <!-- main slider carousel nav controls --> <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>

                        <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                    </div>
                </div>
		
		
		<?php }else{ ?>

		 <div class="col-md-8" id="carousel-bounding-box">
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <?php $index = -1; ?>
							<?php foreach ($image as $images){ ?>
							
					        <?php $index++;?>
							<?php if($index == 0){
							 $active="active";
							}
							else{
							 $active="";
							}
					        ?>
							<div class="item <?php echo $active; ?>" data-slide-number="<?php echo $index; ?>">
                                <img src="<?php echo $images; ?>" >
                            </div>
                           
                            <?php } ?>
                        </div>
                        <!-- main slider carousel nav controls --> <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>

                        <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                    </div>
                </div>
		
		
		
		<?php }?>   
               

        </div>
    </div>
    <!--/main slider carousel-->
	
        
    </div>

</div>
	
					

					<div class="col-md-4 word-description">
					<h1><?php the_title(); ?></h1>
					<BR>
					<p><?php the_field('short_description'); ?></p>
					<br>
					<p><?php the_field('long_description'); ?></p>
					
					</div>
			  </div>
		 
        </div>
		 <?php endwhile; endif; ?>
		<?php //get_sidebar(); ?>
		
      </div>

<? get_footer();

