<?php
/**
 * Template Name: Sitemap
 * @package Postali Child
 * @author Postali LLC
**/
get_header();



?>

<div id="default-page" class="wrapper">

    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1>Sitemap</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <div>
                        <h3>Pages</h3>
                        <?php echo wp_list_pages("title_li="); ?>
                    </div>
                </div>
                <div class="column-50">
                    <div>
                        <h3>Blogs</h3>
                        <?php echo wp_get_archives('type=postbypost'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>