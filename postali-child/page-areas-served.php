<?php
/**
 * Template Name: Areas Served
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div id="areas-served" class="wrapper">
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
                    <div class="location-container">
                        <h3>Multiple Office Locations</h3>
                        <?php if( have_rows('locations', 'options') ) : ?>
                            <ul>
                                <?php while( have_rows('locations', 'options') ) : the_row(); ?>
                                    <li>
                                        <?php if( get_sub_field('location_page_link') ) : ?> <a class="ignore-highlight" href="<?php the_sub_field('location_page_link') ?>"><?php endif; ?>
                                        <span><?php the_sub_field('city_name'); ?></span>
                                        <?php if( get_sub_field('location_page_link') ) : ?></a><?php endif; ?>
                                    </li>
                                <?php endwhile ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

<?php get_footer();?>