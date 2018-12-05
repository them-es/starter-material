<?php
/**
 * Author description
 */

	if ( get_the_author_meta( 'description' ) ) :
?>
	<div class="author-info">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--3-col mdl-cell--12-col-phone text-center author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themes_starter_author_bio_avatar_size', 128 ) ); ?>
			</div><!-- /.author-avatar -->
			<div class="mdl-cell mdl-cell--9-col mdl-cell--12-col-phone author-description">
				<h2><?php printf( __( 'About %s', 'my-theme' ), get_the_author() ); ?></h2>
				<p><?php the_author_meta( 'description' ); ?></p>
				<p class="author-links">
					<?php
						if ( ! empty( get_the_author_meta( 'user_url' ) ) ) :
							printf( '<a href="%s" class="www mdl-button mdl-js-button">' . __( 'Website', 'my-theme' ) . '</a>', esc_url( get_the_author_meta( 'user_url' ) ) );
						endif;
						
						// Add new Profile fields for Users in functions.php
						$fields = array(
							array(
								'meta' => 'facebook_profile',
								'label' => 'Facebook',
							),
							array(
								'meta' => 'twitter_profile',
								'label' => 'Twitter',
							),
							array(
								'meta' => 'google_profile',
								'label' => 'Google+',
							),
							array(
								'meta' => 'linkedin_profile',
								'label' => 'LinkedIn',
							),
							array(
								'meta' => 'xing_profile',
								'label' => 'Xing',
							),
							array(
								'meta' => 'github_profile',
								'label' => 'GitHub',
							),
						);
				
						foreach ( $fields as $key => $data ) {
							$link = get_the_author_meta( esc_attr( $data['meta'] ) );
							if ( ! empty( $link ) ) {
								$label = esc_html( $data['label'] );
								echo ' <a href="' . esc_url( $link ) . '" class="mdl-button mdl-js-button" title="' . $label . '">' . $label . '</a> ';
							}
						}
					?>
				</p>
			</div><!-- /.author-description	-->
		</div><!-- /.row -->
	</div><!-- /.author-info -->

	<hr>

<?php endif; ?>
