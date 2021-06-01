<?php
/**
 * The template for displaying search forms.
 */
?>
<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="mdc-text-field mdc-text-field--outlined" data-mdc-auto-init="MDCTextField">
		<span class="mdc-notched-outline">
			<span class="mdc-notched-outline__leading"></span>
			<span class="mdc-notched-outline__notch">
				<span class="mdc-floating-label"><?php esc_html_e( 'Search', 'my-theme' ); ?></span>
			</span>
			<span class="mdc-notched-outline__trailing"></span>
		</span>
		<input type="text" name="s" class="mdc-text-field__input">
		<button type="submit" class="mdc-button mdc-button--raised" style="height: 100%;"><i class="mdc-icon-button material-icons">search</i></button>
	</label><!-- /.mdc-text-field -->
</form>
