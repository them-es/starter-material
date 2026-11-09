<?php
/**
 * Author description.
 */

if ( get_the_author_meta( 'description' ) ) :
	?>
<div class="author-info">
	<p>
		<a href="<?php echo esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) ); ?>">
			<?php
				echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themes_starter_author_bio_avatar_size', is_author() ? 128 : 32 ) );

			if ( ! is_author() ) {
				echo get_the_author();
			}
			?>
		</strong>
	</p>
	<p class="author-description">
		<?php the_author_meta( 'description' ); ?>
	</p>
	<p class="author-links">
		<?php
		if ( ! empty( get_the_author_meta( 'user_url' ) ) ) {
			printf( '<a href="%s" class="www button border">' . esc_html__( 'Website', 'my-theme' ) . '</a>', esc_url( get_the_author_meta( 'user_url' ) ) );
		}

		// Add new Profile fields for Users in functions.php
		$fields = array(
			array(
				'meta'  => 'facebook_profile',
				'label' => 'Facebook',
			),
			array(
				'meta'  => 'twitter_profile',
				'label' => 'Twitter',
			),
			array(
				'meta'  => 'linkedin_profile',
				'label' => 'LinkedIn',
			),
			array(
				'meta'  => 'xing_profile',
				'label' => 'Xing',
			),
			array(
				'meta'  => 'github_profile',
				'label' => 'GitHub',
			),
		);

		foreach ( $fields as $key => $data ) {
			$author_link = get_the_author_meta( esc_attr( $data['meta'] ) );
			if ( ! empty( $author_link ) ) {
				$label = $data['label'];
				echo ' <a href="' . esc_url( $author_link ) . '" class="button border" title="' . esc_attr( $label ) . '">' . esc_html( $label ) . '</a> ';
			}
		}
		?>
	</p>
</div><!-- /.author-info -->
	<?php
	endif;
