<?php get_header();?>
        <!---top--->
       <div class="net_banner">
    <?php echo "<p>CUSTOMER SERVICE</p>";?></div>
    
    <!----content--->
    <div class="content clearfloat">
    	<div class="left fl">
        	<h3>CUSTOMER SERVICE</h3>
            <UL>
            <?php 
			 $args = array('posts_per_page'=>10,"category_name"=>"service","order"=>"ASC");
			 $services= get_posts( $args );
			 if($services){
			 foreach( $services as $service){
			 echo '<li><a href="'.get_permalink( $service->ID).'">'.get_the_title( $service->ID).'</a></li>';
			 }
			 }
            	?>
           
            </UL>
        </div>
  <div class="case fl">
        	<h2><?php the_title();?></h2>
            <div class="case_word">
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