</div>
<div class="ak-main-bottom"></div>
</div>
<div class="grid_14" id="footer">
<div class="akfooter">
<div class="akfooter-txt">
	<span class="akf-left"><a href="<?php $this->options->siteurl(); ?>"><?php $this->options->title(); ?></a> <?php _e('is powered by'); ?> <a href="http://www.typecho.org">Typecho)))</a></span>
	<span class="akf-right">Theme design by <a href="http://www.ak92.com">AK92.COM</a> & <a href="http://samto.cn">SAMTO.CN</a></span>
</div>
</div>
</div><!-- end #footer -->
<div style="display:none;">
<!--GGADS-->
<div id="span_myads">
<script type="text/javascript"><!--
google_ad_client = "pub-1316478813771045";
/* 468x60, 09-11-5 */
google_ad_slot = "6031408214";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<div id="span_myadv">
<script type="text/javascript"><!--
google_ad_client = "pub-1316478813771045";
/* 200x200, 09-11-5 */
google_ad_slot = "1684180047";
google_ad_width = 200;
google_ad_height = 200;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<script type="text/javascript">
document.getElementById("myads").innerHTML = document.getElementById("span_myads").innerHTML;
document.getElementById("span_myads").innerHTML = "";
</script>
<script type="text/javascript">
document.getElementById("myadv").innerHTML = document.getElementById("span_myadv").innerHTML;
document.getElementById("span_myadv").innerHTML = "";
</script>
</div>
<?php $this->footer(); ?>
<?php
if ($this->is('single')) {
    Helper::threadedCommentsScript();
}
?>


</body>
</html>
