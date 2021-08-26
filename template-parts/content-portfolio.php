<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chad_Ohl_Portfolio
 */

?>


<section id="work" class="container">
    <h2 class="text-center">Work</h2>

    <?php 
    $loop = new WP_Query( array( 'post_type' => 'portfolio' ) ); 
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" class="work-highlight">


        <?php if( have_rows('work_images') ): ?>
                <?php while( have_rows('work_images') ): the_row(); 
                // Get sub field values.
                $image1 = get_sub_field('image_1');
                ?>

                <div>
                    <a class="image-wrap" href="<?php echo esc_url( $image1['url'] ); ?>"
                        data-fslightbox="gallery-nuflours">
                        <img data-aos="fade-in" data-aos-duration="1000"
                            src="<?php echo esc_url( $image1['url'] ); ?>" alt="<?php echo esc_attr( $image1['alt'] ); ?>">
                    </a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

            <div class="description">
                <?php 
                the_title( '<h4>', '</h4>' ); 
                the_field('work_description'); 
                ?>
            </div>
        </article><!-- #post-<?php the_ID(); ?> -->
    <?php endwhile; ?>

</section>
