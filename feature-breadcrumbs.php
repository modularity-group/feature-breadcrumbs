<?php defined("ABSPATH") or die;

add_action('acf/init', function(){
  acf_register_block_type(array(
    'name' => 'feature-breadcrumbs',
    'title' => 'Breadcrumbs',
    'description' => '',
    'render_template' => dirname(__FILE__) . '/feature-breadcrumbs.template.php',
    'category' => 'custom',
    'post_types' => array('post', 'page', 'block_pattern', 'wp_block'),
    'icon' => 'arrow-right-alt',
    'keywords' => array('breadcrumbs', 'navigation', 'pages'),
    'mode' => 'preview',
    'supports' => array('mode' => false)
  ));
});

if (!function_exists("is_blog")) {
  function is_blog() {
    return (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
  }
}
