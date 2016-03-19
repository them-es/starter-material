<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<?php
	$navbar_position = get_theme_mod('navbar_position', 'scroll'); // get custom meta-value
	
    $search_enabled = get_theme_mod('search_enabled', '1'); // get custom meta-value
?>

<body <?php body_class(); ?>>

<div id="wrapper" class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-100">
	
	<header id="header" class="mdl-layout__header mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
	
    <!-- Top row, always visible -->
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">
        <a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <?php
          $header_logo = get_theme_mod('header_logo'); // get custom meta-value

          if ( isset($header_logo) && $header_logo != "" ):
        ?>
          <img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
        <?php
          else:

            echo esc_attr( get_bloginfo( 'name', 'display' ) );

          endif;
        ?>
        </a>
      </span>

      <div class="mdl-layout-spacer"></div>

        <?php if ( isset($search_enabled) && $search_enabled == "1" ) : ?>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <label class="mdl-button mdl-js-button mdl-button--icon" for="s"><i class="material-icons">search</i></label>
              <div class="mdl-textfield__expandable-holder">
                <input type="text" id="s" name="s" class="mdl-textfield__input">
              </div>
            </form>
          </div>
        <?php endif; ?>

      </div><!-- /.mdl-layout__header-row (top) -->

      <!-- Bottom row, not visible on scroll -->
      <div class="mdl-layout__header-row mdl-layout__header-row--bottom">
        <!-- Navigation -->
		<div class="mdl-navigation__container">
			<nav class="mdl-navigation">
			  <?php
				/** Loading WordPress Custom Menu (theme_location) **/
				wp_nav_menu( array(
				  'theme_location'  => 'main-menu',
				  'container'       => '',
				  'items_wrap'      => '%3$s',
				  'depth'           => 1,
				  //'fallback_cb'     => 'mdl_navwalker::fallback',
				  'walker'          => new mdl_navwalker()
				) );
			  ?>
			</nav>
		</div>
		<i class="material-icons scrollindicator scrollindicator--right">keyboard_arrow_right</i>
		<i class="material-icons scrollindicator scrollindicator--left">keyboard_arrow_left</i>
      </div><!-- /.mdl-layout__header-row (bottom) -->

	</header><!-- /#header -->

	<div id="main" class="mdl-layout__content">
    	<div class="mdl-grid content">