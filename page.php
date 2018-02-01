<?php /**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<div id="primary" class="content-area pageDefaults">
		<main id="main" class="site-main" role="main">
			
			<div class="container">
                <div class="row">


                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php the_content(); ?>

                    <?php endwhile; endif; ?>

                    <div class="container myComments myBorder">
                        <div class="row">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/comments.png">

                            <?php comments_template( '/short-comments.php' ); ?>

                        </div>
                    </div>

                </div>
			</div>
		</main>
</div>


<br>

<?php get_footer();?>