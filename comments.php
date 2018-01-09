<?php

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
?>

<div class="col-md-12">

	<div class="area">

		<?php if ( have_comments() ) : ?>

            <div class="current-comments">

                <div class="title">

                        <?php
                        $comments_number = get_comments_number();
                        if ( 1 === $comments_number ) {
                            printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'knack' ), get_the_title() );
                        } else {
                            printf(
                                _nx(
                                    '%1$s Comment',
                                    '%1$s Comments',
                                    $comments_number,
                                    'comments title',
                                    'knack'
                                ),
                                number_format_i18n( $comments_number ),
                                get_the_title()
                            );
                        }
                        ?>
                </div>

                <ul class="comment-list">
                    <?php wp_list_comments('type=comment&callback=knack_format'); ?>
                </ul><!-- .comment-list -->

                <div class="pager">
                    <?php the_comments_navigation(); ?>
                </div>

            </div>

		<?php endif; // Check for have_comments(). ?>

		<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'knack' ); ?></p>
		<?php endif; ?>

		<?php
		comment_form( array(
			'title_reply_before' => '<div class="content-title"><h4>',
			'title_reply_after'  => '</h4></div>',
		) );
		?>

	</div>

</div><!-- .comments-area -->