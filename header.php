<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
	wp_head();
	?>
</head>

<?php
	$color_scheme    = get_theme_mod( 'color_scheme', 'light' ); // Color scheme.
	$navbar_position = get_theme_mod( 'navbar_position', 'left' ); // Get custom meta-value.
	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
	$header_logo     = get_theme_mod( 'header_logo' ); // Get custom meta-value.

	$output_header_logo = get_bloginfo( 'name', 'display' );

if ( ! empty( $header_logo ) ) :
	$output_header_logo = '<a href="' . esc_url( home_url() ) . '" class="site-title" title="' . esc_attr( $output_header_logo ) . '" rel="home"><img src="' . esc_url( $header_logo ) . '" alt="' . esc_attr( $output_header_logo ) . '" /></a>';
endif;
?>

<body <?php body_class( esc_attr( $color_scheme ) ); ?>>

<?php wp_body_open(); ?>

<div>
	<!-- Sidebar "Mobile" -->
	<button id="toggle-sidebar-s" class="s extra circle" data-ui="#sidebar-s">
		<i>menu</i>
	</button>
	<dialog class="primary-container left scroll s" id="sidebar-s">
		<header>
			<div class="top-bar">
				<button class="extra circle transparent" data-ui="#sidebar-s">
					<i>close</i>
				</button>

				<?php
				if ( '1' === $search_enabled ) :
					?>
					<button data-ui="#search-modal" class="extra circle transparent">
						<i>search</i>
					</button>
					<?php
				endif;
				?>
			</div>
		</header>

		<?php
			echo $output_header_logo;
		?>

		<nav>
			<?php
			// Loading WordPress Custom Menu (theme_location).
			wp_nav_menu(
				array(
					'container'      => '',
					'walker'         => new Material_Navwalker(),
					'theme_location' => 'main-menu',
					'items_wrap'     => '<ul class="list">%3$s</ul>',
				)
			);
			?>
		</nav>
	</dialog>

	<!-- Sidebar "Desktop" -->
	<nav id="sidebar" class="primary-container m l scroll max <?php echo esc_attr( $navbar_position ); ?>">
		<header>
			<div class="top-bar">
				<button id="toggle-sidebar" class="m l extra circle transparent">
					<i>menu_open</i>
				</button>

				<?php
				if ( '1' === $search_enabled ) :
					?>
					<button data-ui="#search-modal" class="extra circle transparent">
						<i>search</i>
					</button>
					<?php
				endif;
				?>
			</div>

			<?php
				echo $output_header_logo;
			?>
		</header>
	<?php
		// Loading WordPress Custom Menu (theme_location).
		wp_nav_menu(
			array(
				'container'      => '',
				'walker'         => new Material_Navwalker(),
				'theme_location' => 'main-menu',
				'items_wrap'     => '%3$s',
			)
		);
		?>
	</nav>

	<main id="main" class="responsive large-padding">
	<?php
	if ( ! is_page_template( 'page-full.php' ) ) :
		echo '<div class="grid">';
	endif;

	if ( '1' === $search_enabled ) :
		?>
			<dialog id="search-modal">
				<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="active">
						<div class="field label border">
							<input type="text" name="s" title="<?php esc_attr_e( 'Search', 'my-theme' ); ?>" />
							<label><?php esc_html_e( 'Search', 'my-theme' ); ?></label>
						</div>
					</div>
				</form>
			</dialog>
		<?php
		endif;
