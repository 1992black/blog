<?php                $case_show=get_option('mytheme_case_show');
			         $case_title=get_option('mytheme_case_title');
					 $case_title2=get_option('mytheme_case_title2');
					 $case_title3=get_option('mytheme_case_title3');
					 $case_en=get_option('mytheme_case_en');
			         $case1=get_option('mytheme_case1'); 
                   
					 
			 ?>
<div id="ccjefg_out">            
<div id="ccjefg">

      <div class="full_ccjefg_hd">
         <h2><b><?php if( $case_title ==""){echo "最新";} else{echo  $case_title;} ?><a><?php if( $case_title2 ==""){echo "产品";} else{echo  $case_title2;} ?></a><?php if( $case_title3 ==""){echo "展示";} else{echo  $case_title3;} ?></b>
          <p><?php if( $case_en ==""){echo "Our latest work";} else{echo  $case_en;} ?> </p></h2>
          
         <a class="more" href="<?php echo get_category_link($case1);  ?>">more</a>
      </div>
      </div>
      
   
   <div id="ccjefghd_out"> 
     <div id="ccjefg">
 <?php get_template_part( 'index/full_bigpic_x01' );
      
 ?>
 </div>


</div>