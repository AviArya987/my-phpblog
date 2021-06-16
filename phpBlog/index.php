<?php
  
  include('./partials/top.php');

?>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/1.jpg" class="d-block w-100" alt="..." style="height:300px">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./img/3.jpg" class="d-block w-100" alt="..." style="height:300px">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./img/7.jpg" class="d-block w-100" alt="..." style="height:300px">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <section class="types">
      <div class="section-center py-3 px-3">
        <div class="type-heading">
          <p class="fs-4">Categories</p>
        </div>
        <div class="types-main d-flex flex-wrap align-content-around justify-content-start">
          <article class="type p-1 d-flex justify-content-center rounded-pill shadow-sm">
            <a href="single-category.php?cat=trending" style="color:black;text-decoration:none">
              <i class="fab fa-angellist me-1"></i>
              <span>Trending</span>
            </a>
          </article>
          <article class="type p-1 d-flex justify-content-center rounded-pill shadow-sm">
            <a href="single-category.php?cat=Health" style="color:black;text-decoration:none">
              <i class="fas fa-virus"></i>
              <span>Corona</span>
            </a>
          </article>
          <article class="type p-1 d-flex justify-content-center rounded-pill shadow-sm">
            <a href="single-category.php?cat=education" style="color:black;text-decoration:none">
              <i class="fas fa-graduation-cap me-1"></i>
              <span>Education</span>
            </a>
          </article>
          <article class="type p-1 d-flex justify-content-center rounded-pill shadow-sm">
            <a href="single-category.php?cat=sports" style="color:black;text-decoration:none">
              <i class="fas fa-bowling-ball me-1"></i>
              <span>Cricket</span>
            </a>
          </article>
          <article class="type p-1 d-flex justify-content-center rounded-pill shadow-sm">
            <a href="single-category.php?cat=entertainment" style="color:black;text-decoration:none">
              <i class="fas fa-film me-1"></i>
              <span>Movies</span>
            </a>
          </article>
          <article class="type p-1 d-flex justify-content-center rounded-pill shadow-sm">
            <a href="single-category.php?cat=economy_finance" style="color:black;text-decoration:none">
              <i class="fas fa-hand-holding-usd me-1"></i>
              <span>Economy</span>
            </a>
          </article>
        </div>
      </div>
    </section>

    <section class="categories py-3">
      <div class="section-center categories-center">
        <div class="categories-title mb-4">
          <h5 class="fs-3">Latest News</h5>
        </div>
        <div class="categories-main">
          <?php 
            $getblogs = getblogs($con,3,'','','',1,1);
            $i=1;
            foreach($getblogs as $list){
          ?>
          
          <article class="category item-<?php echo $i?>">
            <a href="blog.php?id=<?php echo $list['id']?>">
            <div class="img-container">
              <img src="<?php echo './media/blog/'.$list['img']?>" alt="" class="img-container">
            </div>
            <div class="title-container">
              <p><?php echo $list['title'] ?></p>
              <span>Get Latest Updates</span>
            </div>
             </a>
          </article>
         
        <?php  $i++; } ?>
          <!-- <article class="category item-3">
            <div class="img-container">
              <img src="./img/blog3.jpg" alt="" class="img-container">
            </div>
            <div class="title-container">
              <p>Technology</p>
              <span>Get Latest Updates</span>
            </div>
          </article>
          <article class="category item-2">
            <div class="img-container">
              <img src="./img/blog4.jpg" alt="" class="img-container">
            </div>
            <div class="title-container">
              <p>Technology</p>
              <span>Get Latest Updates</span>
            </div>
          </article> -->
        </div>

        <div class="blogs mt-3">
          <div class="cards">
           <?php 
              $blogs = getblogs($con,4,'','','','',1);
              foreach($blogs as $list){
           ?>
            <a href="blog.php?id=<?php echo $list['id']?>" style="text-decoration:none;color:black">
              <article class="blog pb-1" >
                <div class="blog-img">
                  <img src="<?php echo './media/blog/'.$list['img']?>" alt="" class="img-blog">
                </div>
                <div class="blog-content">
                  <p><?php echo $list['title']?></p>
                </div>
              </article>
            </a>
           <?php } ?>
          </div>
          <div class="blog-button-center mt-2">
            <a href="single-category.php?cat=trending"><button class="all-news" id="view-all">Explore More</button></a>
          </div>
        </div>
      </div>
    </section>

    <article class="corona-meter">
      <div class="img-corona">
        <img src="./img/corona.jpg" alt="">
      </div>
      <div class="corona-info">
        <div class="single-co-info">
          <p>Confirmed</p>
          <span>18cr</span>
        </div>
        <div class="single-co-info">
          <p>Deaths</p>
          <span>18Lacs</span>
        </div>
      </div>
    </article>

    <section class="news-videos py-5">
      <div class="videos-center">
        <div class="videos-heading ps-3 mb-1">
          <p class="fs-3">Explore More</p>
          <span class="fs-4">See Latest Videos</span>
        </div>
        <div class="videos-main">
          <article class="single-video">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latest</p>
            </div>
          </article>
          <article class="single-video">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latest</p>
            </div>
          </article>
          <article class="single-video">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latest</p>
            </div>
          </article>
          <article class="single-video">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latest</p>
            </div>
          </article>
          <article class="single-video">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latest</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="categories py-3">
      <div class="section-center categories-center">
        <div class="categories-title mb-4">
          <h5 class="fs-3">From CBSE</h5>
        </div>
        <div class="category-main">
         <?php
          $blogs = getblogs($con,1,'','education','CBSE',1,1);
         ?>
         <a href="blog.php?id=<?php echo $blogs[0]['id']?>" style="text-decoration:none;color:black">
          <article class="category item-1">
            <div class="img-container">
              <img src="<?php echo './media/blog/'.$blogs[0]['img']?>" alt="" class="img-container">
            </div>
            <div class="title-container">
              <p><?php echo $blogs[0]['title']?></p>
              <span><?php echo $blogs[0]['description']?></span>
            </div>
          </article>
         </a>
        </div>

        <div class="blogs mt-3">
         <div class="cards">
          <?php 
              $blogs = getblogs($con,4,'','education','','',1);
              foreach($blogs as $list){
          ?>
          <a href="blog.php?id=<?php echo $list['id']?>" style="text-decoration:none;color:black">
            <article class="blog pb-1" >
              <div class="blog-img">
                <img src="<?php echo './media/blog/'.$list['img']?>" alt="" class="img-blog">
              </div>
              <div class="blog-content">
                <p><?php echo $list['title']?></p>
              </div>
            </article>
          </a>
          <?php } ?>
          </div>
          <div class="blog-button-center mt-2">
            <a href="single-category.php?cat=education"><button class="all-news" id="view-all">Explore More</button></a>
          </div>
        </div>
      </div>
    </section>

    <section class="categories py-3">
      <div class="section-center categories-center">
        <div class="categories-title mb-4">
          <h5 class="fs-3">Sports </h5>
        </div>
        <div class="category-main">
          <?php
            $blogs = getblogs($con,1,'','sports','cricket',1,1);
          ?>
          <a href="blog.php?id=<?php echo $blogs[0]['id']?>">
          <article class="category item-1">
            <div class="img-container">
              <img src="<?php echo './media/blog/'.$blogs[0]['img']?>" alt="" class="img-container">
            </div>
            <div class="title-container">
              <p><?php echo $blogs[0]['title'] ?></p>
              <span><?php echo $blogs[0]['description'] ?></span>
            </div>
          </article>
          </a>
        </div>

        <div class="blogs mt-3">
          <div class="cards">
          <?php 
              $blogs = getblogs($con,4,'','sports','','',1);
              foreach($blogs as $list){
          ?>
          <a href="blog.php?id=<?php echo $list['id']?> " style="text-decoration:none;color:black">
            <article class="blog pb-1">
              <div class="blog-img">
                <img src="<?php echo './media/blog/'.$list['img']?>" alt="" class="img-blog">
              </div>
              <div class="blog-content">
                <p><?php echo $list['title']?></p>
              </div>
            </article>
          </a>
          <?php } ?>
          </div>
          <div class="blog-button-center mt-2">
            <a href="single-category.php?cat=sports"><button class="all-news" id="view-all">Explore More</button></a>
          </div>
        </div>
      </div>
    </section>

    <section class="categories py-3">
      <div class="section-center categories-center">
        <div class="categories-title mb-4">
          <h5 class="fs-3">Movies and Shows</h5>
        </div>
        <div class="category-main">
          <?php 
              $blogs = getblogs($con,1,'','entertainment','',1,1);
          ?>
          <a href="blog.php?id=<?php echo $blogs[0]['id']?>">
          <article class="category item-1">
            <div class="img-container">
              <img src="<?php echo './media/blog/'.$blogs[0]['img']?>" alt="" class="img-container">
            </div>
            <div class="title-container">
              <p><?php echo $blogs[0]['title']?></p>
              <span><?php echo $blogs[0]['description'] ?></span>
            </div>
          </article>
          </a>
        </div>

        <div class="blogs mt-3">
          <div class="cards">
            <?php 
              $blogs = getblogs($con,3,'','entertainment','','',1);
              foreach($blogs as $list){
            ?>
            <a href="blog.php?id=<?php echo $list['id']?>" style="text-decoration:none;color:black">
            <article class="blog pb-1">
              <div class="blog-img">
                <img src="<?php echo './media/blog/'.$list['img']?>" alt="" class="img-blog">
              </div>
              <div class="blog-content">
                <p><?php echo $list['title'] ?></p>
              </div>
            </article>
            </a>
          <?php } ?>
          </div>
          <div class="blog-button-center mt-2">
            <a href="single-category.php?cat=entertainment"><button class="all-news" id="view-all">Explore More</button></a>
          </div>
        </div>
      </div>
    </section>

    <section class="news-videos py-5">
      <div class="videos-center">
        <div class="videos-heading ps-3 mb-2">
          <p class="fs-3">Explore More</p>
          <span class="fs-5">See Latest Videos</span>
        </div>
        <div class="videos-main">
          <article class="single-video-cricket">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latestt</p>
            </div>
          </article>
          <article class="single-video-cricket">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latest</p>
            </div>
          </article>
          <article class="single-video-cricket">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latest</p>
            </div>
          </article>
          <article class="single-video-cricket">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>IPL 2K21</p>
            </div>
          </article>
          <article class="single-video-cricket">
            <img src="./img/tech2.jpg" alt="">
            <div class="video-title">
              <p>Khan Sir Latest</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="categories py-3">
      <div class="section-center categories-center">
        <div class="categories-title mb-4">
          <h5 class="fs-3">Economy and Businesses</h5>
        </div>
        <div class="category-main">
          <?php 
              $blogs = getblogs($con,1,'','economy_finance','',1,1);
          ?>
          <a href="blog.php?id=<?php echo $blogs[0]['id']?>">
          <article class="category item-1">
            <div class="img-container">
              <img src="<?php echo './media/blog/'.$blogs[0]['img']?>" alt="" class="img-container">
            </div>
            <div class="title-container">
              <p><?php echo $blogs[0]['title']?></p>
              <span><?php echo $blogs[0]['description'] ?></span>
            </div>
          </article>
          </a>
        </div>

        <div class="blogs mt-3">
          <div class="cards">
            <?php 
              $blogs = getblogs($con,3,'','economy_finance','','',1);
              foreach($blogs as $list){
            ?>
            <a href="blog.php?id=<?php echo $list['id']?>" style="text-decoration:none;color:black">
            <article class="blog pb-1">
              <div class="blog-img">
                <img src="<?php echo './media/blog/'.$blogs[0]['img']?>" alt="" class="img-blog">
              </div>
              <div class="blog-content">
                <p><?php echo $list['title'] ?></p>
              </div>
            </article>
            </a>
          <?php } ?>
          </div>
          <div class="blog-button-center mt-2">
            <a href="single-category.php?cat=economy_finance"><button class="all-news" id="view-all">Explore More</button></a>
          </div>
        </div>
      </div>
    </section>


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