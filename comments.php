<?php

/**
 * The template for displaying comments
 *
 * @package Vinyasa-THEME
 */

if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if (have_comments()) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ($comment_count === 1) {
				echo '1 комментарий';
			} else {
				echo $comment_count . ' комментария';
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments([
				'style'      => 'ol',
				'short_ping' => true,
				'callback' => 'custom_comment'
			]);
			?>
		</ol>

		<?php
		the_comments_navigation();

		if (!comments_open()) :
		?>
			<p class="no-comments">Комментирование закрыто.</p>
		<?php endif; ?>
	<?php endif; ?>
	<?php
	/* Функция вывода формы комментариев START */
	comment_form(array(
		'title_reply' => 'Добавить комментарий',
		'fields' => [
			'author' => '<p class="comment-form-author">
		<input id="author" placeholder="Ваше имя" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . $html_req . ' />
	</p>',
			'email' => '<p class="comment-form-email">
		<input required id="email"  name="email" placeholder="Ваш email" ' . ($html5 ? ' type="email"' : ' type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
	</p>',
			'cookies' => ''
		],
		'comment_field' => '<p class="comment-form-comment">
		<textarea id="comment" name="comment" placeholder="Комментарий" cols="45" rows="8" aria-required="true" required="required"></textarea>
	</p>',
		'submit_button' => '<p class="form-submit"><button id="submit" class="submit btn">Опубликовать</button></p>',
	));
	/* Функция вывода формы комментариев END */


	/* Меняем местами сообщение комментария START */
	function bottom_commentfield($fields)
	{
		$comment_field = $fields['comment'];
		unset($fields['comment']);
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter('comment_form_fields', 'bottom_commentfield');
	/* Меняем местами сообщение комментария END */
	?>
</div><!-- #comments -->