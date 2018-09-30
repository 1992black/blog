<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require_once("../../../wp-config.php");

$info[name]=addslashes($_POST["name"]);
$info[company]=addslashes($_POST["company"]);
$info[tel]=$_POST["tel"];
$info[fax]=$_POST["fax"];
$info[user_mail]=$_POST["mail"];
$info[user_address]=addslashes($_POST["address"]);
$info[code]=addslashes($_POST["code"]);
$info[message]=addslashes($_POST["message"]);//过滤一些代码

//print_r($info);
$ip=$_SERVER["REMOTE_ADDR"];
$time = current_time('mysql');
$userID = $wpdb->get_results("SELECT ID FROM $wpdb->users ORDER BY ID DESC LIMIT 1");
//print_r($userID);
$data = array(
    'comment_post_ID' =>$info[post_ID],
    'comment_author' => $info[name],
    'comment_author_email' => $info[user_mail],
    'comment_author_url' => '',
    'comment_content' => $info[message],
    'comment_type' => '',
    'comment_parent' => 0,
    'user_id' => $userID[0]->ID+1,
    'comment_author_IP' => $ip,
    'comment_agent' => '',
    'comment_date' => $time,
    'comment_approved' => 1,
);

$comment_id=wp_insert_comment($data);
if($comment_id){
update_comment_meta($comment_id,'company',$info[company]);
update_comment_meta($comment_id,'telphone',$info[tel]);
update_comment_meta($comment_id,'address',$info[user_address]);
if($info[title]){
update_comment_meta($comment_id,'title',$info[title]);
}
echo "咨询信息已经提交成功，页面三秒后自动关闭，如果没有自动关闭，手动关闭本页面即可";
}else{
echo "提交失败!!,请稍后再试，或者直接邮件联系我们";
}
?>
<script language="javascript"> 
<!-- 
function clock(){ 
document.title="this page closed after "+i+"seconds"; 
if(i==0){ 
clearTimeout(st); 
window.opener=null; 
window.close();} 
i = i -1; 
st = setTimeout("clock()",1000); 

} 
var i=3 
clock(); 
//--> 
</script> 