<?php get_header(); ?>
<main>
    <section class="main-wrap single-page py-3">
        <div class="wrap">
            <div class="container" id="aj-square-content">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row col-head">
                            <div class="post-head-as">
                                <h1 class="entry-title px-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            </div>
                            <div class="post_meta-ss">
                                Posted On: <?php the_time('d/M/Y');?>
                                | Posted In: <?php the_category(', ');?>
                            </div>
                        </div>
                        <div class="row imgp_wrap_home-as">
                            <div class="col-img">
                                <figure id="imgp_wrap_home-as">
                                    <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                                </figure>
                            </div>
                        </div>
                        <div class="row" id="aj-squarecontent">
                            <?php
                                if(have_posts()) :
                                    while (have_posts()) : the_post(); ?>
                            
                            <article id="main_article_single">
                                <div class="post-wrap entry-content">
                                    <p><?php the_content(); ?></p>
                                </div>
                                
                                <!-- Add share buttons below content -->
                                <?php if (locate_template('social-share-buttons.php')) {
                                        get_template_part('social-share-buttons');
                                    } else {
                                        echo '<p>Share buttons not available.</p>';
                                    }
                                ?>
                                
                                <!-- Author Information Section Start -->
                                <div class="row author-information p-1 mb-2 bg-light text-dark mt-3">
                                    <div class="col-sm-3 colauth">
                                        <div class="author-avatar">
                                            <?php echo get_avatar( get_the_author_meta('ID'), 90 ); ?>
                                        </div>
                                        <div class="col author-text">
                                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="btn btn-outline-success">Read Full Bio</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 colauthin">
                                        <div class="author-description">
                                            <h3>Author:<b> <?php the_author(); ?></b></h3>
                                            <p><?php $author_description = get_the_author_meta('description');
                                                $words = explode(' ', $author_description);
                                                $short_description = implode(' ', array_slice($words, 0, 25));

                                                echo $short_description . (count($words) > 25 ? '...' : '');
                                                ?>
                                            </p>
                                            <p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="text-success" style="color: #71c21b !important;">View all posts by Author</a></p>
                                        </div>
                                        <div class="author-social-media row">
                                            <div class="col-sm-4">
                                                <p class="mt-3"><b>Follow Author:</b></p>
                                            </div>
                                            <div class="col-sm-8">
                                                <?php if ( get_the_author_meta('facebook') ) : ?>
                                                    <a href="<?php echo esc_url( get_the_author_meta('facebook') ); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                                <?php endif; ?>
                                                <?php if ( get_the_author_meta('twitter') ) : ?>
                                                    <a href="<?php echo esc_url( get_the_author_meta('twitter') ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                                <?php endif; ?>
                                                <?php if ( get_the_author_meta('linkedin') ) : ?>
                                                    <a href="<?php echo esc_url( get_the_author_meta('linkedin') ); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                                <?php endif; ?>
                                                <?php if ( get_the_author_meta('instagram') ) : ?>
                                                    <a href="<?php echo esc_url( get_the_author_meta('instagram') ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Author Information Section End -->
                                
                                <!-- Beehiiv Embed Start -->
                                <div class="row mt-3">
            
                                </div>
                                <!-- Beehiiv Embed End -->

                                <!-- Comment Section Start -->
                                <div id="post_comments">
                                    <?php comments_template();?>
                                </div>
                                <!-- Comment Section End -->
                            </article>
                        
                        <?php        
                        endwhile;
                            else:
                            echo 'No Post Found';
                        endif;
                        ?>
                    </div>

                    </div>
                    <div class="col-sm-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
