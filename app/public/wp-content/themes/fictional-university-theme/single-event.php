<?php 
get_header();

the_post();
pageBanner();
?>


<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p><a class="metabox__blog-home-link" href="
      <?php 
      echo get_post_type_archive_link('event');
      ?>">
        <i class="fa fa-home" aria-hidden="true">
        </i> Back to Events Home</a>
      <span class="metabox__main">
        <?php the_title(); ?></span></p>
  </div>

  <div class="generic-content">
    <?php the_content(); ?>
  </div>

  <?php 
  $relatedPrograms = get_field('related_programs');
    //print_r($relatedPrograms);
  if ($relatedPrograms) {
    echo '<hr class="section-break">';
    echo '<h2 class="headline headline--medium">Related Program(s)</h2>';
    echo '<ul class="link-list min-list">';
    foreach ($relatedPrograms as $program) { ?>
  <li><a href="<?php echo get_the_permalink($program); ?>">
      <?php echo get_the_title($program); ?></a></li>
  <?php 
}
echo '</ul>';
}

wp_reset_postdata();

$relatedCampuses = get_field('related_campus');

if ($relatedCampuses) { ?>
  <hr class="section-break">
  <h2 class="headline headline--medium">
    <?php echo get_the_title(); ?> is Available at these campuses</h2>
  <?php
  echo '<ul class="min-list link-list">';
  foreach ($relatedCampuses as $campus) {
    ?>
  <li><a href="<?php echo get_the_permalink($campus); ?>">
      <?php echo get_the_title($campus) ?></a>
  </li>
  <?php

}
echo '</ul>';
?>
  <?php 
} ?>




</div>

<?php 

get_footer();
?>