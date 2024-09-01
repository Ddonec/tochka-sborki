<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oversa
 */

get_header();

$posttype = get_queried_object();
$hero_slug = $posttype->name;

$terms = get_terms(array(
    'taxonomy' => get_object_taxonomies($posttype->name),
    'hide_empty' => true,
));

?>

<?php the_hero_block($hero_slug); ?>

<main id="main" class="site__main site__main--has-side wraper">

    <div class="l-primary-aside">
        <div class="l-primary-aside__col-primary">

            <?php foreach ($terms as $cat_item) :
                $news = get_posts(array(
                    'post_type' => $posttype->name,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $cat_item->taxonomy,
                            'field'    => 'term_id',
                            'terms'    => $cat_item->term_id,
                        ),
                    ),
                    'posts_per_page' => 2
                ));
            ?>

                <div class="b-news-cat">
                    <div class="b-news-cat__caption"><?= $cat_item->name; ?></div>
                    <div class="b-news-cat__body">
                        <div class="b-news-cat__row">
                            <?php foreach ($news as $news_obj) :
                                $post_id = $news_obj->ID;
                            ?>
                                <div class="b-news-cat__col">
                                    <div class="b-news-card">
                                        <div class="b-news-card__header">
                                            <a href="<?php echo get_permalink($post_id); ?>" class="b-news-card__caption"><?php echo get_the_title($post_id); ?></a>
                                        </div>
                                        <div class="b-news-card__body">
                                            <div class="b-news-card__date"><?php echo get_the_date(get_option('date_format'), $post_id); ?></div>
                                            <div class="b-news-card__desc">
                                                <?php echo wpautop(get_the_excerpt($pid)); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="b-news-cat__footer">
                        <a href="<?php echo get_term_link($cat_item->term_id); ?>" class="b-news-cat__more-link">
                            <svg class="b-news-cat__more-link-icon" width="50" height="60">
                                <use xlink:href="#arrow-bottom"></use>
                            </svg>
                            <span>Ранее</span>
                        </a>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>
        <div class="l-primary-aside__col-aside">
            <div class="b-aside-custom b-aside-custom--offset b-side-offer">
                <div class="b-side-offer__inner">
                    <div class="b-side-offer__desc">Хотите услышать наш компетентное мнение по вашему вопросу?</div>
                    <a href="#modal-order" class="b-side-offer__button" data-fancybox>Отправить запрос</a>
                </div>
            </div>

            <?php get_template_part('template-parts/aside-subscription'); ?>
        </div>
    </div>


</main><!-- #main -->

<?php
get_footer();
