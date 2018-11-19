<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$desc_length = sanitize_text_field( $_POST[ 'desc_length' ] );
$type = sanitize_text_field( $_POST[ 'type' ] );
if ( $type == 'category' ) {
    $args = array(
        'posts_per_page' => -1 ); //get all posts
} else if ( $type == 'tag' ) {
    $tags = get_tags();
    foreach ( $tags as $tag ) {
        $tag_name = $tag -> slug;
        $args = array(
            'tag' => $tag_name,
            'posts_per_page' => -1,
            'order' => 'DESC',
            'orderby' => 'ID',
        );
        $selected_posts = get_posts( $args );
        $this -> print_array( $selected_posts );
        foreach ( $selected_posts as $post ) {
            $post_id = $post -> ID;
            $post_title = $post -> post_title;
            echo $post_title;
        }
    }
} else if ( $type == 'author' ) {
    $authors = get_users( 'role=author' );
    foreach ( $authors as $author ) {
        $name = $author -> user_login;
        $args = array(
            'author_name' => $name,
            'posts_per_page' => -1,
            'order' => 'DESC',
            'orderby' => 'ID',
        );
        $selected_posts = get_posts( $args );
        $this -> print_array( $selected_posts );
        foreach ( $selected_posts as $post ) {
            $post_id = $post -> ID;
            $post_title = $post -> post_title;
            echo $post_title;
        }
    }
} else {
    $post_types = get_post_types();
    // Post types to exclude
    $exclude = array( 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'wpblogmanager' );
    // Filter out all unwanted post types
    foreach ( $post_types as $key => $value ) {
        if ( in_array( $key, $exclude ) ) {
            unset( $post_types[ $key ] );
        }
    }
    if ( is_array( $post_types ) ) {
        foreach ( $post_types as $key => $value ) {
            $args = array(
                'post_type' => $key,
                'posts_per_page' => -1,
                'order' => 'DESC',
                'orderby' => 'ID',
            );
            $selected_posts = get_posts( $args );
            //$this -> print_array( $selected_posts );
            foreach ( $selected_posts as $post ) {
                $post_id = $post -> ID;
                $post_title = $post -> post_title;
                echo $post_title;
            }
        }
    }
}
$posts = get_posts( $args );
$this -> print_array( $posts );
//foreach ( $posts as $post ) :
//
//endforeach;

