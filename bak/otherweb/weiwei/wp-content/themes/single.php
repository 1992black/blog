<?php
$news_id_array=get_all_child_cat_id_by_slug("news");
$products_id_array=get_all_child_cat_id_by_slug("products");
$cases_id_array=get_all_child_cat_id_by_slug("cases");
$service_id_array=get_all_child_cat_id_by_slug("service");
$select_id_array=get_all_child_cat_id_by_slug("select");
$production_id_array=get_all_child_cat_id_by_slug("production");


if ( in_category($news_id_array) ) {
get_template_part("single-news");
}elseif ( in_category($products_id_array) ){
get_template_part("single-products");
}elseif( in_category($cases_id_array) ){
get_template_part("single-cases");
}elseif( in_category($service_id_array) ){
get_template_part("single-service");
}elseif( in_category($select_id_array) ){
get_template_part("single-select");
}elseif( in_category($production_id_array) ){
get_template_part("single-production");
}else{
get_template_part("single-other");
}
?>