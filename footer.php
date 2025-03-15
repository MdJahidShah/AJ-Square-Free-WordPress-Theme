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
        
        <script>
          document.addEventListener("DOMContentLoaded", function() {
                // Scroll to Top Button
                const myBtn = document.getElementById("myBtn");
                const header = document.querySelector("header");

                function scrollFunction() {
                    if (document.documentElement.scrollTop > 20) {
                        myBtn.style.display = "block";
                    } else {
                        myBtn.style.display = "none";
                    }
                }

                myBtn?.addEventListener("click", () => {
                    window.scrollTo({ top: 0, behavior: "smooth" });
                });

                let lastScrollTop = 0;
                window.addEventListener("scroll", function() {
                    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    if (scrollTop > lastScrollTop) {
                        header?.classList.add("header-hidden"); // Hide header on scroll down
                    } else {
                        header?.classList.remove("header-hidden"); // Show header on scroll up
                    }
                    lastScrollTop = scrollTop;
                    scrollFunction(); // Call scroll function
                });

                // Search Icon Toggle
                const searchIcon = document.getElementById("searchIcon");
                const searchForm = document.getElementById("searchForm");

                searchIcon?.addEventListener("click", function(e) {
                    e.preventDefault();
                    searchForm?.classList.toggle("show");
                });

            });
        </script>
    </body>
</html>
