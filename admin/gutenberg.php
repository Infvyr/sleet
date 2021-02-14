<?php

function sleet_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
//	add_theme_support( 'wp-block-styles' );


	// Editor Color Palette
	add_theme_support( 'editor-color-palette', [
		[
			'name'  => __( 'Black', 'sleet' ),
			'slug'  => 'black',
			'color'	=> '#000',
		],
		[
			'name'  => __( 'white', 'sleet' ),
			'slug'  => 'white',
			'color' => '#fff',
		],
		[
			'name'  => __( 'Dark grey', 'sleet' ),
			'slug'  => 'dark-grey',
			'color' => '#363A36',
		],
		[
			'name'  => __( 'Light', 'sleet' ),
			'slug'  => 'light',
			'color' => '#F3F1ED',
		],
		[
			'name'  => __( 'Dark beige', 'sleet' ),
			'slug'  => 'dark-beige',
			'color' => '#D6D1C4',
		],
		[
			'name'	=> __( 'Red', 'sleet' ),
			'slug'	=> 'red',
			'color'	=> '#D0103A',
		],
	]);
}
//add_action( 'after_setup_theme', 'sleet_add_editor_styles' );


function sleet_gutenberg_admin_styles() {
	echo '
        <style>
            /* Main column width */
            .wp-block {
            	padding: 1rem;
                max-width: 60rem;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 80rem;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }
            
            .wp-block.is-selected {
			    background-color: #f0f0f0;
			}
			
			.has-black-color {
			    color: #000
			}
			
			.has-black-background-color {
			    background-color: #000
			}
			
			.has-white-color {
			    color: #fff
			}
			
			.has-white-background-color {
			    background-color: #fff
			}
			
			.has-dark_grey-color {
			    color: #363A36
			}
			
			.has-dark_grey-background-color {
			    background-color: #363A36
			}
			
			.has-light-color {
			    color: #F3F1ED
			}
			
			.has-light-background-color {
			    background-color: #F3F1ED
			}
			
			.has-dark_beige-color {
			    color: #D6D1C4
			}
			
			.has-dark_beige-background-color {
			    background-color: #D6D1C4
			}
			
			.has-red-color {
			    color: #D0103A
			}
			
			.has-red-background-color {
			    background-color: #D0103A
			}
			
        </style>
    ';
}
add_action('admin_head', 'sleet_gutenberg_admin_styles');