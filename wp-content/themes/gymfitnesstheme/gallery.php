<?php
/**
 * Template Name: Gallery
 */


get_header(); ?>

    <main class="container page section">
        <?php while (have_posts()) : the_post(); ?>
            <h1 class="text-center text-primary"><?php the_title(); ?></h1>

            <?php
                $gallery = get_post_gallery( get_the_ID(), false);
                $gallery_image_ids = explode(',',$gallery['ids']);
            ?>
            <ul class="gallery-images">
                <?php $counter = 0; foreach ($gallery_image_ids as $id):
                    $size = ($counter === 3) || ($counter === 6) ? 'portrait' : 'square';
                    $thumbnail = wp_get_attachment_image_src($id, $size);
                    $image = wp_get_attachment_image_src($id, 'large'); ?>
                    <li>
                        <a href="<?= $image[0]; ?>" data-lightbox="gallery">
                            <img src="<?= $thumbnail[0]; ?>" alt="">
                        </a>
                    </li>
                <?php $counter++; endforeach;?>
            </ul>
        <?php endwhile; ?>
    </main>

<?php get_footer(); ?>
