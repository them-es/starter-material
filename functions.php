<?php

$theme_version = wp_get_theme()->get( 'Version' );

/**
 * Include Theme Customizer
 *
 * @since v1.0
 */
$theme_customizer = get_template_directory() . '/inc/customizer.php';
if ( is_readable( $theme_customizer ) ) {
	require_once $theme_customizer;
}


/**
 * Include Support for wordpress.com-specific functions.
 *
 * @since v1.0
 */
$theme_wordpresscom = get_template_directory() . '/inc/wordpresscom.php';
if ( is_readable( $theme_wordpresscom ) ) {
	require_once $theme_wordpresscom;
}


/**
 * Set the content width based on the theme's design and stylesheet
 *
 * @since v1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}


/**
 * General Theme Settings
 *
 * @since v1.0
 */
if ( ! function_exists( 'themes_starter_setup_theme' ) ) :
	function themes_starter_setup_theme() {

		// Make theme available for translation: Translations can be filed in the /languages/ directory
		load_theme_textdomain( 'my-theme', get_template_directory() . '/languages' );

		// Theme Support
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Date/Time Format
		$theme_dateformat = get_option( 'date_format' );
		$theme_timeformat = 'H:i';

		// Default Attachment Display Settings
		update_option( 'image_default_align', 'none' );
		update_option( 'image_default_link_type', 'none' );
		update_option( 'image_default_size', 'large' );

		// Custom CSS-Styles of Wordpress Gallery
		add_filter( 'use_default_gallery_style', '__return_false' );

	}
	add_action( 'after_setup_theme', 'themes_starter_setup_theme' );
endif;


/**
 * Fire the wp_body_open action.
 *
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 *
 * @since v2.1
 */
if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since v2.1
		 */
		do_action( 'wp_body_open' );
	}
endif;


/**
 * Add new User fields to Userprofile
 *
 * @since v1.0
 */
if ( ! function_exists( 'themes_starter_add_user_fields' ) ) :
	function themes_starter_add_user_fields( $fields ) {
		// Add new fields
		$fields['facebook_profile'] = 'Facebook URL';
		$fields['twitter_profile'] = 'Twitter URL';
		$fields['linkedin_profile'] = 'LinkedIn URL';
		$fields['xing_profile'] = 'Xing URL';
		$fields['github_profile'] = 'GitHub URL';

		return $fields;
	}
	add_filter( 'user_contactmethods', 'themes_starter_add_user_fields' );
endif;


/**
 * Test if a page is a blog page
 * if ( is_blog() ) { ... }
 *
 * @since v1.0
 */
function is_blog() {
	global $post;
	$posttype = get_post_type( $post );

	return ( ( is_archive() || is_author() || is_category() || is_home() || is_single() || ( is_tag() && ( 'post' === $posttype ) ) ) ? true : false );
}


/**
 * Get the page number
 *
 * @since v1.0
 */
function get_page_number() {
	if ( get_query_var( 'paged' ) ) {
		print ' | ' . __( 'Page ' , 'my-theme') . get_query_var( 'paged' );
	}
}


/**
 * Disable comments for Media (Image-Post, Jetpack-Carousel, etc.)
 *
 * @since v1.0
 */
function themes_starter_filter_media_comment_status( $open, $post_id = null ) {
	$media_post = get_post( $post_id );
	if ( 'attachment' === $media_post->post_type ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'themes_starter_filter_media_comment_status', 10, 2 );


/**
 * Responsive oEmbed filter: http://getbootstrap.com/components/#responsive-embed
 *
 * @since v1.0
 */
function themes_starter_oembed_filter( $html ) {
	$output = '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
	return $output;
}
add_filter( 'embed_oembed_html', 'themes_starter_oembed_filter', 10, 4 );


if ( ! function_exists( 'themes_starter_content_nav' ) ) :
	/**
	 * Display a navigation to next/previous pages when applicable
	 *
	 * @since v1.0
	 */
	function themes_starter_content_nav( $nav_id ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) :
	?>
			<nav id="<?php echo $nav_id; ?>" class="blog-nav mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
				<?php next_posts_link( '<i class="material-icons mdc-button__icon" aria-hidden="true">arrow_back</i> ' . __( 'Older posts', 'my-theme' ) ); ?>
				<div class="mdc-layout-spacer"></div>
				<?php previous_posts_link( __( 'Newer posts', 'my-theme' ) . ' <i class="material-icons mdc-button__icon" aria-hidden="true">arrow_forward</i>' ); ?>
			</nav><!-- /.blog-nav -->
	<?php
		endif;
	}

	// Add Class
	function posts_link_attributes() {
		return 'class="mdc-button"';
	}
	add_filter( 'next_posts_link_attributes', 'posts_link_attributes' );
	add_filter( 'previous_posts_link_attributes', 'posts_link_attributes' );

endif;


