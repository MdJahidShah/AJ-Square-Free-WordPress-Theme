<?php
// Include the Navwalker class
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
    <section class="main-wrap-head">
        <div class="wrap">
            <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
                <div class="container nav-container">
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
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="nav-class justify-content-left">
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
                        <!-- Search Icon and Form -->
                        <div class="nav-class justify-content-right">
                            <?php if (is_active_sidebar('header-widget-area')) : ?>
                                <div class="header-widget-container">
                                    <?php dynamic_sidebar('header-widget-area'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
            <div class="nav-item" id="searchForm">
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" />
                    <button type="submit" class="search-submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
    </section>
</header>