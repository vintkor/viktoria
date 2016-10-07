<?php
add_theme_support('post-thumbnails');
remove_action('wp_head', 'wp_generator');

//Убираем лишние теги
// remove_filter( 'the_content', 'wpautop' );// для контента
remove_filter( 'the_excerpt', 'wpautop' );// для анонсов
remove_filter( 'comment_text', 'wpautop' );// для комментарий


// --------------------Регистрация меню верхнее--------------------------------------
add_action('init', 'top_menu');
function top_menu() {
    register_nav_menus(array(
        'top-menu' => 'Меню сайта верхнее'
    ));
}

// --------------------Регистрация меню футер --------------------------------------
add_action('init', 'footer_menu');
function footer_menu() {
    register_nav_menus(array(
        'footer-menu' => 'Меню в футере основное'
    ));
}

// --------------------Регистрация меню футер правое --------------------------------------
add_action('init', 'footer_menu_right');
function footer_menu_right() {
    register_nav_menus(array(
        'footer-menu-right' => 'Меню в футере правое'
    ));
}

// --------------------Виджет с телефонами на странице Контакты---------------------------
function phone_in_contact_page_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Теефоны в контактах',
    'id'            => 'contact',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'phone_in_contact_page_text_widget_init' );


// --------------------Виджет для приглашения на тендер---------------------------
function tender_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Виджет для приглашения на тендер',
    'id'            => 'tender',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'tender_text_widget_init' );


