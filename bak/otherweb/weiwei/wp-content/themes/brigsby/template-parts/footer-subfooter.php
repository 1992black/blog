<?php
if ( ! is_active_sidebar( 'hoot-sub-footer' ) )
	return;
?>
<div id="sub-footer" class="grid-stretch inline_nav">
	<div class="grid">
		<div class="grid-span-12">
			<?php dynamic_sidebar( 'hoot-sub-footer' ); ?>
		</div>
	</div>
</div>