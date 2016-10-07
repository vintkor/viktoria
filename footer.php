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
        <button class="first"><?php the_field('maps'); ?></button>
        <button class="second"><?php the_field('bron'); ?></button>
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
</body>
</html>