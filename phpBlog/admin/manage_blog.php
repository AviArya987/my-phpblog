<?php
require('top.inc.php');
$categories_id='';
$subcategories_id='';
$title='';
$mrp='';
$price='';
$qty='';
$image='';
$descript='';
$shortdesc='';
$trending='';
$poster='';
$meta_title='';
$meta_desc ='';
$meta_keyword='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from blog where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['cat_id'];
		$subcategories_id=$row['subcat_id'];
		$title=$row['title'];
		$shortdesc=$row['short_desc'];
		$descript=$row['description'];
		$trending=$row['trending'];
		$poster=$row['poster'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
	}else{
		header('location:index.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$subcategories_id=get_safe_value($con,$_POST['subcategories_id']);
	$title=get_safe_value($con,$_POST['title']);
	$shortdesc=get_safe_value($con,$_POST['shortdesc']);
	$descript=get_safe_value($con,$_POST['descript']);
	$trending=get_safe_value($con,$_POST['trending']);
	$poster=get_safe_value($con,$_POST['poster']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
	
	$res=mysqli_query($con,"select * from blog where title='$title'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Blog already exist";
			}
		}else{
			$msg="Blog already exist";
		}
	}
	
	
	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'../media/blog/'.$image);
				$update_sql="update blog set cat_id='$categories_id',subcat_id='$subcategories_id',title='$title',short_desc='$shortdesc',description='$descript',poster='$poster',trending='$trending',img='$image',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where blog.id='$id'";
			}else{
				$update_sql="update blog set cat_id='$categories_id',subcat_id='$subcategories_id',title='$title',short_desc='$shortdesc',description='$descript',poster='$poster',trending='$trending',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where blog.id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'../media/blog/'.$image);
			mysqli_query($con,"insert into blog(cat_id,subcat_id,title,img,short_desc,description,trending,poster,status,meta_title,meta_desc,meta_keyword) values('$categories_id','$subcategories_id','$title','$image','$shortdesc','$descript','$trending','$poster',1,'$meta_title','$meta_desc','$meta_keyword')");
		}
		header('location:blog.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Blog</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="categories_id">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,category from categories order by category asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['category']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['category']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Subcategories</label>
									<select class="form-control" name="subcategories_id">
										<option>Select Subcategory</option>
										<?php
										$res=mysqli_query($con,"select id,subcategory from subcategories order by subcategory asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$subcategories_id){
												echo "<option selected value=".$row['id'].">".$row['subcategory']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['subcategory']."</option>";
											}
											
										}
										?>
									</select>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Blog Title</label>
									<input type="text" name="title" placeholder="Enter blog title" class="form-control" required value="<?php echo $title?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>
							
								<div class="form-group">
									<label for="categories" class=" form-control-label"> Short Desc</label>
									<textarea name="shortdesc" placeholder="Enter product description" class="form-control" required><?php echo $shortdesc?></textarea>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="descript" placeholder="Enter product description" class="form-control" required><?php echo $descript?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Trending</label>
									<input type="number" name="trending" placeholder="" class="form-control" required value="<?php echo $trending?>">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Poster</label>
									<input type="number" name="poster" placeholder="" class="form-control" required value="<?php echo $poster?>">
								</div>
															
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>