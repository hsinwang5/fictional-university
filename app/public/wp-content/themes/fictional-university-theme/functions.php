<?php

function pageBanner($args = null)
{

  if (!$args['title']) {
    $args['title'] = get_the_title();
  }

  if (!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if (!$args['photo']) {
    if (get_field('page_banner_background_image')) {
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
  }

  ?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(
    <?php 
    //echo get_theme_file_uri('/images/ocean.jpg') 
    //$pageBannerImage = get_field('page_banner_background_image');
    //echo $pageBannerImage['sizes']['pageBanner'];
    echo $args['photo'];
    ?>);">
  </div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">
      <?php echo $args['title']; //the_title(); ?>
    </h1>
    <div class="page-banner__intro">
      <p>
        <?php echo $args['subtitle'];
          //print_r($pageBannerImage); ?>
      </p>
    </div>
  </div>
</div>
<?php 
}

  //load css file
function university_files()
{
  wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyBmzE7jZfM_ftrnqLOZZA21ANR95bVplVk', null, microtime(), true);
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), null, microtime(), true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri(), null, microtime());
}
  //2 arguments - (type of instruciton, self defined function) - loads scripts ion this case
add_action('wp_enqueue_scripts', 'university_files');

add_action('after_setup_theme', 'university_features');

add_action('pre_get_posts', 'university_adjust_default_queries');

function university_features()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, array('left', 'top'));
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerLocationOne', 'Footer Location One');
  register_nav_menu('footerLocationTwo', 'Footer Location Two');
}

//passes along query object
function university_adjust_default_queries($query)
{
  if (!is_admin() and is_post_type_archive('campus') and $query->is_main_query()) {
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
      )
    ));
  }
}

function my_acf_google_map_api($api)
{

  $api['key'] = 'AIzaSyBmzE7jZfM_ftrnqLOZZA21ANR95bVplVk';

  return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

?>