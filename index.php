<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<?php if ( ! is_home() ) : ?>
		<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
	<?php endif; ?>
	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container'      => 'nav',
		'depth'          => 1,
		'fallback_cb'    => false,
	) );
	?>
</header>

<main>
	<?php if ( is_home() ) : ?>
		<div class="hero">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<p><?php bloginfo( 'description' ); ?></p>
			<?php endif; ?>
		</div>
	<?php elseif ( is_archive() || is_search() ) : ?>
		<h1><?php echo is_search() ? esc_html( 'Recherche : ' . get_search_query() ) : wp_kses_post( get_the_archive_title() ); ?></h1>
	<?php elseif ( is_404() ) : ?>
		<h1>Page introuvable</h1>
		<p>Cette adresse ne mène nulle part. <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Retourner à l'accueil</a> ou lancer une recherche :</p>
		<?php get_search_form(); ?>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( is_singular() ? 'entry' : 'row' ); ?>>
				<?php if ( is_singular() ) : ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php else : ?>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php endif; ?>

				<?php if ( 'post' === get_post_type() ) : ?>
					<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<?php endif; ?>

				<?php
				if ( is_singular() ) {
					the_post_thumbnail();
					the_content();
					wp_link_pages();
				} else {
					the_excerpt();
					the_post_thumbnail( 'medium' );
				}
				?>
			</article>

			<?php
			if ( is_singular() && ( comments_open() || get_comments_number() ) ) {
				comments_template();
			}
			?>
		<?php endwhile; ?>

		<?php the_posts_pagination(); ?>
	<?php elseif ( ! is_404() ) : ?>
		<p>Aucun résultat. Essayer avec d'autres mots :</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</main>

<footer class="site-footer">
	© <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
