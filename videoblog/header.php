<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Videoblog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<style>
    body{overflow-x:hidden;}
</style>
<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85727032-2', 'auto');
  ga('send', 'pageview');

</script>   
<style type="text/css">
	
/*Custom CSS*/
.site-header {background-color:#f9f9f9;}
#site-main{margin-top:-20px;}
.shareaholic-dis-ad-col-3 {display:none;!important;}
/*dagdag 06-27-2017*/
.ilovewp-page-inner {margin:0;padding-bottom:5px;border:none;}
.ilovewp-page-intro .title-page {font-size:20px;font-weight:500;text-align:left;}
/*end ng dagdag*/
p.site-title {color:#000!important;}
p.site-description: {color:#000!important;}
#menu-main {bac}
.fb-like {margin-top:5px;}
.post-single {line-height:1.85em!important;}
.post-single p {line-height:25px;}
.post-single h3 {font-size:17px;font-weight:bold;margin:1em 0 0.5em!important;}
#site-content { width:100%!important; }
.ilovewp-posts-archive .post-cover {margin-bottom:0!important;}
.widget_search .search-field {margin-bottom:0px!important;width:45%;}
.post-preview span.post-meta-category,.post-meta span.posted-on,header p.post-meta,.copy-ilovewp {
	display:none;
}
.post-cover-wrapper img {
	border:3px solid #dedede;
}
input.search-submit {padding:11px;margin-left:-3px!important;font-size:15px!important;}	

</style>	
</head>

<body <?php body_class(); ?>>
<!--facebook here-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1726764847614826";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--end of facebook here-->
<div id="container">
	<a class="skip-link screen-reader-text" href="#site-main"><?php esc_html_e( 'Skip to content', 'videoblog' ); ?></a>
	<header class="site-header clearfix" role="banner">
	
		<div class="wrapper wrapper-header clearfix">
		
			<div class="site-branding clearfix">
				<?php
				if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
					jetpack_the_site_logo();
				} elseif ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
					videoblog_the_custom_logo();
				} else { ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php } ?>
			</div><!-- .site-branding -->

			<?php if ( has_nav_menu( 'secondary' ) ) : ?>
			<nav id="menu-secondary" role="navigation">
				<?php
				wp_nav_menu( array(
					'container' => '', 
					'container_class' => '', 
					'menu_class' => '', 
					'menu_id' => 'menu-main-secondary', 
					'sort_column' => 'menu_order', 
					'theme_location' => 'secondary', 
					'link_after' => '', 
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
				?>
			</nav><!-- #menu-secondary -->
			<?php endif; ?>
			
		</div><!-- .wrapper .wrapper-header -->
		
        <?php if ( has_nav_menu( 'primary' ) ) { ?>
        <div class="navbar-header">

			<?php wp_nav_menu( array(
				'container_id'   => 'menu-main-slick',
				'menu_id' => 'menu-slide-in',
				'sort_column' => 'menu_order', 
				'theme_location' => 'primary'
			) ); 
			?>

        </div><!-- .navbar-header -->
        <?php } ?>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="menu-main" role="navigation">
			<div class="wrapper wrapper-header-menu clearfix">
				<?php
				wp_nav_menu( array(
					'container' => '', 
					'container_class' => '', 
					'menu_class' => 'nav navbar-nav dropdown sf-menu', 
					'menu_id' => 'menu-main-menu', 
					'sort_column' => 'menu_order', 
					'theme_location' => 'primary', 
					'link_after' => '', 
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
				?>
			</div><!-- .wrapper .wrapper-header-menu .clearfix -->
		</nav><!-- #menu-main -->
		<?php endif; ?>

	</header><!-- .site-header -->
