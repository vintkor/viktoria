<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12 align-center">
        <?php if ( have_posts() ) : query_posts('page_id=159'); while (have_posts()) : the_post(); ?>
        <span class="like-h2"><p><?php the_field('footer_h'); ?></p></span>
        <? endwhile; endif; wp_reset_query(); ?>
      </div>
      <?php $idObj = get_category_by_slug('triggers3'); $id = $idObj->term_id;
      $n=3;
      $recent = new WP_Query("cat=$id&showposts=$n&order=asc");?>
      <?php while($recent->have_posts()) : $recent->the_post();?>
      <div class="col-md-4">
        <div class="row flex triggers">
          <div class="col-md-5 col-md-offset-1">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="col-md-5">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <?php endwhile; wp_reset_query(); ?>
      <?php if ( have_posts() ) : query_posts('page_id=159'); while (have_posts()) : the_post(); ?>
      <div class="col-md-4 col-md-offset-4 align-center phone">
        <p>
          <?php the_field('phone_1'); ?><br>
          <?php the_field('phone_2'); ?><br> 
          <?php the_field('phone_3'); ?><br>
          <?php the_field('e_mail'); ?>
        </p>
      </div>
      <div class="col-md-12 align-center contact">        
        <p><img src="<?php echo get_template_directory_uri(); ?>/app/img/map.png"> <?php the_field('address'); ?></p>
      </div>
      <div class="col-md-12 align-center">
        <button class="first" data-toggle="modal" data-target=".bs-example-modal-lg1"><?php the_field('maps'); ?></button>
        <button class="second" data-toggle="modal" data-target=".zabronirovat"><?php the_field('bron'); ?></button>
      </div>
      <div class="col-md-8">
        <div class="footer-menu">
          <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="#">Фото и видео</a></li>
            <li><a href="#">Отзывы</a></li>
            <li><a href="#">Номера и цены</a></li>
            <li><a href="#">Услуги</a></li>
            <li><a href="#">Контакты</a></li>
          </ul>
        </div>
      </div>
      <? endwhile; endif; wp_reset_query(); ?>
      <div class="col-md-4 align-right copy">
        <p><img src="<?php echo get_template_directory_uri(); ?>/app/img/copy.png"> Разработка сайта: <a href="//el-dom.ua" target="_blank">EL-DOM.UA</a></p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<!-- Modal maps -->
<?php if ( have_posts() ) : query_posts('page_id=159'); while (have_posts()) : the_post(); ?>
<div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content col-sm-12">           
      <div class="modal-header">
        <h3><?php the_field('address'); ?></h3>      
      </div>
      <div class="modal-body">
        <div id="yamaps"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  /*-------------------------------- Яндекс карта в модале --------------------------------*/
  ymaps.ready(init);

  function init () {
      var myMap = new ymaps.Map("yamaps", {
              center: [48.353916, 24.420056],
              zoom: 16
          }),
          myPlacemark = new ymaps.Placemark([48.353916, 24.420056], {
              balloonContentHeader: "<?php echo get_bloginfo('name');?>",
              balloonContentBody: "<?php echo get_bloginfo('description');?>",
              balloonContentFooter: "<?php the_field('phone_1'); ?>  <?php the_field('e_mail'); ?>",
              hintContent: "<?php echo get_bloginfo('name');?>"
          });

      myMap.geoObjects.add(myPlacemark);
      myMap.controls
          .add('zoomControl', { left: 5, top: 5 })
  };
</script>

<!-- Modal забронировать сейчас -->
<div class="modal fade zabronirovat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content col-sm-12">           
      <div class="modal-header">
        <h3><?php the_field('bron'); ?></h3>
      </div>
      <div class="modal-body">
        <form role="form" id="ajaxform" action="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="bron-name"><?php the_field('form_name'); ?></label>
                <input id="bron-name" type="text" name="name" class="form-control name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="bron-number"><?php the_field('form_number'); ?></label>
                <input id="bron-number" type="text" name="number" class="form-control bron-number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="bron-date"><?php the_field('form_date'); ?></label>
                <input id="bron-date" type="date" name="date" class="form-control">
              </div>              
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="bron-days"><?php the_field('form_days'); ?></label>
                <input id="bron-days" type="number" name="days" class="form-control">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="bron-people"><?php the_field('form_people'); ?></label>
                <input id="bron-people" type="number" name="people" class="form-control">
              </div>              
            </div>
            <div class="col-md-3">
<? endwhile; endif; wp_reset_query(); ?>
              <?php $idObj = get_category_by_slug('products'); $id = $idObj->term_id;
              $n=8;
              $recent = new WP_Query("cat=$id&showposts=$n&order=asc");?>
              <div class="form-group">
                <label for="bron-room">Выберите тип номера</label>
                <select name="room" class="form-control" id="bron-room">
                <?php while($recent->have_posts()) : $recent->the_post();?>
                  <option><?php the_title() ?></option>
                <?php endwhile; ?>
                </select>
              </div>
              <?php wp_reset_query(); ?>              
            </div>
          </div>
          <hr>
          <input type="submit" name="submit" value="Забронировать" class="btn btn-success">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Закрыть</button>   
        </form>
      </div>
    </div>
  </div>
</div>

<script>
/*-------------------------------- Отправка почты на бронирование номера из футера ---------------------------------*/

$("#ajaxform").submit(function(){

   var form = $(this);
   var error = false;

   form.find('input').each( function(){
       if ($('.bron-number').val() == '') {
           sweetAlert("Ой...", "Необходимо указать номер телефона!", "error");
           error = true;
       }
   });

   if (!error) {
       var data = form.serialize();
       $('.zabronirovat').modal('toggle');
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

</body>
</html>