<?php

/*
 * Social media made with ACF
 * */

// get media network by value
function get_social_network_by_value($arr){
	return $arr['value'];
}

// get media network by label
function get_social_network_by_label($arr){
	return $arr['label'];
}

// display social media HTML
function the_social_media(){
	$socials = get_field( 'social_network', 'option' );

	if( $socials ){
		echo '<ul class="social-networks">';
		foreach ( $socials as $social ) {
			$name = $social['name'];
			$url = $social['url'];
			?>

			<li class="social-networks__item <?php echo esc_attr(get_social_network_by_value( $name )); ?>">
				<a href="<?php echo esc_url($url); ?>" class="social-networks__link" title="<?php echo esc_attr(get_social_network_by_label( $name )); ?>" target="_blank">
                    <span class="icon icon-<?php echo esc_attr(get_social_network_by_value( $name )); ?>"></span>
				</a>
			</li>

			<?php
		}
		echo '</ul>';
	}
}