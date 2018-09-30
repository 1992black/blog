<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php if ( is_home() ) {   
            bloginfo('name');   
        } elseif ( is_category() ) {   
            single_cat_title(); echo " - "; bloginfo('name');   
        } elseif (is_single()) {   
            single_post_title();
			$cat_first=get_the_category($post->ID);
			echo "-".$cat_first[0]->name;
        } elseif(is_page()){
		 single_post_title();
		 echo " - "; bloginfo('name'); 
		}elseif (is_search() ) {   
            echo "Search-".get_search_query(); 
			echo " - "; bloginfo('name');   
        } elseif (is_404() ) {   
            echo '页面未找到';   
        } else {   
            wp_title('',true);   
        } ?></title>

<?php
$option =get_option('viiqi_options');
if (is_home()) {

$keywords = $option["home_keyword"];
$description =$option["home_description"];
} else if (is_single()) {
$subject = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,”……”);
$pattern = '/\n/';//去除换行
$description=preg_replace($pattern, '', $subject);
$keywords = get_the_title().",".$cat_first[0]->name;
} else if (is_category()) {
$description = category_description();
$keywords=get_cat_name($cat);
} 
?>
<meta name="keywords"  content="<?php echo $keywords?>"/>
<meta name="description"  content="<?php echo $description?>"/>

<meta name="author" content="viiqi" />

<link href="<?php echo get_bloginfo("template_url")?>/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo get_bloginfo("template_url")?>/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo get_bloginfo("template_url")?>/js/myjs.js"></script>

<script type="text/javascript">
	$(function(){
		showScroll();
		function showScroll(){
			$(window).scroll( function() { 
				var scrollValue=$(window).scrollTop();
				scrollValue > 100 ? $('div[class=scroll]').fadeIn():$('div[class=scroll]').fadeOut();
			} );	
			$('#scroll').click(function(){
				$("html,body").animate({scrollTop:0},200);	
			});	
		}
	})
	</script>



</head>



<body>

 	 <!---top--->

   		<div class="header">

        	<div class="logo fl">

       	   		 <a href="<?php echo get_bloginfo("url")?>"><img src="<?php if($option["logo"]){echo $option["logo"];}else{echo get_bloginfo("template_url")."/images/logo.jpg";}?>" width="163" height="87" /></a>

            </div>

            <div class="menu fr">

            	<div class="up_menu fr clear">

                	<?php wp_nav_menu( array('theme_location' =>'head_nav1','container'=>'false',"menu_class"=>"","menu_id"=>"")); ?>

                </div>

                <div class="down_menu clear">

                	<?php wp_nav_menu( array('theme_location' =>'head_nav2','container'=>'false',"menu_class"=>"","menu_id"=>"")); ?>

                </div>

            </div>

        

        </div>	