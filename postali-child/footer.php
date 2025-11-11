<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/

$default_phone_number = get_field('default_phone_number', 'options');
?>

<div class="cta-follower">
    <div class="cta-close"><span class="icon-close-icon"></span></div>
    <p><?php the_field('fixed_cta_block','options'); ?></p>
    <a href="tel:<?php esc_html_e($default_phone_number); ?>" class="btn"><span><?php esc_html_e( readable_phone_numb( $default_phone_number ) ); ?></span></a>
</div>

<footer>
    <section id="footer-block">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <div class="logo-social-container">
                        <div class="directions-container">
                            <a href="https://ohiotruckaccidenthelp.com/" class="custom-logo-link" rel="home" aria-current="page">
                                <img src="/wp-content/uploads/2023/02/knr-truck-logo-v2.svg" class="custom-logo entered lazyloaded" alt="Ohio Truck Accident Help logo">
                            </a>
                        </div>

                        <?php if( have_rows('social_links', 'options') ) : ?>
                        <div class="socials">
                            <p>Follow us on social</p>
                            <div class="social-container">
                                <?php while( have_rows('social_links', 'options') ) : the_row(); 
                                    $social_link = get_sub_field('link');?>
                                    <a href="<?php esc_html_e($social_link['url']); ?>" target="_blank" title="follow us on <?php the_sub_field('title'); ?>" class="social-icon social-icon_<?php the_sub_field('title'); ?>"></a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <p class="disclaimer"><?php the_field('disclaimer', 'options') ?> &copy; <?php echo date('Y'); ?> by Ohio Truck Accident Help. All rights reserved. <a href="/sitemap/" title="view sitemap">Click for sitemap</a>. <?php if(have_rows( 'locations', 'options' ) ) : while(have_rows( 'locations', 'options' ) ) : the_row(); if( get_sub_field('city_name') == 'Akron') : ?><?php the_sub_field('address'); ?>. <a class="directions" href="<?php the_sub_field('directions_url'); ?>" target="_blank">Directions</a><?php endif; ?><?php endwhile; endif;?> </p>
                    <?php if(is_page_template('front-page.php')) { ?>
                    <a href="https://www.postali.com/?utm_source=clientname&utm_medium=footer&utm_campaign=client-sites" title="Site design and development by Postali" target="blank" class="postali"><img src="/wp-content/uploads/2025/04/postali-tag.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:0;"></a>
                    <?php } ?>
                    </div>
                <?php if( have_rows( 'locations', 'options' ) ) : 
                    $num_locations = count( get_field('locations', 'options') );?>
                <div class="column-50">
                    <h4>Legal Help Across Ohio</h4>
                    <div class="locations-container">
                        <?php while( have_rows( 'locations', 'options' ) ) : the_row(); ?>
                            <div class="location">
                                <?php if( get_sub_field('location_page_link') ) : ?><a class="location-link" href="<?php the_sub_field('location_page_link'); ?>"><span> <?php endif; ?>
                                    <?php the_sub_field('city_name'); ?>
                                <?php if( get_sub_field('location_page_link') ) : ?></span></a><?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>

<script>
    // Function to set a cookie
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // Function to get a cookie
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Function to hide cta-follower on cta-close click and set a cookie
    function hideCtaFollowerOnClick() {
        const ctaFollower = document.querySelector('.cta-follower');
        const ctaClose = document.querySelector('.cta-close');

        if (!ctaFollower || !ctaClose) return;

        // Check if the cookie is set
        if (getCookie('ctaFollowerHidden')) {
            ctaFollower.style.display = 'none';
        } else {
            ctaClose.addEventListener('click', function () {
                ctaFollower.style.display = 'none';
                setCookie('ctaFollowerHidden', 'true', 365); // Set cookie for 1 year
            });
        }
    }

    // Initialize the function on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', hideCtaFollowerOnClick);
</script>

<!-- callrail script -->
<script type="text/javascript" src="//cdn.callrail.com/companies/846415161/1f593063db6ce5c2fb1b/12/swap.js"></script>

</body>
</html>


