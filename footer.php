<?php
/*
*The Template for displaying the Footer
*/
?>
<?php
$footer = ['footer', 'options']; 
$cta = ['cta_info', 'options'];
$social = ['social_links', 'options'];

?>
<?php if( have_rows('contact_details','options') ): ?>
	<?php while( have_rows('contact_details','options') ): the_row(); 
		$cta_text = get_sub_field('cta_text');
		$phone = get_sub_field('office_number');
		$address_one = get_sub_field('address');
		$address_two = get_sub_field('address_2');
		$email = get_sub_field('email');
	?>

		<section class="footer pt-3 text-secondary">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
						<?php if( have_rows('footer_info','options')): ?>
							<?php while( have_rows('footer_info','options') ): the_row(); 
								$footer_logo = get_sub_field('footer_logo');
								?>
								<a href="#" class="">
								<img class="logo pb-3" id="footer-logo" src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
							</a>
							<?php endwhile; ?>
						<?php endif; ?>
					<!--Import CTA and Footer Field -->
						<div class="address_1">
							<?=$address_one; ?>
						</div>
						<div class="address_2">
							<?=$address_two; ?>
						</div>
						<div class="email">
							<?=$email; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<!--End Left Column-->
			<div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
				<div class="footer-menu">
					<?php 
					wp_nav_menu( array(
						'menu' => 'Footer Menu',
						'theme_location' =>'Footer Menu'
					)); ?>
				</div>
			</div>
			<div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
				<div class="project">
					<button class="btn-project">
						<?=$cta_text;?>
					</button>
				</div>
				<div class="social-media-links d-flex">
					<?php if( have_rows('social_info','options') ): ?>
						<?php while( have_rows('social_info','options') ): the_row(); 
							$social_icon = get_sub_field('social_icon');
							$social_name =get_sub_field('social_name');
							$social_link = get_sub_field('social_link')
							?>
							<a href="<?php echo esc_url( $social_link ); ?>">
								<?=$social_icon;?>
							</a>
							
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php wp_footer(); ?>
</body>
</html>