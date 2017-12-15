

<footer id="footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

    <div class="container main-footer-container">
        <div class="row">

            <div class="jackLove"></div>
            <p class="copyright" align="center">&copy;<?php echo date("Y"); ?><a href="http://sierra-group.in.ua/" target="_blank" title="создание сайта на wordpress под ключ "> Sierra-Group</a> </p>
        </div>



    <script async src='https://www.google.com/recaptcha/api.js'></script>
	<?php wp_footer(); ?>

        <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
</footer>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88026316-3"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-88026316-3');
</script>


<script>
    $(document).ready(function(){
        $('.dropdown-toggle').dropdown()
    });
</script>



</body>

</html>
