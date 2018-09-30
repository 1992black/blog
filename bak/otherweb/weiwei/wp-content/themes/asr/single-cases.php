<?php get_header();?>
        <!---top--->
       <div class="net_banner">
    <?php echo "<p>CASE</p>";?>
	</div>
    
    <!----content--->
    <div class="content clearfloat leftnav">
        	<h3>SUCCESS CASES</h3>
             <div class="left fl">
    	<?php wp_nav_menu( array('theme_location' =>'case_nav','container'=>'false',"menu_class"=>"left fl","menu_id"=>"")); ?>
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