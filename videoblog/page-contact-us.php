<?php
/* Template Name:Contact Us */
get_header(); ?>

	<div id="site-main" class="content-home">

		<div class="wrapper wrapper-main clearfix" style="text-align:center!important;">
		
			<main id="site-content" class="site-main" role="main">
			
				<div class="site-content-wrapper clearfix">
					<p class="widget-title"><?php _e('Do you have any trouble about the site? You want to request a movie? Start connecting with us by using our FB Chat widget.','videoblog'); ?></p>
                    <!-- Chat Here -->
                  	<script>
				      window.fbAsyncInit = function() {
				        FB.init({
				          appId      : '1844712965851285',
				          xfbml      : true,
				          version    : 'v2.6'
				        });
				      };

				      (function(d, s, id){
				        var js, fjs = d.getElementsByTagName(s)[0];
				        if (d.getElementById(id)) {return;}
				        js = d.createElement(s); js.id = id;
				        js.src = "//connect.facebook.net/en_US/sdk.js";
				        fjs.parentNode.insertBefore(js, fjs);
				      }(document, 'script', 'facebook-jssdk'));
				    </script>

				    <div class="fb-page" 
				         data-href="https://www.facebook.com/OfficialJologsMovieSite/" 
				         data-tabs="messages" 
				         data-width="400" 
				         data-height="450" 
				         data-small-header="true">
				      <div class="fb-xfbml-parse-ignore">
				        <blockquote></blockquote>
				      </div>
				    </div>				
				</div><!-- .site-content-wrapper .clearfix -->
			
			</main><!-- #site-content -->
			
			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>