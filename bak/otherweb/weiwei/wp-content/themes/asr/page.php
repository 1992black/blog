<?php get_header();?>
        <!---top--->
       <div class="net_banner">
    <?php echo "<p>".get_the_title()."</p>";?></div>
    
    <!----content--->
    <div class="content clearfloat">
	<div class="left fl">
        	<h3>CONTACT US</h3>
            <UL>
            	<li><a href="<?php echo get_bloginfo("url")?>/contact-us">Contact Us</a></li>
                <li><a href="<?php echo get_bloginfo("url")?>/feedback">Feedback</a></li>
           
            </UL>
        </div>
    	
  <div class="about">
        	<h2><?php the_title();?></h2>
            <div class="word">
   	  			<?php if (have_posts()) : while (have_posts()) : the_post();
					the_content();

   endwhile;

	endif;

					?>
      				
     		</div>
        
      </div>
      
    
    
    </div>
	
        
        
<!---bg--->
      


<!---contact--->
<?php get_footer();?>