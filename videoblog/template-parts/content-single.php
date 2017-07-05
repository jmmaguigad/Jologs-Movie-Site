<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Videoblog
 */

?>
<?php $cus_type = get_post_type(get_the_ID()); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="ilovewp-page-intro ilovewp-page-inner">
		<h1 class="title-page">
            <?php echo get_the_title(); ?> 
            <?php
                if ($cus_type != "jologs_anime") {
                    echo ' ('.get_post_custom_values( 'year_shown' )[0].')'; 
                }
            ?>
        </h1>
		<p class="post-meta"><?php _e('By','videoblog'); ?> <?php echo esc_url( the_author_posts_link() ); ?> 
		<?php _e('in','videoblog'); ?> <span class="post-meta-category"><?php the_category(' '); ?></span> <span class="posted-on"><span class="genericon genericon-time"></span> <time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></span></p>
	</header><!-- .ilovewp-page-intro -->

	<div class="post-single clearfix">

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'videoblog' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'videoblog' ),
				'after'  => '</div>',
			) );
		?>

		<?php
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'videoblog' ) );
		if ( $tags_list ) {
			printf( '<p class="tags-links">' . esc_html__( 'Tags: %1$s', 'videoblog' ) . '</p>', $tags_list ); // WPCS: XSS OK.
		}            
        ?>     
        <style>
            .dlink_btn {text-decoration:none;text-align:center;background-color:red;color:#fff;padding:15px 20px;border-radius:3px;}
            .dlink_btn:hover {background-color: #da0303;color:#fff;text-decoration:none;font-weight: bold;}
            .dllink_btn:focus,.dllink_btn:active {color:#fff;}
        </style>
        <div style="text-align:center;padding-bottom:20px;"><a class="dlink_btn" target="_blank" href="<?php echo get_post_custom_values('dlink')[0]; ?>">DOWNLOAD MOVIE</a></div>
        <?php 
        $args['prev_text'] = '%title' . '<span class="nav-link-label"><span class="genericon genericon-next"></span></span>';
        $args['next_text'] = '<span class="nav-link-label"><span class="genericon genericon-previous"></span></span>' . '%title';
        echo get_the_post_navigation($args); ?>
        
        <?php
            //movie details
            $video_content = get_post_custom_values( 'video_description');
            $video_anime_content = get_post_custom_values( 'video_anime_description');
            $director = get_post_custom_values( 'director');
            $writer = get_post_custom_values( 'writer');
            $casts = get_post_custom_values( 'casts');
            if ($cus_type != "jologs_anime") {
                echo '<h3>Category</h3>'.get_the_term_list($post->ID, 'Movie Type', '', ' / ','').'<br/>';    
        ?>
            <!--facebook like here-->
            <div class="fb-like" data-href="<?php echo the_permalink(); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div><br>
            <!--end of facebook like here-->
            <?php pvc_stats_update( get_the_ID(), 1 ); ?>
        <?php 
                echo '<h3>Story Line</h3>'.$video_content[0].'<br/>';                            
            } else {
                echo '<h3>Category</h3>'.get_the_term_list($post->ID, 'Anime Type', '', ' / ','').'<br/>';
        ?>
            <!--facebook like here-->
            <div class="fb-like" data-href="<?php echo the_permalink(); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div><br>
            <!--end of facebook like here-->
            <?php pvc_stats_update( get_the_ID(), 1 ); ?>
        <?php
                echo '<h3>Story Line</h3>'.$video_anime_content[0].'<br/>';                            
            }
            if (!empty($director[0])) {
                echo '<strong>Director: </strong>'.$director[0].'<br/>';
            }
            if (!empty($writer[0])) {
                echo '<strong>Writer/s: </strong>'.$writer[0].'<br/>';
            }
            if (!empty($casts[0])) {
                echo '<strong>Casts: </strong>'.$casts[0].'<br/>';
            }            
		?>
	</div><!-- .post-single -->
    <!--facebook comment here-->
    <div class="fb-comments" data-width="100%" data-href="<?php echo the_permalink(); ?>" data-numposts="5"></div>
    <!--end of facebook comment here-->
</article><!-- #post-<?php the_ID(); ?> -->