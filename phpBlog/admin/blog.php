<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update blog set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from blog where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select blog.*,categories.category,subcategories.subcategory from blog,categories,subcategories where blog.cat_id=categories.id and blog.subcat_id=subcategories.id order by blog.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Blogs </h4>
				   <h4 class="box-link"><a href="manage_blog.php">Add Blog</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Subcategories</th>
							   <th>Title</th>
							   <th>Image</th>
							   <th>Poster</th>
							   <th>Short Description</th>
							   <th>Description</th>
							   <th>Trending</th>
							   <th>Blog Link</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['category']?></td>
							   <td><?php echo $row['subcategory']?></td>
							   <td><?php echo $row['title']?></td>
							   <td><img src="<?php echo '../media/blog/'.$row['img']?>"/></td>
							   <td><?php echo $row['poster']?></td>
							   <td><?php echo $row['short_desc']?></td>
							   <td><?php echo substr($row['description'],0,50)?></td>
							   <td><?php echo $row['trending']?></td>
							   <td>
								<?php

								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'><i class='fas fa-eye'></i></a></span>";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'><i class='fas fa-eye-slash'></i></a></span>";
								}

								echo "<span class='badge badge-edit' style='margin-top:5px;margin-bottom:5px'><a href='manage_blog.php?id=".$row['id']."'><i class='fas fa-pencil-alt'></i></a></span>";

								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'><i class='fas fa-trash'></i></a></span>";

								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>