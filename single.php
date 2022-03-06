<?php
/*
*Single Post Template
*/
get_header(); ?>

<div class="content">
	<div class="container">
		<div class="post-title text-center">
			<h1><?php the_title(); ?>
		</div><!--End of title-->

		<div class="post-content">
			<?php 
			 if(have_posts()) {
			 	while(have_posts()){
			 		the_post(); ?>
			 		<?php
			 	}
			 	wp_reset_postdata();
			 } ?>
			 <?php the_content(); ?>
		</div> <!--End of content-->
	</div>
</div>


<?php get_footer(); ?>
