<?php
/**
 * 404 Template
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
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <img src="/wp-content/uploads/2022/11/404-graphic.png"/>
                </div>
                <div class="column-full center">
                    <h3>We are unable to find the page you’re looking for.</h3>
                    <p>Do you want to go back to the <a href="/">homepage?</a></p>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>