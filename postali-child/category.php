<?php
/**
 * Blog Archive
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); 

$all_categories = get_categories();
$all_category_arr = [];
$overflow_counter = 0;

foreach ( $all_categories as $category ) {
    $name = $category->name;
    $slug = $category->slug;
    $count = $category->count;
    if( $count !== 0 ) {
        array_push( $all_category_arr, ['name' => $name, 'slug' => $slug]);
    }
}

$count_all_category_arr = count( $all_category_arr );
?>

<div id="blog-archive" class="wrapper">
    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <p class="date green"><?php esc_html_e(get_the_date()); ?></p>
                        <h1>Legal Blog | <?php single_cat_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if( have_posts() ) : ?>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full filter-wrapper desktop">
                    <div class="filter-container">
                    
                    <p class="filter-btn"><?php single_cat_title();  ?></p>
                    </div>
                        <a href="/blog/" class="reset-filter">Reset Filter  <span class="plus-symbol">+</span></a>
                    
                </div>
                <div class="column-full filter-wrapper mobile">
                    <select onChange="window.location.href=this.value" name="category-filter" id="category-filter">
                        <option value="" disabled selected><?php single_cat_title(); ?></option>
                        <option value="/blog/">Reset Filter</option>
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
                                            <a class="category-link ignore-highlight" href="/blog/category/<?php esc_html_e($category['slug']); ?>"><?php esc_html_e($category['name']); ?></a><?php if( $count < $category_count ) : ?>, <?php endif;?>
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

<?php get_footer(); ?>
