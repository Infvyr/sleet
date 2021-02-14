<?php

/*
 * Add SVG support
 * */

// Allow SVG file type
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', 'svg_upload_allow' );

// Edit MIME of SVG files
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {
	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );


	// mime type has been reset, fix it
	// and also check the user rights
	if( $dosvg ){

		// allow
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// deny
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

// Generates data for displaying SVG as images in a media library.
function show_svg_in_media_library( $response ) {
	if ( $response['mime'] === 'image/svg+xml' ) {
		// show the name of SVG file
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );


/*
 * Add vcf or vcard file support
 * */
function theme_enable_vcard_upload( $mime_types ){
	$mime_types['vcf'] = 'text/vcard';
	$mime_types['vcard'] = 'text/vcard';
	return $mime_types;
}
add_filter('upload_mimes', 'theme_enable_vcard_upload' );