<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/

$default_phone_number = get_field('default_phone_number', 'options');

// ACF Fields

get_header();
?>

<div id="front-page">
    
    <div class="wrapper nobg">
        <span id="main-content"></span>

        <section class="hp-banner black">
            <div class="truck-icon" id="truck-banner">
                <img src="/wp-content/uploads/2025/02/knr-truck-semi.jpg" alt="">
            </div>
            <div class="container">
                <div class="columns">
                    <div class="column-full centered">
                        
                        <p class="banner-headline-top">
                            <span class="word">Truck</span> 
                            <span class="word">Crashes</span> 
                            <span class="word">Are</span> 
                            <span class="word">Different.</span>
                        </p>

                        <div class="spacer-15"></div>

                        <p class="banner-headline-bottom">
                            <span class="wrap-top">
                                <span class="word">Get</span> 
                                <span class="word">Ohio</span> 
                                <span class="word">Truck</span> 
                            </span>
                            <span class="wrap-bottom">
                                <span class="word">Accident</span> 
                                <span class="word">Help.</span>
                            </span>
                        </p>

                        <div class="spacer-60"></div>
                        <div class="banner-contact">
                            <a href="tel:<?php esc_html_e($default_phone_number); ?>" class="btn square"><span><?php esc_html_e( readable_phone_numb( $default_phone_number ) ); ?></span></a>
                            <p><?php the_field('banner_contact_cta'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="spacer-90"></div>
                <div class="columns">
                    <div class="column-50"></div>
                    <div class="column-33 lined">
                        <h1><?php the_field('banner_headline'); ?></h1>
                        <p><?php the_field('banner_copy'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="hp-testimonials black">
            <div class="container">
                <div class="columns">
                    <div class="column-75 centered center">
                        <p class="testimonial"><?php the_field('testimonial_quote'); ?></p>
                        <p class="author"><?php the_field('testimonial_author'); ?></p>
                        <?php 
                        $image = get_field('testimonial_logo');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="hp-panel-3" class="truck black">
            <div class="truck-icon" id="truck-1">
                <img src="/wp-content/uploads/2025/02/knr-truck-semi.jpg" alt="">
            </div>
            <div class="container">
                <div class="columns top">
                    <div class="column-33">
                        <p class="pre-headline"><?php the_field('p3_pre-headline'); ?></p>
                        <h2><?php the_field('p3_headline'); ?></h2>
                    </div>
                    <div class="column-33">&nbsp;</div>
                </div>

                <div class="columns crashes">
                    <div class="column-33">&nbsp;</div>
                    <div class="column-33 wide">
                        <div class="stat">
                            <span id="counter"><span class="counter-value number" data-count="<?php the_field('p3_stat_number') ?>">0</span><span class="number">+</span></span>
                            <div class="description"><?php the_field('p3_stat_description'); ?></div>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="stat-copy" data-cue="fadeIn" data-duration="1000">
                            <?php the_field('p3_stat_copy'); ?>
                        </div>
                    </div>
                    <div class="accident-icon">
                        <img src="/wp-content/uploads/2025/02/truck-1-car.png" alt="" class="car">
                        <img src="/wp-content/uploads/2025/02/truck-1-alert.png" alt="" class="alert">
                        <img src="/wp-content/uploads/2025/02/truck-1-attorney.png" alt="" class="attorney">
                    </div>
                </div>

                <div class="columns center">
                    <div class="column-33" data-cue="fadeIn" data-duration="1000">
                        <h3><?php the_field('p3_contact_headline'); ?></h3>
                        <?php the_field('p3_contact_copy'); ?>
                        <a href="tel:<?php esc_html_e($default_phone_number); ?>" class="btn"><span><?php esc_html_e( readable_phone_numb( $default_phone_number ) ); ?></span></a>
                    </div>
                    <div class="column-33 form wide">
                        <h4><?php the_field('p3_contact_form_headline'); ?></h4>
                        <?php echo do_shortcode( get_field('p3_contact_form_shortcode') ); ?>
                    </div>
                </div>
            </div>
            <div class="truck-shadow"></div>
        </section>

        <section id="hp-panel-4">
            <div class="container">
                <div class="columns">
                    <div class="column-33">
                        <h2><?php the_field('p4_headline'); ?></h2>
                        <p><?php the_field('p4_copy'); ?></p>
                    </div>
                    <div class="column-66">
                    <?php if( have_rows('p4_callouts') ): ?>
                    <?php while( have_rows('p4_callouts') ): the_row(); ?>  
                        <div class="column-50 callout">
                        <?php 
                        $image = get_sub_field('icon');
                        if( !empty( $image ) ): ?>
                        <div class="icon">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                        <?php endif; ?>
                            <p class="large"><strong><?php the_sub_field('headline'); ?></strong></p>
                            <p><?php the_sub_field('copy'); ?></p>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    <div class="spacer-60"></div>
                    <?php the_field('p4_bottom_copy_block'); ?>
                    </div>
                </div>
                <div class="column-full">
                    <?php get_template_part('block','awards'); ?>
                </div>
            </div>
        </section>


        <section id="hp-panel-5" class="truck black">
            <div class="truck-icon" id="truck-2">
                <img src="/wp-content/uploads/2025/02/knr-truck-semi.jpg" alt="">
            </div>
            <div class="container">
                <div class="columns">
                    <div class="column-33">
                        <p class="pre-headline"><?php the_field('p5_pre-headline'); ?></p>
                        <h2><?php the_field('p5_headline'); ?></h2>
                        <p><?php the_field('p5_top_copy'); ?></p>
                    </div>
                    <div class="column-33 empty">&nbsp;</div>
                </div>

                <div class="columns accident">
                    <div class="column-33 empty">&nbsp;</div>
                    <div class="column-33 chart">
                        <div class="statistic">
                            <span id="counter2"><span class="counter-value2 number" data-count="91">0</span><span class="number">%</span></span>
                        </div>
                        <div class="donut-chart">
                            <div class="details">
                                <span> $77,600</span> Average
                            </div>
                            <div class="half-donut-chart">
                                <div class="half-donut-fill"></div>
                            </div>
                        </div>
                        <div class="description">
                            According to the IRC, 91% of victims who work with an attorney receive compensation for an average of $77,600 – over 3X more than those who represented themselves.
                        </div>
                    </div>
                    <div class="car-icon" id="car-2">
                        <img src="/wp-content/uploads/2025/02/truck-2-car.png" alt="" class="car-2">
                        <img src="/wp-content/uploads/2025/02/truck-1-alert.png" alt="" class="alert-2">
                    </div>
                </div>

                <div class="columns">
                    <div class="column-33 empty"></div>
                    <div class="column-33 wide" data-cue="fadeIn" data-duration="1000"><?php the_field('p5_copy_block_1'); ?></div>
                    <div class="spacer-60"></div>
                    <div class="column-33 empty"></div>
                    <div class="column-33 wide" data-cue="fadeIn" data-duration="1000"><?php the_field('p5_copy_block_2'); ?></div>
                    <div class="spacer-60"></div>
                    <div class="column-33 empty"></div>
                    <div class="column-33 wide" data-cue="fadeIn" data-duration="1000"><?php the_field('p5_copy_block_3'); ?></div>
                    <div class="spacer-60"></div>
                    <div class="column-33" data-cue="fadeIn" data-duration="1000"><?php the_field('p5_copy_block_4'); ?></div>
                    <div class="column-33 empty"></div>
                    <div class="spacer-60"></div>
                    <div class="column-33" data-cue="fadeIn" data-duration="1000"><?php the_field('p5_copy_block_5'); ?></div>
                    <div class="column-33 empty"></div>
                    <div class="spacer-60"></div>
                </div>

            </div>
        </section>

        <section id="hp-panel-6">
            <div class="top-banner" style="background:url('<?php the_field('p6_background_image'); ?>');">
                <div class="container">
                    <div class="columns">
                        <div class="column-33">
                            <p class="pre-headline"><?php the_field('p6_pre-headline'); ?></p>
                            <h2><?php the_field('p6_headline'); ?></h2>
                            <p><?php the_field('p6_top_copy'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns">
                    <div class="column-full skinny">
                    <?php if( have_rows('p6_callouts') ): ?>
                    <?php while( have_rows('p6_callouts') ): the_row(); ?>  
                        <div class="column-33 callout">
                        <?php 
                        $image = get_sub_field('icon');
                        if( !empty( $image ) ): ?>
                        <div class="icon">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                        <?php endif; ?>
                            <p class="large"><strong><?php the_sub_field('headline'); ?></strong></p>
                            <p><?php the_sub_field('copy'); ?></p>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                        <div class="column-33 callout cta">
                            <?php the_field('p6_cta_block'); ?>
                            <a href="tel:<?php esc_html_e($default_phone_number); ?>" class="btn"><span><?php esc_html_e( readable_phone_numb( $default_phone_number ) ); ?></span></a>
                        </div>
                    </div>
                    <div class="spacer-60"></div>
                    <div class="column-66 center">
                        <?php the_field('p6_bottom_copy'); ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="hp-panel-7">
            <div class="container">
                <div class="columns">
                    <div class="column-33">
                        <p class="pre-headline"><?php the_field('p7_pre-headline'); ?></p>
                        <h2><?php the_field('p7_headline'); ?></h2>
                        <p><?php the_field('p7_top_copy'); ?></p>
                    </div>
                    <div class="column-66">
                    <?php if( have_rows('p7_faqs') ): ?>
                    <?php while( have_rows('p7_faqs') ): the_row(); ?>  
                        <div class="accordions">
                            <div class="accordions_title"><h3><?php the_sub_field('faq_question'); ?></h3><span></span></div>
                            <div class="accordions_content"><p><?php the_sub_field('faq_answer'); ?></p></div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                </div>
            </div>
        </section>

        <section id="hp-panel-8" class="truck black">
            <div class="truck-icon" id="truck-3">
                <img src="/wp-content/uploads/2025/02/knr-truck-semi.jpg" alt="">
            </div>
            <div class="container">
                <div class="columns">
                    <div class="column-33">
                        <p class="pre-headline"><?php the_field('p8_pre-headline'); ?></p>
                        <h2><?php the_field('p8_headline'); ?></h2>
                        <?php the_field('p8_top_copy'); ?>
                    </div>
                    <div class="column-33 empty"></div>
                </div>
                <div class="columns">
                    <div class="column-33 empty"></div>
                    <div class="column-33 graph">
                        <div class="statistic">
                            <span id="counter3"><span class="counter-value3 number" data-count="45">0</span><span class="number">%</span></span>
                        </div>
                        <div class="bar-graph bar-graph-vertical bar-graph-two">
                            <div class="bar-one bar-container">
                                <div class="bar">
                                <span class="number">152</span>
                                </div>
                                <span class="year">2012</span>
                            </div>
                            <div class="bar-two bar-container">
                                <div class="bar">
                                <span class="number">220</span>
                                </div>
                                <span class="year">2021</span>
                            </div>
                        </div>
                        <div class="description">
                            Ohio truck accident fatalities increased 45% over the last decade—a dramatic surge fueled by driver shortages, distracted drivers, & more freight. If you or loved one are hurt – Get Help Now. 
                        </div>
                    </div>

                    <div class="text-icon" id="text">
                        <img src="/wp-content/uploads/2025/02/distracted-driving-icon.png" alt="" class="texting">
                    </div>

                </div>
            </div>
        </section>

        <?php get_template_part('block','pre-footer-contact'); ?>

    </div>
</div>

<script>
    scrollCue.init();
</script>


<?php get_footer();?>