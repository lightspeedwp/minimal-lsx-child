<?php
/**
 * Index.
 *
 * @package     minimal-lsx
 * @subpackage	lsx-customizer
 */
get_header(); ?>

<h3>This is the core page (index.php):</h3>

<?php while ( have_posts() ) : the_post(); ?>

	title: <?php the_title(); ?><br />
	ID: <?php the_ID(); ?><br />
	time: <?php the_time( get_option( 'date_format' ) ); ?><br />
	excerpt: <?php the_excerpt(); ?><br />
	link: <a href="<?php the_permalink(); ?>">link</a><br />
	<hr />

<?php endwhile; ?>

<?php get_footer(); ?>
