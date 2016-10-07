<?php
/*
Template Name: Главная
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<section class="slider flex" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                                    echo $thumb_url[0]; ?>)">
  <div class="h-1">
    <h1><?php the_field('home_desc'); ?></h1>    
  </div>
  <button><?php the_field('button_1'); ?></button>
  <div class="bounce">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 490.4 490.4" style="enable-background:new 0 0 490.4 490.4;" xml:space="preserve" width="60px" height="60px">
        <g>
          <g>
            <path d="M490.4,245.2C490.4,110,380.4,0,245.2,0S0,110,0,245.2s110,245.2,245.2,245.2S490.4,380.4,490.4,245.2z M24.5,245.2 c0-121.7,99-220.7,220.7-220.7s220.7,99,220.7,220.7s-99,220.7-220.7,220.7S24.5,366.9,24.5,245.2z"/>
            <path d="M253.9,360.4l68.9-68.9c4.8-4.8,4.8-12.5,0-17.3s-12.5-4.8-17.3,0l-48,48V138.7c0-6.8-5.5-12.3-12.3-12.3    s-12.3,5.5-12.3,12.3v183.4l-48-48c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l68.9,68.9c2.4,2.4,5.5,3.6,8.7,3.6    S251.5,362.8,253.9,360.4z"/>
          </g>
        </g>
        </svg>
        <a href="#why"></a>
      </div><div class="bounce">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 490.4 490.4" style="enable-background:new 0 0 490.4 490.4;" xml:space="preserve" width="60px" height="60px">
      <g>
        <g>
          <path d="M490.4,245.2C490.4,110,380.4,0,245.2,0S0,110,0,245.2s110,245.2,245.2,245.2S490.4,380.4,490.4,245.2z M24.5,245.2 c0-121.7,99-220.7,220.7-220.7s220.7,99,220.7,220.7s-99,220.7-220.7,220.7S24.5,366.9,24.5,245.2z"/>
          <path d="M253.9,360.4l68.9-68.9c4.8-4.8,4.8-12.5,0-17.3s-12.5-4.8-17.3,0l-48,48V138.7c0-6.8-5.5-12.3-12.3-12.3    s-12.3,5.5-12.3,12.3v183.4l-48-48c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l68.9,68.9c2.4,2.4,5.5,3.6,8.7,3.6    S251.5,362.8,253.9,360.4z"/>
        </g>
      </g>
      </svg>
      <a href="#triggers"></a>
    </div>
</section>
<?php endwhile; endif;?>

<section id="triggers" class="triggers">
  <div class="container">
    <div class="row">
      <?php $idObj = get_category_by_slug('triggers1'); $id = $idObj->term_id;
      $n=4;
      $recent = new WP_Query("cat=$id&showposts=$n&order=asc");?>
      <?php while($recent->have_posts()) : $recent->the_post();?>
      <div class="col-md-3">
        <?php the_post_thumbnail(); ?>
        <?php the_content(); ?>
      </div>
      <?php endwhile; wp_reset_query(); ?>
    </div>
  </div>
</section>

<section class="vigoda">
  <?php if ( have_posts() ) : query_posts('page_id=117'); while (have_posts()) : the_post(); ?>
  <div class="super-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/app/img/vigoda.png);"></div>
  <div class="container">
    <div class="row flex">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6 col-md-offset-6">
            <h2><?php the_title();?></h2>
            <?php the_content() ?>
            <a href="<?php the_permalink() ?>">Подробнее >></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <? endwhile; endif; wp_reset_query(); ?>
</section>

<section class="triggers-2 align-center">
  <div class="container">
    <div class="row">
      <?php $idObj = get_category_by_slug('triggers2'); $id = $idObj->term_id;
      $n=8;
      $recent = new WP_Query("cat=$id&showposts=$n&order=asc");?>
      <?php while($recent->have_posts()) : $recent->the_post();?>
      <div class="col-md-3">
        <?php the_post_thumbnail(); ?>
        <?php the_content(); ?>
      </div>
      <?php endwhile; wp_reset_query(); ?>
      <div class="col-md-12 more">
      <hr>
        <p>
          <?php echo category_description( 4 ); ?>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="about">
  <?php $idObj = get_category_by_slug('infrastructure'); $id = $idObj->term_id;
  $n=12;
  $recent = new WP_Query("cat=$id&showposts=$n&order=asc");?>
  <?php while($recent->have_posts()) : $recent->the_post();?>
  <a href="<?php the_permalink() ?>">
    <div class="col-md-3 flex about-item" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id();
                                                 $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                                                 echo $thumb_url[0]; ?>)">
      <h3><?php the_title(); ?></h3>
    </div>
  </a>
  <?php endwhile; wp_reset_query(); ?>
</section>

<section class="products">
  <div class="container">
    <div class="row">
      <?php $idObj = get_category_by_slug('products'); $id = $idObj->term_id;
      $n=8;
      $recent = new WP_Query("cat=$id&showposts=$n&order=asc");?>
      <div class="col-md-12 align-center">
        <h2>Номера и цены</h2>
      </div>
      <?php while($recent->have_posts()) : $recent->the_post();?>
      <div class="col-md-3">
        <div class="one-product">
          <?php the_post_thumbnail(); ?>
          <h3><?php the_title() ?></h3>
          <div class="wrapper">
            <p class="price"><?php the_field('new_price'); ?> <span>грн.</span></p>
            <a href="<?php the_permalink() ?>">Подробнее >></a>            
          </div>
        </div>
      </div>
      <?php endwhile; wp_reset_query(); ?>
    </div>
  </div>
</section>

<section class="photogallery">
  <div class="row">
    <div class="col-md-4"><img src="<?php echo get_template_directory_uri(); ?>/app/img/photogallery1.png" alt=""></div>
    <div class="col-md-4"><img src="<?php echo get_template_directory_uri(); ?>/app/img/photogallery2.png" alt=""></div>
    <div class="col-md-4"><img src="<?php echo get_template_directory_uri(); ?>/app/img/photogallery3.png" alt=""></div>
    <div class="col-md-4"><img src="<?php echo get_template_directory_uri(); ?>/app/img/photogallery4.png" alt=""></div>
    <div class="col-md-4"><img src="<?php echo get_template_directory_uri(); ?>/app/img/photogallery5.png" alt=""></div>
    <div class="col-md-4"><img src="<?php echo get_template_directory_uri(); ?>/app/img/photogallery6.png" alt=""></div>
  </div>
</section>

<section class="responce">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-offset-1">
        <blockquote>
          Отдыхали всей семьёй летом. Очень понравилось. Во-первых, очень чисто. В номерах пахнет деревом. Всё выглядит новым и аккуратным. Не смотря на солнце на улице в номере всегда свежо. Есть бассейн с подогревом. Отдых не хуже, чем в Европе. Машину не пришлось ставить где-то далеко, есть рядом своя парковка. В отеле свой ресторан. Как не странно, во всех остальных местах в Буковели цены на питание были заметно выше, чем здесь. Нам всем очень понравилось.
        </blockquote>
        <h5>Катя Киев</h5>
      </div>
      <div class="col-md-5">
        <blockquote>
          Цены на проживание не ниже и не выше, чем в любом другом отеле в Украине в данный период времени. Есть разные номера, на любой кошелёк. Но при этом во всех номерах чисто, комфортно, уютно и приятно пахнет деревом. Зимой с друзьями были на разных курортах Европы. Поэтому очень были удивлены, что в Буковели всё новее, удобнее, лучше и, самое главное, дешевле обходится, как само катание, так и, особенно, проживание. А уровень данного отеля ничем не хуже европейских аналогов.
        </blockquote>
        <h5>Елена Днепропетровск</h5>
      </div>
      <div class="col-md-12 align-center">
        <a href="#">Читать все отзывы >></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
