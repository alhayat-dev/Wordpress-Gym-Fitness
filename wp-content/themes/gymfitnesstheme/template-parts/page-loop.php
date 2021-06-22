<?php while (have_posts()) : the_post(); ?>
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>
    <?php
    if (has_post_thumbnail()) :
        the_post_thumbnail('blog', array('class' => 'featured-image'));
    endif; ?>

    <?php
        $startTime = get_field('start_time');
        $endTime = get_field('end_time');
    ?>

    <?php if( get_post_type() === 'fitness_classes') : ?>
        <p class="content-class">
            <?php echo the_field('class_days') . " - " . $startTime. " to " . $endTime;;?>
        </p>
    <?php endif; ?>

    <?php the_content(); ?>
<?php endwhile; ?>