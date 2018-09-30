 <?php             $news1= get_option('mytheme_news1');
                   $news1_bt_b1=get_option('mytheme_news1_bt_b1');
		           $news1_bt_b2=get_option('mytheme_news1_bt_b2');
		           $news1_bt_a=get_option('mytheme_news1_bt_a');
				   $news1_bt_p=get_option('mytheme_news1_bt_p');
		    ?>

<div id="left_news">
    <div class="left_news_hd">
         <h2><b><?php if($news1_bt_b1 !=""){ echo $news1_bt_b1 ;}else{echo '最新';}?><a><?php if($news1_bt_a !=""){ echo $news1_bt_a ;}else{echo '公司';}?></a><?php if($news1_bt_b2 !=""){ echo $news1_bt_b2 ;}else{echo '动态';}?></b>
          <p><?php if($news1_bt_p !=""){ echo $news1_bt_p ;}else{echo 'Our latest news';}?></p></h2>
         <a class="more" href="<?php echo get_category_link($news1) ?>">more</a>
      </div>
      
      <ul class="news_loop_01">
          
             <?php  $posts = get_posts( "category=($news1)&numberposts=4" );
                     if( $posts ) :
              $counter = 0;foreach( $posts as $post ) : setup_postdata( $post );$counter++;  ?>      
                      <?php if ($counter == 1 && get_query_var('paged') < 2):?> 
           <li id="fist">
             <a href="<?php the_permalink() ?>" class="news_001_pic">
             <?php  $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('default_fist-list-thumbb' ,array('alt'	=>$tit, 'title'=> $tit ));} ?> 
             </a>
              <span>
             <b><a href="<?php the_permalink() ?>">  <?php echo mb_strimwidth(get_the_title(), 0, 45,"...") ?></a></b>
             <a class="time">TIME:<?php the_time('Y/m/d') ?></a>
            <p>  <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,300,"..."); ?></p>
             <a href="<?php the_permalink() ?>" class="news_btn">MORE>></a>
             </span>
           </li>
           
          <?php else : ?> 
         
            <li id="ohter">
             <a href="<?php the_permalink() ?>" class="news_001_pic">
            <?php  $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('news_smoll-sidbar-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));} ?> 
             </a>
              <span>
             <b><a href="<?php the_permalink() ?>"> <?php echo mb_strimwidth(get_the_title(), 0, 45,"...") ?></a></b>
             <a class="time">TIME:<?php the_time('Y/m/d') ?></a>
             <p>  <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,300,"..."); ?></p>
            
             </span>
           </li>
           
            <?php endif; ?>
               <?php endforeach; ?>                                              
               <?php else : ?>
               <?php endif; ?>
  
      
      
      </ul>
      
      
</div>
