$(document).ready(function(){
var n=1;
var num=$("#casebar li").length;  
$("#casebar li:first").fadeIn("slow");
window.setInterval(showalert, 2000);
			  
function showalert(){
if(n< num){//num=3
$("#casebar li").eq(n-1).hide();
$("#casebar li").eq(n).fadeIn("slow");
n++;

}else{
n=0;



}

}


			  });