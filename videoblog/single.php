<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package Videoblog
 * Improved/Contributor: JMMM
 */

get_header(); ?>
<!--custom for different media queries-->
<style>    
    /*Default values*/
    .divBlocker {background:url(https://jologs.com/ups/2017/03/jologs-movie-site-icon.png);background-size:contain;height:40px;width:40px;position:absolute;margin-top:125px;margin-left:1010px;cursor: pointer;}
    iframe{/*-webkit-box-shadow: 0px 1px 19px -5px rgba(0,0,0,0.75);-moz-box-shadow: 0px 1px 19px -5px rgba(0,0,0,0.75);box-shadow: 0px 1px 19px -5px rgba(0,0,0,0.75);*/border:3px solid #343434;border-radius: 3px;}
    /*Smartphones*/
    @media (max-width: 360px) {
        .divBlocker {margin-top:80px;margin-left:0;background:none;}
        h1.title-page {font-size:14px!important;}
        .post-single iframe{height:280px!important;}
    }
    /*Tablet Landscape*/
    @media (max-width: 767px) {
        .divBlocker {margin-top:80px;margin-left:565px;}
        h1.title-page {font-size:14px!important;}
        .post-single iframe{height:280px!important;}
    }    
    /*Tablet Portrait*/

    /*Small Screen PC*/
            
</style>
	<div id="site-main">

		<div class="wrapper wrapper-main clearfix">
		
			<main id="site-content" class="site-main" role="main">
                <!-- <div class="divBlocker" onclick="location.href='<?php home_url(); ?>';"></div> -->
			
				<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="site-content-wrapper clearfix">

					<?php get_template_part( 'template-parts/content', 'single' ); ?>
					
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
					
				</div><!-- .site-content-wrapper .clearfix -->
				
				<?php endwhile; // End of the loop. ?>
			
			</main><!-- #site-content -->
			
			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>