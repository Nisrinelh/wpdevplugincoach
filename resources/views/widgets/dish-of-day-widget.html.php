<div class="widget-wrapper">
  
  <?php if (!empty($instance['title'])) : ?>
  <h4> <?php echo $instance['title']; ?></h4>
  <?php endif; ?>

  <div class="textwidget">

  <?php echo esc_html__($instance['text']); ?>

  </div>

</div>