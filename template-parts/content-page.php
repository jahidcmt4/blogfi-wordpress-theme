<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogfi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header> <!-- .entry-header -->

	<div class="entry-thumbnail">
		<?php
			if( has_post_thumbnail() ){
				the_post_thumbnail( 'full', array( 'class'=>'img-fluid' ) );
			}
		?>
	</div> <!-- .entry-thumbnail -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogfi' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php 
		if ( get_edit_post_link() ) : 

			edit_post_link( 'Edit' );

		endif; 
	?>
</article><!-- #post-<?php the_ID(); ?> -->
