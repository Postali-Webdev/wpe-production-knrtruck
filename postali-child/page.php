<?php
/**
 * Default Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Fields

?>

<div id="default-page" class="wrapper">

    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1><?php echo get_the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>