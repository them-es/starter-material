<?php

/**
 * Core block modification: Button block.
 *
 * @since 3.0.0
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block, including name and attributes.
 *
 * @return string
 */
function themes_starter_button_block( $block_content, $block ): string {
	$attributes = $block['attrs'];

	$processor = new WP_HTML_Tag_Processor( $block_content );

	if ( $processor->next_tag( 'a' ) ) {
		$processor->remove_class( 'wp-block-button__link' );
		$processor->add_class( 'button' );

		if ( str_contains( implode( ' ', $attributes ), 'is-style-outline' ) ) {
			$processor->add_class( 'border' );
		}
	}

	return $processor->get_updated_html();
}
add_filter( 'render_block_core/button', 'themes_starter_button_block', 10, 2 );

/**
 * Core block modification: Media-Text block.
 *
 * @since 3.0.0
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block, including name and attributes.
 *
 * @return string
 */
function themes_starter_media_text_block( $block_content, $block ): string {
	$processor = new WP_HTML_Tag_Processor( $block_content );

	if ( $processor->next_tag( 'figure' ) ) {
		$processor->add_class( 'round' );
	}

	return $processor->get_updated_html();
}
add_filter( 'render_block_core/media-text', 'themes_starter_media_text_block', 10, 2 );
