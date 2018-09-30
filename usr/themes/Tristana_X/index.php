<?php
/**
 * 基于默认模板修改的一套皮肤，看看就好
 * 
 * @package 城市喧嚣
 * @author Wu
 * @version 1.0
 * @link http://tristana.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="col-mb-12 col-8 timeLine" id="main" role="main">
	<?php $l=""; while($this->next()): ?>
        <div class="box">
			<h2 class="box-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
            <div class="box-content" itemprop="articleBody">
    			<?php $this->content('- 阅读剩余部分 -'); ?>
            </div>
            <ul class="box-meta">
				<li><?php _e('作者: '); ?><a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
				<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>"><?php $this->date('F j, Y'); ?></time></li>
				<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
				<li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			</ul>
        <?php 
        #if($l!=$this->date('F')){
        #$l=$this->date('F'); 
        #echo ''; } 
        ?>
        <div class="month"><? $this->date('F'); ?></div>
        </div>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo;', '&raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
