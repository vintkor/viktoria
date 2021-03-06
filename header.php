<!DOCTYPE html>
<html lang="<?php echo get_bloginfo('language'); ?>">
<head>
  <meta charset="<?php echo get_bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('&#8594;', true, 'right'); echo get_bloginfo('name');?> - <? echo get_bloginfo('description') ?></title>
  <?php wp_head(); ?>
  <script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- build:css -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/app/css/libs.css">
  <!-- endbuild -->

  <!-- build:css2 -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/app/css/main.css">
  <!-- endbuild -->

  <script src="<?php echo get_template_directory_uri(); ?>/app/js/libs.min.js"></script>
  <!-- build:js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

  <style rel="stylecheet" href="https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/slicknav.min.css"></style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/app/js/main.js"></script>
  <!-- endbuild -->
  
</head>
<body <?php body_class(); ?>>

<header class="headroom">
  <div class="container">
    <div class="row">
      <div class="col-md-1 col-lg-2 col-sm-3">
      <a href="/">
        <img src="<?php echo get_template_directory_uri(); ?>/app/img/logo.png" class="logo">
      </a>
      </div>
      <div class="col-md-7 col-lg-6 col-sm-3 col-sm-push-6 col-md-push-0 col-lg-push-0">
        <nav>
          <?php wp_nav_menu( array( 'theme_location' => 'top-menu') ); ?>
        </nav>
      </div>
      <div class="col-md-2 col-lg-2 col-sm-3 col-sm-pull-3 col-md-pull-0 col-lg-pull-0">
        <?php if ( have_posts() ) : query_posts('page_id=159'); while (have_posts()) : the_post(); ?>
        <p class="phone"><?php the_field('header_phone'); ?> <img src="<?php echo get_template_directory_uri(); ?>/app/img/viber.png"></p>
        <? endwhile; endif; wp_reset_query(); ?>
      </div>
      <div class="col-md-2 lang col-lg-2 col-sm-3 col-sm-pull-3 col-md-pull-0 col-lg-pull-0">
        <?php dynamic_sidebar('lang'); ?>
      </div>
      <div id="top-nav"></div>
    </div>
  </div>
</header>