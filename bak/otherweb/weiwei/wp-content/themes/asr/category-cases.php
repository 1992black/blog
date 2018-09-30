<?php get_header();?>
        <!---top--->
       <div class="net_banner">
    <?php echo "<p>".get_cat_name($cat)."</p>";?>
	</div>
    
    <!----content--->
    <div class="content clearfloat leftnav">
	<h3>SUCCESS CASES</h3>

        <div class="left fl">
    	<?php wp_nav_menu( array('theme_location' =>'case_nav','container'=>'false',"menu_class"=>"left fl","menu_id"=>"")); ?>
		</div>    	
            
        
  <div class="case fl">
        	<h2><?php echo get_cat_name($cat) ;?></h2>
            <div class="case_word">
            	<?php echo category_description( $cat);?>
            </div>
            <div class="Success_Case">
            	<h2><?php echo get_cat_name($cat);?> list</h2>
                <ul>
				 <?php if (have_posts()) : while (have_posts()) : the_post();?>
                	<li><a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a></li>
                    <?php endwhile;
 			else :
			    echo '<li >';
				echo 'No any case!!';
				echo "</li>";
				
		endif; ?>  
                </ul>
            
            </div>
    
        
      </div>
      
    
    
    </div>
	
        
        
<!---bg--->
      


<!---contact--->
<?php get_footer();?>