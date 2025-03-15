<?php get_header(); ?>

<section class="main_wrap content-archive">
    <div class="wrap">
        <div id="content_wrapper">
            <div class="latest-post-item col-sm-6 col-md-4 col-lg-4 my-1 mb-3" id="aj-square-archive-content">
                <?php if (have_posts()) : ?>
                    <div class="archive-header">
                        <?php
                        the_archive_title('<h2 class="archive-title">', '</h2>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </div><!-- .archive-header -->

                    <?php
                    while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', array('class' => 'archive-post-thumbnail'));
                                }
                                ?>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h2>
                            </div><!-- .entry-header -->

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-summary -->

                            <div class="entry-footer">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="bi bi-person"></i> <?php the_author_posts_link(); ?>
                                    </span>
                                    <span class="post-date">
                                        <i class="bi bi-calendar"></i> <?php the_time('d M, Y'); ?>
                                    </span>
                                    <span class="post-categories">
                                        <i class="bi bi-folder"></i> <?php the_category(', '); ?>
                                    </span>
                                    <span class="post-comments">
                                        <i class="bi bi-chat"></i> <?php comments_popup_link('No Comments', 'One Comment', '% Comments'); ?>
                                    </span>
                                </div>
                            </div><!-- .entry-footer -->
                        </article><!-- #post-<?php the_ID(); ?> -->

                    <?php endwhile; ?>

                    <div class="pagination">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('&larr; Previous', 'aj-square'),
                            'next_text' => __('Next &rarr;', 'aj-square'),
                        ));
                        ?>
                    </div>

                <?php else : ?>

                    <article id="post-0" class="post no-results not-found">
                        <div class="entry-header">
                            <h2 class="entry-title"><?php _e('Nothing Found', 'aj-square'); ?></h2>
                        </div><!-- .entry-header -->

                        <div class="entry-content">
                            <p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'aj-square'); ?></p>
                            <?php get_search_form(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-0 -->

                <?php endif; ?>
            </div><!-- #aj-square-content -->
            <?php get_sidebar(); ?>
        </div><!-- #content_wrapper -->
    </div><!-- .wrap -->
</section><!-- .main_wrap -->

<?php
get_template_part('upper_footer');
get_footer();
?>
