<?php
/**
 * Displays top navigation
 *
 * @package test xyz
 */
?>

<div class="toggle-nav mobile-menu">
    <button onclick="openNav()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','educational-zone'); ?></span></button>
</div>
<div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'educational-zone' ); ?>">
        <div class="navbar-brand">
            <?php
            the_custom_logo(); ?>
            <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"
               rel="home"><?php bloginfo('name'); ?></a>
        </div>   
        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','educational-zone'); ?></span></a>
        <?php        
            wp_nav_menu(array(
                array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'main-menu',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )
            ));
        ?>
    </nav><!-- #site-navigation -->
</div>