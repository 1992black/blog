<?php get_header();?>

        <!---top--->

       <div class="net_banner">

    <?php echo "<p>".get_cat_name($cat)."</p>";?></div>

    

    <!----content--->

    <div class="content clearfloat leftnav">

	<h3>产品中心 </h3>

	<div class="left fl">

    	<?php wp_nav_menu( array('theme_location' =>'product_nav','container'=>'false',"menu_class"=>"left fl","menu_id"=>"")); ?>

		</div>

  <div class="case fl">

        	<h2><?php echo get_cat_name($cat);?></h2>

            <div class="product">

       		 <?php 

		$args=array("posts_per_page"=>1,"order"=>"ASC","category_name"=>"products","cat"=>$cat);

		$query1 = new WP_Query( $args );

				while ( $query1->have_posts() ) {

	$query1->the_post();

		

		  the_content();

}

	wp_reset_postdata();?>  

                	

                    

              

    </div>

          

    

        

      </div>

      

    <div class="right fl">

    	<h2>--- 产品资料下载 ---</h2>

        <ul>

		<?php

		

	$downargs = array(

'post_type'=>'attachment',

'posts_per_page'=>10,

"post_mime_type"=>'application/pdf',

'post_status'=>'inherit',

);

//$postarray=get_posts($args);

//print_r($postarray);

query_posts( $downargs);

while ( have_posts() ) : the_post();

echo '<li><a href="'.wp_get_attachment_url($post->ID).'">'.get_the_title($post->ID).'</a></li>';

endwhile;

wp_reset_postdata();

	?>

        	

        </ul>

    </div>

    

    </div>

	

        

        

<!---bg--->

      





<!---contact--->

<?php get_footer();?>