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

// --------------------Виджет Переключение языка-----------------------
function lang_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Переключение языка',
    'id'            => 'lang',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'lang_text_widget_init' );


