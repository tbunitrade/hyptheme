<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div class="sideBar"> </div>
	<main id="main" class="site-main" role="main">

        <h4 align="center" style="    margin-bottom: 30px; font-size: 24px">
            Ошибка 404, адрес к данному материалу устарел,<br> Вы найдете то, что искали ниже</h4>


        <?php // Show the selected frontpage content.
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/page/content', 'front-page' );
            endwhile;
        else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
            get_template_part( 'template-parts/post/content', 'none' );
        endif; ?>

        <div  align="center" class="">
            <?php  echo paginate_links();?>
        </div>



    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer();?>
