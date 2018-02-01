<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'hyiptheme-panel ' ); ?> >
    <div class="panel-image" >
        <div class="panel-image-prop">
            <?php echo the_post_thumbnail(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="hrefTypeOne">Открыть запись</a>
        <a href="<?php the_permalink(); ?>" class="hrefTypeTwo"></a>
        <div class="panel-image-prop" ></div>
    </div><!-- .panel-image -->
    <div class="panel-content">
        <div class="wrap">
            <header class="entry-header">
                <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
               <p> <?php custom_length_excerpt(55); ?></p>
            </div><!-- .entry-content -->

            <div class="bottom-content">

                <div class="row">
                    <p class="postCalendar"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar.jpg"><span><?php echo get_the_date() ;?></span></p>
                    <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/counters.jpg"><span><?php echo the_views(); ?></span></p>
                    <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/data.jpg"><span><?php comments_number('0', '1', '%'); ?> </span></p>

                </div>
            </div>
        </div><!-- .wrap -->
    </div><!-- .panel-content -->
</article><!-- #post-## -->
