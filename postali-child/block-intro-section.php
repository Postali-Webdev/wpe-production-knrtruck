<?php /*Intro Section Block*/ 
$intro_block = $args['data'];
$image_position = $intro_block['block_section_intro_image']['image_placement'];
$image = $intro_block['block_section_intro_image']['image'];
$sub_title = $intro_block['block_section_intro_sub_title'];
$title = $intro_block['block_section_intro_h2_title'];
$copy = $intro_block['block_section_intro_main_copy'];
$vertical_text = $intro_block['block_section_intro_vertical_text'];
$cta = $intro_block['block_section_intro_h2'];
$block_style = 'no-image';

if( $image_position === 'left' ) {
    $image_width = 'column-25';
    $copy_width = 'column-60';
    $block_style = 'image-left';
} elseif( $image_position === 'top' ) {
    $image_width = 'column-full';
    $copy_width = 'column-90';
    $block_style = 'image-top';
}
?>

<div class="intro-block block-<?php esc_html_e($block_style); ?>" id="<?php echo strtolower( str_replace( ' ', '-', $sub_title) ); ?>">
    <?php if( $image_position === 'top' ) : ?>
        <div class="img-container <?php esc_html_e($image_width); ?>">
            <img src="<?php esc_html_e($image['url']); ?>" alt="<?php esc_html_e($image['alt']); ?>" class="responsive-img">
        </div>
    <?php endif; ?>

    <div class="columns">
        <?php if( $image_position !== 'hide' && $image_position !== 'top' ) : ?>
        <div class="img-container <?php esc_html_e($image_width); ?>">
            <img src="<?php esc_html_e($image['url']); ?>" alt="<?php esc_html_e($image['alt']); ?>" class="responsive-img">
        </div>
        <?php endif; ?>

        <div class="copy-container <?php esc_html_e($copy_width); ?>">
            <div class="columns">
                <div class="column-50 center">

                    <p class="subtitle"><?php esc_html_e($sub_title); ?></p>
                    <h2><?php esc_html_e($title); ?></h2>

                    <?php echo $copy; ?>
                    <?php if($cta) : ?><a href="<?php esc_html_e($cta['url']); ?>" class="btn"><span><?php esc_html_e($cta['title']); ?></span></a> <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>