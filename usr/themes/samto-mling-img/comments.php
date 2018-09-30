<?php

function threadedComments($comments)
{
?>
    <li id="<?php $comments->theId(); ?>"<?php $comments->levelsAlt('', ' class="odd"'); ?>>
					<div class="comment_data">
						<?php $comments->gravatar(32, 'X', '', 'avatar'); ?>
						<span class="author"><?php $comments->author(); ?></span>
						<?php $comments->date('F jS, Y'); ?> at <?php $comments->date('h:i a'); ?> <!-- <span class="count">#<?php echo $comments->sequence(); ?></span> -->
					</div>
					<?php $comments->content(); ?>
                    <?php $comments->threadedComments('<ol>', '</ol>'); ?>
                    <?php if (!$comments->isTopLevel): ?>
                    <div class="comment_reply">
                        <?php Helper::replyLink($comments->theId, $comments->coid, 'Reply', 'respond'); ?>
                    </div>
                    <?php endif; ?>
    </li>
<?php
}
?>

<div id="ak-comments">
         <div class="ak-node">
		     <div class="ak-node-main-top"></div>
			 <div class="ak-node-main-comments">
			 <h4><?php $this->commentsNum(_t('当前暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论')); ?> &raquo;</h4>
			 <?php $this->comments()->to($comments); ?>
				<ol>
                <?php while($comments->next()): ?>
				<li>
				<div class="ak-com-img">
				<a href='<?php $comments->url(); ?>' rel='external nofollow' class='url url' title='<?php $comments->author(); ?>'><?php $comments->gravatar(60, 'X', '', 'avatar'); ?></a><br><?php $comments->date('m.d.y'); ?><br><?php $comments->date('h:i a'); ?>
				</div>
				<div class="ak-com-list"><?php $comments->content(); ?></div>
				<div class="cleax"></div>
				</li>
				<?php endwhile; ?>
				</ol>
			 </div>
			 <div class="ak-node-main-bot"></div>
		</div>
</div>

<div id="ak-comments-post">
         <div class="ak-node">
		     <div class="ak-node-main-top"></div>
			 <div class="ak-node-main-comments">
			 <h4>添加新评论 &raquo;</h4>
				<div class="ak-com-img">
				<img src="<?php $this->options->themeUrl('img/vis2.gif'); ?>">
				</div>
				<div class="ak-com-sub">
				<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
                <?php if($this->user->hasLogin()): ?>
				<p>Logged in as <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('登出'); ?> &raquo;</a></p>
                <?php else: ?>
				<input id="ak-author" type="text" name="author" id="author" class="text" size="15" value="<?php $this->remember('author'); ?>" /><br>
				<input id="ak-mail" type="text" name="mail" id="mail" class="text" size="15" value="<?php $this->remember('mail'); ?>" /><br>
				<input id="ak-url" type="text" name="url" id="url" class="text" size="15" value="<?php $this->remember('url'); ?>" />
                <?php endif; ?>
				<textarea rows="5" cols="50" name="text" id="ak-textarea"><?php $this->remember('text'); ?></textarea>
				<input name="submit" id="submit" type="image" src="<?php $this->options->themeUrl('img/btn-submit-2.gif'); ?>" value="Send" class="btn"  />
			　　</form>				
				</div>
				<div class="cleax"></div>
			 </div>
			 <div class="ak-node-main-bot"></div>
		</div>
</div>