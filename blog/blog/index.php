<?php
include 'partials/header.php';

// fetch post data from database if id is set
if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM products WHERE pack_id=$id";
  $result = mysqli_query($connection, $query);
  $product = mysqli_fetch_assoc($result);
  $query = "SELECT * FROM packs WHERE id=$id";
  $product1=mysqli_query($connection, $query);

  
  
} else {
  header('location: ' . ROOT_URL . 'admin/');
  die();
}

?>

<section>
    <div class="container">
     <div class="row">  
        <div class="col-12">
<img class="nos img-fluid" src="images/NOS.png" height="35px" width="30px">
<style>
.nos{
    filter:brightness(0.85);

}

    </style>

</div>
</div>
</div> 
</section>

<section>
<div class="tab-content" data-aos="fade-up" data-aos-delay="300">

<div class="tab-pane fade active show" id="NEWP">
  <div class="container1 text-center mt-5 mb-5">
    <div class="row wrapper rounded fade show active">
    
   <div id="pagination"></div>    
          <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
      <?php if (mysqli_num_rows($result) > 0) : ?>


        <?php while ($product = mysqli_fetch_array($result)) : ?>
          <!-- get category title of each post from categories table -->

          <div class="col-lg-3 col-md-4  p-4">
            <div class="col menu-item">
              <div class="card border-0 text-center">
                <div class="card-body position-relative p-4">
                <?php if ($product['new'] && $product['promo'] == 0): ?>
                <div class=" notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0" >
                  <span class="badge  badge-secondary " style="font-size: 0.9rem;">New</span>
                </div>
              <?php endif ?>
              <?php if ($product['new'] && $product['promo'] != 0): ?>
                <div class=" notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0 " style="margin-top: 3.5rem;">
                  <span class="badge  badge-secondary " style="font-size: 0.9rem;">New</span>
                </div>
              <?php endif ?>
              <?php if ($product['promo'] != 0) : ?>
                <div class="notify-badge  rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0 ">
                  <span class="badge badge-secondary " style="font-size: 0.9rem;">-<?= $product['promo'] ?>%</span>
                </div>
              <?php endif ?>

                  <div class="card-image">

                    <img style="height : 17rem;" src="<?= ROOT_URL ?>images/<?= $product['thumbnail'] ?>" class="menu-img " width="0">

                  </div>

                  <div class="card-inner prod__desc">
                    <p style="height:1rem;margin-top:0.5rem;" class="fw-bolder  text-truncate "><?= $product['title'] ?></h4>

                    <div class="row align-items-center">
                      <div class="col-6   text-end ">

                        <p class="text-nowrap text-decoration-line-through fw-lighter"><?= $product['prix_org'] ?> DT</p>
                      </div>
                      <div class="col-6  text-start" style="margin-right: -0.5rem;">
                        <p class=" text-nowrap fw-bolder " style="color:hsl(51, 91%, 60%);"><?= $product['prix_aft'] ?> DT</p>
                      </div>
                    </div>

                    <div class=" d-flex justify-content-center">
                      <a href="<?= ROOT_URL ?>/producttest.php?id=<?= $product['id'] ?>">
                        <button class="button-86" role="button">Buy</button>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- Menu Item -->
          </div>
        <?php endwhile ?>
      <?php else : ?>
        <div class="alert__message error"><?= "No products found" ?></div>
      <?php endif ?>
      <div class="col-lg-3 col-md-4  p-4">
        <div class="col menu-item">
          <div class="card border-0 text-center">
            <div class="card-body">
              <div class="notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0" style="margin-top:4rem;">
                <span class="badge badge-secondary " style="font-size: 0.9rem;">New</span>
              </div>
              <div class="notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0">
                <span class="badge badge-secondary " style="font-size: 0.9rem;">-7%</span>
              </div>

              <div class="card-image">
                <a href="<?= ROOT_URL ?>images/prod1.jpg" class="glightbox">
                  <img src="<?= ROOT_URL ?>images/prod1.jpg" class="menu-img img-fluid" alt="" width="250">
                </a>
              </div>
              <div class="card-inner prod__desc   ">
                <p class="fw-bolder">MUSCLE JUICE REVOLUTION 2600 –</h4>

                <div class="row align-items-center">
                  <div class="col-6   text-end ">

                    <p class="text-nowrap text-decoration-line-through fw-lighter">150.00 DT</p>
                  </div>
                  <div class="col-6  text-start" style="margin-right: -0.5rem;">
                    <p class=" text-nowrap fw-bolder " style="color:hsl(51, 91%, 60%);">140.00 DT</p>
                  </div>
                </div>

                <div class=" d-flex justify-content-center">
                  <button class="button-86" role="button">Details</button>
                </div>

              </div>
            </div>
          </div>
        </div><!-- Menu Item -->
      </div>

    </div>
  </div>
</div>
</div>
</section>



<?php
include 'partials/footer.php';

?>