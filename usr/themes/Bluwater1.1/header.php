<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<title><?php if($this->is('post')): ?><?php $this->title() ?> - <?php $this->category(' - ', false); ?> - <?php elseif($this->is('category')): ?><?php $this->category(' - ', false); ?> - <?php else: ?><?php $this->archiveTitle(' - ', '', ' - '); ?><?php endif; ?><?php $this->options->title(); ?></title>
<meta name="description" content="<?php $this->options->description() ?>" />
<meta name="keywords" content="<?php $this->options->keywords() ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/phzoom.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/css3.css'); ?>" />
<script src="http://lib.sinaapp.com/js/jquery/1.8/jquery.min.js" type="text/javascript"></script>		
<script src="<?php $this->options->themeUrl('js/jqFancyTransitions.1.8.min.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/setup.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/png.js'); ?>" type="text/javascript"></script>

<!--[if IE]>			
<link href="<?php $this->options->themeUrl('css/jphotogrid.ie.css'); ?>" rel="stylesheet" type="text/css" media="screen" />
<![endif]--> 
</head>

<body>
<div class="menu radius_4">
	 <ul>
		 <li <?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
         <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
         <?php while($pages->next()): ?>
         <li <?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
         <?php endwhile; ?>
		 <li><a href="<?php $this->options->siteUrl(); ?>feed/" class="menu-rss" target="_blank" title="订阅本站">订阅本站</a></li>
	 </ul>

	 <!--<span>轻敲键盘，静候回音</span>-->
	 <form action="/search" class="head-search" method="get"><input id="search-input" type="text" name="s" class="inputbox" value="搜索..." onfocus="if (value =='搜索...'){value =''}" onblur="if (value ==''){value='搜索...'}" />	</form>
 </div>		

<div id="container" class="radius_4">	
<div id="container_top" class=" radius_t">
<div id="logo">
<a href="<?php $this->options->siteurl(); ?>"><?php $this->options->title(); ?></a>
</div>
<div id="head_about"><span>ABOUT</span>
<p><b><?php $this->author(); ?></b>，是我在这个网站的标签</p>
<p><?php $this->options->description() ?></p>
</div>

<div id="head_contact">
<span>CONTACT ME</span>
<ul>	
<li><a href="http://weibo.com/" target="_blank"><img src="http://weibo.com/favicon.ico">Weibo</a></li>	
<li><a href="http://t.qq.com/" target="_blank"><img src="http://bcs.duapp.com/youfun/QQweibo.png">T.QQ</a></li>
<li><a href="http://xfuny.com/" target="_blank"><img src="http://bcs.duapp.com/youfun/favicon.png">Blog</a></li>
<li><a href="http://c-light.taobao.com/" target="_blank"><img src="http://bcs.duapp.com/youfun/taobao.png">Taobao</a></li>
<li><a href="javascript:void(0)" target="_blank"><img src="http://bcs.duapp.com/youfun/twitter.png">Twitter</a></li>	
<li><a href='adimn@gmail.com' title="给我发邮件"><img src="http://bcs.duapp.com/youfun/email.png">adimn@gmail.com</a></li>
</ul>

</div>
</div>