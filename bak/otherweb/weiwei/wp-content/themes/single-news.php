<?php get_header();?>
        <!---top--->
       <div class="net_banner">
    <img src="<?php echo get_bloginfo("template_url")?>/images/net_bane.jpg" width="1024" height="100" /></div>
    
    <!----content--->
    <div class="content clearfloat">
    	<div class="left fl">
        	<h3>News</h3>
            <UL>
			<?php 
			$news_id_array=get_all_child_cat_id_by_slug("news");
			
			if(count($news_id_array)<2){
			echo '<li><a href="'.get_category_link($news_id_array[0]).'">ALL News</a></li>';
			}else{
			for($i=1;$i<count($news_id_array);$i++){
			echo '<li><a href="'.get_category_link($news_id_array[$i]).'">'.get_cat_name($news_id_array[$i]).'</a></li>';
			}
			}
			?>
            	
              
            </UL>
        </div>
  <div class="case fl">
        	<h2><?php the_title();?></h2>
            <div class="casedetail">
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