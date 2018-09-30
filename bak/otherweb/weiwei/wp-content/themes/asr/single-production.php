<?php get_header();?>
        <!---top--->
       <div class="net_banner">
     <?php echo "<p>PRODUCTION</p>";?></div>
    
    <!----content--->
    <div class="content clearfloat leftnav">
	<h3>PRODUCTION CAPABILITY</h3>
    	<div class="left fl">
        	
            <UL>
			 <?php 
			 $args = array('posts_per_page'=>10,"category_name"=>"production","order"=>"ASC");
			 $productions= get_posts( $args );
			 if($productions){
			 foreach( $productions as $production){
			 echo '<li><a href="'.get_permalink($production->ID).'">'.get_the_title($production->ID).'</a></li>';
			 }
			 }
            	?>
          
            </UL>
        </div>
  <div class="case fl">
        	<h2><?php the_title();?></h2>
            <div class="production_word">
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