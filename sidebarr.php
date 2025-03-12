<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package aj-square
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
    return;
}
?>

<aside id="sidebar" class="sidebar" role="complementary">
    <div class="sidebar-main">
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    </div><!-- .sidebar-main -->
</aside><!-- #secondary -->
