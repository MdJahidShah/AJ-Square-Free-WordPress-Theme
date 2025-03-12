<main>
	<section class="main-wrap">
		<div class="wrap latestpost">
			<div class="latestposthead">
				<h2 class="latest-post-content"><span>My Blog</span></h2>
			</div>
			
			<div class="container">
				<?php
					// Fetch the latest posts
					$args = array(
						'posts_per_page' => 6, // Number of latest posts to display
						'post_status' => 'publish'
					);

					$latest_posts = new WP_Query($args);

					if ($latest_posts->have_posts()) :
						echo '<div class="row">';
						while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
							<div class="latest-post-item col-sm-4 mb-3">
								<div class="latest-content-item">
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<div class="featured_image">
											<?php
												if (has_post_thumbnail()) {
													the_post_thumbnail('full', array('class' => 'latest-post-thumbnail'));
												}
											?>
										</div>
										
										<div class="pphead">
											<h3><?php the_title(); ?></h3>
										</div>
									</a>
									<div class="post-meta py-1">
										<span class="post-author">
											<i class="bi bi-person"></i> <?php the_author_posts_link(); ?>
										</span>
									</div>
									<div class="entry-content content-info">
										<div class="post-excerpt">
											<p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
										</div>
										<div class="divmiddle">
											<div class="read-time">
												<?php
												$reading_time = get_reading_time(get_the_ID());
												$time_ago = time_ago(get_the_ID());
												?>
												<span> • <?php echo $reading_time; ?> min read | <?php echo $time_ago; ?> | <i class="bi bi-calendar"></i> <?php the_time('d M, Y'); ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
						endwhile;
						echo '</div>';
					else:
						echo '<p>No latest posts found.</p>';
					endif;
					wp_reset_postdata();
				?>
			</div>
			<div class="seemore"><a class="btn" href="https://jahidshah.com/my-blog/" role="button" aria-label="Read more Article posts on Jahid Shah's website">Read More Article</a></div>
		</div>
	</section>


</main>