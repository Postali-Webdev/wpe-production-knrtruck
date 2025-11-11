<?php
/**
 * Archive Reviews Template
 * @package Postali Child
 * @author Postali LLC
**/


// TODO: Get better images for Google & Facebook Badge
get_header();?>

<div id="archive-reviews" class="wrapper">
    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1>Reviews</h1>
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
                    <div class="reviews-container">
                        <?php while( have_posts() ) : the_post(); 
                        $review_source = get_field('review_source'); ?>
                            <div class="review">
                                <div class="star-rating"><span>★ ★ ★ ★ ★</span><span class="line-filler"></span></div>
                                <h4 class="author"><?php the_field('author'); ?></h4>
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

    <section id="panel-2">
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

<?php get_footer();?>