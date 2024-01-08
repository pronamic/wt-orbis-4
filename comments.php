<div id="comments" class="clearfix">
	<?php if ( post_password_required() ) : ?>

		<p class="nopassword">
			<?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'orbis-4' ); ?>
		</p>
	</div>

		<?php return; ?>
	<?php endif; // phpcs:ignore Squiz.PHP.NonExecutableCode.Unreachable ?>


	<?php if ( have_comments() ) : ?>

		<h3 id="comments-title">
			<?php
			printf( esc_html( _n( 'One thought', '%1$s thoughts', get_comments_number(), 'orbis-4' ) ), esc_html( number_format_i18n( get_comments_number() ) ) ); // phpcs:ignore WordPress.WP.I18n.MismatchedPlaceholders
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav id="comment-nav-above">
				<div class="nav-previous"><?php previous_comments_link( __( '← Older Comments', 'orbis-4' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments →', 'orbis-4' ) ); ?></div>
			</nav>

		<?php endif; ?>

		<ol class="commentlist">
			<?php wp_list_comments( [ 'callback' => 'orbis_comment' ] ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav id="comment-nav-below">
				<div class="nav-previous"><?php previous_comments_link( __( '← Older Comments', 'orbis-4' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments →', 'orbis-4' ) ); ?></div>
			</nav>

		<?php endif; ?>

	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="nocomments">
			<?php esc_html_e( 'Comments are closed.', 'orbis-4' ); ?>
		</p>

	<?php endif; ?>

	<?php

	$comments_args = [
		'title_reply'         => '<h4>' . __( 'Give a comment', 'orbis-4' ) . '</h4>',
		'comment_notes_after' => '',
		'logged_in_as'        => '',
		'comment_field'       => '<textarea id="comment" rows="10" name="comment" aria-required="true"></textarea>',
	];

	comment_form( $comments_args );

	?>
</div>
