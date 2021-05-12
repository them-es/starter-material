<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_position = get_theme_mod( 'navbar_position', 'fixed' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class( 'mdc-typography' ); ?>>

<?php wp_body_open(); ?>

<div id="wrapper">
	<header id="header" class="mdc-top-app-bar mdc-top-app-bar--<?php echo esc_attr( $navbar_position ); ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
		<div class="mdc-top-app-bar__row">
			<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
				<a href="<?php echo esc_url( home_url() ); ?>" class="mdc-top-app-bar__title" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php
					$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

					if ( ! empty( $header_logo ) ) :
				?>
					<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				<?php
					else :
						echo esc_attr( get_bloginfo( 'name', 'display' ) );
					endif;
				?>
				</a>
			</section>

			<?php
				if ( '1' === $search_enabled ) :
			?>
				<section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">
					<form class="mdc-form-field mdc-form-field--align-end search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label class="mdc-text-field mdc-text-field--outlined mdc-text-field--no-label" data-mdc-auto-init="MDCTextField">
							<input type="text" name="s" class="mdc-text-field__input" title="<?php esc_attr_e( 'Search', 'my-theme' ); ?>" />
							<button type="submit" class="mdc-icon-button material-icons">search</button>
						</label>
					</form>
				</section>
			<?php
				endif;
			?>
		</div><!-- /.mdc-top-app-bar__row -->

		<div id="tab-bar-menu" class="mdc-tab-bar" role="tablist">
			<div class="mdc-tab-scroller">
				<div class="mdc-tab-scroller__scroll-area">
					<nav id="scrollable-tab-bar-menu" class="mdc-tab-scroller__scroll-content">
						<?php
							// Loading WordPress Custom Menu (theme_location).
							wp_nav_menu(
								array(
									'theme_location' => 'main-menu',
									'container'      => '',
									'items_wrap'     => '%3$s',
									'depth'          => 1,
									//'fallback_cb'    => 'WP_MDC_Navwalker::fallback',
									'walker'         => new WP_MDC_Navwalker(),
								)
							);
						?>
					</nav>
				</div>
			</div><!-- /.mdc-tab-scroller -->
		</div><!-- /.mdc-tab-bar -->
	</header><!-- /#header -->

	<main id="main" class="mdc-layout-grid<?php if ( 'fixed' === $navbar_position ) : echo ' mdc-top-app-bar--prominent-fixed-adjust'; endif; ?>">
		<div class="mdc-layout-grid__inner">
