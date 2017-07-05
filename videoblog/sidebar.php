<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Videoblog
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>

<aside id="site-aside" role="complementary">

	<div class="site-aside-wrapper clearfix">
	
		<?php dynamic_sidebar(); ?>
		
	</div><!-- .site-aside-wrapper .clearfix -->

</aside><!-- #site-aside -->