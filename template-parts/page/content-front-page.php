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

	<?php if ( has_post_thumbnail() ) :
		#$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hyiptheme-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		#$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>



		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
            <div class="panel-image-prop">
                <?php echo the_post_thumbnail(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="hrefTypeOne">Открыть запись</a>
            <a href="<?php the_permalink(); ?>" class="hrefTypeTwo"></a>
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>



			</header><!-- .entry-header -->

			<div class="entry-content">
                <?php the_excerpt();?>

                <?php
					/* translators: %s: Name of current post */
					#the_content( sprintf(
						#__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						#get_the_title()
					#) );
				?>
			</div><!-- .entry-content -->

            <div class="bottom-content">

                <div class="row">
                    <p class="postCalendar"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar.jpg"><span><?php echo get_the_date() ;?></span></p>
                    <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/counters.jpg"><span><?php echo getPostViews(get_the_ID()); ?></span></p>
                    <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/data.jpg"><span><?php comments_number('0', '1', '%'); ?> </span></p>

                </div>
            </div>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
