<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ){
    return;
}

?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

    <ol class="comments-list">
        <?php
        $args = array(
            'walker'        =>  null,
            'max_depth'     =>  6,
            'style'         =>  'div',
            'callback'      =>  null,
            'end-callback'  =>  null,
            'type'          =>  'all',
            'reply_text'    =>  'Ответить',
            'page'          =>  '',
            'per_page'      =>  '',
            'avatar_size'   =>  32,
            'reverse_top_level' => null,
            'reverse_children'  => '',
            'format'            => 'html5',
            'short_ping'        => false,
            'echo'              => true
        );

       wp_list_comments($args );
        ?>
    </ol>

        <?php if ( !comments_open() && get_comments_number()) :
        ?>
            <p class="no-comments"><?php esc_html_e('Коментарии закрыты' , 'hyiptheme') ;?></p>
        <?php endif; // have_comments() ?>

    <?php endif; // have_comments() ?>


        <?php comment_form(); ?>


</div><!-- #comments -->