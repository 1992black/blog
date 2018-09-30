<?php   
 
//类ClassicOptions   
class ClassicOptions {      
  
    function getOptions() {    
        // 在数据库中获取选项组      
        $options = get_option('viiqi_options');      
        // 如果数据库中不存在该选项组, 设定这些选项的默认值, 并将它们插入数据库      
        if (!is_array($options)) {      
            //初始默认数据 
			$options['logo'] = ''; 
			$options['home_description'] = '';
			$options['home_keyword'] = '';
			$options['phone'] = '';
			$options['mobile'] = '';
			$options['email'] = '';
		
			$options["lunbo-add-img"]['1'] = '';
			$options["lunbo-add-img"]['2'] = '';
			$options["lunbo-add-img"]['3'] = '';
			$options["lunbo-add-img"]['4'] = '';
			$options['lunbo-add-link']['1']= '';
			$options['lunbo-add-link']['2'] = '';
			$options['lunbo-add-link']['3'] = '';
			$options['lunbo-add-link']['4']= '';
			

               
            //这里可添加更多设置选项   
               
            update_option('viiqi_options', $options);      
        }   
        // 返回选项组   
        return $options;   
    }   
    /* -- init函数 初始化 -- */     
    function init() {      
  
        if(isset($_POST['save_option'])) {      
      
            $options = ClassicOptions::getOptions();      
            // 数据处理         
            $options['logo'] =stripslashes($_POST['logo']);
			$options['home_keyword'] =stripslashes($_POST['home_keyword']);
			$options['phone'] =stripslashes($_POST['phone']);
			$options['mobile'] =stripslashes($_POST['mobile']);
			$options['email'] =stripslashes($_POST['email']);
		
			$options['home_description'] =stripslashes($_POST['home_description']);
			$options["lunbo-add-img"]['1'] =stripslashes($_POST['lunbo-add1']);
			$options["lunbo-add-img"]['2'] =stripslashes($_POST['lunbo-add2']);
			$options["lunbo-add-img"]['3'] =stripslashes($_POST['lunbo-add3']);
			$options["lunbo-add-img"]['4'] =stripslashes($_POST['lunbo-add4']);
			$options['lunbo-add-link']['1'] =stripslashes($_POST['lunbo-add-link1']);
			$options['lunbo-add-link']['2'] =stripslashes($_POST['lunbo-add-link2']);
			$options['lunbo-add-link']['3'] =stripslashes($_POST['lunbo-add-link3']);
			$options['lunbo-add-link']['4'] =stripslashes($_POST['lunbo-add-link4']);
			



			
            //在这追加其他选项的限制处理      
               
       
            update_option('viiqi_options', $options);      
           
        } else {   
              
            ClassicOptions::getOptions();      
        }   
           
 
        add_menu_page("网站设置", "网站设置", 'edit_themes', "option_set", array('ClassicOptions', 'Class_display')); //添加后台菜单     
		 add_submenu_page( "option_set", '网站设置教程', '网站帮助', 'edit_themes', 'help-submenu-page', array('ClassicOptions', 'help_page_display')); 
    }      
    /* -- 标签页 -- */   
     function help_page_display()
	 { ?>
	 <div class="exlist">
	   <h2>网站使用帮助</h2>
	   <?php include(get_template_directory().'/help.php');?>
	   </div>
	 <?php }
    function Class_display() { 
	//加载upload.js文件
        wp_enqueue_script('my-upload', get_bloginfo( 'stylesheet_directory' ) . '/option/upload.js'); 
		wp_enqueue_style( 'viiqiadmin',  get_bloginfo( 'stylesheet_directory' ) . '/option/option.css' ); 
        //加载上传图片的js(wp自带)   
        wp_enqueue_script('thickbox');
        //加载css(wp自带)   
        wp_enqueue_style('thickbox');
	$options = ClassicOptions::getOptions();?>
	 <form method="post" enctype="multipart/form-data" name="classic_form" id="classic_form">   

      <div id="icon-options-general" class="icon32"><br>
      </div>
    <!--diy-->
        <div id="option_wrap" class="box">
  <div  class="left manu_wraper">
    <div id="logo" style="margin:60px 0px 20px;"> <img src="<?php if($options["logo"]){echo $options["logo"];}else{echo get_bloginfo("template_url")."/images/logo.jpg";}?>" width="163" height="87"/></div>
    <ul>
      <li id="option-list" class="base">基础设置</li>
      <li id="option-list" class="add">广告设置</li>
      
    </ul>
  </div>
  <div  class="left content_wraper">
    <div class="content_wraper-top box"> <img src="<?php echo get_bloginfo("template_url")?>/images/feijiutian.png" width="150" class="left"/>
      <div class="left viiqi">
        <p class="comp-name"><a href="http://www.feijiutian.com">飞九天网站</a></p>
        <p class="shuoming">本系统飞九天仅提供技术支持(网站内容由客户自行决定)，版权归企业所有(付费客户)，但是不得二次转售，否则有权取消系统免费更新和升级资格</p>
        <p class="shuoming">当前版本v1.0（模板使用交流群(110502405)<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=57e63dbc8bed62e8bf7c86fa3b514e92301a5a865f2b702a5f7546d8fd04a6de"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="wordpress模板开发" title="wordpress模板开发"></a>）</p>
      </div>
    </div>
	<ul id="option-content-box">
	<!--第一块-->
	<li id="option-content" class="content-base">

	<p class="option-content-big-title">基础设置</p>
	<p class="option-title">logo 设置</p>
	<p><input name="logo" id="logo" value="<?php echo $options['logo'];?>" type="text" size="50"> <input type="button" name="upload_button" value="上传" class="upbottom button button-primary"/></p>
	<p class="option-title">首页KeyWord 设置</p>
<p><input name="home_keyword" id="keyword" value="<?php echo $options['home_keyword'];?>" type="text" size="70"> </p>
<p class="option-title">首页Description 设置</p>
<p><textarea name="home_description" rows="5" cols="50" id="blacklist_keys" class="large-text code" innerHTML=""><?php echo $options['home_description'];?></textarea></p>
<p class="option-title">公司电话/400电话(如 0755-88888888,没有可以为空,下面选项类似)</p>
<p><input name="phone" id="phone" value="<?php echo $options['phone'];?>" type="text" size="70"> </p>
<p class="option-title">手机</p>
<p><input name="mobile" id="mobile" value="<?php echo $options['mobile'];?>" type="text" size="70"> </p>
<p class="option-title">E-mail</p>
<p><input name="email" id="qq" value="<?php echo $options['email'];?>" type="text" size="70"> </p>


	
	
	</li>
	<!--基础设置 end-->
	<li id="option-content" class="content-add">
	<p class="option-content-big-title">广告设置</p>
	<p class="option-title">首页轮播广告图片</p>
    <p><label>广告链接1</label><input name="lunbo-add-link1" id="lunbo-add-link1" value="<?php echo $options['lunbo-add-link']['1'];?>" type="text" size="50"></p>
	<p><label>广告图片1</label><input name="lunbo-add1" id="lunbo-add1" value="<?php echo $options["lunbo-add-img"]['1'];?>" type="text" size="50"> <input type="button" name="upload_button" value="上传" class="upbottom button button-primary"/></p>
     <p><label>广告链接2</label><input name="lunbo-add-link2" id="lunbo-add-link2" value="<?php echo $options['lunbo-add-link']['2'];?>" type="text" size="50"></p>
	<p><label>广告图片2</label><input name="lunbo-add2" id="lunbo-add2" value="<?php echo $options["lunbo-add-img"]['2'];?>" type="text" size="50"> <input type="button" name="upload_button" value="上传" class="upbottom button button-primary"/></p>
     <p><label>广告链接3</label><input name="lunbo-add-link3" id="lunbo-add-link3" value="<?php echo $options['lunbo-add-link']['3'];?>" type="text" size="50"></p>
    <p><label>广告图片3</label><input name="lunbo-add3" id="lunbo-add3" value="<?php echo $options["lunbo-add-img"]['3'];?>" type="text" size="50"> <input type="button" name="upload_button" value="上传" class="upbottom button button-primary"/></p>
     <p><label>广告链接4</label><input name="lunbo-add-link4" id="lunbo-add-link4" value="<?php echo $options['lunbo-add-link']['4'];?>" type="text" size="50"></p>
    <p><label>广告图片4</label><input name="lunbo-add4" id="lunbo-add2" value="<?php echo $options["lunbo-add-img"]['4'];?>" type="text" size="50"> <input type="button" name="upload_button" value="上传" class="upbottom button button-primary"/></p>
	</li>
	<!--广告设置 end-->
	
	<!--基础设置 end-->
	

	 <p class="submit">
          <input type="submit" name="save_option" id="submit" class="button button-primary" value="保存更改">
        </p>
	</ul>
	
  </div>
</div>
        <!--diy end-->
	   
      </form>

    <div class="clear"></div>

  <!-- wpbody-content -->
  <div class="clear"></div>

  
 <!--html 结束-->   
         
<?php      
    }      
}    
    
/*初始化，执行ClassicOptions类的init函数*/     
add_action('admin_menu', array('ClassicOptions', 'init'));    




?>