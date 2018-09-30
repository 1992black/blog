<?php 
 include('header.php');
 ?>

    <div class="grid_10" id="content">
	<?php while($this->next()): ?>
        <div class="ak-node">
		     <div class="ak-node-main">
			      <div class="ak-node-main-img">
				  <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><img src="/bloglogo/<?php $this->theId(); ?>.gif" alt="<?php $this->title() ?>" width="83" height="83"></a>
				  </div>
			      <div class="ak-node-txt">
			      <h3><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
				  <div class="ak-node-txt-span">时间：<?php $this->date('m.d.Y'); ?>　评论：<a href="<?php $this->permalink() ?>#ak-comments-post" title="我也要说几句"><?php $this->commentsNum('没有', '1 条', '%d 条'); ?></a>　标签：<?php $this->tags(' , ', true, 'none'); ?></div>
				  <?php $this->content(); ?>
				  </div>
				  <div class="cleax"></div>
			 </div>
			 <div class="ak-node-main-bot"></div>
		</div>
	<?php endwhile; ?>

        <ol class="pages clearfix">
            <?php $this->pageNav(); ?>
        </ol>
    </div><!-- end #content-->
	<?php include('sidebar.php'); ?>
	<?php include('footer.php'); ?>
