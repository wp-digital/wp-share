<?php

add_action( 'save_post', function( $post_id ) {

    if( 'publish' == get_post_status( $post_id ) && $url = get_the_permalink( $post_id ) ) {

        $fb_url = "https://graph.facebook.com/?id={$url}&scrape=true";
        wp_remote_get( $fb_url, ['timeout' => 3, 'blocking' => false] );
    }
});
