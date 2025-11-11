<?php
/**
 * Archive Search Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
?>

<div id="archive-results" class="wrapper">

    <section id="hero">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                        <h1>Search Results</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <span id="main-content"></span>
    <?php if( have_posts() ) : ?>
    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="results-container">
                        <?php while( have_posts() ) : the_post(); 
                        
                        ?>
                            <div class="result">
                                
                                <h2><?php esc_html_e( get_the_title() ); ?></h2>
                                <p class="copy">
                                    <?php 
                                    if (has_excerpt() ){
                                        the_excerpt();
                                    } else {
                                        excerpt_function($post->ID, $_GET['s']);
                                    } 
                                ?>
                                </p>
                                <a class="highlight" href="<?php esc_html_e(get_the_permalink()); ?>" class="subtitle">Learn More About <?php esc_html_e( get_the_title() ); ?></a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php else : ?>

        <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <p class="subtitle"><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                        <div class="spacer-30"></div>
                        <div class="cta-container">
                            <a href="/" class="btn"><span>Return to Home</span></a>
                            <?php echo(get_search_form()); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>

    <section id="panel-2">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php echo get_pagination(); ?>
                </div>
            </div>
        </div>
    </section>
    
        
    

</div>

<?php get_footer();?>