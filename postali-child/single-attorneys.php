<?php
/**
 * Single Attorneys Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Fields
$hero_image = get_field('attorney_photo');
$phone = get_field('phone');
$fax = get_field('fax');
$attorney_location = get_field('office');
$locations = get_field('locations', 'options');
$location_link = '';

foreach( $locations as $location ) {
    $city_name = $location['city_name'];

    if ( $attorney_location['label'] == $city_name ) {
        
        if( !$phone ) {
            $phone = $location['phone_number'] ? $location['phone_number'] : get_field('default_phone_number', 'options');
        } 
        if ( !$fax ) {
            $fax = $location['fax_number'] ? $location['fax_number'] : get_field('default_fax_number', 'options');
        }

        $location_link = $location['location_page_link'] ? $location['location_page_link'] : '/';
    }
}
?>

<div id="single-attorneys" class="wrapper">

    <section id="hero" class="tall-hero">
        <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
            <div class="columns">
                <div class="column-33">
                    <img src="<?php esc_html_e($hero_image['url']); ?>" alt="<?php esc_html_e($hero_image['alt']); ?>" class="responsive-img">
                </div>
                <div class="column-66">
                    <div>
                        <div class="hero-wrapper">
                            
                            <h1><?php the_field('name'); ?></h1>
                            <p class="heavy-text green"><?php the_field('position'); ?></p>
                            <div class="contact-row">
                                <div class="contact-item">
                                    <div class="icon"><span class="icon-phone-icon"></span></div><a href="tel:<?php esc_html_e($phone); ?>" ><?php esc_html_e( readable_phone_numb( $phone ) ); ?></a>
                                </div>
                                <div class="contact-item">
                                    <div class="icon"><span class="icon-location-pin"></span></div><?php if( get_field('email') ) : ?><a href="tel:<?php the_field('email'); ?>" >Email: <?php the_field('email'); ?></a><?php endif; ?>
                                    <a title="learn more about our services in <?php esc_html_e($attorney_location['label']);?>" href="<?php echo $location_link; ?>"><span class="location-text"><?php esc_html_e($attorney_location['label']); ?> Office</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="spacer-15"></div>

                        <?php if( have_rows('practice_areas') ) : 
                            $count = 0; 
                            $pa_length = count(get_field('practice_areas')); ?>
                        <div class="accordions">
                            <?php $firstname = get_field('name'); ?>
                            <div class="accordions_title"><strong><?php echo strtok($firstname, " "); ?>'s Areas of Practice</strong><span></span></div>
                            <div class="accordions_content">
                                <?php while( have_rows('practice_areas') ) : 
                                    the_row(); 
                                    $count++; ?>

                                <?php if( get_sub_field('practice_area_page_link') ) : ?>
                                <a href="<?php the_sub_field('practice_area_page_link'); ?>" alt="learn more about <?php the_sub_field('practice_area_name'); ?>">
                                <?php endif; ?>
                                    <span><?php echo $count !== $pa_length ? get_sub_field('practice_area_name') . ',' : get_sub_field('practice_area_name'); ?></span>
                                <?php if( get_sub_field('practice_area_page_link') ) : ?>
                                    </a>
                                <?php endif; ?>

                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="spacer-30"></div>
                        <?php the_field('main_copy'); ?>

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
                                <div class="spacer-15"></div>
                                <p class="yt-video_meta_desc"><?php echo $vid_desc; ?></p>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if( have_rows('bar_admissions_list') ) : ?>
                            <div class="list-block">
                                <p class="block-title">Bar Admissions</p>
                                <ul>
                                <?php while( have_rows('bar_admissions_list') ) : the_row(); ?>
                                    <li><?php the_sub_field('bar_admission'); ?></li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('professional_associations_&_memberships_list') ) : ?>
                            <div class="list-block">
                                <p class="block-title">Professional Associations & Memberships</p>
                                <ul>
                                <?php while( have_rows('professional_associations_&_memberships_list') ) : the_row(); ?>
                                    <li><?php the_sub_field('associationmembership'); ?></li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('education_list') ) : ?>
                            <div class="list-block">
                                <p class="block-title">Education</p>
                                <ul>
                                <?php while( have_rows('education_list') ) : the_row(); ?>
                                    <li><?php the_sub_field('education'); ?></li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if( have_rows('honors_awards_list') ) : ?>
                            <div class="list-block">
                                <p class="block-title">Honors & Awards</p>
                                <ul>
                                <?php while( have_rows('honors_awards_list') ) : the_row(); 
                                $award_link = get_sub_field('honors_award_link');
                                ?>
                                    <li>
                                        <?php if ($award_link) : ?>
                                            <a target="_blank" href="<?php echo $award_link; ?>">
                                        <?php endif; ?>
                                        <?php the_sub_field('honors_award'); ?>
                                        <?php if ($award_link) : ?>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('professional_experience_list') ) : ?>
                            <div class="list-block">
                                <p class="block-title">Professional Experience</p>
                                <ul>
                                <?php while( have_rows('professional_experience_list') ) : the_row(); ?>
                                    <li><?php the_sub_field('professional_experience'); ?></li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    

</div>

<?php get_template_part('block','pre-footer-contact'); ?>

<?php get_footer();?>