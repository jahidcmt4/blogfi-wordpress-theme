<?php
// Custom CSS
function blogfi_customizer_styles(){
    $blogfi_site_title = get_theme_mod('blogfi_site_title_color');
    $blogfi_linkcolor = get_theme_mod('blogfi_link_color');
    $blogfi_blog_title = get_theme_mod('blogfi_title_color');
    $blogfi_blog_desc = get_theme_mod('blogfi_desc_color');
    $blogfi_blog_author_date = get_theme_mod('blogfi_pub_color');
    $blogfi_header_footer_bg = get_theme_mod('blogfi_header_footer_bg');
    $blogfi_header_footer_color = get_theme_mod('blogfi_header_footer_color');
    $blogfi_widget_bg = get_theme_mod('blogfi_widget_bg');
    $blogfi_widget_title_bg = get_theme_mod('blogfi_widget_title_bg');
    $blogfi_widget_title_color = get_theme_mod('blogfi_widget_title_color');
    $blogfi_button_bg = get_theme_mod('blogfi_button_bg');
    $blogfi_button_color = get_theme_mod('blogfi_button_color');
    $blogfi_button_hover_bg = get_theme_mod('blogfi_button_hover_bg');
    $blogfi_button_hover_color = get_theme_mod('blogfi_button_hover_color');
?>
    <style>
        .header-top-area,
        .footer-area{
            background: <?php echo !empty($blogfi_header_footer_bg) ? $blogfi_header_footer_bg. '!important' : ''; ?>
        }
        .footer p,
        .top-contact ul li, 
        .social-profile ul li a{
            color: <?php echo !empty($blogfi_header_footer_color) ? $blogfi_header_footer_color. '!important' : ''; ?>
        }
        a.logo{
            color: <?php echo !empty($blogfi_site_title) ? $blogfi_site_title. '!important' : ''; ?>
        }
        .single-news h4{
            color: <?php echo !empty($blogfi_blog_title) ? $blogfi_blog_title. '!important' : ''; ?>
        }
        .single-news p{
            color: <?php echo !empty($blogfi_blog_desc) ? $blogfi_blog_desc. '!important' : ''; ?>
        }
        .single-news ul li,
        .single-news ul li a{
            color: <?php echo !empty($blogfi_blog_author_date) ? $blogfi_blog_author_date. '!important' : ''; ?>
        }
        .wp-block-latest-comments a, 
        .recentcomments a,
        a:visited{
            color: <?php echo !empty($blogfi_linkcolor) ? $blogfi_linkcolor : ''; ?>
        }
        .widget{
            background: <?php echo !empty($blogfi_widget_bg) ? $blogfi_widget_bg. '!important' : ''; ?>
        }
        .widget h2{
            background: <?php echo !empty($blogfi_widget_title_bg) ? $blogfi_widget_title_bg. '!important' : ''; ?>;
            color: <?php echo !empty($blogfi_widget_title_color) ? $blogfi_widget_title_color. '!important' : ''; ?>;
        }
        .single-news a.readme,
        .wp-block-search__button,
        .error-404 input[type="submit"], 
        #commentform input[type="submit"]{
            background: <?php echo !empty($blogfi_button_bg) ? $blogfi_button_bg. '!important' : ''; ?>;
            color: <?php echo !empty($blogfi_button_color) ? $blogfi_button_color. '!important' : ''; ?>;
            transition: .3s all ease;
        }
        .single-news a.readme:hover,
        .wp-block-search__button:hover,
        .error-404 input[type="submit"]:hover, 
        #commentform input[type="submit"]:hover{
            background: <?php echo !empty($blogfi_button_hover_bg) ? $blogfi_button_hover_bg. '!important' : ''; ?>;
            color: <?php echo !empty($blogfi_button_hover_color) ? $blogfi_button_hover_color. '!important' : ''; ?>;
        }
    </style>
<?php
}
add_action('wp_footer', 'blogfi_customizer_styles');