<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area" style="padding: var(--spacing-xl) 0; border-top: 1px solid var(--color-gray); margin-top: var(--spacing-xl);">
    
    <?php if (have_comments()) : ?>
        <h2 class="comments-title" style="font-size: 1.5rem; margin-bottom: var(--spacing-md);">
            <?php echo get_comments_number_text('No Comments', '1 Comment', '% Comments'); ?>
        </h2>
        
        <ol class="comment-list" style="list-style: none;">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>
        
        <?php the_comments_pagination(); ?>
        
    <?php endif; ?>
    
    <?php
    comment_form(array(
        'title_reply'         => 'Leave A Comment',
        'title_reply_to'      => 'Leave A Reply To %s',
        'cancel_reply_link'   => 'Cancel Reply',
        'label_submit'        => 'Post Comment',
        'class_submit'        => 'submit-button',
        'comment_field'       => '<p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" name="comment" cols="45" rows="8" required style="width: 100%; padding: var(--spacing-sm); background: var(--color-darker); border: 1px solid var(--color-gray); color: var(--color-off-white); font-family: var(--font-body);"></textarea></p>',
    ));
    ?>
    
</div>
