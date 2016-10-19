<?php get_header(); ?>

<section class="slider flex" style="background-image: url('<?php echo get_template_directory_uri(); ?>/app/img/category-products.png')">
  <div class="h-1">
    <h1><?php echo get_category_by_slug('products')->description; ?></h1>
  </div>
  <div class="bounce">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 490.4 490.4" style="enable-background:new 0 0 490.4 490.4;" xml:space="preserve">
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


<section id="bounce" class="product-list">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
        <div class="row">
          <?php if (have_posts()): while (have_posts()): the_post(); ?>
          <div class="col-xs-8 col-xs-offset-2 col-sm-offset-0 col-sm-6 product-item align-center">
            <div class="wrapper">
              <span class="thumb"><?php the_post_thumbnail(); ?></span>
              <div class="price flex">
                <div>Цена</div>
                  <p><?php the_field('new_price'); ?></p>
                <div>грн./сутки</div>
              </div>
              <h2><?php the_title(); ?></h2>
              <div class="content">
                <?php the_content(); ?>                
              </div>
              <div class="col-xs-6 bron">
                <a href="#" data-toggle="modal" data-target=".zabronirovat-<?php the_ID(); ?>">Забронировать</a>
              </div>
              <div class="col-xs-6 more">
                <a class="" href="<?php the_permalink() ?>">Подробнее >></a>                
              </div>
            </div>
          </div>
          <?php endwhile; endif;?>
        </div>
      </div>
    </div>
  </div>
</section>


<?php if (have_posts()): while (have_posts()): the_post(); ?>
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
