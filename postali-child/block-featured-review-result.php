<?php /*Featured Review & Result Block*/ 
$featured_block = $args['data'];
$title = $featured_block['block_featured_h2_title'];
$intro_copy = $featured_block['block_featured_intro_copy'];
$featured_result = $featured_block['featured_result'];
$second_featured_result = $featured_block['second_featured_result'];
$featured_review = $featured_block['featured_review'];
$reviews_page_link = $featured_block['reviews_page_link'];
$results_page_link = $featured_block['results_page_link'];
$review_source = get_field('review_source', $featured_review->ID);

?>

<div class="featured-block">
    <div class="stars"><span>★ ★ ★ ★ ★</span><span class="line-filler"></span></div>
    <div class="columns">
        <div class="column-40">
            <div>
                <h2><?php esc_html_e($title); ?></h2>
                <p><?php echo $intro_copy; ?></p>
            </div>
        </div>
        <div class="column-60 result-review-container">
            <div class="toggle-view">
                <div class="filter-btn btn active" data-view="testimonial-wrapper">
                    <span>Filter by Testimonials</span>
                </div>
                <div class="filter-btn btn" data-view="result-wrapper">
                   <span>Filter by Results</span>
                </div>
            </div>
            <div class="testimonial-wrapper">
                <div class="row">
                    <div class="review">
                        <p class="subtitle"><span>Testimonials</span> <span class="line-filler"></span></p>
                        <p class="copy">"<?php the_field('copy', $featured_review->ID); ?>"</p>
                        <p class="author"><?php the_field('author', $featured_review->ID); ?> <?php if( $review_source['value'] !== 'unknown' ) : ?>(<?php esc_html_e($review_source['label']); ?>)<?php endif; ?></p>
                    </div>
                </div>
                <!-- Add this back when we decide to add Testimonials page back to site! -->
                <!-- <a href="<?php //esc_html_e($reviews_page_link); ?>" class="">View All Testimonials</a> -->
            </div>
            <div class="result-wrapper">
                <div class="row">
                    <div class="result">
                        <p class="subtitle"><span>Case Result</span> <span class="line-filler"></span></p>
                        <h2 class="amount">$<?php esc_html_e(number_format(get_field('case_amount', $featured_result->ID), 0)); ?></h2>
                        <p class="title"><?php the_field('title', $featured_result->ID); ?></p>
                    </div>
                    <?php if( $second_featured_result ) : ?>
                    <div class="result">
                        <p class="subtitle"><span>Case Result</span> <span class="line-filler"></span></p>
                        <h2 class="amount">$<?php esc_html_e(number_format(get_field('case_amount', $second_featured_result->ID), 0)); ?></h2>
                        <p class="title"><?php the_field('title', $second_featured_result->ID); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <a href="<?php esc_html_e($results_page_link); ?>" class="">View All Results</a>
            </div>


            
            
        </div>
    </div>
</div>