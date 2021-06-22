<?php get_header(); ?>

    <main class="container page section">
        <ul class="classes-list">
            <?php
                $classes = new WP_Query(array(
                        'post_type' => 'fitness_classes'
                ));
            ?>

            <?php while ($classes->have_posts()) : $classes->the_post(); ?>
                <li class="gym-class card gradient">
                    <?php the_post_thumbnail('mediumSize');?>
                    <div class="card-content">
                        <a href="<?php the_permalink();?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <?php
                            $startTime = get_field('start_time');
                            $endTime = get_field('end_time');
                        ?>
                        <p><?php echo the_field('class_days') . " - " . $startTime. " to " . $endTime;;?></p>
                    </div>
                </li>
            <?php endwhile; wp_reset_postdata();?>
        </ul>
    </main>

<?php get_footer(); ?>