<?php
require_once 'auth.php';
require_once 'db.php';
require_once 'clean.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $subtitle = htmlspecialchars($_POST['subtitle']);
    $contant = htmlspecialchars($_POST['contant']);
    $card_title = htmlspecialchars($_POST['card_title']);
    $card_subtitle = htmlspecialchars($_POST['card_subtitle']);
    $card_contant = htmlspecialchars($_POST['card_contant']);

    $update_id = $_POST['update_id'];

    $target_dir = "uploads/";

$rename_file = rand(). basename($_FILES["image"]["name"]);

$target_file = $target_dir . $rename_file;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

if (empty($update_id)) {

    $query = $pdo->exec("INSERT INTO `services`

        (
            `title`,
            `subtitle`,
            `contant`,
            `image`,
            `card_title`,
            `card_subtitle`,
            `card_contant`


        )    VALUES   (
        
            '$title',
            '$subtitle',
            '$contant',
            '$target_file',
            '$card_title',
            '$card_subtitle',
            '$card_contant'
        
        )
    ");

    if ($query) {
        echo "<script>alert('Success.');</script>";
        header("Location: services.php");
    } else {
        echo "Error saving.";
    }

}else{
$query = $pdo->prepare("SELECT image FROM `services` WHERE `id` = '$update_id'");
$query->execute();
$fetch_data = $query->fetch(PDO::FETCH_ASSOC);
unlink($fetch_data['image']);

$query = $pdo->exec("UPDATE `services` SET
    `title` = '$title',
    `subtitle` = '$subtitle',
    `contant` = '$contant',
    `image` = '$target_file',
    `card_title` = '$card_title',
    `card_subtitle` = '$card_subtitle',
    `card_contant` = '$card_contant'
    WHERE id = '".$update_id."'
");

    if ($query) {
      
        echo "<script>alert('Update Success.');</script>";
        header("Location: services.php");
    } else {
        echo "Error saving.";
    }

}


}

// delete

if(!empty($_GET['delete_id'])){

$delete_id = $_GET['delete_id'];
$image = $_GET['image'];

unlink($image);

    $query = $pdo->prepare("DELETE FROM `services` WHERE `id` = '$delete_id'");
    if($query->execute()){
         echo "<script>alert('Delete Success.');</script>";
        header("Location: services.php");
    } else {
        echo "Error deleting customer.";
    }
}


if(!empty($_GET['id'])){

$id = $_GET['id'];


  $query = $pdo->prepare("SELECT * FROM `services` WHERE `id` = '$id'");
  $query->execute();
  $fetch_data = $query->fetch(PDO::FETCH_ASSOC);

  $id = $fetch_data['id'];
  $title = $fetch_data['title'];
  $subtitle = $fetch_data['subtitle'];
  $contant = $fetch_data['contant'];
  $image = $fetch_data['image'];
  $card_title = $fetch_data['card_title'];
  $card_subtitle = $fetch_data['card_subtitle'];
  $card_contant = $fetch_data['card_contant'];

}else {
  $id = '';
  $title = '';
  $subtitle = '';
  $contant = '';
  $image = '';
  $card_title = '';
  $card_subtitle = '';
  $card_contant = '';

}













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
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="update_id" name="update_id" value="<?php print $id; ?>">
                        <input type="text" id="title" name="title" placeholder="title" value="<?php print $title; ?>" required>
                        <input type="text" id="subtitle" name="subtitle" placeholder="subtitle" value="<?php print $subtitle; ?>" required> 
                        <input type="text" id="contant" name="contant" placeholder="contant" value="<?php print $contant; ?>" required>
                        <label for="file-upload">Choose a file:</label>
                        <input type="file" id="image" name="image" required>  
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="card_title" name="card_title" placeholder="card_title" value="<?php print $card_title; ?>" required>
                        <input type="text" id="card_subtitle" name="card_subtitle" placeholder="card_subtitle" value="<?php print $card_subtitle; ?>" required>
                        <input type="text" id="card_contant" name="card_contant" placeholder="card_contant" value="<?php print $card_contant; ?>" required>
                    </div>
                </div>
                <button type="submit">Save</button>
            </form>     
            </section>

            <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Title</th>
                <th scope="col">subtitle</th>
                <th scope="col">contant</th>
                <th scope="col">image</th>
                <th scope="col">card_title</th>
                <th scope="col">card_subtitle</th>
                <th scope="col">card_contant</th>
                <th scope="col">action</th>
              </tr>
            </thead>

            <?php
                $sl = 1;
                $query = $pdo->prepare("SELECT * FROM `services`");
                $query->execute();
                $fetch_list = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($fetch_list AS $fetch)
                {
            ?>
            <tbody>
            <tr>
            <td><?php print $sl++; ?></td>
            <td><?php print $fetch['title']; ?></td>
            <td><?php print $fetch['subtitle']; ?></td>
            <td><?php print $fetch['contant']; ?></td>
            <td><img src='<?php print $fetch['image']; ?>'style="width:150px;"></td>
            <td><?php print $fetch['card_title']; ?></td>
            <td><?php print $fetch['card_subtitle']; ?></td>
            <td><?php print $fetch['card_contant']; ?></td>
            <td>
                <a href="services.php?id=<?php print $fetch['id']; ?>&image=<?php print $fetch['image']; ?>"><i class="fa-regular fa-pen-to-square pen"></i></a>
                <a href="services.php?delete_id=<?php print $fetch['id']; ?>&image=<?php print $fetch['image']; ?>"><i class="fa-solid fa-trash trash"></i></a>
            </td>
            </tr>
        <?php } ?>
            </tbody>
        </table>
        </div>



        </div>
    </div>
</div>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>
</html>