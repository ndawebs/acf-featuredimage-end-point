<?php 

//Get Featured Image from WordPress REST API 

add_action('rest_api_init', 'register_rest_images' );
function register_rest_images(){
    register_rest_field( array('post'),
        'featured_image_url_large',
        array(
            'get_callback'    => 'get_rest_featured_image_large',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( array('post'),
        'featured_image_url_medium',
        array(
            'get_callback'    => 'get_rest_featured_image_medium',
            'update_callback' => null,
            'schema'          => null,
        )
    );
	    register_rest_field( array('post'),
        'featured_image_url_full',
        array(
            'get_callback'    => 'get_rest_featured_image_full',
            'update_callback' => null,
            'schema'          => null,
        )
    );
	    register_rest_field( array('post'),
        'featured_image_url_thumb',
        array(
            'get_callback'    => 'get_rest_featured_image_thumb',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
function get_rest_featured_image_large( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'large' );
        return $img[0];
    }
    return false;
}
function get_rest_featured_image_medium( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'medium' );
        return $img[0];
    }
    return false;
}
function get_rest_featured_image_full( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'full' );
        return $img[0];
    }
    return false;
}
function get_rest_featured_image_thumb( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'thumbnail' );
        return $img[0];
    }
    return false;
}

?>
