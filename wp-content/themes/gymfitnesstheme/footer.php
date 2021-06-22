<footer class="site-footer container">
    <div class="footer-content">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'container' => 'nav',
            'container_class' => 'footer-menu'
        ));
        ?>
        <p class="footer-copyright">All rights reserved. <?= bloginfo('name') . " " . date("Y"); ?></p>
    </div>
</footer>
 <?php wp_footer(); ?>
</body>
</html>