<?php

  include('./partials/top.php');

  $cat = $_GET['cat'];
  if($cat=='trending'){
    $getblog = getblogs($con,'','','','','',1);
  }
  else{
    $getblog = getblogs($con,'','',$cat,'','','');
  }

?>
    
    <div class="container">
      
      <div class="category-title">
        <p class="fs-3 mt-3" style="text-transform:capitalize">Latest in <?php echo $cat ?></p>
      </div>
      <div class="stories">
        <?php 
        foreach($getblog as $list){ 
        ?>
        <a href="blog.php?id=<?php echo $list['id']?>" style="text-decoration:none;color:black">
          <article class="single-cat-blog d-flex w-90 mx-auto p-2 my-3 shadow">
            <div class="single-cat-blog-img-container">
              <img src="<?php echo './media/blog/'.$list['img']?>" alt="blog-pic">
            </div>
            <div class="single-cat-blog-content">
              <h5 class="mb-1"><?php echo $list['title']?></h5>
              <p class="fs-5"><?php echo $list['short_desc']?></p>
            </div>
          </article>
        </a>
        <?php } ?>
      </div>






    </div>







    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>