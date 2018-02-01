<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo get_template_directory_uri (); ?>/dist/img/public/favicon.png" rel="shortcut icon"  >

    <?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow" />
    <?php } ?>

    <title>
        <?php
        if (function_exists('is_tag') && is_tag()) {
            single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
        elseif (is_archive()) {
            wp_title(''); echo ' Archive - '; }
        elseif (is_search()) {
            echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
        elseif (!(is_404()) && (is_single()) || (is_page())) {
            wp_title(''); echo ' - '; }
        elseif (is_404()) {
            echo 'Not Found - '; }
        if (is_home()) {
            bloginfo('name'); echo ' - '; bloginfo('description'); }
        else {
            bloginfo('name'); }
        if ($paged>1) {
            echo ' - page '. $paged; }
        ?>
    </title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">




</head>

<body id="body" <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage" >
<header class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation" itemscope itemtype="http://schema.org/WPHeader">

    <div class="container">
        <div class="row">
            <div class="logoContainer">
                <a class="logo col-md-2" href="<?php echo home_url(); ?>">Planw<img src="<?php echo get_bloginfo('template_url')?>/dist/img/logoPlanet.png" alt=""/>rld
            </a>
                <button class='scroll-to-top'><span>наверх</span></button>
            </div>
            <!-- ================== NAVBAR ================ -->
            <nav class="col-xs-3 col-sm-3 col-md-6 navbar navbar-default " role="navigation" itemscope itemtype="http://www.schema.org/SiteNavigationElement">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <?php
                wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                );
                ?>

            </nav>

           <?php get_template_part ('page-login');?>

            <?php  #get_template_part ('page-loginOrigin');?>

            <button id="searchStart" class="search col-md-1">
                <script type="text/javascript">

                    $(document).ready( function() {
                        $("#searchStart").click(function () {
                            $(".searchBox").toggle();
                        });


                        $(".toTop").click(function(){
                            $("#toTop").scrollTop(60);
                        });


                    });
                </script>
                <?php dynamic_sidebar('search'); ?>
            </button>

            <div class="lang col-md-1">
                <?php dynamic_sidebar('menu-1'); ?>
            </div>
        </div>
    </div>
    <!-- ================== END  NAVBAR ================ -->
</header>
<div class="searchLine">
    <div class="container">
        <?php dynamic_sidebar('searchme'); ?>
    </div>
</div>
