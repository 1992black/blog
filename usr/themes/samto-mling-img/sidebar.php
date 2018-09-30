
    <div class="grid_4" id="sidebar">

	    <div class="widget"><div class="wid-node">
			<div class="sid-ads">
            <div id="myadv">Google Ads Loading...</div>
			</div>
         </div><div class="wid-nod-bot"></div>
	    </div>
		
		<div class="widget"><div class="wid-node">
			<h3><?php _e('最新文章'); ?></h3>
            <ul>
                <?php $this->widget('Widget_Contents_Post_Recent')
                ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
            </ul></div><div class="wid-nod-bot"></div>
	    </div>
    
	    <div class="widget"><div class="wid-node">
			<h3><?php _e('最近回复'); ?></h3>            
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
				<div class="wid-com-img"><a href="<?php $comments->permalink(); ?>"><?php $comments->gravatar(40, 'X', '', 'avatar'); ?></a></div>
				<div class="wid-com-txt"><a href="<?php $comments->permalink(); ?>" title="<?php $comments->excerpt(100, '...'); ?>"><?php $comments->excerpt(14, '...'); ?></a><br><span class="wid-com-data"><?php $comments->date('m.d.y'); ?> at <?php $comments->date('H:i'); ?></span></div>
				<div class="cleax"></div>
            <?php endwhile; ?>

            </div><div class="wid-nod-bot"></div>
	    </div>

        <div class="widget"><div class="wid-node">
			<h3><?php _e('归档'); ?></h3>
            <ul>
                <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
            </ul></div><div class="wid-nod-bot"></div>
		</div>

		<div class="widget"><div class="wid-node">
			<h3><?php _e('其它'); ?></h3>
            <ul>
                <?php if($this->user->hasLogin()): ?>
					<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                    <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                <?php else: ?>
                    <li class="last"><a href="<?php $this->options->adminUrl('register.php'); ?>"><?php _e('注册'); ?></a></li>
					<li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
                <?php endif; ?>
                <li><a href="http://validator.w3.org/check/referer">Valid XHTML</a></li>
                <li><a href="http://www.typecho.org">Typecho</a></li>
            </ul></div><div class="wid-nod-bot"></div>
		</div>

    </div><!-- end #sidebar -->
