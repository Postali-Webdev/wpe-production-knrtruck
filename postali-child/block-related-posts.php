<!-- Related Posts Block --> 
<?php $categories = get_the_category();
$category_id = $categories[0]->cat_ID; 
?>

<?php $args = array( 
    'posts_per_page' => 4, 
    'category' => $category_id,
    'post__not_in' => array( $post->ID )
);

$relatedposts = get_posts( $args );
$count = count($relatedposts); 
?>

<?php if ($count >= 1) { ?>

<section class="related-posts">    
    <div class="columns">
        <div class="column-full">
            <h3>Related Articles</h3>
        </div>
        <div class="card-holder card-slider">
            <?php                 
            $relatedposts = get_posts( $args );
            foreach ( $relatedposts as $post ) : setup_postdata( $post ); 
            foreach (get_the_category() as $cat) { $category = $cat->name; }?>
                <div class="link-finder post-container card <?php if( !is_single() ) : ?> link-hunter <?php endif; ?>">
                    <div class="text-wrapper">
                        <p class="category"><span><?php echo $category; ?></span></p>
                        <p class="blog-title"><a class="ignore-highlight" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                    </div>
                   <p class="read">Read Article</p>
                </div>
            <?php endforeach; 
            wp_reset_postdata();?>
        </div>
    </div>
</section>

<?php } ?>