<?php
//初始化一些数据,创建分类和页面
add_action('load-themes.php', 'initialize_data');


function initialize_data(){

$array_cat=array("products"=>"产品中心","news"=>"新闻中心","service"=>"服务","select"=>"我们的优势","production"=>"工艺流程","cases"=>"成功案例");

Creat_Cat($array_cat,"category");

$pages=array("About"=>"关于我们","contact us"=>"联系我们","feedback"=>"在线咨询","down"=>"资料下载");
check_creat_page($pages);

//初始化话文章显示数量
update_option('posts_per_page','9');
}//function end


//创建页面
function check_creat_page($pages){
	foreach($pages as $slug_key=>$page_title){
			$this_page=get_page_by_title($page_title);
		if(!$this_page){
			$post = array('post_name'=>$slug_key,'post_title'=>$page_title,'post_type'=>'page','post_status'   => 'publish');
				wp_insert_post($post);

		}// end if
	}//end foreach

}//end function


//初始化分类,创建默认分类
function Creat_Cat($cat_name_array){
foreach($cat_name_array as $slug_key=>$name){

	if(!get_category_by_slug($slug_key)){
		$newid=wp_create_category($slug_key);
		$catarr = array('cat_ID' => $newid,'cat_name' =>$name,'category_description' =>" ",'category_nicename' =>$slug_key,'category_parent'=>"");
		wp_insert_category($catarr);
		}//if end
	}//foreach en

} //function end

//初始化分类,创建自定义分类
/*
function Creat_tax_Cat($cat_name_array,$type){
foreach($cat_name_array as $slug_key=>$name){
if(!get_term_by("slug",$slug_key,$type)){
		$idt_t=wp_insert_term($name,$type,array('slug' =>$slug_key,'description'=>""));
		print_r($idt_t);
	}// if end
	}//foreach en

} //function end

*/

//后台管理界面初始化

function remove_dashboard_widgets() {
    global $wp_meta_boxes;

   global$wp_meta_boxes; 
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_browser_nag']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

//删除不用的菜单
//删除不用的菜单
function remove_menus() {

    //remove_menu_page("plugins.php");
	remove_menu_page("index.php");
	//remove_menu_page("users.php");
	remove_menu_page("tools.php");
   	remove_submenu_page("themes.php", "widgets.php");//去掉小工具
    //remove_submenu_page("themes.php", "themes.php");//去掉主题选择
}
if ( is_admin() ) {
    add_action('admin_menu', 'remove_menus');
}


//后台首次登入首页显示选项

if ( ! function_exists( 'add_dashboard_widgets' ) ) :
function welcome_dashboard_widget_function() {
echo '先添加产品和新闻所有的分类，然后添加新产品或者新闻，勾选相应的分类即可</br>';
echo '<ul><li><a href="edit-tags.php?taxonomy=category">1.添加产品和新闻分类</a></li><li><a href="post-new.php">2.添加新产品和新闻</a></li><li><a href="edit.php">3.修改产品或者新闻</a></li><li>wordpress模板交流群(110502405):<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=57e63dbc8bed62e8bf7c86fa3b514e92301a5a865f2b702a5f7546d8fd04a6de"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="wordpress模板开发" title="wordpress模板开发"></a></li></ul>';
}
function add_dashboard_widgets() {
wp_add_dashboard_widget('welcome_dashboard_widget', '使用教程', 'welcome_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );
endif;


//修改登录页面LOGO
function custom_login_logo() {
  echo '<style type="text/css">
    h1 a { background-image:url('.get_bloginfo('template_directory').'/images/feijiutian.png) !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');


//自定义登录界面LOGO链接为任意链接
function custom_loginlogo_url($url) {
	return 'http://www.feijiutian.com'; //修改URL地址
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

//自定义登录页面LOGO提示为任意文本
function custom_loginlogo_desc($url) {
    return '飞九天网站商城'; //修改文本信息
}
add_filter( 'login_headertitle', 'custom_loginlogo_desc' );

//去除后台wordpress相关
function annointed_admin_bar_remove() {
        global $wp_admin_bar;
        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);//隐藏版本更新
//add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

//将原来的文章改为新闻和产品
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = '分类/文章';
	$menu[25][0] = '询盘';
    $submenu['edit.php'][5][0] = '编辑页面';
    $submenu['edit.php'][10][0] = '新增页面';
    $submenu['edit.php'][15][0] = '添加分类'; // Change name for categories
    //$submenu['edit.php'][16][0] = 'tag'; // Change name for tags
    echo '';
}
 
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = '页面';
        $labels->singular_name = '页面';
        $labels->add_new = '新增页面';
        $labels->add_new_item = '新增页面';
        $labels->edit_item = '编辑页面';
        $labels->new_item = '新页面';
        $labels->view_item = '预览';
        $labels->search_items = '搜索相关页面';
        $labels->not_found = 'No Contacts found';
        $labels->not_found_in_trash = 'No Contacts found in Trash';
    }
    add_action( 'init', 'change_post_object_label' );
    add_action( 'admin_menu', 'change_post_menu_label' );


//表单提交显示（评论显示）
add_filter( 'manage_edit-comments_columns', 'my_comments_columns' );
add_action( 'manage_comments_custom_column', 'output_my_comments_columns', 10, 2 );
function my_comments_columns( $columns ){
    $columns[ 'company' ] = __( 'company' );
	$columns[ 'telphone' ] = __( 'telphone' );
	$columns[ 'title' ] = __( 'title' );
	//$columns[ 'address' ] = __( 'address' );
	//$columns[ 'zipcode' ] = __( 'zipcode' );
    return $columns;
}
function  output_my_comments_columns( $column_name, $comment_id ){
    switch( $column_name ) {
        case "company" :
            echo get_comment_meta( $comment_id, 'company', true );
            break;
		case "telphone" :
            echo get_comment_meta( $comment_id, 'telphone', true );
            break;
		case "address" :
            echo get_comment_meta( $comment_id, 'address', true );
            break;
		case "title" :
            echo get_comment_meta( $comment_id, 'title', true );
            break;
    }
}



//去除头部没有文件
remove_action( 'wp_head', 'wp_generator' );//WordPress版本信息。
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );//最后文章的url
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );//最前文章的url
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//上下文章的url
remove_action( 'wp_head', 'feed_links_extra', 3 );//去除评论feed
remove_action( 'wp_head', 'feed_links', 2 );//去除文章的feed
remove_action( 'wp_head', 'rsd_link' );//针对Blog的离线编辑器开放接口所使用
remove_action( 'wp_head', 'wlwmanifest_link' );//如上
remove_action( 'wp_head', 'index_rel_link' );//当前页面的url
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );//短地址
remove_action( 'wp_head', 'rel_canonical');//版权
//去除谷歌字体
class Disable_Google_Fonts {
public function __construct() {
add_filter( 'gettext_with_context', array( $this, 'disable_open_sans' ), 888, 4 );
}
public function disable_open_sans( $translations, $text, $context, $domain ) {
if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
$translations = 'off';
}
return $translations;
}
}
$disable_google_fonts = new Disable_Google_Fonts;


?>
