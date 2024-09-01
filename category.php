<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oversa
 */

get_header();

$hero_slug = 'blog';	

$total   = $wp_query->max_num_pages;;
$total_n = $wp_query->found_posts;
$current = $wp_query->current_post;
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

$atts = array('data-page' => $current, 'data-total' => $total, 'data-total-n' => $total_n, 'data-base' => $base);
$term = get_queried_object();
$atts['data-type'] = 'post';			
$atts['data-category'] = $term->slug;			

$atts_str = '';

foreach ($atts as $key => $value) {
	$atts_str .= ' ' . $key . '=' . $value;
}

?>

	<?php	the_hero_block( $hero_slug ); ?>

	<main id="main" class="site__main site__main--has-side wraper">
		
		<div class="l-primary-aside">
		  <div class="l-primary-aside__col-primary">

		  	<?php if ( have_posts() ) : ?>

	         <div class="b-news">
	             <div class="b-news__list">

					<?php
					
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

					endwhile; ?>


	             </div>
					 <?php 
					 $pages = $wp_query->max_num_pages;
					 if( $pages > 1 ) : ?>
	             <div class="b-news__pagination">
	                 <a href="#" class="js-pager-more b-news__more-link" <?=$atts_str?>>
	                     <svg class="b-news__more-link-icon" width="30" height="35">
	                         <use xlink:href="#arrow-bottom"></use>
	                     </svg>
	                     <span>Ранее</span>
	                 </a>
	             </div>
	          	 <?php endif; ?>
	         </div>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		  </div>
		  <div class="l-primary-aside__col-aside">
            <div class="b-aside-custom b-aside-custom--offset b-side-offer">
                <div class="b-side-offer__inner">
                    <div class="b-side-offer__desc">Хотите услышать наш компетентное мнение по вашему вопросу?</div>
                    <a href="#modal-order" class="b-side-offer__button" data-fancybox>Отправить запрос</a>
                </div>
            </div>

            <?php get_template_part( 'template-parts/aside-subscription' ); ?>
		  </div>
		</div>

	</main>

<?php
get_footer();
