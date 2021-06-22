<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
    <header class="site-header">
        <div class="container header-grid">
            <div class="navigation-bar">
                <div class="logo">
                    <a href="<?= home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri() . '/img/logo.svg' ;?>" alt="">
                    </a>
                </div><!-- logo -->

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => 'nav',
                    'container_class' => 'main-menu'
                ));
                ?>
            </div><!-- navigation-bar -->
        </div><!-- container -->
    </header>

