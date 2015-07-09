<?php
/**
 * The template for displaying search forms
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<!--label for="s" class="assistive-text"><?php _e( 'Search', 'my-theme' ); ?></label-->
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
		<label class="mdl-button mdl-js-button mdl-button--icon" for="s">
			<i class="material-icons">search</i>
		</label>
		<div class="mdl-textfield__expandable-holder">
			<input type="text" name="s" id="s" class="mdl-textfield__input" />
			<label class="mdl-textfield__label" for="s"><?php _e( 'Search', 'my-theme' ); ?></label>
		</div><!-- /.mdl-textfield__expandable-holder -->
	</div><!-- /.mdl-textfield -->
</form>