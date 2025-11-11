<?php
/**
 * Archive Attorneys Template
 * @package Postali Child
 * @author Postali LLC
**/

global $wp_query;
$total = $wp_query->found_posts;

if( have_posts() ) {
    $active_location_options = '';
    $active_location_arr = [];

    while( have_posts() ) {
        the_post();
        $location = get_field('office');
        $location_label = $location['label'];
        if( !in_array($location_label, $active_location_arr, true ) ) {
            $active_location_arr[] .= $location_label;
        } 
    }
    foreach( $active_location_arr as $location) {
        $location_options .= "<option for='location-filter' value='{$location}'>{$location}</option>";
    }
}


get_header();?>


<div id="archive-attorneys" class="wrapper">
    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                    <div class="title-container">
                        <h1>Our Team</h1>
                        <?php if( $total >= 10 ) : //show filter when we have 10 or more attorneys ?>
                        <div class="search-select-wrap">
                            <div class="select-container">
                                <select name="location-filter" id="location-filter">
                                    <option selected disabled="disabled">Filter by Location</option>
                                    <option for="location-filter" value="">All Locations</option>
                                    <?php _e($location_options); ?>
                                </select>
                            </div>
                            <div class="search-container">
                                <input id="attorney-filter" type="text" placeholder="Search Team Members">
                                <ul id ="search-results"></ul>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <?php if( have_posts() ) : ?>
    <section class="attorney-container">
        <div class="container">
            <div class="columns attorney-bind">
            <?php while( have_posts() ) : 
                the_post(); 
                $office = get_field('office');
                $photo = get_field('attorney_photo'); ?>

                <div class="attorney">
                    <a href="<?php esc_html_e( get_the_permalink() ); ?>" alt="more about <?php esc_html_e( get_field('position') ) . get_field('name'); ?>">
                        <p class="name"><?php the_field('name'); ?></p>
                        <p class="office"><?php esc_html_e($office['label']); ?> Office</p>
                        <img class="photo" src="<?php esc_html_e($photo['url']); ?>" alt="<?php esc_html_e($photo['alt']); ?>">
                    </a>
                </div>

            <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php get_template_part('block','pre-footer'); ?>
    <div class="spacer-60"></div>

</div>

<?php get_footer();?>