<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Videoblog
 */

$ilovewp_logo = get_template_directory_uri() . '/images/ilovewp-logo-white.png';

?>
	<footer class="site-footer" role="contentinfo">        
		<div class="wrapper wrapper-footer">
            <div>
                Disclaimer: Jologs.com is absolutely legal and contain only links to other sites on the Internet. We do not host or upload any video, films, media files (avi, mov, flv, mpg, mpeg, mp4, torrent, ipod, psp), Jologs.com is not responsible for the accuracy, compliance, copyright, legality, decency, or any other aspect of the content of other linked sites. If you have any legal issues please contact the appropriate media file owners or host sites.
            </div>
			<?php get_sidebar( 'footer' ); ?>
			
			<div style="text-align:center;" class="wrapper-copy">
				<p class="copy"><?php _e('Copyright &copy;','jologs_movie');?> <?php echo date_i18n(__("Y","jologs_movie")); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'jologs_movie');?>.</p> &nbsp;&nbsp;&nbsp;<a href="http://www.topblogs.com.ph/entertainment/"><img style="border:none;" src="http://www.topblogs.com.ph/track_54296.gif" alt="Entertainment & Lifestyle - Top Blogs Philippines" /></a>
			</div><!-- .wrapper-copy -->

		</div><!-- .wrapper .wrapper-footer -->
	
	</footer><!-- .site-footer -->

</div><!-- #container -->
<script>
    //http://keycode.info/ -> keycodes available here
    var isCtrl = false;
    var isShift = false;
    document.onkeyup=function(e)
    {
        if(e.which == 17) {isCtrl=false};
        if (e.which == 16) {isShift=false};
    }
    document.onkeydown=function(e)
    {
        if(e.which == 17) {isCtrl=true};
        if (e.which == 16) {isShift=true};
        if(((e.which == 85) && (isCtrl == true)) || ((e.which == 73) && (isCtrl == true) && (isShift == true))) 
        {
            return false;
        }
    }
    var isNS = (navigator.appName == "Netscape") ? 1 : 0;
    if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
    function mischandler(){
        return false;
    }
    function mousehandler(e){
        var myevent = (isNS) ? e : event;
        var eventbutton = (isNS) ? myevent.which : myevent.button;
        if((eventbutton==2)||(eventbutton==3)) return false;
    }
    document.oncontextmenu = mischandler;
    document.onmousedown = mousehandler;
    document.onmouseup = mousehandler;  
</script>
<?php wp_footer(); ?>

</body>
</html>