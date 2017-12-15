<?php get_header(); ?>

<div id="primary" class="content-area singlePost" itemscope itemtype="http://schema.org/Article">
    <main id="main" class="site-main" role="main">
        <div class="container ">
            <div class="row infoPost">
                <div class="author-name">

                    <p itemprop="datePublished"> Обновление: <?php the_time('Y. d. j ') ;?></p> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/author.png"> <p itemprop="author"><span> Автор :</span>
                        <?php echo get_the_modified_author(); ?></p>
                </div>
            </div>

        </div>
        <div class="container myBorder">

            <div class="row">
                <div class="single-top img-responsive">
                    <a href=""> <img src="<?php the_post_thumbnail_url(); ?>"/></a>
                </div>
            </div>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h1 class="title"><?php the_title(); ?></h1>


                    <div class="myContent" itemprop="articleBody">
                        <?php the_content(); ?>
                    </div>

                    <div class="bottom-content">

                        <div class="row">
                            <p class="postCalendar"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/calendar.jpg"><span><?php echo the_date() ;?></span></p>
                            <p class="postView"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/counters.jpg"><span><?php echo the_views();  ?></span></p>
                            <p class="postCount"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/data.jpg"><span> <?php comments_number( $zero, $one, $more ); ?></span></p>
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
                            <?php echo the_excerpt(); ?></li>
                            <?php
                        }
                        echo '</ul>';
                    }
                    wp_reset_query();
                }
                ?>
            </div>
            <div class="row categoryTag">
                <div class="col-md-12 tAg">
                    <div class="col-md-3"> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/cat.png"> Категории</div><div class="col-md-9" itemprop="articleSection"> <?php echo the_category(); ?></div>
                </div>
                <div class="col-md-11 tAgs">
                    <div class="col-md-3"> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/tag.png"> Метки </div><div class="col-md-9"> <?php the_tags( ' ', ', ', '<br />' ); ?></div>
                </div>

            </div>
        </div>

        <div class="container myComments myBorder">
            <div class="row">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/comments.png">

                <?php comments_template( '/short-comments.php' ); ?>

            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>