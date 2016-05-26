<?php

/*
Plugin Name: Share fix
Description: WordPress plugin for fixing social sharing issues
Version: 1.2
Plugin URI: https://github.com/shtrihstr/wp-share
Author: Oleksandr Strikha
Author URI: https://github.com/shtrihstr
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action( 'save_post', function( $post_id ) {

    if( 'publish' == get_post_status( $post_id ) && $url = get_the_permalink( $post_id ) ) {

        $fb_url = "https://graph.facebook.com/?id={$url}&scrape=true";
        wp_remote_get( $fb_url, ['blocking' => false] );
    }
});
