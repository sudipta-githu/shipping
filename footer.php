<?php include_once __DIR__ . '/admin/db.php'; ?>




<div class="footer">

<section class="container">
  <div class="row">
    <div class="col-md-6">
      <h5><strong>Our Location</strong></h5>
      <p><strong><i class="bi bi-geo-alt"></i> <?= $company_info['location']; ?></strong></p>
      <p><strong>+880<?= $company_info['mobile']; ?></strong></p>
      <p><strong><?= $company_info['email']; ?></strong></p>
      <i class="fa-brands fa-facebook"></i><a href=""><?= $company_info['facebook']; ?></a><br>
      <i class="fa-brands fa-instagram"></i><a href=""><?= $company_info['instagram']; ?></a>
    </div>
    
    <?php
                $query = $pdo->prepare("SELECT * FROM `company` WHERE `id` = '1'");
                $query->execute();
                $fetch_list = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($fetch_list AS $fetch)
                {
            ?>

    <div class="col-md-3">
      <h5>COMPANY</h5>
      <ul>
        <a href=""><li>Export & Import</li></a>
        <a href=""><li>Trust</li></a>
        <a href=""><li>Quality Excellence</li></a>
        <a href=""><li>Global Compliance</li></a>
      </ul>
    </div>
    <div class="col-md-3">
      <p><?= $company_info['about']; ?></p>
        <img src="admin/uploads/<?= $fetch['image']; ?>" alt="" style="width: 25%;">
    </div>
  </div>

<?php } ?>


</section>

</div>