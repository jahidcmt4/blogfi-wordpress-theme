<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogfi
 */

?>


<footer class="footer-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="footer text-center">
          <p>
            <?php
                $current_year = date('Y');
                printf( esc_html__( 'Copyright %s © Blogfi by %s All Rights Reserved.', 'blogfi'), esc_html($current_year),'<a href="https://profile.wordpress.org/jahidcse">Jahid Hasan</a>');
            ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
