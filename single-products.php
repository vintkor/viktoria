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
     <div class="col-md-4 col-sm-5">
      <div class="row img_gallery">
        <div id='aniimated-thumbnials'>

         <?php
            for($i = 1; $i < 7; $i++) {

                echo "<div class='col-xs-6 gallery-item' style='background-image: url("; the_field("for_you_img_$i"); echo ")'>";
                echo "<a class='item' href='"; the_field("for_you_img_$i"); echo "'>";

                echo "<img class='hidden' src='"; the_field("for_you_img_$i"); echo "'>";

                echo"</a>";
                echo "</div>";

            }
         ?>          
        
        </div>
      </div>
     </div>
     <div class="col-md-8 col-sm-7">
       <h1><?php the_title(); ?></h1>
       <?php if(has_category('products')): ?>
       <div class="price flex">
         <div>Цена</div>
           <p><?php the_field('new_price'); ?></p>
         <div>грн./сутки</div>
       </div>
        <button data-toggle="modal" data-target=".zabronirovat-<?php the_ID(); ?>">Забронировать сейчас</button>
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

<div class="modal fade zabronirovat-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content col-sm-12">
      <div class="modal-header">
        <h3>Вы бронируете номер - <span class="form-red"><?php the_title(); ?></span></h3>
      </div>
      <div class="modal-body">
        <form role="form" id="ajaxform-<?php the_ID(); ?>" action="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="bron-name"><?php the_field('form_name', 159); ?></label>
                <input id="bron-name" type="text" name="name" class="form-control name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="bron-number"><?php the_field('form_number', 159); ?></label>
                <input id="bron-number" type="text" name="number" class="form-control bron-number bron-number-<?php the_ID(); ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="bron-date"><?php the_field('form_date', 159); ?></label>
                <input id="bron-date" type="date" name="date" class="form-control">
              </div>              
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="bron-days"><?php the_field('form_days', 159); ?></label>
                <input id="bron-days" type="number" name="days" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="bron-people"><?php the_field('form_people', 159); ?></label>
                <input id="bron-people" type="number" name="people" class="form-control">
              </div>
            </div>
          </div>
          <hr>
          <input type="hidden" name="room" value="<?php the_title(); ?>">
          <input type="submit" name="submit" value="Забронировать" class="btn btn-success">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Закрыть</button>   
        </form>
      </div>
    </div>
  </div>
</div>

<script>
/*-------------------------------- Отправка почты на бронирование номера из категории "номера и цены" ---------------------------------*/

$("#ajaxform-<?php the_ID(); ?>").submit(function(){

   var form = $(this);
   var error = false;

   form.find('input').each( function(){
       if ($('.bron-number-<?php the_ID(); ?>').val() == '') {
           sweetAlert("Ой...", "Необходимо указать номер телефона!", "error");
           error = true;
       }
   });

   if (!error) {
       var data = form.serialize();
       $('.zabronirovat-<?php the_ID(); ?>').modal('toggle');
       $.ajax({
           type: 'POST',
           url: '<?php echo get_template_directory_uri(); ?>/footer-bron.php',
           dataType: 'json',
           data: data,
           beforeSend: function(data) {
               form.find('.send').attr('disabled', 'disabled');
           },
           complete: function(data) {
               swal("Отлично!", "Менеджер-консультант свяжется с Вами в ближайшее время.", "success");
           }

       });
   }
   return false;
});
</script>
<?php endwhile; endif;?>


<?php get_footer(); ?>