/**
 * Init Widget areas in Sidebar
 *
 * @since v1.0
 */
function themes_starter_widgets_init() {
	// Area 1
	register_sidebar(
		array(
			'name'          => 'Primary Widget Area (Sidebar)',
			'id'            => 'primary_widget_area',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 2
	register_sidebar(
		array(
			'name'          => 'Secondary Widget Area (Sidebar)',
			'id'            => 'secondary_widget_area',
			'before_widget' => '<div class="mdc-layout-grid__cell">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'themes_starter_widgets_init' );


if ( ! function_exists( 'themes_starter_article_posted_on' ) ) :
	/**
	 * "Theme posted on" pattern
	 *
	 * @since v1.0
	 */
	function themes_starter_article_posted_on() {
		global $theme_dateformat, $theme_timeformat;

		printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author-meta vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'my-theme' ),
			esc_url( get_the_permalink() ),
			esc_attr( get_the_date( $theme_dateformat ) . ' - ' . get_the_time( $theme_timeformat ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( $theme_dateformat ) . ' - ' . get_the_time( $theme_timeformat ) ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'my-theme' ), get_the_author() ) ),
			get_the_author()
		);

	}
endif;


/**
 * Template for Password protected post form
 *
 * @since v1.0
 */
function themes_starter_password_form() {
	global $post;
	$label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );

	$output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
		$output .= '<div class="mdc-layout-grid">';
			$output .= '<div class="mdc-layout-grid__inner">';
				$output .= '<h4 class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">' . __( 'This content is password protected. To view it please enter your password below.', 'my-theme' ) . '</h4>';
				$output .= '<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-12-phone">';
					$output .= '<div class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField">';
						$output .= '<input type="password" id="post_password" name="post_password" id="' . $label . '" class="mdc-text-field__input" />';
						$output .= '<div class="mdc-notched-outline">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
							<label for="post_password" class="mdc-floating-label">' . __( 'Password', 'my-theme' ) . '</label>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
						</div>';
						$output .= '<input type="submit" name="submit" class="mdc-button mdc-button--raised" value="' . esc_attr( __( 'Submit', 'my-theme' ) ) . '" />';
					$output .= '</div><!-- /.mdc-text-field -->';
				$output .= '</div><!-- /.mdc-cell -->';
			$output .= '</div><!-- /.mdc-grid__inner -->';
		$output .= '</div><!-- /.mdc-grid -->';
	$output .= '</form>';

	return $output;
}
add_filter( 'the_password_form', 'themes_starter_password_form' );


if ( ! function_exists( 'themes_starter_comment' ) ) :

	/**
	 * Style Reply link
	 *
	 * @since v1.0
	 */
	function themes_starter_replace_reply_link_class( $class ) {
		$output = str_replace( "class='comment-reply-link", "class='comment-reply-link mdc-button mdc-button--stroked", $class );
		return $output;
	}
	add_filter( 'comment_reply_link', 'themes_starter_replace_reply_link_class' );

	/**
	 * Template for comments and pingbacks:
	 * add function to comments.php ... wp_list_comments( array( 'callback' => 'themes_starter_comment' ) );
	 *
	 * @since v1.0
	 */
	function themes_starter_comment( $comment, $args, $depth ) {
		global $theme_dateformat, $theme_timeformat;

		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
	?>
		<li class="post pingback">
			<p><?php _e( 'Pingback:', 'my-theme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
				break;
			default :
	?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php
							$avatar_size = ( '0' !== $comment->comment_parent ? 68 : 136 );
							echo get_avatar( $comment, $avatar_size );
							
							/* translators: 1: comment author, 2: date and time */
							printf( __( '%1$s, %2$s', 'my-theme' ),
								sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
								sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									get_comment_time( 'c' ),
									/* translators: 1: date, 2: time */
									//sprintf( __( '%1$s - %2$s', 'my-theme' ), get_comment_time( $theme_dateformat ), get_comment_time( $theme_timeformat ) )
									sprintf( __( '%1$s ago', 'my-theme' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) )
								)
							);
						?>

						<?php
							edit_comment_link( __( 'Edit', 'my-theme' ), '<span class="edit-link">', '</span>' );
						?>
					</div><!-- .comment-author .vcard -->

					<?php if ( '0' === $comment->comment_approved ) : ?>
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'my-theme' ); ?></em>
						<br />
					<?php endif; ?>

				</footer>

				<div class="comment-content"><?php comment_text(); ?></div>

				<div class="reply">
					<?php
						comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'my-theme' ) . ' <i class="material-icons">reply</i>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
					?>
				</div><!-- .reply -->
			</article><!-- #comment-## -->

		<?php
				break;
		endswitch;

	}

	/**
	 * Custom Comment form
	 *
	 * @since v1.0
	 * @since v1.1: 'submit_button' and 'submit_field'
	 * @since v2.0: Added '$consent' and 'cookies'
	 */
	function themes_starter_custom_commentform( $args = array(), $post_id = null ) {
		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		$commenter = wp_get_current_commenter();
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';

		$args = wp_parse_args( $args );

		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true' required" : '' );
		$consent  = ( empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"' );
		$fields = array(
			'author'   => '<div class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField">
							<input type="text" id="author" name="author" class="mdc-text-field__input" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />
							<div class="mdc-notched-outline">
								<div class="mdc-notched-outline__leading"></div>
								<div class="mdc-notched-outline__notch">
									<label for="author" class="mdc-floating-label">' . __( 'Name', 'my-theme' ) . '</label>
								</div>
								<div class="mdc-notched-outline__trailing"></div>
							</div>
						</div>',
			'email'   => '<div class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField">
							<input type="email" id="email" name="email" class="mdc-text-field__input" value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . $aria_req . ' />
							<div class="mdc-notched-outline">
								<div class="mdc-notched-outline__leading"></div>
								<div class="mdc-notched-outline__notch">
									<label for="email" class="mdc-floating-label">' . __( 'Email', 'my-theme' ) . '</label>
								</div>
								<div class="mdc-notched-outline__trailing"></div>
							</div>
						</div>',
			'url'     => '',
			'cookies' => '<div class="mdc-form-field">
							<div class="mdc-checkbox">
								<input type="checkbox" class="mdc-checkbox__native-control" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes"' . $consent . ' />
								<div class="mdc-checkbox__background">
									<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
										<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59" />
									</svg>
									<div class="mdc-checkbox__mixedmark"></div>
								</div>
							</div>
							<label for="wp-comment-cookies-consent">' . __( 'Save my name, email, and website in this browser for the next time I comment.', 'my-theme' ) . '</label>
						</div>',
		);

		$fields = apply_filters( 'comment_form_default_fields', $fields );
		$defaults = array(
			'fields'               => $fields,
			'comment_field'        => '<div class="mdc-text-field mdc-text-field--textarea" data-mdc-auto-init="MDCTextField">
										<textarea id="comment" name="comment" class="mdc-text-field__input" rows="3" aria-required="true" required></textarea>
											<div class="mdc-notched-outline">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
													<label class="mdc-floating-label" for="comment">' . __( 'Comment', 'my-theme' ) . '</label>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</div>',
			/** This filter is documented in wp-includes/link-template.php */
			'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'my-theme' ), wp_login_url( apply_filters( 'the_permalink', get_the_permalink( get_the_ID() ) ) ) ) . '</p>',
			/** This filter is documented in wp-includes/link-template.php */
			'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'my-theme' ), get_edit_user_link(), $user->display_name, wp_logout_url( apply_filters( 'the_permalink', get_the_permalink( get_the_ID() ) ) ) ) . '</p>',
			'comment_notes_before' => '',
			'comment_notes_after'  => '<p class="small comment-notes">' . __( 'Your Email address will not be published.', 'my-theme' ) . '</p>',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_submit'         => 'mdc-button mdc-button--raised',
			'name_submit'          => 'submit',
			'title_reply'          => '',
			'title_reply_to'       => __( 'Leave a Reply to %s', 'my-theme' ),
			'cancel_reply_link'    => __( 'Cancel reply', 'my-theme' ),
			'label_submit'         => __( 'Post Comment', 'my-theme' ),
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			'submit_field'         => '<div class="form-submit">%1$s %2$s</div>',
			'format'               => 'html5',
		);

		return $defaults;
	}
	add_filter( 'comment_form_defaults', 'themes_starter_custom_commentform' );

endif;


/**
 * Nav menus
 *
 * @since v1.0
 */
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main-menu'   => 'Main Navigation Menu',
			'footer-menu' => 'Footer Menu',
		)
	);
}

// Custom Nav Walker: mdc_navwalker()
$custom_walker = get_template_directory() . '/inc/mdc_navwalker.php';
if ( is_readable( $custom_walker ) ) {
	require_once $custom_walker;
}


/**
 * Loading All CSS Stylesheets and Javascript Files
 *
 * @since v1.0
 */
function themes_starter_scripts_loader() {
	global $theme_version;

	// 1. Styles
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, $theme_version, 'all' );
	wp_enqueue_style( 'robotofont', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700', false, $theme_version, 'all' );
	wp_enqueue_style( 'materialiconsfont', '//fonts.googleapis.com/icon?family=Material+Icons', false, $theme_version, 'all' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', false, $theme_version, 'all' ); // main.scss: Compiled Framework source + custom styles

	if ( is_rtl() ) {
		wp_enqueue_style( 'rtl', get_template_directory_uri() . '/assets/css/rtl.css', false, $theme_version, 'all' );
	}

	// 2. Scripts
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/js/main.bundle.js', false, $theme_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themes_starter_scripts_loader' );
