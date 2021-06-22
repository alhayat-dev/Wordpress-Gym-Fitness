<?php get_header('front'); ?>

    <?php while (have_posts()) : the_post(); ?>

        <section class="text-center section welcome">
            <h2 class="text-primary"><?php echo the_field('welcome_heading')?></h2>
            <p><?php echo the_field('welcome_text')?></p>
        </section>

        <section class="section-areas">
            <ul class="areas-container">
                <li class="area">
                    <?php
                        $area1 = get_field('area_1');
                        $image = wp_get_attachment_image_src($area1['area_image'], 'mediumSize')[0];
                    ?>
                    <img src="<?php echo $image?>" alt="<?php echo $area1['area_name']; ?>">
                    <p><?php echo $area1['area_name']; ?></p>
                </li>
                <li class="area">
                    <?php
                    $area2 = get_field('area_2');
                    $image = wp_get_attachment_image_src($area2['area_image'], 'mediumSize')[0];
                    ?>
                    <img src="<?php echo $image?>" alt="<?php echo $area2['area_name']; ?>">
                    <p><?php echo $area2['area_name']; ?></p>
                </li>

                <li class="area">
                    <?php
                    $area3 = get_field('area_3');
                    $image = wp_get_attachment_image_src($area3['area_image'], 'mediumSize')[0];
                    ?>
                    <img src="<?php echo $image?>" alt="<?php echo $area3['area_name']; ?>">
                    <p><?php echo $area3['area_name']; ?></p>
                </li>

                <li class="area">
                    <?php
                    $area4 = get_field('area_4');
                    $image = wp_get_attachment_image_src($area4['area_image'], 'mediumSize')[0];
                    ?>
                    <img src="<?php echo $image?>" alt="<?php echo $area4['area_name']; ?>">
                    <p><?php echo $area4['area_name']; ?></p>
                </li>
            </ul>
        </section>

        <section class="classes-homepage">
            <div class="section container">
                <h2 class="text-primary text-center">Our Classes</h2>
                <ul class="classes-list">
                    <?php
                    $classes = new WP_Query(array(
                        'post_type' => 'fitness_classes',
                        'posts_per_page' => 4
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
                
                <div class="button-container">
                    <a class="button" href="<?php echo get_permalink( get_page_by_title('Classes')); ?>">
                        View All Classes
                    </a>
                </div>
            </div>
        </section>

        <section class="instructors-homepage">
            <div class="section container">
                <h2 class="text-primary text-center">Our Instructors</h2>
                <p class="text-center">We have professionals instructors to achieve your goals.</p>

                <ul class="istructor-list">
                    <?php
                        $instructors = new WP_Query(array(
                            'post_type' => 'instructors',
                            'posts_per_page' => 4
                        ));
                    ?>

                    <?php while ($instructors->have_posts()) : $instructors->the_post();?>
                        <li class="instructor">
                            <?php the_post_thumbnail('mediumSize');?>
                            <div class="content text-center">
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                                <div class="speciality">
                                    <?php $specialities = get_field('speciality'); ?>
                                    <?php foreach ($specialities as $speciality): ?>
                                        <span class="tag"><?php echo $speciality; ?></span>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; wp_reset_postdata();?>
                </ul>
            </div>
        </section>

        <section class="testimonials">
            <h2 class="text-center">Testimonials</h2>
            <div class="container-testimonial">
                <ul class="testimonial-list">
                    <?php
                        $testimonials = new WP_Query(array(
                        'post_type' => 'testimonials',
                        'posts_per_page' => 3
                    ));
                    ?>

                    <?php while ($testimonials->have_posts()) : $testimonials->the_post();?>
                        <li class="testimonial text-center">
                            <blockquote>
                                <?php the_content();?>
                            </blockquote>
                            <footer class="testimonial-footer">
                                <?php the_post_thumbnail('thumbnail');?>
                                <p><?php the_title(); ?></p>
                            </footer>
                        </li>
                    <?php endwhile; wp_reset_postdata();?>
                </ul>
            </div>
        </section>

        <section class="blog container section">
            <h2 class="text-center">Our Blog</h2>
            <p>Read our experts blogposts to achieve your goals.</p>

            <ul class="blog-entries">
                <?php
                $blogs = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 4
                ));
                ?>
                <?php while ($blogs->have_posts()) : $blogs->the_post(); ?>
                    <li class="card gradient">
                        <?php the_post_thumbnail("mediumSize"); ?>
                        <?php the_category();?>
                        <div class="card-content">
                            <a href="<?php the_permalink();?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                            <p class="meta"><span> By: </span>
                                <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>">
                                    <?= get_the_author_meta('display_name'); ?>
                                </a>
                            </p>
                            <p class="date-published meta">
                                <span> Date: </span>
                                <?php the_time( get_option('date_format')); ?>
                            </p>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>

    <?php endwhile;?>
<?php get_footer(); ?>
