<?php get_header();?>

        <!---top--->

        <div class="con">

        	<div class="banner">

            			<div id="switch">

       

 			 <ul id="show_pic" style="left:0;">

			 <?php 

	 $option = get_option('viiqi_options');
	 if($option["lunbo-add-img"]){
  $i=1;
  foreach($option["lunbo-add-img"] as $img){
  			if($img){
  $link=$option["lunbo-add-link"][$i];
	?>  

	 <li><a href="<?php if($link){ echo $link;}else{ echo get_bloginfo("url");}?>"><img src="<?php echo  $img;?>" width="980" height="358"/></a>

   			 	 <?php }//end if
 $i++;
		}//end foreach

		}//end if

    	  		?>

    	  		

 			 </ul>

  <ul id="icon_num">

    <?php 

  if($option["lunbo-add-img"]){
		foreach($option["lunbo-add-img"] as $img){
		if($img){
  				echo '<li></li>';
  			}

		}
}

    	  		?>



  </ul>

 </div>

<script type="text/javascript">

/*

 *glide.layerGlide((oEventCont,oSlider,sSingleSize,sec,fSpeed,point);

 *@param auto type:bolean 是否自动滑动 当值是true的时候 为自动滑动

 *@param oEventCont type:object 包含事件点击对象的容器

 *@param oSlider type:object 滑动对象

 *@param sSingleSize type:number 滑动对象里单个元素的尺寸（width或者height）  尺寸是有point 决定

 *@param second type:number 自动滑动的延迟时间  单位/秒

 *@param fSpeed type:float   速率 取值在0.05--1之间 当取值是1时  没有滑动效果

 *@param point type:string   left or top

 */

var glide =new function(){

	function $id(id){return document.getElementById(id);};

	this.layerGlide=function(auto,oEventCont,oSlider,sSingleSize,second,fSpeed,point){

		var oSubLi = $id(oEventCont).getElementsByTagName('li');

		var interval,timeout,oslideRange;

		var time=1; 

		var speed = fSpeed 

		var sum = oSubLi.length;

		var a=0;

		var delay=second * 2000; 

		var setValLeft=function(s){

			return function(){

				oslideRange = Math.abs(parseInt($id(oSlider).style[point]));	

				$id(oSlider).style[point] =-Math.floor(oslideRange+(parseInt(s*sSingleSize) - oslideRange)*speed) +'px';		

				if(oslideRange==[(sSingleSize * s)]){

					clearInterval(interval);

					a=s;

				}

			}

		};

		var setValRight=function(s){

			return function(){	 	

				oslideRange = Math.abs(parseInt($id(oSlider).style[point]));							

				$id(oSlider).style[point] =-Math.ceil(oslideRange+(parseInt(s*sSingleSize) - oslideRange)*speed) +'px';

				if(oslideRange==[(sSingleSize * s)]){

					clearInterval(interval);

					a=s;

				}

			}

		}

		

		function autoGlide(){

			for(var c=0;c<sum;c++){oSubLi[c].className='';};

			clearTimeout(interval);

			if(a==(parseInt(sum)-1)){

				for(var c=0;c<sum;c++){oSubLi[c].className='';};

				a=0;

				oSubLi[a].className="active";

				interval = setInterval(setValLeft(a),time);

				timeout = setTimeout(autoGlide,delay);

			}else{

				a++;

				oSubLi[a].className="active";

				interval = setInterval(setValRight(a),time);	

				timeout = setTimeout(autoGlide,delay);

			}

		}

	

		if(auto){timeout = setTimeout(autoGlide,delay);};

		for(var i=0;i<sum;i++){	

			oSubLi[i].onmouseover = (function(i){

				return function(){

					for(var c=0;c<sum;c++){oSubLi[c].className='';};

					clearTimeout(timeout);

					clearInterval(interval);

					oSubLi[i].className="active";

					if(Math.abs(parseInt($id(oSlider).style[point]))>[(sSingleSize * i)]){

						interval = setInterval(setValLeft(i),time);

						this.onmouseout=function(){if(auto){timeout = setTimeout(autoGlide,delay);};};

					}else if(Math.abs(parseInt($id(oSlider).style[point]))<[(sSingleSize * i)]){

							interval = setInterval(setValRight(i),time);

						this.onmouseout=function(){if(auto){timeout = setTimeout(autoGlide,delay);};};

					}

				}

			})(i)			

		}

	}

}

glide.layerGlide(true,'icon_num','show_pic',1024,2,0.05,'left');

</script>

<div class="banner_bg alpha"></div>

		  <div class="Solution">

            	<h3>Solution</h3>

                 <ul>

				  <?php

$sticky = get_option('sticky_posts');  
		$serve_args = array('posts_per_page'   => 8,'category'=>'','category_name'=> 'products','post__in' => $sticky);
		$serve_posts = get_posts($serve_args ); 
		if($serve_posts){
		foreach($serve_posts  as $post){



echo ' <li><a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'"><img src="'.get_post_img($post->ID).'" width="113" height="80" /><span>'.customTitle(40,$post->ID).'</span></a></li>';

}

}

			

			

			?>

				 

               

              </ul>

            </div>

            

            </div>



        </div>

        

       <!---bg--->

       <div class="bg">

       	<div class="news_index fr">

        	<h3>News</h3>

            <ul>

			 <?php 

			 $newargs = array('posts_per_page'=> 4,"category_name"=>"news","order"=>"DESC");

			$news= get_posts($newargs);

			 if($news){

			 foreach( $news as $new){

			 echo '<li><a href="'.get_permalink($new->ID).'">'.get_the_title($new->ID).'</a></li>';

			 }

			 }

			?>

            	

              

            </ul>

        </div>

       </div>

       

       <!---contact--->

<?php get_footer();?>