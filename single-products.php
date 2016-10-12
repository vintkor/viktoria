<?php get_header(); ?>

<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lightgallery.js"></script>
<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-fullscreen.js"></script>
<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-thumbnail.js"></script>
<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-video.js"></script>
<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-autoplay.js"></script>
<script src="http://sachinchoolur.github.io/lightGallery/lightgallery/js/lg-zoom.js"></script>
<script src="http://sachinchoolur.github.io/lightGallery/external/jquery.mousewheel.min.js"></script>
<link href="http://sachinchoolur.github.io/lightGallery/lightgallery/css/lightgallery.css" rel="stylesheet">


<?php if (have_posts()): while (have_posts()): the_post(); ?>
<section class="for-you flex" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                                    echo $thumb_url[0]; ?>)">
</section>

<section class="vigoda-inner">
  <div class="container">
   <div class="row">
     <div class="col-md-4">
      <div class="row img_gallery">
        <div id='aniimated-thumbnials'>

         <?php
            for($i = 1; $i < 7; $i++) {

                echo "<div class='col-md-6 gallery-item' style='background-image: url("; the_field("for_you_img_$i"); echo ")'>";
                echo "<a class='item' href='"; the_field("for_you_img_$i"); echo "'>";

                echo "<img class='hidden' src='"; the_field("for_you_img_$i"); echo "'>";

                echo"</a>";
                echo "</div>";

            }
         ?>          
        
        </div>
      </div>
     </div>
     <div class="col-md-8">
       <h1><?php the_title(); ?></h1>
       <?php if(has_category('products')): ?>
       <div class="price flex">
         <div>Цена</div>
           <p><?php the_field('new_price'); ?></p>
         <div>грн./сутки</div>
       </div>
        <button>Забронировать сейчас</button>
        <?php endif; ?>
       <?php the_content(); ?>
       <?php if(has_category('products')): ?>
       <a href="#" class="d3">Смотреть 3D-тур</a>
        <?php endif; ?>
     </div>
   </div>
  </div>
</section>

<script type="text/javascript">
  $('#aniimated-thumbnials').lightGallery({
      thumbnail:true,
      selector: '.item'
  }); 
</script>

<?php endwhile; endif;?>


<?php get_footer(); ?>
