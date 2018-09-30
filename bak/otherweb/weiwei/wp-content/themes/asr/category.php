<?php
$news_id_array=get_all_child_cat_id_by_slug("news");
$products_id_array=get_all_child_cat_id_by_slug("products");
$cases_id_array=get_all_child_cat_id_by_slug("cases");
$service_id_array=get_all_child_cat_id_by_slug("service");
$select_id_array=get_all_child_cat_id_by_slug("select");
$production_id_array=get_all_child_cat_id_by_slug("production");


if ( in_array($cat,$news_id_array) ) {
get_template_part("category-news");
}elseif ( in_array($cat,$products_id_array) ){
get_template_part("category-products");
}elseif( in_array($cat,$cases_id_array) ){
get_template_part("category-cases");
}elseif( in_array($cat,$service_id_array) ){
get_template_part("category-service");
}elseif( in_array($cat,$select_id_array) ){
get_template_part("category-select");
}elseif( in_array($cat,$production_id_array) ){
get_template_part("category-production");
}else{

get_template_part("category-other");
}

?>