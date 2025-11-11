<?php
/**
 * Template Name: Practice Area Parent
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Fields
$hero_image = get_field('hero_banner_image');
$default_phone_number = get_field('default_phone_number', 'options');

$page_categories = get_the_category();
$page_category_id = $page_categories[0]->cat_ID; 

$related_posts_args = array( 
    'posts_per_page' => 4, 
    'category' => $page_category_id,
    'post__not_in' => array( $post->ID )
);

$related_posts = get_posts( $related_posts_args );
$count_posts = count($related_posts); 

?>

<div class="in-page-mobile">
    <ul>
        <li>
            <a class="expand"><span>On This Page</span> &nbsp; <span class="icon-expand">+</span></a>
            <div class="detail" style="display:none;">
                <div class="links">
                <?php if( have_rows('p1_body_content') ) : ?>
                <?php while ( have_rows('p1_body_content') ) : the_row(); ?>
                    <?php if( get_row_layout() === 'section_intro_block' ) : ?>
                        <?php 
                        $cloned_group = get_sub_field('section_intro'); 
                        if ($cloned_group) { ?>
                            <?php    
                                $sub_title = $cloned_group['block_section_intro_sub_title'];
                            ?>
                            <a href="#<?php echo strtolower( str_replace( ' ', '-', $sub_title) ); ?>"><?php echo $sub_title; ?></a>
                        <?php  } ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </li>
    </ul>
</div>

<div id="pa-parent" class="wrapper nobg">

    <section id="hero" class="tall-hero" style="background-image:url('<?php esc_html_e($hero_image['url']); ?>'); ?>">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                    <h1><?php the_field('hero_title'); ?></h1>
                    <p class="catchline"><?php the_field('catchline'); ?></p>
                    <div class="cta-container">
                        <a href="tel:<?php esc_html_e($default_phone_number); ?>" class="btn"><span><?php esc_html_e( readable_phone_numb( $default_phone_number ) ); ?></span></a>
                        <p class="cta-text"><?php the_field('cta_text'); ?></p>
                    </div>
                </div>
                <div class="column-33 quote">
                    <p><?php the_field('testimonial_quote'); ?></p>
                    <?php 
                    $image = get_field('testimonial_image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>

                    <?php if ( get_field('add_video') == true ) {
                        $vid_id = get_field('video_id');
                        $vid_title = get_field('video_title');
                        $vid_desc = get_field('video_description');
                    ?>
                        <div class="yt-video">
                            <h4 class="yt-video_meta_title"><?php echo $vid_title; ?></h4>
                            <div class="yt-video_holder">
                                <iframe class="yt-video_holder_embed" width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php echo $vid_id; ?>?si=BFX2lbguNvuAIBpv&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="yt-video_meta">
                                <p class="yt-video_meta_desc"><?php echo $vid_desc; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <span id="main-content"></span>

    <div class="in-page">
        <div class="in-page-nav">
            <?php if( have_rows('p1_body_content') ) : ?>
            <p>ON THIS PAGE:</p>
            <ul>
            <?php while ( have_rows('p1_body_content') ) : the_row(); ?>
                <?php if( get_row_layout() === 'section_intro_block' ) : ?>
                    <?php 
                    $cloned_group = get_sub_field('section_intro'); 
                    if ($cloned_group) { ?>
                        <?php    
                            $sub_title = $cloned_group['block_section_intro_sub_title'];
                        ?>
                        <li><a href="#<?php echo strtolower( str_replace( ' ', '-', $sub_title) ); ?>"><?php echo $sub_title; ?></a></li>     
                    <?php  } ?>
                <?php endif; ?>
            <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>

    

    <section id="panel-1">
        <?php if( have_rows('p1_body_content') ) : ?>
            <?php while ( have_rows('p1_body_content') ) : the_row(); ?>

                <?php if( get_row_layout() === 'section_intro_block' ) : ?>
                    <?php get_template_part('block', 'intro-section', ['data' => get_sub_field('section_intro')]); ?>
                <?php endif; ?>

                <?php if( get_row_layout() === 'copy_block' ) : ?>
                    <div class="container">
                        <div class="columns">
                            <div class="column-50 center">
                                <div>
                                    <?php the_sub_field('copy') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            
                <?php if( get_row_layout() === 'awards_slider_block' ) : ?>
                    <div class="container">
                        <div class="columns">
                            <div class="column-full">
                                <?php get_template_part('block', 'awards'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( get_row_layout() === 'featured_result_review_block' ) : ?>
                    <div class="container">
                        <div class="columns">
                            <div class="column-50 center">
                                <?php get_template_part('block', 'featured-review-result', ['data' => get_sub_field('flex_featured_result_review')]); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <?php if( $related_posts ) : ?>
    <section id="panel-2">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php get_template_part('block', 'related-posts'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

</div>

<?php get_footer();?>