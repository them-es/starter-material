<?php
/**
 * The template for displaying search forms
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<!--label for="s" class="assistive-text"><?php _e( 'Search', 'my-theme' ); ?></label-->
	<div class="mdc-text-field mdc-text-field--fullwidth" data-mdc-auto-init="MDCTextField">
		<label class="mdc-button mdc-button--icon" for="s">
			<i class="material-icons">search</i>
		</label>
		<div class="mdc-text-field__expandable-holder">
			<input type="text" name="s" id="s" class="mdc-text-field__input" />
			<label class="mdc-text-field__label" for="s"><?php _e( 'Search', 'my-theme' ); ?></label>
		</div><!-- /.mdc-text-field__expandable-holder -->
	</div><!-- /.mdc-text-field -->
</form>