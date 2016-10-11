<?php get_header(); ?>

<section class="slider flex" style="background-image: url('<?php echo get_template_directory_uri(); ?>/app/img/media.png')">
  <div class="h-1">
    <h1><?php echo get_category_by_slug('photo_and_video')->description; ?></h1>
  </div>
  <div class="bounce">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 490.4 490.4" style="enable-background:new 0 0 490.4 490.4;" xml:space="preserve" width="60px" height="60px">
    <g>
      <g>
        <path d="M490.4,245.2C490.4,110,380.4,0,245.2,0S0,110,0,245.2s110,245.2,245.2,245.2S490.4,380.4,490.4,245.2z M24.5,245.2 c0-121.7,99-220.7,220.7-220.7s220.7,99,220.7,220.7s-99,220.7-220.7,220.7S24.5,366.9,24.5,245.2z"/>
        <path d="M253.9,360.4l68.9-68.9c4.8-4.8,4.8-12.5,0-17.3s-12.5-4.8-17.3,0l-48,48V138.7c0-6.8-5.5-12.3-12.3-12.3    s-12.3,5.5-12.3,12.3v183.4l-48-48c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l68.9,68.9c2.4,2.4,5.5,3.6,8.7,3.6    S251.5,362.8,253.9,360.4z"/>
      </g>
    </g>
    </svg>
    <a href="#bounce"></a>
  </div>
</section>


<section id="bounce" class="photo_and_video">
  <div class="container">
    <h2><?php echo get_queried_object()->name; ?></h2>
    <hr>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <div class="row">
        <div class="col-md-3">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail("thumb"); ?>
          </a>
        </div>
        <div class="col-md-9">
          <a class="a_h3" href="<?php the_permalink() ?>">
            <h3><?php the_title(); ?></h3>        
          </a>
          <?php the_excerpt(); ?>
        </div>
      </div>
        <hr>
    <?php endwhile; endif;?>
  </div>
</section>


<?php get_footer(); ?>
