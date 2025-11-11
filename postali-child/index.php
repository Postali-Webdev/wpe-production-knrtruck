<?php
/**
 * Blog Archive
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); 

$all_category_arr = [];
$overflow_counter = 0;
$test = [];



//get the categories
$terms = get_terms([
    'taxonomy' => 'category', 
    'orderby' => 'name'
]);
//looping through categories
foreach( $terms as $term ) {
    //run a query for each category to see if it contains posts instead of pages
    $post_cat_args = [
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'tax_query' => [
            [
                'taxonomy'  => 'category',
                'field' => 'term_taxonomy_id',
                'terms' => [$term->term_taxonomy_id],
            ]
        ]
    ];
    $post_cat_query = new WP_Query($post_cat_args);
    //if category contians blog posts add it to the filter array
    if( $post_cat_query->have_posts() ) {
        $name = $term->name;
        $slug = $term->slug;
        $count = $term->count;
        if( $count !== 0 ) {
            array_push( $all_category_arr, ['name' => $name, 'slug' => $slug]);
        }
        $count_all_category_arr = count( $all_category_arr );
    }
}
?>

<div id="blog-archive" class="wrapper">
    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1>Legal Blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <?php if( have_posts() ) : ?>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full filter-wrapper desktop">
                    <div class="filter-container">
                        <!-- TODO: Replace with AJAX & add JS to enable toggle for view all categories -->
                        <?php foreach( $all_category_arr as $category ) : $overflow_counter++; ?>
                        <?php if($overflow_counter == 1 ) : ?><div class="primary-filters-container">
                            <p>Filter by:</p>
                            <a href="/blog/" class="filter-btn view-all">All</a>    
                        <?php endif;?>     
                        <?php if($overflow_counter == 4 ) : ?><div class="overflow-filters-container"><?php endif;?> 
                                <a href="/blog/category/<?php esc_html_e($category['slug']); ?>/" class="filter-btn"><?php esc_html_e($category['name']); ?></a>
                            <?php if($overflow_counter == 3 ) : ?></div><?php endif;?>
                            <?php if($overflow_counter == $count_all_category_arr ) : ?></div><?php endif;?>
                        <?php endforeach; ?>
                        
                    </div>
                    <?php if( $count_all_category_arr > 3) : ?>
                            <p class="expand-categories">View all categories <span class="plus-symbol">+</span></p>
                    <?php endif; ?>
                </div>
                <div class="column-full filter-wrapper mobile">
                    <select onChange="window.location.href=this.value" name="category-filter" id="category-filter">
                        <option value="" disabled selected>Filter by</option>
                        <?php foreach( $all_category_arr as $category ) : ?>
                            <option value="/blog/category/<?php esc_html_e($category['slug']); ?>"><?php esc_html_e($category['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-2">
        <div class="container wide">
            <div class="columns">
                <div class="column-full posts-container">
                    
                        <?php while( have_posts() ) : the_post();
                            $hero_image = get_field('hero_image');
                            $categories_arr = [];
                            $categories = get_the_category(); 
                            $count = 0;
                            $category_count = count($categories);
                            foreach( $categories as $category ) {
                                $category_name = $category->name;
                                $category_slug = $category->slug;
                                array_push($categories_arr, ['name' => $category_name, 'slug' => $category_slug]);
                            }
                                ?>
                            <div class="post link-finder">
                                <div class="copy-container">
                                    <p class="categories">
                                        <?php foreach($categories_arr as $category) : $count++; ?>
                                            <a class="category-link ignore-highlight" href="/blog/category/<?php esc_html_e($category['slug']); ?>/"><?php esc_html_e($category['name']); ?></a><?php if( $count < $category_count ) : ?>, <?php endif;?>
                                        <?php endforeach; ?>
                                    </p>
                                    <h2><a href="<?php esc_html_e(get_the_permalink()); ?>"><?php esc_html_e( get_the_title() ); ?></a></h2>
                                </div>
                                <div class="img-container">
                                    <?php if( $hero_image ) : ?>
                                        <img class="responsive-img" src="<?php esc_html_e($hero_image['url']); ?>" alt="<?php esc_html_e($hero_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="vertical-text-container">
                                    <p><?php esc_html_e( get_the_date() ); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-3">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php echo get_pagination(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>

<?php get_template_part('block','pre-footer'); ?>

<div class="spacer-60"></div>

<?php get_footer(); ?>
