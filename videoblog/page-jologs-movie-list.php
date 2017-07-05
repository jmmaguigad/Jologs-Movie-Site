<?php
/* Template Name:Jologs Movie List */
get_header(); ?>

	<div id="site-main" class="content-home">

		<div class="wrapper wrapper-main clearfix">
		
			<main id="site-content" class="site-main" role="main">
			
				<div class="site-content-wrapper clearfix">
                    			<!-- Custom Search -->
					<div class="widget widget_search">
						<form role="search" class="search-form" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
						    <input type="text" class="search-field" name="s" placeholder="Search Movies"/>
						    <input type="hidden" name="post_type" value="jologs_movie" />
						    <input type="submit" class="search-submit" alt="Search" value="Search" />
					  	</form>                    	
                    			</div>
                    			<!-- End of Custom Search -->                   
					<?php if ( is_home() || is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>
					
					<?php if ( (is_home() || is_front_page()) && !is_paged() ) { ?><p class="widget-title"><?php _e('Jologs Videos','videoblog'); ?></p><?php } ?>
					
					<ul id="recent-posts" class="ilovewp-posts ilovewp-posts-archive clearfix">
						<?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $loop = new WP_Query( array(
                                'post_type' => 'jologs_movie',
                                'posts_per_page' => 6,
                                'orderby'=> 'menu_order',
                                'paged'=>$paged                                
                            ) );
                            $args = array('post_type' => 'jologs_movie', 'paged' => get_query_var('paged'), 'posts_per_page' => 12 );
                            $loop = new WP_Query( $args );
                            
                        ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						
						<?php get_template_part( 'template-parts/content'); ?>
						
						<?php endwhile; ?>
                        <div style="text-align:center;"><?php if(function_exists('wp_pagenavi')) { 
                            wp_pagenavi(array(  'query' => $loop) ); 
                             wp_reset_postdata(); 
                        } ?></div>
					</ul><!-- .ilovewp-posts .ilovewp-posts-archive -->
                  					
				</div><!-- .site-content-wrapper .clearfix -->
			
			</main><!-- #site-content -->
			
			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>
