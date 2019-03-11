<?php
/**
 * The template for displaying search forms
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField">
		<input type="text" name="s" id="s" class="mdc-text-field__input">
		<button type="submit" class="mdc-button mdc-button--raised" style="height: 100%;"><i class="mdc-icon-button material-icons">search</i></button>
		<div class="mdc-notched-outline">
			<div class="mdc-notched-outline__leading"></div>
			<div class="mdc-notched-outline__notch">
				<label for="s" class="mdc-floating-label"><?php _e( 'Search', 'my-theme' ); ?></label>
			</div>
			<div class="mdc-notched-outline__trailing"></div>
		</div>
	</div><!-- /.mdc-text-field -->
</form>