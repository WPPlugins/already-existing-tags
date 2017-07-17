<?php
defined( 'ABSPATH' ) || die( 'Cannot access pages directly.' );

global $aet_included_categories;
?>

<div class="wrap">

<h2>Already Existing Tags</h2>

<?php settings_errors(); ?>

<form action="options.php" method="post">

<?php
settings_fields( 'aet-settings-group' );

if ( get_option( 'aet_automatic_tagging' ) && ! $aet_included_categories ) {
	echo '<h3>Automatic tagging is enabled... but no category is selected</h3>';
} elseif ( get_option( 'aet_automatic_tagging' ) ) {
	echo '<h3>Automatic tagging is enabled</h3>';
} else {
	echo '<h3>Automatic tagging is disabled</h3>';
}
?>

<table class="form-table">
<tr>
<td>
<input type="checkbox" id="aet-automatic-tagging" name="aet_automatic_tagging" value="1"<?php checked( get_option( 'aet_automatic_tagging' ) ); ?> />
<label for="aet-automatic-tagging">Automatic tagging.</label>
</td>
</tr>

<tr>
<td>
<input type="checkbox" id="aet_block_manually_added_tags" name="aet_block_manually_added_tags" value="1"<?php checked( get_option( 'aet_block_manually_added_tags' ) ); ?> />
<label for="aet_block_manually_added_tags">Block manually added tags.</label>
</td>
</tr>

<tr>
<td>
<input type="checkbox" id="aet-examine-post-title" name="aet_examine_post_title" value="1"<?php checked( get_option( 'aet_examine_post_title' ) ); ?> />
<label for="aet-examine-post-title">Examine post title.</label>
</td>
</tr>
</table>

<h3>Included categories</h3>

<table class="form-table">
<tr>
<td>
<input type="checkbox" id="select-all-categories">
<label for="select-all-categories" class="check-all">all</label>
</td>
</tr>
</table>

<div id="categories-container">

<?php
$cat_args = array(
	'hide_empty' => 0,
);
$categories = get_categories( $cat_args );

foreach ( $categories as $key => $value ) {
	echo '<div class="categories-block">' . "\n";
	echo '<input type="checkbox" class="chkbx" id="aet-included-categories-' . esc_attr( $value->term_id ) . '" name="aet_included_categories[]" value="' . esc_attr( $value->term_id ) . '"';

	if ( is_array( $aet_included_categories ) && in_array( $value->term_id, $aet_included_categories, true ) ) {
		echo ' checked="checked"';
	}

	echo ' />' . "\n";
	echo '<label for="aet-included-categories-' . esc_attr( $value->term_id ) . '">' . esc_html( $value->name ) . '</label>' . "\n";
	echo '</div>' . "\n";
}
?>

</div>

<h3>Clean uninstall</h3>

<table class="form-table">
<tr>
<td>
<input type="checkbox" id="aet-clean-uninstall" name="aet_clean_uninstall" value="1"<?php checked( get_option( 'aet_clean_uninstall' ) ); ?> />
<label for="aet-clean-uninstall">Delete all options from database when you delete this plugin (if you only deactivate the plugin, the options won't be deleted).</label>
</td>
</tr>
</table>

<?php submit_button(); ?>

</form>

<h4>Do you like this plugin?</h4>

<ul>
<li>Please, <a href="https://wordpress.org/support/view/plugin-reviews/already-existing-tags" target="_blank">rate it on the repository</a>.</li>
<li>Please, visit <a href="http://www.digitalemphasis.com/donate/" target="_blank">http://www.digitalemphasis.com/donate/</a>.</li>
</ul>

<h4>Thank you!</h4>

</div>
