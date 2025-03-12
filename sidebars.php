<aside id="sidebar" role="complementary">

    <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    <?php else : ?>
        <div class="widget">
            <h2 class="widget-title">Default Sidebar Content</h2>
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
            </ul>
        </div>
    <?php endif; ?>

</aside><!-- #sidebar -->
