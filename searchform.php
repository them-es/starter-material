<?php
/**
 * The template for displaying search forms.
 */
?>
<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="field label prefix border">
		<i>search</i>
		<input type="text" name="s">
		<label><?php esc_html_e( 'Search', 'my-theme' ); ?></label>
	</div><!-- /.field -->
	<!--button type="submit" class="button" style="height: 100%;"><i class="material-icons">search</i></button-->
</form>
