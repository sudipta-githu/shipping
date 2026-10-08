<?php
require_once __DIR__ . '/admin/db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="">
    <title>Blog</title>
    <style>
      
    </style>
</head>
<body>
    


<div class="sticky-top">
  <nav class="navbar navbar-expand-lg">
    
    <div class="nav-item nav-link">
      <ul class="navbar-nav">
        <li class="navbar-brand"><img src="image/download.jpg" alt=""></li>
        <li><a class="nav-link border_btn" href="index.php">HOME</a></li>
        <li><a class="nav-link border_btn active" href="blog.php">BLOG</a></li>
        <li><a class="nav-link border_btn " href="services.php">SERVICES</a></li>
        <li><a class="nav-link border_btn" href="contact.php">CONTACT</a></li>
      </ul>
    </div>

  </nav>
</div>



<div class="blogg_1">
  <section class="container blogg">
    <div class="row">
      <?php
                $query = $pdo->prepare("SELECT * FROM `blog`");
                $query->execute();
                $fetch_list = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($fetch_list AS $fetch)
                {
            ?>
               <div class="col-md-4 mb-4">
                  <div class="card h-100 shadow-sm" data-aos="zoom-in-up">
                      <img src="admin/<?php print $fetch['image']; ?>" class="card-img-top img-fluid" alt="">
                      <div class="card-body">
                          <h5 class="card-title"><?php print $fetch['title']; ?></h5>
                          <p class="card-text"><?php print $fetch['subtitle']; ?></p>
                          <p class="card-text"><?php print $fetch['contant']; ?></p>
                      </div>
                  </div>
              </div>
              <?php } ?>
    </div>
  </section>
</div>


<div data-aos="zoom-in">
<section class="container" style="text-align: center;">
           <img src="" style="width: 30%; padding: 20px; border: 1px solid #ffffff;
    border-radius: 60px;">
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