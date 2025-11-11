    <?php $default_phone_number = get_field('default_phone_number', 'options'); ?>
    <section class="contact-footer">
        <div class="mobile"></div>
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2><?php the_field('contact_pre_footer_title','options'); ?></h2>
                    <p><?php the_field('contact_pre_footer_cta_copy','options'); ?></p>
                    <div class="pre-footer-contact">
                        <a href="tel:<?php esc_html_e($default_phone_number); ?>" class="btn"><span><?php esc_html_e( readable_phone_numb( $default_phone_number ) ); ?></span></a>
                        <div class="callout-copy">
                            <p><?php the_field('contact_pre_footer_callout','options'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>