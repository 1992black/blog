<?php get_header();?>
        <!---top--->
       <div class="net_banner">
     <?php echo "<p>How To Select</p>";?></div>
    
    <!----content--->
    <div class="content clearfloat">
    	<div class="left fl">
        	<h3>HOW TO select</h3>
            <UL>
			 <?php 
			 $args = array('posts_per_page'=>10,"category_name"=>"select","order"=>"ASC");
			 $selects= get_posts( $args );
			 if($selects){
			 foreach( $selects as $select){
			 echo '<li><a href="'.get_permalink($select->ID).'">'.get_the_title($select->ID).'</a></li>';
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