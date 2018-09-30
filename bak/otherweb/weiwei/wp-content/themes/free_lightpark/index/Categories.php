<?php   
		           $cat_title=get_option('mytheme_cat_title');
		           $cat1_en=get_option('mytheme_cat1_en');
		           $cat1_title=get_option('mytheme_cat1_title');
		           $cat1_url=get_option('mytheme_cat1_url');
				   $cat1_pic=get_option('mytheme_cat1_pic');
				   
				   $cat2_title=get_option('mytheme_cat2_title');
		           $cat2_url=get_option('mytheme_cat2_url');
				   $cat2_pic=get_option('mytheme_cat2_pic');
				   
				   $cat3_title=get_option('mytheme_cat3_title');
		           $cat3_url=get_option('mytheme_cat3_url');
				   $cat3_pic=get_option('mytheme_cat3_pic');
				   
				   $cat4_title=get_option('mytheme_cat4_title');
		           $cat4_url=get_option('mytheme_cat4_url');
				   $cat4_pic=get_option('mytheme_cat4_pic');
				  
		   
		    ?>
<div id="Categories_hd">
      <div class="Categories_hd_in">
           <b><?php if($cat_title!=""){echo $cat_title;}else {echo '我们提供的产品/服务';} ?></b>
           <p><?php if($cat1_en!=""){echo $cat1_en;}else {echo 'our services / products';} ?></p>
      </div>
</div>

<div id="Categories_bd">
         <div class="Categories_bd_in">
      <?php if($cat1_pic!=""){ ?>   
         <a href="<?php echo $cat1_url; ?>">
            <span>
            <div class="hold"> </div>
            <img src="<?php echo $cat1_pic; ?>" />
            </span>
             <h2><?php echo $cat1_title; ?></h2>
         
         </a>
         <?php }; ?>
          
        
         <?php if($cat2_pic!=""){ ?>   
         <a href="<?php echo $cat2_url ?>">
            <span>
            <div class="hold"> </div>
            <img src="<?php echo $cat2_pic; ?>" />
            </span>
             <h2><?php echo $cat2_title; ?></h2>
         
         </a>
         <?php }; ?>
         
          <?php if($cat3_pic!=""){ ?>   
         <a href="<?php echo $cat3_url ?>">
            <span>
            <div class="hold"> </div>
            <img src="<?php echo $cat3_pic; ?>" />
            </span>
             <h2><?php echo $cat3_title; ?></h2>
         
         </a>
         <?php }; ?>
         
          <?php if($cat4_pic!=""){ ?>   
         <a href="<?php echo $cat4_url ?>">
            <span>
            <div class="hold"> </div>
            <img src="<?php echo $cat4_pic; ?>" />
            </span>
             <h2><?php echo $cat4_title; ?></h2>
         
         </a>
         <?php }; ?>
         
         
         </div>
</div>