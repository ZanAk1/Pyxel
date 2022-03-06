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
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header>
			<?php $header = ['header', 'options']; 
			$cta_info = ['cta_info','options']; ?>

			<nav class="navbar navbar-dark bg-dark navbar-toggleable-lg navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">
  	


  </a>
  <div class="collapse navbar-collapse justify-content-between" id="navbar">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#">Ball Bearings</a>
      <a class="nav-item nav-link" href="#">TNT Boxes</a>
    </div>
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#">Logout</a>
    </div>
  </div>
</nav>




		</header>
		


