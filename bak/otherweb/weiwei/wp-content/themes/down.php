<?php 
/*
Template Name:down
*/
get_header();?>
        <!---top--->
       <div class="net_banner">
    <img src="<?php echo get_bloginfo("template_url")?>/images/net_bane.jpg" width="1024" height="100" /></div>
    
    <!----content--->
    <div class="content clearfloat">
    	<div class="left fl downbg">
        	<img src="<?php echo get_bloginfo("template_url")?>/images/DownloadSidebar.jpg" />
        </div>
  <div class="case fl">
        	
         
            <div class="Success_Case download">
            	<h2>RESOURCES DOWNLOAD</h2>
                
            <div>
			 <?php if (have_posts()) : while (have_posts()) : the_post();
					the_content();

   endwhile;

	endif;

					?>
			</div>
            </div>
    
        
      </div>
      
    
    
    </div>
	
        
        
<!---bg--->
      


<!---contact--->
<?php get_footer();?>