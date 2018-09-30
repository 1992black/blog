  <?php             $news2= get_option('mytheme_news2');
                    $news2_bt_b1=get_option('mytheme_news2_bt_b1');
		            $news2_bt_b1=get_option('mytheme_news2_bt_b2');
		            $news2_bt_a=get_option('mytheme_news2_bt_a'); 
				    $news2_bt_p=get_option('mytheme_news2_bt_p');
		    ?>

<div id="right_news">
   <div class="video">
   <?php if(get_option('mytheme_video') !=""){echo stripslashes(get_option('mytheme_video'));}else { ?>
   <iframe height=498 width=510 src="http://player.youku.com/embed/XNjg5ODI4MzY0" frameborder=0 allowfullscreen></iframe>
   <?php }; ?>
   
   </div>
   <div class="left_news_hd">
         <h2 class="shot"><b><?php if($news2_bt_b1 !=""){ echo $news2_bt_b1 ;}else{echo '最新';}?><a><?php if($news2_bt_a !=""){ echo $news2_bt_a ;}else{echo '行业';}?></a><?php if($news2_bt_b2 !=""){ echo $news2_bt_b2 ;}else{echo '资讯';}?></b> <p><?php if($news2_bt_p !=""){ echo $news2_bt_p ;}else{echo 'Our latest news';}?></p></h2>
        
      </div>
       <ul class="news_loop_02">
        <?php $posts = get_posts( "category=($news2)&numberposts=6" ); ?>    
          <?php if( $posts ) : ?>                                      
	           <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>     
         <li> <a href="<?php the_permalink() ?>"> <?php echo mb_strimwidth(get_the_title(), 0, 45,"...") ?></a> <p><?php the_time('Y-m-d') ?></p></li>
        
     <?php endforeach; ?>                                            
               <?php else : ?>
               <?php endif; ?>
       </ul>
   

</div>