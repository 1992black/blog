<div class="scroll" id="scroll" style="display:none;">TOP</div>
  <?php
$option = get_option('viiqi_options');  

?>
<div class="contact_index clear">

        	<div class="down fl">

  <div class="pdf fl">

					<a href="<?php echo get_bloginfo("url")?>/down"><img src="<?php echo get_bloginfo("template_url")?>/images/pdf.jpg" width="39" height="40" class="fl"/>

                    <span class="fl">DOWNLOAD<BR />

RESOURCES</span></a> </div>

                <div class="pdf fl">

					<a href="<?php echo get_bloginfo("url")?>/feedback"><img src="<?php echo get_bloginfo("template_url")?>/images/que.jpg" width="34" height="36" class="fl"  /> 

                    <span class="fl">

REQUEST<BR />

QUOTE</span></a> </div>

	</div>

    

    <div class="tel fr">

       Telephone: <?php if($option["mobile"]){echo $option["mobile"]; }?><br />

       Fax: <?php if($option["phone"]){echo $option["phone"]; }?><br />

    Email: <a href="mailto:<?php if($option["email"]){echo $option["email"]; }?>"><?php if($option["email"]){echo $option["email"]; }?></a></div>

        </div>

       <!--bottom--> 

        <div class="bottom">

        	<div class="copyright fl">

            	©2014-2014 飞九天工作室

            </div>

            <div class="equipment fr">

            	<a href="http://www.feijiutian.com">飞九天</a> --一个专门卖网站的网站(修改本信息在footer.php修改即可)

            </div>

        </div>

</body>

</html>