<?php

if ( ! function_exists( 'applause_register_brand' ) ) {

    function applause_register_brand() {

        $labels = array(
            'name'              => __( 'Brands', 'storefront' ),
            'singular_name'     => __( 'Brand', 'storefront' ),
            'search_items'      => __( 'Search Brands', 'storefront' ),
            'all_items'         => __( 'All Brands', 'storefront' ),
            'parent_item'       => __( 'Parent Brand', 'storefront' ),
            'parent_item_colon' => __( 'Parent Brand:', 'storefront' ),
            'edit_item'         => __( 'Edit Brand', 'storefront' ),
            'update_item'       => __( 'Update Brand', 'storefront' ),
            'add_new_item'      => __( 'Add New Brand', 'storefront' ),
            'new_item_name'     => __( 'New Brand Name', 'storefront' ),
            'menu_name'         => __( 'Brands', 'storefront' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'brand' ),
        );

        register_taxonomy( 'brand', 'product', $args );

    }

}

add_action( 'init', 'applause_register_brand' );



function applause_add_brand() { 

    the_terms( get_the_id(), 'brand', '<span class="posted_in">Brand: ', ', ', '</span>');

}

add_action( 'woocommerce_product_meta_end', 'applause_add_brand', 10, 0 );
