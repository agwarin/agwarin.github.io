<?php
/**
 * Home Template
 *
 * Please do not edit this file. This file is part of the CyberChimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */
?>

<?php if ( 'posts' == get_option('show_on_front') ) : ?>

	<?php get_header(); ?>

	<div id="primary" class="content-area container">

		<?php if ( get_theme_mod( 'altitude_home_title') != '' || get_theme_mod( 'altitude_home_sub_title') != '' ) : ?>
			<header class="home-header">
				<h1 class="home-title"><?php echo get_theme_mod( 'altitude_home_title', __( 'Altitude Features', 'altitude' ) ); ?></h1>
				<h2 class="home-sub-title"><?php echo get_theme_mod( 'altitude_home_sub_title', __( 'Packed full of great features, here are just a few', 'altitude' ) ); ?></h2>
				<hr class="s-divider" />
			</header>
		<?php endif; ?>

		<main id="main" class="site-main home-posts" role="main">

			<?php
			$args = array(
				'posts_per_page'      => 4,
				'ignore_sticky_posts' => 1
			);

			$query = new WP_Query( $args );
			?>

			<?php if ( $query->have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('s-col-3 isotope-item'); ?>>
						<div class="article-container">

							<div class="row">
								<div class="xs-col-12">

									<header class="entry-header">
										<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
										<div class="entry-thumbnail"><?php the_post_thumbnail( 'altitude-home' ); ?></div>
									</header><!-- .entry-header -->

									<div class="entry-summary">
										<div class="entry-content"><?php the_content(''); ?></div>
									</div><!-- .entry-summary -->

									<footer class="entry-footer">
										<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'altitude'); ?></a>
									</footer>

								</div>
							</div><!-- row -->

						</div><!-- article-container -->
					</article><!-- #post-## -->

				<?php endwhile; ?>

			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		</main><!-- #main -->

	</div><!-- #primary -->

	<?php get_template_part( 'home', 'widgets' ); ?>

	<?php get_footer(); ?>

<?php elseif ( 'page' == get_option('show_on_front') ) : ?>

	<?php include( get_page_template() ); ?>

<?php else : ?>

	<?php include( get_home_template() ); ?>

<?php endif; ?>