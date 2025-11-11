<?php
/**
 * Template Name: Contact
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

$page_image = get_field('lower_banner_image');
$default_phone_number = get_field('default_phone_number', 'options');

?>

<div id="contact">

    <section id="hero">
        <div class="container wrapper">
            <div class="columns">
                <div class="column-50">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <span id="main-content"></span>
                        <h1><?php the_field('hero_h1_title'); ?></h1>
                        <p><?php the_field('intro_copy'); ?></p>

                        <div class="cta-container">
                        <a href="tel:<?php esc_html_e($default_phone_number); ?>" class="btn"><?php esc_html_e( readable_phone_numb( $default_phone_number ) ); ?></a>
                        <p class="cta-text"><?php the_field('cta_text'); ?></p>
                    </div>
                    </div>
                </div>
                <div class="column-50">
                    <?php echo do_shortcode( get_field('contact_form', 'options') ); ?>
                </div>
            </div>
        </div>
    </section>
    
    <section id="panel-1" class="wrapper">
        <div class="container wide">
            <div class="columns">
                <div class="column-full">
                    <img class="ignore-lazy" src="<?php esc_html_e($page_image['url']) ?>" alt="<?php esc_html_e($page_image['alt']) ?>" />
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','pre-footer'); ?>

    <div class="spacer-60"></div>

</div>

<?php get_footer();?>