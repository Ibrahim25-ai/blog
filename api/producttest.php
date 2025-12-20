<?php
include 'partials/header.php';

// fetch post data from database if id is set
if (isset($_GET['id']) && isset($_GET['cat_id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $id_cat = filter_var($_GET['cat_id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM products WHERE id=$id";
  $result = mysqli_query($connection, $query);
  $product = mysqli_fetch_assoc($result);

  $query = "SELECT * FROM products WHERE category_id=$id_cat";
  $products3 = mysqli_query($connection, $query);
} else {
  die();
}

?>
<link rel="stylesheet" href="assets/css/docs.theme.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link src="<?= ROOT_URL ?>css/docs.theme.min.css">
</link>
<script src="<?= ROOT_URL ?>js/app.js"></script>
<script src="<?= ROOT_URL ?>js/jquery.min.js"></script>
<script src="<?= ROOT_URL ?>js/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<!-- Product section-->
<section>
  <div class="container-fluid">
    <div class="row  p-3">
      <div class="col-lg-6 col-12 p-2 ">
        <div class="position-relative m-5">

          <?php if ($product['new'] && $product['promo'] == 0) : ?>
            <div class=" notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0">
              <span class="badge  badge-secondary " style="font-size: 0.9rem;">New</span>
            </div>
          <?php endif ?>
          <?php if ($product['new'] && $product['promo'] != 0) : ?>
            <div class=" notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0 " style="margin-top: 3.5rem;">
              <span class="badge  badge-secondary " style="font-size: 0.9rem;">New</span>
            </div>
          <?php endif ?>
          <?php if ($product['promo'] != 0) : ?>
            <div class="notify-badge  rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0 ">
              <span class="badge badge-secondary " style="font-size: 0.9rem;">-<?= $product['promo'] ?>%</span>
            </div>
          <?php endif ?>


          <img style="height : 30rem;object-fit:contain;" src="<?= ROOT_URL ?>images/<?= $product['thumbnail'] ?>" class="menu-img img-fluid" alt="" width="250">

        </div>
      </div>
      <div class="col-lg-5 col-12 p-2" style="margin-top:3rem;">
        <div class="">
          <p class="fs-2 fw-bold " style="color:black;"><?= $product['title'] ?></p>
          <div class="row align-items-start">
            <div class="col-md-3 col-sm-6 text-start">
              <p class="fs-3 text-nowrap text-decoration-line-through fw-light"><?= $product['prix_org'] ?> DT</p>
            </div>
            <div class="col-md-3 col-sm-6 ">
              <p class="fs-3 text-nowrap fw-bolder" style="color:hsl(51, 91%, 60%);"><?= $product['prix_aft'] ?> DT</p>
            </div>
          </div>

          <p class="fs-6 fw-normal"><?= $product['body'] ?></p>
          <div class="row">
            <div class="nav__text">
              <span class="">+7DT livraison<i class="bi bi-truck"></i></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
              </svg>
            </div>
            
          </div>
          <hr>
          <button href="#commande" data-toggle="modal" type="button" class="btn btn-dark btn-lg">Command</button>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div id="commande" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?= ROOT_URL ?>add-command-logic.php" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="id" value="<?= $product['id'] ?>">
          <div class="modal-header">
            <h4 class="modal-title">Add command</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input name="tel" class="form-control" required>
            </div>
            <div class="form-group">
              <label>email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" name="adr" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" name="submit" class="btn btn-dark" value="Command">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- body -->
<div class="home-demo   m-5">
  <div class="row">
    <div class="large-12 columns carousel-wrap ">
      <h3>PRODUITS APPARENTÉS</h3>
      <div class="owl-carousel owl-theme">

        <?php if (mysqli_num_rows($products3) > 0) : ?>


          <?php while ($product = mysqli_fetch_assoc($products3)) : ?>
            <div class="item ">
              <div class="col  menu-item">
                <div class="card border-0 text-center">
                  <div class="card-body position-relative m-5">
                    <?php if ($product['new'] && $product['promo'] == 0) : ?>
                      <div class=" notify-badge rounded-circle d-flex align-items-center justify-content-center vh-100 top-0 end-0">
                        <span class="badge  badge-secondary " style="font-size: 0.9rem;">New</span>
                      </div>
                    <?php endif ?>
                    <?php if ($product['new'] && $product['promo'] != 0) : ?>
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
                      <a href="<?= ROOT_URL ?>images/<?= $product['thumbnail'] ?>" class="glightbox">
                        <img style="height : 15rem;" src="<?= ROOT_URL ?>images/<?= $product['thumbnail'] ?>" class="menu-img img-fluid" alt="" width="250">
                      </a>
                    </div>
                    <div class="card-inner ">
                      <span class="d-inline-block text-truncate fw-bolder" style="max-width: 150px;">
                        <?= $product['title'] ?>
                      </span>
                      <div class="row align-items-center">
                        <div class="col-6   text-end ">
                          <p class="text-nowrap text-decoration-line-through fw-lighter"><?= $product['prix_org'] ?> DT</p>
                        </div>
                        <div class="col-6  text-start" style="margin-right: -0.5rem;">
                          <p class=" text-nowrap fw-bolder " style="color:hsl(51, 91%, 60%);"><?= $product['prix_aft'] ?> DT</p>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center">
                        <a href="<?= ROOT_URL ?>/producttest.php?id=<?= $product['id'] ?>&cat_id=<?= $product['category_id'] ?>">
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

      </div>
    </div>
  </div>
</div>

<script>
  $('.owl-carousel').owlCarousel({
    margin: 10,
    stagePadding: 5,

    nav: true,
    navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 4
      }
    }
  });
</script>

<?php
include 'partials/footer.php';


?>