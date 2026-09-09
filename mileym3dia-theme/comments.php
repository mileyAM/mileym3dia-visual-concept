<?php
/**
 * Comments Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                printf(
                    esc_html__('One comment on &ldquo;%1$s&rdquo;', 'mileym3dia'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    esc_html(_n('%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $comment_count, 'mileym3dia')),
                    number_format_i18n($comment_count),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
                'callback'    => 'mileym3dia_comment_callback',
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if (!comments_open()) :
        ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'mileym3dia'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form(array(
        'class_form'         => 'comment-form',
        'title_reply'        => __('Leave a Comment', 'mileym3dia'),
        'title_reply_to'     => __('Reply to %s', 'mileym3dia'),
        'cancel_reply_link'  => __('Cancel Reply', 'mileym3dia'),
        'label_submit'       => __('Post Comment', 'mileym3dia'),
        'submit_button'      => '<button name="%1$s" type="submit" id="%2$s" class="%3$s btn btn--primary">%4$s</button>',
        'submit_class'       => 'comment-submit',
    ));
    ?>
</div>

<?php
/**
 * Custom comment callback function.
 */
function mileym3dia_comment_callback($comment, $args, $depth) {
    ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment-item'); ?>>
        <article class="comment-body">
            <header class="comment-meta">
                <div class="comment-author-avatar">
                    <?php echo get_avatar($comment, $args['avatar_size']); ?>
                </div>
                <div class="comment-author-info">
                    <span class="comment-author"><?php comment_author_link(); ?></span>
                    <span class="comment-date"><?php comment_date(); ?></span>
                </div>
            </header>
            
            <div class="comment-content">
                <?php if ($comment->comment_approved == '0') : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'mileym3dia'); ?></p>
                <?php endif; ?>
                <?php comment_text(); ?>
            </div>
            
            <footer class="comment-actions">
                <?php
                comment_reply_link(array_merge($args, array(
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<span class="reply-link">',
                    'after'     => '</span>',
                )));
                ?>
                <?php edit_comment_link(__('Edit', 'mileym3dia'), '<span class="edit-link">', '</span>'); ?>
            </footer>
        </article>
    <?php
}
