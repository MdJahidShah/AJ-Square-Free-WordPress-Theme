<?php
use Elementor\Plugin;

// Check if Elementor is active
if ( class_exists( 'Elementor\Plugin' ) ) {
    $template_id = 271; // Replace with your template ID
    echo Plugin::$instance->frontend->get_builder_content($template_id);
}
?>


<footer>
    <section class="main-wrap">
        <div class="wrap">
            <div class="container">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>
