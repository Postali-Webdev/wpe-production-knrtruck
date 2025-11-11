<?php
/**
 * Template Name: Form Success
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<div id="default-page" class="wrapper">

    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1>Thanks for Reaching Out!</h1>
                        <p class="subtitle">Thank you for contacting Ohio Truck Accident Help. We will review your form submission and contact you as soon as we can. If you need immediate assistance, do not hesitate to contact us today at <a href="tel:8557212737">(855)721-2737.</a></p>
                        <div class="spacer-30"></div>
                        <div class="cta-container">
                            <a href="/" class="btn"><span>Back to Homepage</span></a>
                            <a href="/results/" class="btn"><span>View our Results</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>