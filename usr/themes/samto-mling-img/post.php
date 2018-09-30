<?php include('header.php'); ?>

    <div class="grid_10" id="content">
        <div class="ak-node">
		     <div class="ak-node-main">
			      <h2><?php $this->title() ?></h2>
				  <div class="ak-node-txt-span">时间：<?php $this->date('m/d/y'); ?>　评论：<a href="<?php $this->permalink() ?>#ak-comments-post" title="我也要说几句"><?php $this->commentsNum('没有', '1 条', '%d 条'); ?></a>　标签：<?php $this->tags(' , ', true, 'none'); ?></div>
				  <style type="text/css">
<!--
p.neo-vx {display:block;}
-->
</style>
			      <?php $this->content(); ?>
				  
			 </div>
			 <div class="ak-node-main-bot"></div>
		</div>

		<?php include('comments.php'); ?>
    </div><!-- end #content-->
	<?php include('sidebar.php'); ?>
	<?php include('footer.php'); ?>
