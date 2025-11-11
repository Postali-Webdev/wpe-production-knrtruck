<?php /* Awards Slider Block */ ?>
<?php if( have_rows('awards_slider','options') ) : ?>
<div id="award-slider">
    <?php while( have_rows('awards_slider','options') ): the_row(); 
        $award_image = get_sub_field('award'); ?>
            <div class="award-item">
                <img src="<?php esc_html_e($award_image['url']); ?>" alt="<?php esc_html_e($award_image['alt']); ?>"/>
            </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>