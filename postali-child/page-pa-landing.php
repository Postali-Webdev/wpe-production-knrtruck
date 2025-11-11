<?php
/**
 * Template Name: Practice Area Landing
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

$args = array( 
    'post_type' => 'page',
    'posts_per_page' => -1, 
    'post_status'       => 'publish',
    'post__not_in' => array( $post->ID ),
    'meta_query'        => 
    [
        [
            'key'   => '_wp_page_template',
            'value' => ['page-pa-parent.php', 'page-pa-child.php']
        ]
    ]
);
$practice_areas = new WP_Query( $args );



// Rebuild data structure for pages based on categories
if( $practice_areas->have_posts() ) { 
    $all_categories = get_categories();
    $category_arr = [];

    // Setup category array with active categories and add in empty array for the pages
    foreach ( $all_categories as $single_category ) {
        $key = $single_category->cat_ID;
        $name = $single_category->name;
        $category_arr[$key] = ['category' => $name, 'pages' => []];
    }

    while( $practice_areas->have_posts() ) {
        $practice_areas->the_post();
        $categories = get_the_category();
        
        if (!empty($categories)) {
            $category_id = $categories[0]->cat_ID; 
            $category_name = $categories[0]->name; 
            $post_id = get_the_ID();
            $post_has_parent = wp_get_post_parent_id($post_id);
            $page_link = get_the_permalink();
            $page_title = get_the_title();
            
            // Populate pages into the category array
            foreach( $category_arr as $key => $single_category) {
                if( $key == $category_id ) {
                    // If this is a parent page we add to the beginning of the array
                    if( $post_has_parent == 0 ) {
                        array_unshift($category_arr[$key]['pages'], ['page_link' => $page_link, 'page_title' => $page_title]);
                    // Child pages are added to end of array
                    } else {
                        array_push($category_arr[$key]['pages'], ['page_link' => $page_link, 'page_title' => $page_title]);
                    }
                }
            }
        }
    }  
    wp_reset_postdata();

}

?>

<div id="pa-landing" class="wrapper">
    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1><?php esc_html_e( get_the_title() ); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                <?php if( $category_arr ) : foreach( $category_arr as $cat_item ) : ?>

                    <?php if($category_id !== '1') { ?>

                    <div class="category-container">
                        <?php if( $cat_item['category'] ) : ?>
                            <h3>Types of <?php esc_html_e($cat_item['category']); ?></h3>
                        <?php endif; ?>

                        <?php if( $cat_item['pages'] ) : ?>
                            <ul>
                            <?php foreach( $cat_item['pages'] as $page ) : ?>
                                <li><a class="ignore-highlight" href="<?php esc_html_e($page['page_link']); ?>"><?php esc_html_e($page['page_title']); ?></a></li>
                            <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <?php } ?>

                <?php endforeach; endif; ?>
                </div>
            </div>
        </div>    
    </section>


</div>

<?php get_footer();?>