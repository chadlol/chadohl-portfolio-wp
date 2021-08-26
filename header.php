<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chad_Ohl_Portfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'chadohl-portfolio' ); ?></a>

    <nav id="navbar">
        <span class="navbar-toggle" id="js-navbar-toggle">
            <i class="fa fa-bars"></i>
        </span>
        <ul class="main-nav" id="js-menu">
            <li>
                <a href="#" class="nav-link"><b>Chad Ohl</b></a>
            </li>
            <li>
                <a href="#work" class="nav-link">Work</a>
            </li>
            <li>
                <a href="#about" class="nav-link">About</a>
            </li>
            <li>
                <a href="#contact" class="nav-link">Contact</a>
            </li>
        </ul>
    </nav>

	<!-- <nav id="site-navigation" class="main-navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
	</nav> -->
	<!-- #site-navigation -->


	<!-- <header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$chadohl_portfolio_description = get_bloginfo( 'description', 'display' );
			if ( $chadohl_portfolio_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $chadohl_portfolio_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div>

	</header> -->
	<!-- #masthead -->
