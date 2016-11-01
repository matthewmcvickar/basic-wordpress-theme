<?php

get_header();

if (have_posts()) while (have_posts()): the_post();

?>

  <div class="post-container">
    <div class="post-header">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="post-date"><?php echo get_the_date(); ?></strong></div>
    </div>
    <div class="post-content">
      <?php the_content(); ?>
    </div>
  </div>

<?php

endwhile;

get_footer();

?>
