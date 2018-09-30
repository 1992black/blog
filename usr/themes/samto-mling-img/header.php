<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>

<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>

<body>
<div class="ak-header">
<p class="ak-ph">
<span class="ak-hl"><a href="<?php $this->options->siteUrl(); ?>"><?php _e('home'); ?></a><?php $this->widget('Widget_Contents_Page_List')->to($pages); ?><?php while($pages->next()): ?> | <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a><?php endwhile; ?></span>
<span class="ak-hr"><a href="<?php $this->options->feedUrl(); ?>">Entries RSS</a><a href="<?php $this->options->commentsFeedUrl(); ?>">Comments RSS</a><a href="http://feed.ak92.com" target="_blank">Feed US</a></span>
</p>
</div>

<div class="ak-logo">
     <div class="ak-logo-topbg">
	    <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?> - <?php $this->options->description() ?>"></a>
		<span><div id="myads">Google ADS Loading...</div></span>
	 </div>
</div>
<!-- end #header -->
<div class="ak-main-bg">
<div id="ak-menu">
<ul>
<li id="ak-mli-index"><a href="<?php $this->options->siteUrl(); ?>">home</a></li>
<?php $this->widget('Widget_Metas_Category_List')
                ->parse('<li><a href="{permalink}">{name}</a></li>'); ?>
</ul>
</div>
<div class="ak-main">
