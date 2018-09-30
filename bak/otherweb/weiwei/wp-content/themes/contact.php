<?php 
/*
Template Name:Contact 
*/
get_header();?>	
        <!---top--->
       <div class="net_banner">
    <?php echo "<p>Contact Us</p>";?></div>
    
    <!----content--->
    <div class="content clearfloat">
    	<div class="left fl">
        	<h3>联系我们</h3>
            <UL>
            	<li><a href="<?php echo get_bloginfo("url")?>/contact-us">联系我们</a></li>
                <li><a href="<?php echo get_bloginfo("url")?>/feedback">在线咨询</a></li>
           
            </UL>
        </div>
  <div class="case fl">
        	<h2>联系我们</h2>
            <div class="case_word">
             <?php if (have_posts()) : while (have_posts()) : the_post();
					the_content();

   endwhile;

	endif;

					?>


            
    
        
      </div>
      
    
    
    </div>
	
        
        
<!---bg--->
      


<!---contact--->
<?php get_footer();?>