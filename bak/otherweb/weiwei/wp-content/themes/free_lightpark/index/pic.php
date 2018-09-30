<div id="pic">
 <ul>
      <?php 
	     
              $hot_cat= get_option('mytheme_hot_cat');//获取分类别名为 wordpress 的分类数据
              $cat_links=get_category_link($hot_cat->term_id); // 通过$cat数组里面的分类id获取分类链接
			  $word_t1=get_option('mytheme_word_t1');
        
 $posts = get_posts( "category=($hot_cat)&numberposts=30" ); ?> 
    <?php if( $posts ) : ?>                                       
			   <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>     
    <?php  if(get_post_meta($post->ID, 'hoturl',true) !==""){ $link =get_post_meta($post->ID, 'hoturl',true);}else{$link = get_permalink();}?>
    <li><a style="background:url(<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "hot-pic-thumbb" , false, '' );echo $src[0];?>)"  href="<?php  echo $link?>"  > 
          <div class="pic_in">
 
            <div class="pic_text" id="<?php echo get_post_meta($post->ID, 'hots_tlye',true); ?>">
               <b> <?php the_title(); ?></b>
               <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),  0,300,"..."); ?>
</p>
<span> <?php  if($word_t1!=""){echo $word_t1;}else{echo '查看详细>>';}  ?>  </span>
            
            </div>
          </div>

         </a>
    </li>
           
               <?php endforeach; ?>                                            
               <?php else : ?>
               <?php endif; ?>      
 
 </ul>

<div class="pic_nav">

</div>

<a class="prve"></a>
<a class="next"></a>
</div>