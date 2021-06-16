<?php 

function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function getblogs($con,$limit='',$blogid='',$cat='',$subcat='',$poster='',$trending=''){
	$sql = "select blog.*,categories.category,subcategories.subcategory from blog,categories,subcategories where blog.status=1";

	if($blogid!=''){
		$sql.=" and blog.id=$blogid";
	}
	if($cat!=''){
		$sql.=" and blog.cat_id = categories.id and categories.category='$cat'";
	}
	if($subcat!=''){
		$sql.=" and blog.subcat_id = subcategories.id and subcategories.subcategory='$subcat'";
	}
	if($poster==1){
		$sql.=" and blog.poster=1";
	}
	if($trending==1){
		$sql.=" and blog.trending=1";
	}
	$sql.=" group by blog.id order by blog.id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}

	$res = mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

?>