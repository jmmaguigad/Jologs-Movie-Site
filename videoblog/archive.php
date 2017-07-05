<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Videoblog
 * 07-05-2017, removed Search Everything plugin and made customize plugin
 */

get_header(); ?>

	<div id="site-main">

		<div class="wrapper wrapper-main clearfix">
		
			<main id="site-content" class="site-main" role="main">
			
				<div class="site-content-wrapper clearfix">
					<!-- Custom Search -->
					<div class="widget widget_search">
						<form role="search" class="search-form" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
						    <input type="text" class="search-field" name="s" placeholder="Search Movies"/>
						    <input type="hidden" name="post_type" value="jologs_movie" /> <!-- // hidden 'products' value -->
						    <input type="submit" class="search-submit" alt="Search" value="Search" />
					  	</form>                    	
                    </div>
                    <!-- End of Custom Search -->

					<div class="ilovewp-page-intro ilovewp-archive-intro">
						<h1 class="title-page widget-title"><?php echo 'Search Result for Keyword: ' . $_GET['s'] ?></h1>
						<?php
							// the_archive_title( '<h1 class="title-page widget-title">'.$_GET['s'], '</h1>' );
							// the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</div><!-- .ilovewp-page-intro -->

					<?php if ( have_posts() ) : $i = 0; ?>
					
					<?php /* Start the Loop */ ?>
					<ul id="recent-posts" class="ilovewp-posts ilovewp-posts-archive clearfix">
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php
		
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content' );
						?>
		
					<?php endwhile; ?>
					
					</ul><!-- .ilovewp-posts .ilovewp-posts-archive -->
		
					<?php 
					$args['prev_text'] = '<span class="nav-link-label"><span class="genericon genericon-previous"></span></span>' . __('Older Posts', 'videoblog');
					$args['next_text'] = __('Newer Posts', 'videoblog') . '<span class="nav-link-label"><span class="genericon genericon-next"></span></span>';
					the_posts_navigation($args); ?>
		
				<?php else : ?>
		
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
		
				<?php endif; ?>
					
				</div><!-- .site-content-wrapper .clearfix -->
				
			</main><!-- #site-content -->
			
			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>