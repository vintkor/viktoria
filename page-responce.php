<?php
/*
Template Name: Отзывы
*/
?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<section class="for-you flex" style="background-image: url('<?php echo get_template_directory_uri(); ?>/app/img/category-products.png')">
</section>

<section class="responce-inner">
  <div class="container">
   <div class="row">
     <div class="col-md-12">
       <h1><?php the_title(); ?></h1>
       <?php the_content(); ?>
     </div>
   </div>
  </div>
</section>

<?php endwhile; endif;?>


<?php get_footer(); ?>
