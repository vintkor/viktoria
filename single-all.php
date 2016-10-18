<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<section class="for-you flex" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                                    echo $thumb_url[0]; ?>)">
</section>

<section class="vigoda-inner">
  <div class="container">
   <div class="row">
     <div class="col-sm-12">
       <h1><?php the_title(); ?></h1>
       <?php the_content(); ?>
     </div>
   </div>
  </div>
</section>

<?php endwhile; endif;?>


<?php get_footer(); ?>
