<?php
/**
 * Author description
 */

	if ( get_the_author_meta( 'description' ) ) :
?>
	<div class="author-info">
		<div class="mdl-grid">
			<div id="author-avatar" class="mdl-cell mdl-cell--3-col mdl-cell--12-col-phone text-center">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themes_starter_author_bio_avatar_size', 128 ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description" class="mdl-cell mdl-cell--9-col mdl-cell--12-col-phone">
				<h2><?php printf( __( 'About %s', 'my-theme' ), get_the_author() ); ?></h2>
				<p><?php the_author_meta( 'description' ); ?></p>
				<p id="author-links">
					<?php
						if ( !empty(get_the_author_meta('user_url')) ):
							printf( '<a href="%s" class="www mdl-button mdl-js-button">' . __('Website', 'my-theme' ) . '</a>', esc_url( get_the_author_meta( 'user_url' ) ) );
						endif;
					?>
					<?php
						// Add new Profile fields for Users in functions.php
						function social_profile_link( $link, $title ) {
							echo ' <a href="' . esc_url( $link ) . '" class="mdl-button mdl-js-button" title="' . $title . '">' . $title . '</a> ';
						}

						$facebook = get_the_author_meta('facebook_profile');
						if( !empty($facebook) ) {
							social_profile_link( $facebook, "Facebook" );
						}
						$twitter = get_the_author_meta('twitter_profile');
						if( !empty($twitter) ) {
							social_profile_link( $twitter, "Twitter" );
						}
						$google = get_the_author_meta('google_profile');
						if( !empty($google) ) {
							social_profile_link( $google, "Google+" );
						}
						$linkedin = get_the_author_meta('linkedin_profile');
						if( !empty($linkedin) ) {
							social_profile_link( $linkedin, "LinkedIn" );
						}
						$xing = get_the_author_meta('xing_profile');
						if( !empty($xing) ) {
							social_profile_link( $xing, "Xing" );
						}
						$github = get_the_author_meta('github_profile');
						if( !empty($github) ) {
							social_profile_link( $github, "GitHub" );
						}
					?>
				</p>
			</div><!-- #author-description	-->
		</div><!-- /.row -->
	</div><!-- #author-info -->

	<hr>

<?php endif; ?>