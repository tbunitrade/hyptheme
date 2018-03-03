<?php get_header(); ?>

<div id="primary" class="content-area singlePost" itemscope itemtype="http://schema.org/Article">
    <main id="main" class="site-main" role="main">
        <div class="container "  style="display: none">
            <div class="row infoPost">
                <div class="author-name">

                    <p itemprop="datePublished">
                        Обновление: <?php    echo get_the_modified_author(),
                       ' ',  the_time('d F Y ') ;?></p>
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/author.png">
                    <p itemprop="author">
                        <span> Автор :</span>
                        <span>
                            <?php echo the_author_meta('display_name', $post->post_author ); ?>

                        </span>
                    </p>
                </div>
            </div>

        </div>
        <div class="container myBorder">

            <div class="row" style="display: none">
                <div class="single-top img-responsive">
                   <?php echo the_post_thumbnail(); ?>
                </div>
            </div>
            <div  id="morememe">

            <article id="meme" class="panel-image-prop" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                <div class="panel-image neW" >
                    <div class="newBgRed">
                        <?php the_category(' > ', 'single'); ?>
                    </div>

                    <div class="authoR">

                        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/mobile/authoricon.png">
                        <p itemprop="author">
                            <span> Автор :</span>
                            <span>
                            <?php echo the_author_meta('display_name', $post->post_author ); ?>

                        </span>
                        </p>
                    </div>

                    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>



                    <div class="bottom-content">
                        <p class="postCalendar"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar.png"><span><?php echo get_the_date() ;?></span></p>
                        <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/counters.png"><span><?php echo the_views(); ?></span></p>
                        <p class="postViewData"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/data.png"><span><?php comments_number('0', '1', '%'); ?> </span></p>

                    </div>
                    <div class="panel-image-prop" ></div>
                </div><!-- .panel-image -->
            </article><!-- #post-## -->


            </div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h1 class="title"><?php the_title(); ?></h1>



                    <div class="myContent" itemprop="articleBody">
                        <?php the_content(); ?>
                    </div>

                    <div class="row categoryTag">
                        <div class="col-md-12 tAg">
                            <div class="col-md-3"> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/cat.png"> Категории</div><div class="col-md-9" itemprop="articleSection"> <?php echo the_category(); ?></div>
                        </div>
                        <div class="col-md-11 tAgs">
                            <div class="col-md-3"> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/tag.png"> Метки </div><div class="col-md-9"> <?php the_tags( ' ', ', ', '<br />' ); ?></div>
                        </div>

                    </div>

                    <a href="#start"  class="replyTo">Оставить комментарий</a>

                    <div class="bottom-content">

                        <div class="row">
                            <p class="postCalendar"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar.png"><span><?php echo the_date() ;?></span></p>
                            <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/counters.png"><span><?php echo the_views();  ?></span></p>
                            <p class="postCount"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/data.png"><span> <?php echo comments_number('0', '1', '%' ); ?></span></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>

        <div class="container myBorder readMore">
            <div class="row">
                <h4>Читайте также:</h4>

                <?php
                $categories = get_the_category($post->ID);
                if ($categories) {
                    $category_ids = array();
                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                    $args=array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post->ID),
                        'showposts' => '4',
                        'orderby' => 'rand',
                        'ignore_sticky_posts' => '1');
                    $my_query = new wp_query($args);
                    if( $my_query->have_posts() ) {
                        echo '<ul>';
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            ?>
                            <li> <img class="readMoreImg" src="<?php the_post_thumbnail_url('thumbnail'); ?>"/>
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                <p><?php custom_length_excerpt(35); ?></p>
                                </li>

                            <?php
                        }
                        echo '</ul>';
                    }
                    wp_reset_query();
                }
                ?>
            </div>

        </div>

        <div class="container myComments myBorder" style="display: none">
            <div class="row">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/comments.png">

                <?php if ( comments_open() ):
                        comments_template( '/comments.php' );
                    endif;
                ?>

            </div>
        </div>

        <div class="container  myComments myBorder  newComments " >
            <div class="row">
                <?php comments_template(); ?>
            </div>
            <div id="start"></div>
        </div>
    </main>
    <aside class="sidebarNew">
        <div class="telegram">
            <p>подпишись на Канал<br>
                PLANWORLD.ru в<br>
                Telegram</p>


        </div>

        <div class="newTag">
            <?php dynamic_sidebar ('newtag'); ?>
        </div>

        <div class="mini">

            <div class="container sunset-posts-container">

                <?php // Show the selected frontpage content.

                $postsPerPage = 3;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $postsPerPage
                );

                $loop = new WP_Query($args);

                if ( $loop->have_posts() ) :

                    echo '<div class="page-limit" data-page="'. site_url() .'/lenta/' . sunset_check_paged() . ' ">';
                    while ( $loop->have_posts() ) : $loop->the_post();

                        $class = 'reveal';
                        set_query_var('post-class' , $class );
                        get_template_part( 'template-parts/page/content', 'front-page' );

                    endwhile;
                    echo '</div>';

                endif; ?>

                <!-- append here -->




            </div>

        </div>
    </aside>

</div>

<?php get_footer(); ?>