<?php


$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);


?>
<footer>
    <!-- Grid container -->
    <div class="container p-4 pb-0 bg-light text-center text-white mb-5">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="https://www.facebook.com/profile.php?id=100078256651030"
        role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #ac2bac;"
        href="https://www.instagram.com/mass_and_muscle/"
        role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #0082ca;"
        href="#!"
        role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>
      <!-- Whatsapp -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color:#25D366;"
        href="#!"
        role="button"
        ><i class="fab fa-whatsapp"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  
    
    <div class="container footer__container">
        <article>
            <h4>Categories</h4>
            <ul>
               
                <?php while ($categ = mysqli_fetch_assoc($categories)) : ?>
                        <?php if ($categ['id'] != 5) : ?>
                          <li><a href="<?= ROOT_URL ?>/index1.php?cat=<?= $categ['id'] ?>"><?= $categ['title'] ?></a></li>
                           
                        <?php endif ?>

                    <?php endwhile ?>
            </ul>
        </article>
        <article>
            <h4>Support</h4>
            <ul>
                <li><a href="">Online Support</a></li>
                <li><a href="">Call Numbers</a></li>
                <li><a href="">Emails</a></li>
                <li><a href="">Social Support</a></li>
                <li><a href="">Location</a></li>
            </ul>
        </article>
       
        <article>
            <h4>Permalinks</h4>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </article>
    </div>
    <div class="footer__copyright">
        <small>Copyright &copy; 2023 </small>
    </div>
</footer>
<script src="<?= ROOT_URL ?>js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src='<?= ROOT_URL ?>js/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.hoverintent/1.9.0/jquery.hoverIntent.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.min.js'></script>
<script src="<?= ROOT_URL ?>js/index.js"></script>
<script src="<?= ROOT_URL ?>js/main.js"></script>

</body>

</html>