<?php get_header(); ?>
<main>
    <section class="main-wrap single-page">
        <div class="wrap">
            <div class="container" id="aj-square-content">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content', 'single');
                    }
                }
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
