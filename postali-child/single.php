<?php
/**
 * Single Post
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Fields
$hero_image = get_field('hero_image');
?>

<?php if( have_posts() ) : ?>
<div id="single-blog-post" class="wrapper">
    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <p class="date green"><?php esc_html_e(get_the_date()); ?></p>
                        <h1><?php esc_html_e( get_the_title() ); ?></h1>
                        <p class="categories">

                            <?php 
                        
                            $categories = get_the_category();
                            $separator = ', ';
                            $output = '';
                            if ( ! empty( $categories ) ) {
                            foreach( $categories as $category ) {
                                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="category-link ignore-highlight">' . esc_html( $category->name ) . '</a><span>' . $separator . '&nbsp; </span>';
                            }
                            echo trim( $output, $separator );
                            }
                                
                            ?>

                        </p>
                    </div>
                </div>
                <div class="column-33">
                    <?php if( $hero_image ) : ?>
                        <div class="img-container">
                            <img src="<?php esc_html_e($hero_image['url']); ?>" alt="<?php esc_html_e($hero_image['alt']) ?>"/>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <section id="panel-1">
        <div class="container wide">
            <div class="columns">
                <div class="post-intro-container">
                    <div class="inner-intro-container">
                        <div class="container">
                            <div class="columns">
                                <div class="column-66 center">

                                    <div class="info-container">
                                        <p><?php the_field('info_block'); ?></p>
                                    </div>

                                    <?php if ( get_field('add_video_copy') == true ) {
                                        $vid_id = get_field('video_id_copy');
                                        $vid_title = get_field('video_title_copy');
                                        $vid_desc = get_field('video_description_copy');
                                    ?>
                                        <div class="yt-video">
                                            <h4 class="yt-video_meta_title"><?php echo $vid_title; ?></h4>
                                            <div class="yt-video_holder">
                                                <iframe class="yt-video_holder_embed" width="560" height="315" src="https://www.youtube-nocookie.com/embed/<?php echo $vid_id; ?>?si=BFX2lbguNvuAIBpv&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                            </div>
                                            <div class="yt-video_meta">
                                                <div class="spacer-15"></div>
                                                <p class="yt-video_meta_desc"><?php echo $vid_desc; ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php the_field('p1_main_copy'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

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
</div>
<?php endif; ?>

<?php get_template_part('block','pre-footer'); ?>

<div class="spacer-60"></div>

<?php get_footer();?>