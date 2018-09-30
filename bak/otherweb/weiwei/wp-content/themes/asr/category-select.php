<?php get_header();?>
        <!---top--->
       <div class="net_banner">
     <?php echo "<p>".get_cat_name($cat)."</p>";?></div>
    
    <!----content--->
    <div class="content clearfloat">
    	<div class="left fl">
        	<h3>HOW TO select</h3>
            <UL>
			 <?php 
			 $args = array('posts_per_page'=> 5,"category_name"=>"select","order"=>"ASC");
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
  <?php 

		$args=array("posts_per_page"=>1,"order"=>"ASC","category_name"=>"select","cat"=>$cat);
		$query1 = new WP_Query( $args );
				while ( $query1->have_posts() ) {
	$query1->the_post();
  ?>
        	<h2><?php echo get_cat_name($cat);?></h2>
            <div class="production_word">
            	 <?php
		
		  the_content();
}
	wp_reset_postdata();?>  
</div>
    
        
      </div>
      
    
    
    </div>
	
        
        
<!---bg--->
      


<!---contact--->
<?php get_footer();?>