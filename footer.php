<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oversa
 */

// Получим элементы меню на основе параметра $menu_name (тоже что и 'theme_location' или 'menu' в аргументах wp_nav_menu)
// Этот код - основа функции wp_nav_menu, где получается ID меню из слага
/*
$locations = get_nav_menu_locations();
$menu_items = array();

if( isset( $locations['menu-footer'] ) ){
	$menu_items = wp_get_nav_menu_items( $locations['menu-footer'] );	

	if( !empty($menu_items) ){
		$mediana = ceil( count( $menu_items ) / 2 );
	}	
}
*/



?>

</div><!-- .site__body -->


<footer id="page-footer" class="footer">
    <div class="footer__wraper">
        <div class="footer__logo">
            <img class="footer__logo-pic" src="<?php the_static_pic('/general/logo-black.svg'); ?>" width="175" alt="Лого сайта">
        </div>
        <div class="footer__l-grid">
            <div class="footer__l-grid-cell">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-footer',
                        'container'          => false,
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => 'menu-list menu-list--footer',
                    )
                );
                ?>
            </div>
            <div class="footer__l-grid-cell">
                <div><?php echo get_phone_link('', array('class' => 'footer__phone')); ?></div>
                <div><?php echo get_email_link('', array('class' => 'footer__email')); ?></div>
                <div class="footer__social"><?php the_social_list(array('class' => 'b-social-list--dark')); ?></div>
            </div>
        </div>
        <div class="footer__secondary-nav">
            <img class="footer__payments-pic" src="<?php the_static_pic('/general/payments-white.png'); ?>" alt="">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-footer2',
                    'container'          => false,
                    'menu_id'        => 'footer-menu2',
                    'menu_class'     => 'menu-list menu-list--footer-secondary',
                )
            );
            ?>
        </div>
    </div>
</footer>

<?php get_template_part('template-parts/block-modals'); ?>

<?php wp_footer(); ?>

</body>

</html>