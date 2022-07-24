<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blogfi
 */

get_header();
?>

	<main id="primary" class="body-content site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12">
					<header class="search-header">
						<h1 class="entry-search-title text-center">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'blogfi' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
					</header><!-- .page-header -->
					<div class="row">
					<?php if ( have_posts() ) : 
					
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
