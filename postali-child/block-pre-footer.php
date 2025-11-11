    <?php $default_phone_number = get_field('default_phone_number', 'options'); ?>
    
    <div class="columns">
        <div class="column-75 center pre-footer-block">
            <div>
                <h3><?php the_field('pre_footer_title', 'options'); ?></h3>
                <?php the_field('pre_footer_copy', 'options'); ?>
                <div class="cta-container">
                    <a href="tel:<?php esc_html_e($default_phone_number); ?>" class="btn"><span><?php esc_html_e( readable_phone_numb( $default_phone_number ) ); ?></span></a>
                    <p class="cta-text"><?php the_field('pre_footer_cta_copy', 'options'); ?></p>
                </div>
            </div>
        </div>
    </div>