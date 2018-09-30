<?php get_header();?>
        <!---top--->
       <div class="net_banner">
     <?php echo "<p>PRODUCT</p>";?>
	 </div>
    
    <!----content--->
    <div class="content clearfloat leftnav">
	<h3>PRODUCTION CAPABILITY</h3>
    	<div class="left fl">
        	
            <?php wp_nav_menu( array('theme_location' =>'product_nav','container'=>'false',"menu_class"=>"left fl","menu_id"=>"")); ?>
        </div>
  <div class="case fl">
        	<h2><?php the_title();?></h2>
           <div class="productdetail">
		   
           <div class="productdetail_word">
		   <?php if (have_posts()) : while (have_posts()) : the_post();
					the_content();

   endwhile;

	endif;

					?>
 
 </div>
       		
             
              
          
                	

          
    
        
      </div>
      </div>
    <div class="right fl">
    	<h2>--- RESOURCES ---</h2>
        <ul>
		<?php $attacheds=get_attached_media("application/pdf", get_queried_object_id());
		//print_r($attacheds);
		if($attacheds){
		foreach( $attacheds as $attached){
		echo '<li><a href="'.$attached->guid.'">'.$attached->post_title.'</a></li>';
		}
		}else{
		echo " ";
		}
		?> 
        	
           
        </ul>
    </div>
    
    </div>
	
        
        
<!---bg--->
      


<!---contact--->
<?php get_footer();?>