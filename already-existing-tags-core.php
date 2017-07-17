<?php
defined( 'ABSPATH' ) || die( 'Cannot access pages directly.' );

get_option( 'aet_included_categories' ) ? $aet_included_categories = array_map( function( $cat_id ) {
	return + $cat_id;
}, get_option( 'aet_included_categories' ) ) : $aet_included_categories = array();

function automatic_tagging( $the_post_id ) {
	global $aet_included_categories;

	$post = get_post( $the_post_id );

	if ( 'post' === $post->post_type ) {

		get_the_terms( $the_post_id, 'category' ) ? $post_categories = wp_list_pluck( get_the_terms( $the_post_id, 'category' ), 'term_id' ) : $post_categories = array();

		if ( get_option( 'aet_examine_post_title' ) ) {
			$the_post_title = get_post( $the_post_id )->post_title;
			$the_post_title = wp_strip_all_tags( $the_post_title );
		}

		$the_post_content = get_post( $the_post_id )->post_content;
		$the_post_content = wp_strip_all_tags( $the_post_content );
		$existing_tags = get_terms( 'post_tag', array(
			'hide_empty' => false,
		) );

		if ( $existing_tags && array_intersect( $post_categories, $aet_included_categories ) ) {
			if ( get_option( 'aet_block_manually_added_tags' ) ) {
				wp_delete_object_term_relationships( $the_post_id, 'post_tag' );
			}
			foreach ( $existing_tags as $newtag ) {
				$pattern = preg_quote( $newtag->name, '/' );
				$pattern = '/\b' . $pattern . '\b/ui';

				if ( get_option( 'aet_examine_post_title' ) ) {
					if ( preg_match( $pattern, $the_post_title ) ) {
						wp_set_post_terms( $the_post_id, $newtag->name, 'post_tag', true );
					}
				}
				if ( preg_match( $pattern, $the_post_content ) ) {
					wp_set_post_terms( $the_post_id, $newtag->name, 'post_tag', true );
				}
			}
		}
	}// End if().
}

if ( get_option( 'aet_automatic_tagging' ) ) {
	add_action( 'wp_insert_post', 'automatic_tagging' );
}
