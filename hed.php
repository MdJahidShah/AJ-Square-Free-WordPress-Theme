<header id="masthead" class="site-header">
    <section class="main-wrap">
        <div class="wrap">
            <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
                <div class="container nav-container">
                    
                    <!-- Site Logo -->
                    <div class="aj-square-logo">
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <span class="site-title"><?php bloginfo('name'); ?></span>
                            <?php endif; ?>
                        </a>
                    </div>

                    <!-- Mobile Menu Toggle -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Main Navigation Menu -->
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class' => 'navbar-nav ms-auto',
                                'container' => false,
                                'depth' => 2,
                                'walker' => new WP_Bootstrap_Navwalker(),
                                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                            ));
                        }
                        ?>
                    </div>

                    <!-- Header Widget Area (Search + Login) -->
                    <div class="header-widget-area">
                        <?php if (is_active_sidebar('header-widget-area')) : ?>
                            <?php dynamic_sidebar('header-widget-area'); ?>
                        <?php else : ?>
                            <div class="nav-search">
                                <div class="nav-item">
                                    <a href="#">Portal Login</a>
                                    <button></button>
                                    <a class="nav-link" href="#" id="searchIcon">
                                        <span>Search Here</span>
                                        <i class="bi bi-search"></i> <!-- Bootstrap Icons -->
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </nav>
        </div>

        <!-- Search Form (Hidden until clicked) -->
        <div class="nav-item search-form-container" id="searchForm">
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" />
                <button type="submit" class="search-submit"><i class="bi bi-search"></i></button>
            </form>
        </div>

    </section>
</header>