<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oversa
 */

get_header();

?>

<?php the_hero_block(); ?>

<div class="section">

                <div class="mb-hspace2">
                    <div class="wraper">
                        <?php the_breadcrumbs(); ?>
                    </div>
                </div>

	<div class="wraper">

<?php if ( have_posts() ) : ?>

<div class="b-news">
   <div class="b-news__grid">

	<?php	while ( have_posts() ) : the_post(); ?>

		<div class="b-news__grid-item">
		   <?php get_template_part( 'template-parts/content' ); ?>
		</div>

	<?php endwhile; ?>

   </div>

</div>	

<?php else :

	get_template_part( 'template-parts/content/content', 'none' );

endif; ?>

</div>

</div>

<?php
get_footer();
