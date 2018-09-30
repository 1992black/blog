<?php  $case1=get_option('mytheme_case1'); 
$category = get_category($case1);

 ?>


<div  class="loop_ccjefg">
<ul class="bigpic_loop">

  <?php $posts = get_posts( "category=($case1)&numberposts=4" ); ?>
    <?php if( $posts ) : ?>                                       
			   <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>     
<li>
<a href="<?php the_permalink() ?>" class="loop_big_a">
  <?php   $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('news-sidbar-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?>
</a>
<b><a href="<?php the_permalink() ?>"><?php echo mb_strimwidth(get_the_title(), 0, 34,"...") ?></a></b>
</li>

 <?php endforeach; ?>                                            
               <?php else : ?>
               <?php endif; ?> 

</ul>


</div>