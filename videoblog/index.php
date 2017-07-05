<?php
/**
 * The main template file.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Videoblog
 */

get_header(); ?>
<style>
    .dlink_btn {text-decoration:none;text-align:center;background-color:red;color:#fff;padding:15px 20px;border-radius:3px;}
    .dlink_btn:hover {background-color: #da0303;color:#fff;text-decoration:none;font-weight: bold;}
    .dllink_btn:focus,.dllink_btn:active {color:#fff;}
</style>
	<div id="site-main" class="content-home">

		<div class="wrapper wrapper-main clearfix">
		
			<main id="site-content" class="site-main" role="main">
			
				<div class="site-content-wrapper clearfix">
                    <?php //dynamic_sidebar( 'sidebar-main' ); ?>
                    <div class="widget widget_search">
						<form role="search" class="search-form" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
						    <input type="text" class="search-field" name="s" placeholder="Search Movies"/>
						    <input type="hidden" name="post_type" value="jologs_movie" /> <!-- // hidden 'products' value -->
						    <input type="submit" class="search-submit" alt="Search" value="Search" />
					  	</form>                    	
                    </div>                   
                    <?php 
                    $custom_loop = new WP_Query( array( 'post_type' => 'jologs_movie', 'order'=>'DESC' ) ); ?>
					<?php if ( $custom_loop->have_posts() ) : $i = 0; ?>
					
					<?php if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>

					<?php if ( is_home() && !is_paged() ) { ?>
					
						<?php
						if ( 1 == get_theme_mod( 'videoblog_front_featured_posts', 1 ) ) {
							get_template_part( 'template-parts/content', 'home-featured' );
						}
						
						if ( 1 == get_theme_mod( 'videoblog_front_featured_categories', 0 ) ) {
							get_template_part( 'template-parts/content', 'home-categories' );
						}
						
						?>

					<?php } ?>
					
					<?php if ( is_home() && !is_paged() ) { ?><p class="widget-title"><?php _e('Jologs Recent Videos','videoblog'); ?></p><?php } ?>
					
					<ul id="recent-posts" class="ilovewp-posts ilovewp-posts-archive clearfix">
						<?php
                            //hijack the loop
                            //$my_query = new WP_Query( array( 'tag' => 'foo', 'paged' => get_query_var('paged') ) );                            
                            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                            $args = array('post_type' => 'jologs_movie', 'paged' => get_query_var('paged'), 'posts_per_page' => 12 );
                            $loop = new WP_Query( $args );
                            
                        ?>
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
						
						<?php get_template_part( 'template-parts/content'); ?>
						
						<?php endwhile; ?>
					</ul><!-- .ilovewp-posts .ilovewp-posts-archive -->
					<div style="text-align:center;padding-bottom:20px;"><a class="dlink_btn" href="/jologs-movie-list/page/2/">BROWSE MORE MOVIES</a></div>
					<?php else : ?>
			
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
			
					<?php 
                        endif; 
                    ?>
				</div><!-- .site-content-wrapper .clearfix -->
			
			</main><!-- #site-content -->
			
			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>