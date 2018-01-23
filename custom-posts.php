<?php
/*
Plugin Name: Contenidos principales para multimedia de mercadeo digital
Description: Simple plugin que agrega custom post types al material multimedia de Mercadeo
Version: 0.1.0
Author: Universidad Estatal a Distancia - PEM
Author URI: http://mariobadilla.com
GitHub Plugin URI: https://github.com/marbaque/flexieduca-custom-posts
*/
function my_custom_posttypes() {

    //Contenidos multimedia
    $labels = array(
        'name' => 'Contenido multimedia',
        'singular_name' => 'Contenido multimedia',
        'menu_name' => 'Contenido multimedia',
        'name_admin_bar' => 'Contenido multimedia',
        'add_new' => 'Agregar contenido nuevo',
        'add_new_item' => 'Agregar página de contenido',
        'new_item' => 'Nueva página de contenido',
        'edit_item' => 'Editar contenido multimedia',
        'view_item' => 'Ver',
        'all_items' => 'Todo el contenido',
        'search_items' => 'Buscar páginas de contenido',
        'parent_item_colon' => 'Página de contenidos principales:',
        'not_found' => 'No se encontraron páginas de contenido.',
        'not_found_in_trash' => 'No hay páginas de contenidos en el basurero.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-book',
        'query_var' => true,
        'rewrite' => array('slug' => 'contenidos'),
        'capability_type' => 'page',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions',
            'page-attributes',
            'comments'
        ),
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true
    );
    register_post_type('multimedia', $args);
    
    //Casos
    $labelsC = array(
        'name' => 'Casos',
        'singular_name' => 'Caso',
        'menu_name' => 'Caso',
        'name_admin_bar' => 'Caso',
        'add_new' => 'Agregar Caso nuevo',
        'add_new_item' => 'Agregar Caso',
        'new_item' => 'Nuevo Caso',
        'edit_item' => 'Editar Caso',
        'view_item' => 'Ver',
        'all_items' => 'Todos los Casos',
        'search_items' => 'Buscar Caso',
        'parent_item_colon' => 'Página de Caso:',
        'not_found' => 'No se encontraron Caso.',
        'not_found_in_trash' => 'No hay Caso en la papelera.',
    );

    $argsC = array(
        'labels' => $labelsC,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'query_var' => true,
        'rewrite' => array('slug' => 'casos'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => 5,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions',
            'page-attributes',
            'comments'
        ),
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true
    );
    register_post_type('caso', $argsC);
}

add_action('init', 'my_custom_posttypes');

function my_rewrite_flush() {
    my_custom_posttypes();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'my_rewrite_flush');

// Custom Taxonomies
function custom_taxonomies() {

    // Nombre del autor
    $labels = array(
        'name' => 'Autores',
        'singular_name' => 'Autor',
        'search_items' => 'Buscar autor',
        'all_items' => 'Todos',
        'parent_item' => 'ID principal de autor',
        'parent_item_colon' => 'ID principal de autor:',
        'edit_item' => 'Editar autor',
        'update_item' => 'Actualizar autor asignado',
        'add_new_item' => 'Agregar nombre de autor(a)',
        'new_item_name' => 'Nuevo nombre de autor',
        'menu_name' => 'Autor asignado',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'autor'),
    );

    register_taxonomy('autor', array('multimedia'), $args);
    
    //tendencias
    $labelsT = array(
        'name' => 'Tendencias',
        'singular_name' => 'Tendencia',
        'search_items' => 'Buscar tendencia',
        'all_items' => 'Todas',
        'parent_item' => 'ID principal de la tendencia',
        'parent_item_colon' => 'ID principal de la tendencia:',
        'edit_item' => 'Editar tendencia',
        'update_item' => 'Actualizar tendencia asignada',
        'add_new_item' => 'Agregar nombre de tendencia',
        'new_item_name' => 'Nueva tendencia',
        'menu_name' => 'Tendencia asignada',
    );

    $argsT = array(
        'hierarchical' => false,
        'labels' => $labelsT,
        'show_ui' => true,
        'show_admin_column' => false,
        'query_var' => true,
        'rewrite' => array('slug' => 'tendencia'),
    );

    register_taxonomy('tendencia', array('caso'), $argsT);
}

add_action('init', 'custom_taxonomies');




