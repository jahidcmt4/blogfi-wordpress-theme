<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blogfi
 */

get_header();
?>

	<main id="primary" class="body-content site-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12">

                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'single' );

                        the_post_navigation(
                            array(
                                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'blogfi' ) . '</span> <span class="nav-title">%title</span>',
                                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'blogfi' ) . '</span> <span class="nav-title">%title</span>',
                            )
                        );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>



	</main><!-- #main -->

<?php

get_footer();
