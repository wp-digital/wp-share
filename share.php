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

if ( defined( 'FACEBOOK_SHARE_APP_ID' ) && defined( 'FACEBOOK_SHARE_APP_SECRET' ) ) {
    add_action( 'save_post', function ( $post_id ) {
        if ( 'publish' == get_post_status( $post_id ) && $url = get_the_permalink( $post_id ) ) {
            $fb_url       = "https://graph.facebook.com/";
            $access_token = FACEBOOK_SHARE_APP_ID . "|" . FACEBOOK_SHARE_APP_SECRET;
            wp_remote_post( $fb_url, [
                'body'     => [
                    'id'           => $url,
                    'scrape'       => true,
                    'access_token' => $access_token
                ],
                'blocking' => false
            ] );
        }

    } );
}


