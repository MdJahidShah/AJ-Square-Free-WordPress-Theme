<?php get_header(); ?>

<div class="main_wrap aj-square-content-search">
    <div class="wrap">
        <div id="aj-square-content_wrapper">
            <div id="aj-square-content">
                <?php
                if (have_posts()) : ?>
                    <h3>Search Results For: "<?php echo get_search_query(); ?>"</h3>
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <article id="aj-square-search-article">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post_meta">
                                Posted By: <?php the_author_posts_link(); ?>
                                | Posted On: <?php the_time('d/M/Y'); ?>
                                | Posted In: <?php the_category(', '); ?>
                                | <?php comments_popup_link('No Comment', 'One Comment', '% Comments', 'my_comment_Class', 'Comments Off'); ?>
                            </div>
                            <div id="imgp_wrap">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <p><?php the_excerpt(); ?></p>
                        </article>
                    <?php
                    endwhile;
                else :
                    echo '<h4>No Post Found.</h4>';
                endif;
                ?>

                <?php
                if (function_exists("pagination")) {
                    pagination();
                }
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
