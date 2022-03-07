<?php
/*
*The Template for displaying the header
*/
?>
<!DOCTYPE html>
<hmtl <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title( '|', true, 'right'); ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<p><?php bloginfo('description'); ?></p>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pyxel">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/pyxel-logo.jpg">
    <script src="https://kit.fontawesome.com/972095d2b9.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <?php $header = ['header', 'options']; 
      ?>
      <?php if( have_rows('header_info','options') ): ?>
        <?php while( have_rows('header_info','options') ): the_row(); 
          $logo = get_sub_field('logo');
          ?>

          <nav class="navbar navbar-expand-xxl navbar-dark navbar-toggleable-xxl navbar-collapse">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <img class="logo" id="site-logo" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
              <a class="navbar-brand" href="#"><button class="btn-cta" data-aos="zoom-in">Let's talk</button></a>
              <div class="collapse navbar-collapse" id="navbarNav">
                <div class="row pt-2 text-center" data-aos="zoom-in">
                  <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="navmenu-left">
                      <div class="navbar-title text-white text-center font-size-lg pb-4">Menu</div>
                      <!--Primary Menu-->
                      <?php
                      wp_nav_menu( array(
                       'menu' => 'Menu Nav'
                     )); ?>

                      <!--Project Button to Landing Page-->
                     <div class="create-project text-center text-white">
                      <button class="btn-project text-white" src="">Start a Project</button>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12 bg-white">
                  <div class="navmenu-right bg-white text-dark" data-aos="zoom-in">

                    <!--Post Display here using slideshow, or get post by id-->

                    <?php
                    query_posts('cat=2&showposts=10');
                    if (have_posts()) : while (have_posts()) : the_post(); ?>      
                      <div class="timeline">
                        <p>Latest Posts</p>
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                        <div class="readMore">More..</div>
                      <?php endwhile; else: ?>
                      <?php _e('No Posts Sorry.'); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    <?php endwhile; ?>
  <?php endif; ?>
</header>



