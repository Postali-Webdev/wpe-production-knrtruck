<?php
/**
 * Single Reviews Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div id="single-reviews" class="wrapper">

<div id="archive-reviews">
    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1>Reviews</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="reviews-container">
                        <?php while( have_posts() ) : the_post(); 
                        $review_source = get_field('review_source'); ?>
                            <div class="review">
                                <div class="star-rating"><span>★ ★ ★ ★ ★</span><span class="line-filler"></span></div>
                                <h4><?php the_field('author'); ?></h4>
                                <p class="copy">
                                    <?php the_field('copy'); ?>
                                </p>
                                <?php if( $review_source['value'] !== 'unknown' ) : 
                                    $source = ( $review_source['value'] == 'google' ? '/wp-content/uploads/2022/11/google-reviews-logo-white-1.png' : '/wp-content/uploads/2022/11/facebook-reviews-logo.png' );
                                    ?>
                                    <div class="review-source">
                                        <img src="<?php esc_html_e($source); ?>" alt="<?php esc_html_e($review_source['label']); ?> review badge" />
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>