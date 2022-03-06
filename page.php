<?php 
/*
*Single Page Template
*/
get_header(); ?>

<div clas="container">
	<div class="single-post-title">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="content">
		<?php the_content(); ?>

	</div>
</div>

<?php get_footer();?>