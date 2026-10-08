<?php
require_once __DIR__ . '/admin/db.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="x-icon" href="">
    <title>Home</title>
    <style>
  .carousel-item {
  height: 500px; 
}
.carousel-item img {
  height: 100%;
  object-fit: cover;
}

    </style>
</head>
<body>
    
<div class="sticky-top">
  <nav class="navbar navbar-expand-lg">
    
    <div class="nav-item nav-link">
      <ul class="navbar-nav">
        <li class="navbar-brand"><img src="image/download.jpg" alt=""></li>
        <li><a class="nav-link border_btn active" href="index.php">HOME</a></li>
        <li><a class="nav-link border_btn" href="blog.php">BLOG</a></li>
        <li><a class="nav-link border_btn" href="services.php">SERVICES</a></li>
        <li><a class="nav-link border_btn" href="contact.php">CONTACT</a></li>
      </ul>
    </div>

  </nav>
</div>

<!-- herobanner start -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
 <?php
                $sl = 0;
                $query = $pdo->prepare("SELECT * FROM `herobanner`");
                $query->execute();
                $fetch_list = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($fetch_list AS $fetch)
                {
                $count = $sl++;

            ?>
  
   <li data-target="#carouselExampleIndicators" data-slide-to="<?= $count; ?>" class="<?php if($count == '0') {print 'active';}?>"></li>
<?php } ?>
  </ol>

  <div class="carousel-inner">

  <?php
                $sl = 0;
                $query = $pdo->prepare("SELECT * FROM `herobanner`");
                $query->execute();
                $fetch_list = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($fetch_list AS $fetch)
                {
                $count = $sl++;

            ?>
   
    <div class="carousel-item <?php if($count == '0'){print 'active';} ?> ">
      <img class="d-block w-100" src='admin/<?= $fetch['image']; ?>' alt="slide">
    </div>

  <?php } ?>

  

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- hrobanner end -->
 
<div class="aboutus">
<section class="container">
  <div class="about">
    <div data-aos="fade-up">
    <h1>About</h1>
      <p><?= $company_info['about']; ?></p>
    </div>
  </div>
</section>
</div>





<!-- footer start -->

<?php require_once 'footer.php'; ?>

<!-- footer end -->



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
  AOS.init();
</script>
</body>
</html>