<?php
/**
 * Template Name: Practice Area Child
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Fields
$hero_image = get_field('hero_banner');
$parent_title = get_field('hero_title', $post->post_parent);
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
foreach (get_the_category() as $cat) { $category = $cat->name; }

$args = array( 
    'post_type' => 'page',
    'posts_per_page' => 3, 
    'category__in' => $category_id,
    'post__not_in' => array( $post->ID ),
    'meta_query'        => 
    [
        [
            'key'   => '_wp_page_template',
            'value' => 'page-pa-child.php'
        ]
    ]
);
$related_pages = new WP_Query( $args );

?>

<div id="pa-parent" class="wrapper nobg">

    <section id="hero" class="tall-hero" style="background-image:url('<?php esc_html_e($hero_image['url']); ?>'); ?>">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <p class="subtitle green"><?php esc_html_e( $parent_title ); ?></p>
                        <h1><?php the_field('hero_title'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <section id="panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <?php the_field('p1_main_copy') ?>
            </div>
        </div>
    </div>
    </section>

    <section id="panel-2">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php get_template_part('block', 'related-posts'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','pre-footer'); ?>

    <div class="spacer-60"></div>

</div>

<?php get_footer();?>