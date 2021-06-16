<?php

include('./partials/top.php');
$id = $_GET['id'];

if(isset($_GET['id']) && $_GET['id']!=''){
	$getblog = getblogs($con,1,$id,'','','','');
}
?>

<article class="blog">
	<div class="blog-container" style="width:90%; margin:0 auto;max-width:800px">
		<div class="img-container">
			<img src="<?php echo './media/blog/'.$getblog[0]['img']?>" alt="blog-pic" style="width:100%; height:200px">
		</div>
		<div class="blog-content mt-4">
			<div class="blog-title">
				<h4 class="fs-3"><?php echo $getblog[0]['title']?></h4>
			</div>
			<div class="blog-description">
				<p class="fs-5"><?php  echo $getblog[0]['description']?></p>
			</div>
		</div>
	</div>
</article>