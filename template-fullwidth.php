<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<main>
    <section class="main-wrap">
        <div class="wrap">
            <div class="container-fluid">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
