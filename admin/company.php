<?php

require_once 'auth.php';
require_once 'db.php';
require_once 'clean.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

$about = htmlspecialchars($_POST['about']);
$location = htmlspecialchars($_POST['location']);
$mobile = htmlspecialchars($_POST['mobile']);
$email = htmlspecialchars($_POST['email']);
$instagram = htmlspecialchars($_POST['instagram']);
$facebook = htmlspecialchars($_POST['facebook']);
$image = htmlspecialchars($_POST['image']);


$target_dir = "uploads/";
$rename_file = rand() . basename($_FILES["image"]["name"]);
$target_file = $target_dir.$rename_file;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);


$update_id = $_POST['update_id'];

    // $query = $pdo->prepare("SELECT image FROM `company` WHERE `id` = '$update_id'");
    // $query->execute();
    // $fetch_data = $query->fetch(PDO::FETCH_ASSOC);
    // unlink($fetch_data['image']);


    $query = $pdo->exec("UPDATE `company` SET
    `about` = '$about',
    `location` = '$location',
    `mobile` = '$mobile',
    `email` = '$email',
    `instagram` = '$instagram',
    `image` = '$rename_file',
    `facebook` = '$facebook'
    WHERE id = '".$update_id."'
    ");
    if ($query) {
        echo "<script>alert('Update Success.');</script>";
        header("Location: company.php");
    } else {
        echo "Error saving.";
    }
}


$query = $pdo->prepare("SELECT * FROM `company` WHERE `id` = '1'");
  $query->execute();
  $fetch_data = $query->fetch(PDO::FETCH_ASSOC);

  $id = $fetch_data['id'];
  $about = $fetch_data['about'];
  $location = $fetch_data['location'];
  $mobile = $fetch_data['mobile'];
  $email = $fetch_data['email'];
  $instagram = $fetch_data['instagram'];
  $image = $fetch_data['image'];
  $facebook = $fetch_data['facebook'];







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
        <style>
     body {
      overflow-x: hidden;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background: #212529;
      padding-top: 20px;
    }

    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background: #343a40;
      color: #fff;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
    }

    .sidebar .menu-title {
      color: white;
      font-size: 20px;
      font-weight: bold;
      padding: 0 20px 20px;
    }

    .menus{
      font-weight:600;
      
    }

    .home{
        color: #00ff40;
    }
    .hero{
        color: #d9ff00;
    }
    .company{
        color: #e100ff;
    }
    .blog{
        color: #0099ff;
    }
    .log{
        color: #ff0000;
    }

    .bg-dark {
    background-color: rgb(0, 0, 0) !important;
}

 .container{
    background:#fff;
    padding:25px;
    border-radius:12px;
    box-shadow:0 0 15px rgba(0,0,0,.1);
    margin:20px;
}

.container input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
    transition:.3s;
}

.container input:focus{
    border-color:#0d6efd;
    box-shadow:0 0 5px rgba(13,110,253,.3);
}

.container button{
    background:#0d6efd;
    color:#fff;
    border:none;
    padding:12px 25px;
    border-radius:8px;
    cursor:pointer;
    transition:.3s;
}

.container button:hover{
    background:#0b5ed7;
}

.fa-trash{
    color:#dc3545;
}
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline menus">Dashboard</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link align-middle px-0 home">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="herobanner.php" class="nav-link px-0 align-middle hero">
                            <i class="fs-4 bi bi-border-all"></i></i> <span class="ms-1 d-none d-sm-inline">Hero Banner</span></a>
                    </li>
                    <li>
                        <a href="company.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle company">
                            <i class="fs-4 bi bi-building"></i></i> <span class="ms-1 d-none d-sm-inline">Company</span></a>                    
                    </li>
                    <li>
                        <a href="blog.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle blog">
                            <i class="fs-4 bi bi-pencil"></i> <span class="ms-1 d-none d-sm-inline">Blog</span> </a>
                            
                    </li>
                    <li>
                        <a href="services.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle blog">
                            <i class="fs-4 bi bi-pencil"></i> <span class="ms-1 d-none d-sm-inline">Services</span> </a>
                            
                    </li>
                    <li>
                        <a href="logout.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle log">
                            <i class="bi bi-box-arrow-left"></i></i> <span class="ms-1 d-none d-sm-inline">Log Out</span> </a>
                            
                    </li>
                </ul>
                
            </div>
        </div>

        <div class="col py-3">
  <section class=container>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <input type="hidden" id="update_id" name="update_id" value="<?php print $id; ?>">

        <div class="row">
          <div class="col-md-6">
              <input type="text" id="about" name="about" placeholder="about" value="<?php print $about; ?>" required>
              <input type="text" id="location" name="location" placeholder="location" value="<?php print $location; ?>" required> 
          </div>
          <div class="col-md-6">
            <input type="number" id="mobile" name="mobile" placeholder="mobile" value="<?php print $mobile; ?>" required>
            <input type="email" id="email" name="email" placeholder="email" value="<?php print $email; ?>" required>
          </div>
          <div class="">
            <input type="text" id="instagram" name="instagram" placeholder="instagram" value="<?php print $instagram; ?>" required>
            <input type="text" id="facebook" name="facebook" placeholder="facebook" value="<?php print $facebook; ?>" required>
            <label for="file-upload">Choose a file:</label>
            <input type="file" id="image" name="image" required>
                <button type="submit">Update</button>
          </div>
        </div>
                      
    </form>  

  </section>

  <?php
                $query = $pdo->prepare("SELECT * FROM `company` WHERE `id` = '1'");
                $query->execute();
                $fetch_list = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($fetch_list AS $fetch)
                {
            ?>
        <tbody>
                <img src='uploads/<?php print $fetch['image']; ?>'style="width:150px;">
        </tbody>

<?php } ?>

  </div>
        </div>
    </div>
</div>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>
</html>