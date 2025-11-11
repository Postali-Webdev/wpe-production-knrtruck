<?php
/**
 * Archive Results Template
 * @package Postali Child
 * @author Postali LLC
**/

get_header();
?>

<div id="archive-results" class="wrapper">

    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1>Case Results</h1>
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
                <div class="column-full">
                    <div class="results-container">
                        <?php while( have_posts() ) : the_post(); 
                        $categories = get_the_category();
                        foreach (get_the_category() as $cat) { $category = $cat->name; }
                        ?>
                            <div class="result">
                                <div class="category"><span><?php esc_html_e($category); ?></span><span class="line-filler"></span></div>
                                <h4 class="amount green">$<?php esc_html_e(number_format(get_field('case_amount'), 0)); ?></h4>
                                <p class="title"><a href="<?php echo get_the_permalink(); ?>"><?php the_field('title'); ?></a></p>
                                <p class="copy">
                                    <?php the_field('copy'); ?>
                                </p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-2">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php echo get_pagination(); wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

</div>

<?php get_template_part('block','pre-footer'); ?>

<?php get_footer();?>