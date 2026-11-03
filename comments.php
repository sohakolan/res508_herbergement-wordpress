<?php
if ( post_password_required() ) {
	return;
}
?>
<section id="comments">
	<?php if ( have_comments() ) : ?>
		<h2>Commentaires</h2>
		<ol><?php wp_list_comments( array( 'style' => 'ol' ) ); ?></ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>
	<?php comment_form(); ?>
</section>
